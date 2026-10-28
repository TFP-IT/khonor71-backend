<?php

namespace Modules\News\Http\Controllers;

use App\Models\NewsMst;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Modules\Localize\Entities\Language;
use Modules\News\Entities\AiNewsCandidate;
use Modules\News\Entities\AiNewsSource;
use Modules\News\Jobs\GenerateAiNewsCandidateJob;
use Modules\News\Jobs\CollectAiNewsFeedsJob;
use Modules\News\Services\AiNewsHostPolicy;
use Modules\News\Services\NewsService;

class AiNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_news|update_news|create_news')->only(['index', 'edit']);
        $this->middleware('permission:read_news|update_news')->only(['sources']);
        $this->middleware('permission:update_news')->only(['storeSource', 'toggleSource', 'deleteSource', 'updateReview', 'reject']);
        $this->middleware('permission:create_news')->only(['runNow', 'retry', 'createCmsDraft']);
    }

    public function index()
    {
        $candidates = AiNewsCandidate::with(['source', 'language', 'category'])->latest()->paginate(25);
        $counts = AiNewsCandidate::query()
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        return view('news::ai_news.index', compact('candidates', 'counts'));
    }

    public function sources()
    {
        $sources = AiNewsSource::with(['language', 'category'])->withCount('candidates')->latest()->get();
        $languages = Language::orderBy('langname')->get();
        $categories = Category::query()->select(['id', 'category_name', 'language_id'])
            ->whereNull('parents_id')->orderBy('category_name')->get();
        $allowedHosts = config('ai_news.allowed_feed_hosts', []);

        return view('news::ai_news.sources', compact('sources', 'languages', 'categories', 'allowedHosts'));
    }

    public function storeSource(Request $request, AiNewsHostPolicy $hostPolicy)
    {
        $request->merge(['language_id' => $request->input('language_id') ?: get_language_id()]);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'feed_url' => ['required', 'string', 'max:2048', 'url'],
            'language_id' => ['required', 'integer', 'exists:languages,id,value,bn'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
        ]);

        try {
            $hostPolicy->assertAllowed($data['feed_url']);
        } catch (\InvalidArgumentException $exception) {
            return back()->withErrors(['feed_url' => $exception->getMessage()])->withInput();
        }
        $category = Category::whereKey($data['category_id'])
            ->where('language_id', $data['language_id'])->first();
        if (! $category) {
            return back()->withErrors(['category_id' => 'Choose a category for the selected language.'])->withInput();
        }

        $normalizedUrl = rtrim(trim($data['feed_url']), '/');
        $urlHash = hash('sha256', $normalizedUrl);
        if (AiNewsSource::where('feed_url_hash', $urlHash)->exists()) {
            return back()->withErrors(['feed_url' => 'This feed has already been added.'])->withInput();
        }

        AiNewsSource::create([
            'name' => $data['name'],
            'feed_url' => $normalizedUrl,
            'feed_url_hash' => $urlHash,
            'language_id' => $data['language_id'],
            'category_id' => $data['category_id'],
            'is_enabled' => $request->boolean('is_enabled'),
            'created_by' => auth()->id(),
        ]);

        return back()->with('success', 'RSS source added. Review its license and content before enabling it.');
    }

    public function toggleSource(AiNewsSource $source)
    {
        $source->update(['is_enabled' => ! $source->is_enabled, 'last_error' => null]);

        return back()->with('success', $source->is_enabled ? 'RSS source enabled.' : 'RSS source disabled.');
    }

    public function deleteSource(AiNewsSource $source)
    {
        if ($source->candidates()->exists()) {
            return back()->withErrors(['source' => 'This source has candidates and cannot be deleted. Disable it instead.']);
        }

        $source->delete();

        return back()->with('success', 'RSS source deleted.');
    }

    public function runNow()
    {
        if (! config('ai_news.enabled')) {
            return back()->withErrors(['pipeline' => 'AI news is disabled. Set AI_NEWS_ENABLED=true after configuring Gemma, queue workers, and approved feed hosts.']);
        }

        CollectAiNewsFeedsJob::dispatch()
            ->onConnection(config('ai_news.queue_connection', 'database'))
            ->onQueue('ai-news');

        return back()->with('success', 'RSS collection queued. New candidates will appear in the review list.');
    }

    public function retry(AiNewsCandidate $candidate)
    {
        abort_unless(config('ai_news.enabled'), 503, 'AI news generation is disabled.');
        abort_unless(
            in_array($candidate->status, [AiNewsCandidate::STATUS_FAILED, AiNewsCandidate::STATUS_DRAFT], true) &&
            ! $candidate->reviewed_at &&
            ! $candidate->news_mst_id,
            409
        );
        abort_if($candidate->generation_attempts >= 5, 409, 'This candidate has reached its generation attempt limit.');

        $candidate->forceFill([
            'status' => AiNewsCandidate::STATUS_PENDING,
            'error_message' => null,
            'title' => null,
            'short_head' => null,
            'summary' => null,
            'body' => null,
            'meta_title' => null,
            'meta_description' => null,
            'keywords' => null,
        ])->save();

        GenerateAiNewsCandidateJob::dispatch($candidate->id)
            ->onConnection(config('ai_news.queue_connection', 'database'))
            ->onQueue('ai-news');

        return redirect()->route('ai-news.edit', $candidate)->with('success', 'Generation retry queued.');
    }

    public function edit(AiNewsCandidate $candidate)
    {
        return view('news::ai_news.review', compact('candidate'));
    }

    public function updateReview(Request $request, AiNewsCandidate $candidate)
    {
        abort_unless(in_array($candidate->status, [AiNewsCandidate::STATUS_DRAFT, AiNewsCandidate::STATUS_REVIEWED], true), 409);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'short_head' => ['nullable', 'string', 'max:255'],
            'summary' => ['required', 'string', 'max:800'],
            'body' => ['required', 'string', 'max:10000'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'keywords' => ['nullable', 'string', 'max:1000'],
        ]);

        $keywords = collect(explode(',', $data['keywords'] ?? ''))
            ->map(static fn ($keyword) => trim($keyword))
            ->filter()
            ->unique()
            ->take(10)
            ->values()
            ->all();

        $candidate->forceFill([
            ...$data,
            'keywords' => $keywords,
            'status' => AiNewsCandidate::STATUS_REVIEWED,
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
            'error_message' => null,
        ])->save();

        return redirect()->route('ai-news.edit', $candidate)->with('success', 'Review saved. This candidate is still unpublished.');
    }

    public function reject(AiNewsCandidate $candidate)
    {
        abort_unless(in_array($candidate->status, [AiNewsCandidate::STATUS_DRAFT, AiNewsCandidate::STATUS_REVIEWED, AiNewsCandidate::STATUS_FAILED], true), 409);

        $candidate->forceFill([
            'status' => AiNewsCandidate::STATUS_REJECTED,
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ])->save();

        return redirect()->route('ai-news.index')->with('success', 'Candidate rejected; it will not be published.');
    }

    public function createCmsDraft(AiNewsCandidate $candidate, NewsService $newsService)
    {
        abort_unless($candidate->status === AiNewsCandidate::STATUS_REVIEWED, 409, 'Review and save this candidate before importing it.');
        abort_unless(! $candidate->news_mst_id, 409, 'This candidate was already imported.');

        $category = Category::whereKey($candidate->category_id)
            ->where('language_id', $candidate->language_id)->first();
        abort_unless($category, 422, 'The configured category is no longer available for this language.');

        $paragraphs = preg_split('/\R{2,}/u', trim((string) $candidate->body)) ?: [];
        $bodyHtml = collect($paragraphs)
            ->map(static fn ($paragraph) => trim($paragraph))
            ->filter()
            ->map(static fn ($paragraph) => '<p>' . e($paragraph) . '</p>')
            ->implode("\n");

        $keywords = collect($candidate->keywords ?? [])->implode(', ');
        if (trim($keywords) === '') {
            $keywords = $candidate->title;
        }
        $baseSlug = generateSlug($candidate->title) ?: 'ai-news-' . $candidate->id;
        $slug = $baseSlug;
        $suffix = 2;
        while (NewsMst::where('encode_title', $slug)->exists()) {
            $slug = $baseSlug . '-' . $suffix++;
        }

        $attributes = [
            'language_id' => $candidate->language_id,
            'other_page' => (string) $category->id,
            'head_line' => $candidate->title,
            'custom_url' => $slug,
            'short_head' => $candidate->short_head,
            'details_news' => $bodyHtml,
            'seo_title' => $candidate->meta_title,
            'meta_keyword' => Str::limit($keywords, 191, ''),
            'meta_description' => Str::limit((string) $candidate->meta_description, 255, ''),
            'post_tag' => Str::limit($keywords, 191, ''),
            'reference' => Str::limit($candidate->source_url, 250, ''),
            'ref_date' => now()->toDateString(),
            'publish_type' => 'immediate',
            'status_confirmed' => 1,
            'is_auto_post' => 0,
            'latest_confirmed' => 0,
            'feature_news' => 0,
            'recommanded_news' => 0,
            'other_position' => 1,
            // Do not shift or reserve category positions while this status-0 draft is private.
            'confirm_dynamic_static' => 2,
            'schemasetup' => null,
        ];

        $reviewVersion = $candidate->updated_at?->toDateTimeString();
        $news = DB::transaction(function () use ($newsService, $attributes, $candidate, $reviewVersion) {
            $lockedCandidate = AiNewsCandidate::query()->lockForUpdate()->findOrFail($candidate->id);
            abort_unless(
                $lockedCandidate->status === AiNewsCandidate::STATUS_REVIEWED &&
                ! $lockedCandidate->news_mst_id &&
                $lockedCandidate->updated_at?->toDateTimeString() === $reviewVersion,
                409,
                'This candidate changed or was already imported. Reload it and review again.'
            );

            $news = $newsService->create($attributes);
            $news->forceFill(['status' => 0, 'is_auto_post' => 0])->save();

            $lockedCandidate->forceFill([
                'status' => AiNewsCandidate::STATUS_IMPORTED,
                'news_mst_id' => $news->id,
                'reviewed_by' => auth()->id(),
                'reviewed_at' => now(),
            ])->save();

            return $news;
        });

        return redirect()->route('ai-news.index')
            ->with('success', 'Imported as an unpublished CMS draft. Review it in the news editor before publishing.');
    }
}
