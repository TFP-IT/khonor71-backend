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
use Modules\News\Services\GemmaNewsDraftService;
use Modules\News\Services\NewsService;

class AiNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_ai_news|read_news|update_news|create_news')->only(['index', 'edit']);
        $this->middleware('permission:read_ai_rss_sources|update_ai_rss_sources|read_ai_news|read_news|update_news')->only(['sources']);
        $this->middleware('permission:create_ai_rss_sources|update_ai_rss_sources|update_ai_news|update_news')->only(['storeSource']);
        $this->middleware('permission:update_ai_rss_sources|update_ai_news|update_news')->only(['toggleSource', 'updateReview', 'reject']);
        $this->middleware('permission:delete_ai_rss_sources|update_ai_news|update_news')->only(['deleteSource']);
        $this->middleware('permission:create_ai_news|create_news|update_ai_news|update_news')->only(['runNow', 'retry', 'createCmsDraft']);
    }

    public function index(Request $request)
    {
        $selectedStatus = $request->query('status');
        $query = AiNewsCandidate::with(['source', 'language', 'category'])->latest();

        if ($selectedStatus && in_array($selectedStatus, ['pending', 'draft', 'reviewed', 'failed', 'rejected', 'imported'], true)) {
            $query->where('status', $selectedStatus);
        }

        $candidates = $query->paginate(25)->withQueryString();
        $counts = AiNewsCandidate::query()
            ->selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        return view('news::ai_news.index', compact('candidates', 'counts', 'selectedStatus'));
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

        $normalizedUrl = trim($data['feed_url']);
        if (preg_match('#/feed$#i', $normalizedUrl)) {
            $normalizedUrl .= '/';
        }
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

    protected function resolveCandidate($candidate): ?AiNewsCandidate
    {
        if ($candidate instanceof AiNewsCandidate) {
            return $candidate;
        }

        if (empty($candidate) || $candidate === 'undefined' || ! is_numeric($candidate)) {
            return null;
        }

        return AiNewsCandidate::find($candidate);
    }

    public function retry(Request $request, $candidate, GemmaNewsDraftService $draftService)
    {
        $candidateModel = $this->resolveCandidate($candidate);
        if (! $candidateModel) {
            return redirect()->route('ai-news.index')->with('warning', 'Candidate not found or invalid URL.');
        }

        abort_unless(config('ai_news.enabled'), 503, 'AI news generation is disabled.');
        abort_unless(
            in_array($candidateModel->status, [
                AiNewsCandidate::STATUS_PENDING,
                AiNewsCandidate::STATUS_FAILED,
                AiNewsCandidate::STATUS_DRAFT,
                AiNewsCandidate::STATUS_REJECTED,
            ], true) &&
            ! $candidateModel->news_mst_id,
            409,
            'This candidate cannot be regenerated in its current state.'
        );
        abort_if($candidateModel->generation_attempts >= 5, 409, 'This candidate has reached its maximum generation attempt limit (5).');

        $candidateModel->increment('generation_attempts');
        $candidateModel->refresh();

        try {
            $draftService->generate($candidateModel);

            return redirect()->route('ai-news.edit', $candidateModel)->with('success', 'AI draft generated successfully! You can now review, edit, and approve it.');
        } catch (\Throwable $exception) {
            $candidateModel->forceFill([
                'status' => AiNewsCandidate::STATUS_FAILED,
                'error_message' => Str::limit($exception->getMessage(), 2000),
            ])->save();

            return redirect()->route('ai-news.edit', $candidateModel)->with('error', 'Draft generation failed: ' . $exception->getMessage());
        }
    }

    public function edit($candidate)
    {
        $candidateModel = $this->resolveCandidate($candidate);
        if (! $candidateModel) {
            return redirect()->route('ai-news.index')->with('warning', 'Candidate not found or invalid URL. Returned to candidate list.');
        }

        return view('news::ai_news.review', ['candidate' => $candidateModel]);
    }

    public function updateReview(Request $request, $candidate)
    {
        $candidateModel = $this->resolveCandidate($candidate);
        if (! $candidateModel) {
            return redirect()->route('ai-news.index')->with('warning', 'Candidate not found or invalid URL.');
        }

        abort_unless(in_array($candidateModel->status, [
            AiNewsCandidate::STATUS_PENDING,
            AiNewsCandidate::STATUS_DRAFT,
            AiNewsCandidate::STATUS_REVIEWED,
            AiNewsCandidate::STATUS_FAILED,
        ], true), 409);

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

        $candidateModel->forceFill([
            ...$data,
            'keywords' => $keywords,
            'status' => AiNewsCandidate::STATUS_REVIEWED,
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
            'error_message' => null,
        ])->save();

        return redirect()->route('ai-news.edit', $candidateModel)->with('success', 'Review saved. This candidate is now approved and ready to import as a CMS draft.');
    }

    public function reject($candidate)
    {
        $candidateModel = $this->resolveCandidate($candidate);
        if (! $candidateModel) {
            return redirect()->route('ai-news.index')->with('warning', 'Candidate not found or invalid URL.');
        }

        abort_unless(in_array($candidateModel->status, [
            AiNewsCandidate::STATUS_PENDING,
            AiNewsCandidate::STATUS_DRAFT,
            AiNewsCandidate::STATUS_REVIEWED,
            AiNewsCandidate::STATUS_FAILED,
        ], true), 409);

        $candidateModel->forceFill([
            'status' => AiNewsCandidate::STATUS_REJECTED,
            'reviewed_by' => auth()->id(),
            'reviewed_at' => now(),
        ])->save();

        return redirect()->route('ai-news.index')->with('success', 'Candidate rejected; it will not be published.');
    }

    public function createCmsDraft($candidate, NewsService $newsService)
    {
        $candidateModel = $this->resolveCandidate($candidate);
        if (! $candidateModel) {
            return redirect()->route('ai-news.index')->with('warning', 'Candidate not found or invalid URL.');
        }

        abort_unless($candidateModel->status === AiNewsCandidate::STATUS_REVIEWED, 409, 'Review and save this candidate before importing it.');
        abort_unless(! $candidateModel->news_mst_id, 409, 'This candidate was already imported.');

        $category = Category::whereKey($candidateModel->category_id)
            ->where('language_id', $candidateModel->language_id)->first();
        abort_unless($category, 422, 'The configured category is no longer available for this language.');

        $paragraphs = preg_split('/\R{2,}/u', trim((string) $candidateModel->body)) ?: [];
        $bodyHtml = collect($paragraphs)
            ->map(static fn ($paragraph) => trim($paragraph))
            ->filter()
            ->map(static fn ($paragraph) => '<p>' . e($paragraph) . '</p>')
            ->implode("\n");

        $keywords = collect($candidateModel->keywords ?? [])->implode(', ');
        if (trim($keywords) === '') {
            $keywords = $candidateModel->title;
        }
        $baseSlug = generateSlug($candidateModel->title) ?: 'ai-news-' . $candidateModel->id;
        $slug = $baseSlug;
        $suffix = 2;
        while (NewsMst::where('encode_title', $slug)->exists()) {
            $slug = $baseSlug . '-' . $suffix++;
        }

        $attributes = [
            'language_id' => $candidateModel->language_id,
            'other_page' => (string) $category->id,
            'head_line' => $candidateModel->title,
            'custom_url' => $slug,
            'short_head' => $candidateModel->short_head,
            'details_news' => $bodyHtml,
            'seo_title' => $candidateModel->meta_title,
            'meta_keyword' => Str::limit($keywords, 191, ''),
            'meta_description' => Str::limit((string) $candidateModel->meta_description, 255, ''),
            'post_tag' => Str::limit($keywords, 191, ''),
            'reference' => Str::limit($candidateModel->source_url, 250, ''),
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

        $reviewVersion = $candidateModel->updated_at?->toDateTimeString();
        $news = DB::transaction(function () use ($newsService, $attributes, $candidateModel, $reviewVersion) {
            $lockedCandidate = AiNewsCandidate::query()->lockForUpdate()->findOrFail($candidateModel->id);
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
