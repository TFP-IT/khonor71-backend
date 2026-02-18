<?php

namespace App\Http\Controllers;

use App\Models\NewsComment;
use Carbon\Carbon;
use App\Models\User;
use App\Models\NewsMst;
use App\Models\Subscriber;
use App\Models\CommentsInfo;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Modules\Category\Entities\Category;
use Modules\Localize\Entities\Language;
use Modules\Reporter\Entities\Reporter;
use Modules\Setting\Entities\Application;
use Modules\Story\Entities\Story;
use Modules\VideoNews\Entities\VideoNews;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware('permission:read_dashboard')->only('index');
        $this->middleware(['demo'])->only(['allClear']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $range = $request->input('range', '30d');
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $languageId = $request->input('language_id');
        $categoryId = $request->input('category_id');
        $reporterId = $request->input('reporter_id');

        [$start, $end] = $this->resolveDateRange($range, $fromDate, $toDate);

        $filters = [
            'range' => $range,
            'from_date' => $fromDate,
            'to_date' => $toDate,
            'language_id' => $languageId,
            'category_id' => $categoryId,
            'reporter_id' => $reporterId,
        ];

        $postBaseQuery = NewsMst::query();
        if ($languageId) {
            $postBaseQuery->where('language_id', $languageId);
        }
        if ($categoryId) {
            $postBaseQuery->where('category_id', $categoryId);
        }
        if ($reporterId) {
            $postBaseQuery->where('reporter_id', $reporterId);
        }

        $postRangeQuery = clone $postBaseQuery;
        if ($start && $end) {
            $postRangeQuery->whereBetween('publish_date', [$start->toDateString(), $end->toDateString()]);
        }

        $totalPosts = (clone $postRangeQuery)->count();
        $publishedPosts = (clone $postRangeQuery)->where('status', 1)->count();
        $draftPosts = (clone $postRangeQuery)->where('status', 0)->count();
        $scheduledPosts = (clone $postBaseQuery)->where('status', 1)->where('publish_date', '>', Carbon::today())->count();
        $totalViews = (clone $postRangeQuery)->sum('reader_hit');
        $avgViews = $totalPosts ? round($totalViews / $totalPosts, 1) : 0;

        $commentBaseQuery = NewsComment::query()->whereNotNull('news_mst_id');
        $commentBaseQuery->whereIn('news_mst_id', (clone $postBaseQuery)->select('id'));
        if ($start && $end) {
            $commentBaseQuery->whereBetween('created_at', [$start, $end]);
        }
        $totalComments = (clone $commentBaseQuery)->count();
        $pendingComments = (clone $commentBaseQuery)->where('is_approved', 0)->count();

        $totalSubscribers = Subscriber::count();
        $newSubscribers = $start && $end
            ? Subscriber::whereBetween('created_at', [$start, $end])->count()
            : $totalSubscribers;
        $totalUsers = User::count();

        $videoBaseQuery = VideoNews::query();
        if ($languageId) {
            $videoBaseQuery->where('language_id', $languageId);
        }
        if ($reporterId) {
            $videoBaseQuery->where('reporter_id', $reporterId);
        }
        if ($start && $end) {
            $videoBaseQuery->whereBetween('publish_date', [$start->toDateString(), $end->toDateString()]);
        }
        $totalVideos = (clone $videoBaseQuery)->count();
        $totalVideoViews = (clone $videoBaseQuery)->sum('total_view');

        $storyBaseQuery = Story::query();
        if ($languageId) {
            $storyBaseQuery->where('language_id', $languageId);
        }
        if ($start && $end) {
            $storyBaseQuery->whereBetween('created_at', [$start, $end]);
        }
        $totalStories = (clone $storyBaseQuery)->count();
        $totalStoryViews = (clone $storyBaseQuery)->sum('views');

        $trendStart = $start ?: Carbon::now()->subDays(29)->startOfDay();
        $trendEnd = $end ?: Carbon::now()->endOfDay();
        [$trendLabels, $trendPosts, $trendViews, $trendComments] = $this->buildTrendData(
            clone $postBaseQuery,
            clone $commentBaseQuery,
            $trendStart,
            $trendEnd
        );

        $topPosts = (clone $postRangeQuery)
            ->with(['category', 'language', 'reporterBy'])
            ->orderByDesc('reader_hit')
            ->limit(10)
            ->get();

        $latestPosts = (clone $postRangeQuery)
            ->with(['category', 'language', 'reporterBy'])
            ->where('status', 1)
            ->orderByDesc('publish_date')
            ->paginate(10, ['*'], 'latest_posts_page');

        $popularPosts = (clone $postRangeQuery)
            ->with(['category', 'language', 'reporterBy'])
            ->where('status', 1)
            ->orderByDesc('reader_hit')
            ->paginate(10, ['*'], 'popular_posts_page');

        $latestDrafts = (clone $postBaseQuery)
            ->where('status', 0)
            ->with('reporterBy')
            ->orderByDesc('created_at')
            ->paginate(10, ['*'], 'latest_drafts_page');

        $recentComments = (clone $commentBaseQuery)
            ->with(['user', 'newsMst'])
            ->orderByDesc('created_at')
            ->limit(10)
            ->get();

        $topCategories = Category::select(
            'categories.id',
            'categories.category_name',
            DB::raw('COUNT(news_msts.id) as total_posts'),
            DB::raw('SUM(news_msts.reader_hit) as total_views')
        )
            ->join('news_msts', 'news_msts.category_id', '=', 'categories.id')
            ->when($languageId, function ($query) use ($languageId) {
                $query->where('news_msts.language_id', $languageId);
            })
            ->when($reporterId, function ($query) use ($reporterId) {
                $query->where('news_msts.reporter_id', $reporterId);
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('news_msts.category_id', $categoryId);
            })
            ->when($start && $end, function ($query) use ($start, $end) {
                $query->whereBetween('news_msts.publish_date', [$start->toDateString(), $end->toDateString()]);
            })
            ->groupBy('categories.id', 'categories.category_name')
            ->orderByDesc('total_views')
            ->limit(8)
            ->get();

        $topReporters = Reporter::select(
            'reporters.id',
            'reporters.name',
            DB::raw('COUNT(news_msts.id) as total_posts'),
            DB::raw('SUM(news_msts.reader_hit) as total_views')
        )
            ->join('news_msts', 'news_msts.reporter_id', '=', 'reporters.id')
            ->when($languageId, function ($query) use ($languageId) {
                $query->where('news_msts.language_id', $languageId);
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('news_msts.category_id', $categoryId);
            })
            ->when($reporterId, function ($query) use ($reporterId) {
                $query->where('news_msts.reporter_id', $reporterId);
            })
            ->when($start && $end, function ($query) use ($start, $end) {
                $query->whereBetween('news_msts.publish_date', [$start->toDateString(), $end->toDateString()]);
            })
            ->groupBy('reporters.id', 'reporters.name')
            ->orderByDesc('total_views')
            ->limit(8)
            ->get();

        $categoryChartLabels = $topCategories->pluck('category_name')->toArray();
        $categoryChartViews = $topCategories->pluck('total_views')->map(fn ($val) => (int) $val)->toArray();

        $countryViews = DB::table('news_msts')
            ->leftJoin('reporters', 'reporters.id', '=', 'news_msts.reporter_id')
            ->selectRaw("TRIM(reporters.country) as area")
            ->selectRaw('SUM(news_msts.reader_hit) as total_views')
            ->whereNotNull('reporters.country')
            ->whereRaw("TRIM(reporters.country) != ''")
            ->whereRaw("LOWER(TRIM(reporters.country)) != 'unknown'")
            ->when($languageId, function ($query) use ($languageId) {
                $query->where('news_msts.language_id', $languageId);
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('news_msts.category_id', $categoryId);
            })
            ->when($reporterId, function ($query) use ($reporterId) {
                $query->where('news_msts.reporter_id', $reporterId);
            })
            ->when($start && $end, function ($query) use ($start, $end) {
                $query->whereBetween('news_msts.publish_date', [$start->toDateString(), $end->toDateString()]);
            })
            ->groupBy('area')
            ->orderByDesc('total_views')
            ->limit(8)
            ->get();

        $countryViewLabels = $countryViews->pluck('area')->toArray();
        $countryViewValues = $countryViews->pluck('total_views')->map(fn ($val) => (int) $val)->toArray();

        $divisionViews = DB::table('news_msts')
            ->leftJoin('reporters', 'reporters.id', '=', 'news_msts.reporter_id')
            ->selectRaw("COALESCE(NULLIF(reporters.state, ''), 'Unknown') as area")
            ->selectRaw('SUM(news_msts.reader_hit) as total_views')
            ->whereRaw('LOWER(reporters.country) = ?', ['bangladesh'])
            ->when($languageId, function ($query) use ($languageId) {
                $query->where('news_msts.language_id', $languageId);
            })
            ->when($categoryId, function ($query) use ($categoryId) {
                $query->where('news_msts.category_id', $categoryId);
            })
            ->when($reporterId, function ($query) use ($reporterId) {
                $query->where('news_msts.reporter_id', $reporterId);
            })
            ->when($start && $end, function ($query) use ($start, $end) {
                $query->whereBetween('news_msts.publish_date', [$start->toDateString(), $end->toDateString()]);
            })
            ->groupBy('area')
            ->orderByDesc('total_views')
            ->limit(8)
            ->get();

        $divisionViewLabels = $divisionViews->pluck('area')->toArray();
        $divisionViewValues = $divisionViews->pluck('total_views')->map(fn ($val) => (int) $val)->toArray();

        $languages = Language::all();
        $categories = Category::onlyParents()->get();
        $reporters = Reporter::where('status', 1)->orderBy('name')->get();
        $appSettings = Application::first();

        return view('backend.layouts.home', compact(
            'filters',
            'languages',
            'categories',
            'reporters',
            'totalPosts',
            'publishedPosts',
            'draftPosts',
            'scheduledPosts',
            'totalViews',
            'avgViews',
            'totalComments',
            'pendingComments',
            'totalSubscribers',
            'newSubscribers',
            'totalUsers',
            'totalVideos',
            'totalVideoViews',
            'totalStories',
            'totalStoryViews',
            'trendLabels',
            'trendPosts',
            'trendViews',
            'trendComments',
            'categoryChartLabels',
            'categoryChartViews',
            'countryViews',
            'countryViewLabels',
            'countryViewValues',
            'divisionViewLabels',
            'divisionViewValues',
            'topPosts',
            'latestPosts',
            'popularPosts',
            'latestDrafts',
            'recentComments',
            'topReporters',
            'appSettings'
        ));
    }

    public function staffHome()
    {
        return redirect()->route('myProfile');
    }

    public function empProfile()
    {
        return view('auth.profile-info');
    }

    public function allClear()
    {
        Artisan::call('route:clear');
        Artisan::call('optimize:clear');
        Artisan::call('storage:unlink');
        Artisan::call('module:asset-link');
        Artisan::call('storage:link');

        return redirect()->intended();
    }

    // myProfile
    public function myProfile()
    {
        $months           = '';
        $readHit          = '';
        $yearlyPost       = '';
        $monthly_comments = '';
        $year             = date('Y');
        $numbery          = date('y');
        $prevyear         = $numbery - 1;
        $prevyearformat   = $year - 1;
        $syear            = '';
        $syearformat      = '';

        $month_names    = [];
        $read_hits_data = [];

        for ($k = 1; $k < 13; $k++) {

            $month = date('m', strtotime("+$k month"));
            $gety  = date('y', strtotime("+$k month"));

            if ($gety == $numbery) {
                $syear       = $prevyear;
                $syearformat = $prevyearformat;
            } else {
                $syear       = $numbery;
                $syearformat = $year;
            }

            $monthlyReadHit = $this->readHit($syearformat, $month);
            $comments       = $this->comments($syearformat, $month);

            $monthly_comments .= ($comments->total_comment ? $comments->total_comment : 0) . ', ';

            if ($readHit == '') {
                $readHit .= $monthlyReadHit->read_hit ? $monthlyReadHit->read_hit : 0;
                $read_hits_data[] = $monthlyReadHit->read_hit ? (int) $monthlyReadHit->read_hit : 0;
            } else {
                $readHit .= ', ' . ($monthlyReadHit->read_hit ? $monthlyReadHit->read_hit : 0);
                $read_hits_data[] = $monthlyReadHit->read_hit ? (int) $monthlyReadHit->read_hit : 0;
            }

            $yearlyPost .= ($monthlyReadHit->total_post ? $monthlyReadHit->total_post : 0) . ', ';

            if ($months == '') {
                $months .= "'" . date("F-" . $syear, strtotime("+$k month")) . "'";
                $month_names[] = date("F-" . $syear, strtotime("+$k month"));
            } else {
                $months .= " , '" . date("F-" . $syear, strtotime("+$k month")) . "'";
                $month_names[] = date("F-" . $syear, strtotime("+$k month"));
            }

        }

        $data["monthly_comments"]  = $monthly_comments  = trim($monthly_comments, ',');
        $data["yearlyPost"]        = $yearlyPost        = trim($yearlyPost, ',');
        $data["readHit"]           = $readHit           = trim($readHit, ',');
        $data["months"]            = $months            = trim($months, ',');
        $data['total_comment']     = $total_comment     = $this->last_year_comments();
        $data['yearly_total_post'] = $yearly_total_post = $this->last_year_readhit_totapost();

        $date               = date('y-m-d');
        $data['total_post'] = $total_post = NewsMst::count();

        $data['today_post'] = $today_post = NewsMst::where('publish_date', $date)->count();

        $data['total_subscribers'] = $total_subscribers = Subscription::count();
        $data['today_subscribers'] = $today_subscribers = Subscription::whereRaw('DATE(subscription_date) = ?', [date('Y-m-d')])->count();

        $data['total_comments'] = $total_comments = CommentsInfo::count();
        $data['today_comments'] = $today_comments = CommentsInfo::whereRaw('DATE(com_date_time) = ?', [date('Y-m-d')])->count();

        $data['total_hit'] = $total_hit = NewsMst::select(DB::raw('SUM(reader_hit) as total'))->first();

        $data['user'] = $user = $this->user_reporter();

        $data['latest_post']  = $latest_posts  = $this->latest_post();
        $data['populer_post'] = $populer_posts = $this->populer_post();

        $data['lastWeekPost']     = $lastWeekPost     = $this->lastWeekPost();
        $data['lastWeekComments'] = $lastWeekComments = $this->lastWeekComments();

        $data['month_names']    = $month_names    = json_encode($month_names);
        $data['read_hits_data'] = $read_hits_data = json_encode($read_hits_data);

        return view('backend.layouts.emp-dashboard', compact(
            'monthly_comments',
            'yearlyPost',
            'readHit',
            'months',
            'total_comment',
            'yearly_total_post',
            'total_post',
            'today_post',
            'total_subscribers',
            'today_subscribers',
            'total_comments',
            'today_comments',
            'total_hit',
            'user',
            'latest_posts',
            'populer_posts',
            'lastWeekPost',
            'lastWeekComments',
            'month_names',
            'read_hits_data'
        ));
    }

    // editMyProfile
    public function editMyProfile()
    {
        return view('auth.edit-profile');
    }

    public function lastWeekComments()
    {
        $oneWeekAgo = Carbon::now()->subWeek()->toDateTimeString();
        $now        = Carbon::now()->toDateTimeString();

        $numRows = NewsComment::whereRaw('DATE(created_at) BETWEEN ? AND ?', [$oneWeekAgo, $now])->count();

        return $numRows;
    }

    public function lastWeekPost()
    {
        $oneWeekAgo = Carbon::now()->subWeek()->toDateTimeString();
        $now        = Carbon::now()->toDateTimeString();

        $result = NewsMst::select(
            DB::raw('SUM(reader_hit) as read_hit'),
            DB::raw('COUNT(news_id) as total_post')
        )
            ->whereBetween('publish_date', [$oneWeekAgo, $now])
            ->first();

        if ($result) {
            return $result;
        }

        return (object) ['total_post' => 0, 'read_hit' => 0];

    }

    public function populer_post()
    {
        $today_date = date('Y-m-d');

        $result = NewsMst::select(
            'news_msts.reader_hit',
            'news_msts.news_id',
            'news_msts.encode_title',
            'news_msts.stitle',
            'news_msts.title',
            'news_msts.page',
            'news_msts.image',
            'news_msts.videos',
            'news_msts.reader_hit',
            'news_msts.time_stamp',
            'news_msts.image_alt',
            'news_msts.reader_hit',
            'news_msts.post_date',
            'news_msts.news',
            'users.id as user_id',
            'users.full_name as name',
            'news_msts.image_base_url',
            'users.profile_image as photo',
            'categories.category_name',
            'photo_libraries.thumb_image'
        )
            ->join('users', 'users.id', '=', 'news_msts.post_by')
            ->join('categories', 'categories.slug', '=', 'news_msts.page')
            ->leftJoin('photo_libraries', 'photo_libraries.actual_image_name', '=', 'news_msts.image')
            ->where('news_msts.publish_date', $today_date)
            ->orderBy('news_msts.reader_hit', 'desc')
            ->limit(30)
            ->get();

        if ($result->isNotEmpty()) {

            return $result;

        } else {

            $result = NewsMst::select(
                'news_msts.reader_hit',
                'news_msts.news_id',
                'news_msts.encode_title',
                'news_msts.stitle',
                'news_msts.title',
                'news_msts.page',
                'news_msts.image',
                'news_msts.videos',
                'news_msts.reader_hit',
                'news_msts.time_stamp',
                'news_msts.image_alt',
                'news_msts.reader_hit',
                'news_msts.post_date',
                'news_msts.news',
                'users.id as user_id',
                'users.full_name as name',
                'news_msts.image_base_url',
                'users.profile_image as photo',
                'categories.category_name',
                'photo_libraries.thumb_image'
            )
                ->join('users', 'users.id', '=', 'news_msts.post_by')
                ->join('categories', 'categories.slug', '=', 'news_msts.page')
                ->leftJoin('photo_libraries', 'photo_libraries.actual_image_name', '=', 'news_msts.image')
                ->orderBy('news_msts.reader_hit', 'desc')
                ->limit(30)
                ->get();

            return $result;
        }

    }

    public function latest_post()
    {
        $result = NewsMst::select(
            'news_msts.image_base_url',
            'news_msts.news_id',
            'news_msts.encode_title',
            'news_msts.title',
            'news_msts.image',
            'news_msts.reader_hit',
            'news_msts.videos',
            'news_msts.page',
            'news_msts.time_stamp',
            'news_msts.post_date',
            'news_msts.news',
            'news_msts.post_by',
            'news_msts.image_alt',
            'users.id',
            'users.profile_image as photo',
            'users.full_name as name',
            'users.id as user_id',
            'categories.category_name',
            'photo_libraries.thumb_image'
        )
            ->join('users', 'users.id', '=', 'news_msts.post_by')
            ->join('categories', 'categories.slug', '=', 'news_msts.page')
            ->leftJoin('photo_libraries', 'photo_libraries.actual_image_name', '=', 'news_msts.image')
            ->where('news_msts.is_latest', 1)
            ->where('news_msts.status', 1)
            ->orderBy('news_msts.publish_date', 'desc')
            ->limit(30)
            ->get();

        return $result;
    }

    public function user_reporter()
    {
        $totalCounts = User::select(
            DB::raw("COUNT(IF(user_type_id = 1, user_type_id, NULL)) AS total_users"),
            DB::raw("COUNT(IF(user_type_id = 2, user_type_id, NULL)) AS total_reporter")
        )->first();

        return $totalCounts;
    }

    public function last_year_readhit_totapost()
    {
        $result = NewsMst::select(DB::raw('SUM(reader_hit) as read_hit, COUNT(news_id) as total_post'))
            ->whereRaw('`publish_date` BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW()')
            ->first();

        if ($result) {
            return $result;
        }

        return (object) ['read_hit' => 0, 'total_post' => 0];
    }

    public function last_year_comments()
    {
        $result = NewsComment::select(DB::raw('COUNT(id) as comments'))
            ->where('created_at', '>=', DB::raw('NOW() - INTERVAL 1 YEAR'))
            ->first();

        return $result;
    }

    public function readHit($year, $month)
    {

        $result = NewsMst::select(DB::raw('SUM(reader_hit) as read_hit'), DB::raw('COUNT(news_id) as total_post'))
            ->whereYear('publish_date', $year)
            ->whereMonth('publish_date', $month)
            ->groupBy(DB::raw('YEAR(publish_date), MONTH(publish_date)'))
            ->first();

        if ($result) {
            return (object) ['read_hit' => $result->read_hit, 'total_post' => $result->total_post];
            return $result;
        }

        return (object) ['read_hit' => 0, 'total_post' => 0];
    }

    public function comments($year, $month)
    {

        $result = NewsComment::select(DB::raw('COUNT(id) as total_comment'))
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
            ->first();

        if ($result) {
            return $result;
        }

        return (object) ['total_comment' => 0];
    }

    private function resolveDateRange(?string $range, ?string $fromDate, ?string $toDate): array
    {
        if ($fromDate && $toDate) {
            try {
                $start = Carbon::parse($fromDate)->startOfDay();
                $end = Carbon::parse($toDate)->endOfDay();
                return [$start, $end];
            } catch (\Throwable $e) {
                // fall back to range presets
            }
        }

        $range = $range ?: '30d';
        $now = Carbon::now();

        switch ($range) {
            case 'today':
                return [$now->copy()->startOfDay(), $now->copy()->endOfDay()];
            case '7d':
                return [$now->copy()->subDays(6)->startOfDay(), $now->copy()->endOfDay()];
            case '30d':
                return [$now->copy()->subDays(29)->startOfDay(), $now->copy()->endOfDay()];
            case '90d':
                return [$now->copy()->subDays(89)->startOfDay(), $now->copy()->endOfDay()];
            case 'ytd':
                return [$now->copy()->startOfYear(), $now->copy()->endOfDay()];
            case 'all':
                return [null, null];
            default:
                return [$now->copy()->subDays(29)->startOfDay(), $now->copy()->endOfDay()];
        }
    }

    private function buildTrendData($postQuery, $commentQuery, Carbon $start, Carbon $end): array
    {
        $days = $start->diffInDays($end) + 1;
        $labels = [];
        $postsSeries = [];
        $viewsSeries = [];
        $commentsSeries = [];

        if ($days <= 60) {
            $postRows = $postQuery
                ->whereBetween('publish_date', [$start->toDateString(), $end->toDateString()])
                ->selectRaw('DATE(publish_date) as d, COUNT(*) as total_posts, SUM(reader_hit) as total_views')
                ->groupBy('d')
                ->get()
                ->keyBy('d');

            $commentRows = $commentQuery
                ->whereBetween('created_at', [$start, $end])
                ->selectRaw('DATE(created_at) as d, COUNT(*) as total_comments')
                ->groupBy('d')
                ->get()
                ->keyBy('d');

            $period = \Carbon\CarbonPeriod::create($start, $end);
            foreach ($period as $date) {
                $key = $date->format('Y-m-d');
                $labels[] = $date->format('M d');
                $postsSeries[] = (int) ($postRows[$key]->total_posts ?? 0);
                $viewsSeries[] = (int) ($postRows[$key]->total_views ?? 0);
                $commentsSeries[] = (int) ($commentRows[$key]->total_comments ?? 0);
            }
        } else {
            $postRows = $postQuery
                ->whereBetween('publish_date', [$start->toDateString(), $end->toDateString()])
                ->selectRaw('DATE_FORMAT(publish_date, "%Y-%m") as m, COUNT(*) as total_posts, SUM(reader_hit) as total_views')
                ->groupBy('m')
                ->get()
                ->keyBy('m');

            $commentRows = $commentQuery
                ->whereBetween('created_at', [$start, $end])
                ->selectRaw('DATE_FORMAT(created_at, "%Y-%m") as m, COUNT(*) as total_comments')
                ->groupBy('m')
                ->get()
                ->keyBy('m');

            $cursor = $start->copy()->startOfMonth();
            $last = $end->copy()->startOfMonth();
            while ($cursor <= $last) {
                $key = $cursor->format('Y-m');
                $labels[] = $cursor->format('M Y');
                $postsSeries[] = (int) ($postRows[$key]->total_posts ?? 0);
                $viewsSeries[] = (int) ($postRows[$key]->total_views ?? 0);
                $commentsSeries[] = (int) ($commentRows[$key]->total_comments ?? 0);
                $cursor->addMonth();
            }
        }

        return [$labels, $postsSeries, $viewsSeries, $commentsSeries];
    }

}
