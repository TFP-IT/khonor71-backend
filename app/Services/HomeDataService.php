<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\NewsMst;
use App\Models\NewsComment;
use App\Helpers\ThemeHelper;
use App\Models\BreakingNews;
use App\Models\NewsPositionMap;
use Modules\Poll\Entities\Poll;
use App\Models\HomePagePosition;
use Modules\Story\Entities\Story;
use Illuminate\Support\Facades\DB;
use App\Enums\ActivationStatusEnum;
use Illuminate\Support\Facades\Cache;
use Modules\Opinion\Entities\Opinion;
use Modules\Setting\Entities\Setting;
use Modules\RssFeeds\Entities\RssFeed;
use Modules\Category\Entities\Category;
use Modules\Archive\Entities\NewsArchive;
use Modules\ProbashiJanala\Entities\ProbashiNews;
use Modules\VideoNews\Entities\VideoNews;
use willvincent\Feeds\Facades\FeedsFacade;

class HomeDataService
{
    public function getHomePageData()
    {
        $languageId = get_language_id();
        $theme = activeTheme();
        $cacheKey = "home_page_data_{$languageId}_{$theme}";

        return Cache::remember($cacheKey, now()->addMinutes(5), function () use ($languageId, $theme) {
            // Default data for all themes
            $data = [
                'breakingNews' => $this->getBreakingNews(),
                'homePageTopNews' => $this->getHomePageTopNews(),
                'probashiJanalaPageTopNews' => $this->getProbashiJanalaPageTopNews(),
                'probashiNews' => $this->getProbashiNewsView(),
                'sectionTwoNews' => $this->getSectionTwoNews(),
                'popularNews' => $this->getPopularNews(),
                'latestNews' => $this->getLatestNews(),
                'latestProbashiNews' => $this->getLatestProbashiNews(),
                'followUsLinks' => $this->getFollowUsLinks(),
                'recommendedPosts' => $this->getRecommendedPosts(),
                'sectionThreeAllNews' => $this->getSectionThreeAllNews(),
                'sectionThreeAllSubNews' => $this->getSectionThreeAllSubNews(),
                'sectionFourNews' => $this->getSectionFourNews(),
                'topWeekNews' => $this->getTopWeekNews(),
                'trendingNews' => $this->getTrendingNews(),
                'opinions' => $this->getOpinions(),
                'featuresNews' => $this->getFeaturesNews(),
                'videoNews' => $this->getVideoNews(),
                'sectionFiveNews' => $this->getSectionFiveNews(),
                'sectionSixNews' => $this->getSectionSixNews(),
                'commonSectionNews' => $this->getCommonSectionNews(),
                'districtNews' => $this->getDistrictNews(),
                'divisions' => $this->getDivisionsWithDistricts(),
                'homeStories' => $this->getHomeStory(),
                'themeSettings' => ThemeHelper::themeSettings(),
            ];

            // Manage Rss Feeds News
            $rssFeeds = RssFeed::where('status', 1)->where('paper_language', $languageId)->get();
            if ($rssFeeds->isNotEmpty()) {
                $data += [
                    'rssFeedNews' => $this->getRssFeedNews(),
                ];
            }

            return $data;
        });
    }

    private function getHomeStory()
    {
        $languageId = get_language_id();
        $stories = Story::with('latestDetail')
                    ->withCount('storyDetails')
                    ->where('language_id', $languageId)
                    ->latest()
                    ->take(15)
                    ->get();

        return $stories;
    }

    public function getStoryDetails($slug)
    {
        $story = Story::with('details')
                ->withCount('storyDetails')
                ->where('slug', $slug)
                ->firstOrFail();
        Story::where('id', $story->id)->increment('views');
        $story->details->first()->increment('views');

        return $story;
    }

    public function getNewsDetails($slug)
    {
        $newsDetail = $this->retriveNewsDetail($slug);

        // dd($newsDetail);


        $popularNews = $this->getPopularNews();
        $topWeekNews = $this->getTopWeekNews();
        $votingPoll = $this->getVotingPoll();
        $languageId = get_language_id();

        $currentNewsId = $newsDetail->id;
        $previousNews = NewsMst::where('id', '<', $currentNewsId)
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->orderBy('id', 'desc')
            ->take(2)
            ->get()
            ->reverse();

        $nextNews = NewsMst::where('id', '>', $currentNewsId)
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->orderBy('id', 'asc')
            ->take(2)
            ->get();

        $sectionSixNews = $this->getDetailsRelatedNews($newsDetail->category->id);

        // Increment reader_hit
        $newsDetail->increment('reader_hit');

        $approvedCommentsCount = NewsComment::where('news_mst_id', $currentNewsId)->where('is_approved', 1)->count();
        $comments = NewsComment::with([
                'user',
                'replies.user'
            ])
            ->where('news_mst_id', $currentNewsId)
            ->where('is_approved', 1)
            ->orderBy('id', 'desc')
            ->get();

        return compact(
            'popularNews',
            'topWeekNews',
            'votingPoll',
            'newsDetail',
            'previousNews',
            'nextNews',
            'sectionSixNews',
            'approvedCommentsCount',
            'comments',
            'currentNewsId'
        );
    }
    public function getArchiveNewsDetails($slug)
    {
        $newsDetail = $this->retriveArchiveNewsDetail($slug);
        $popularNews = $this->getPopularNews();
        $topWeekNews = $this->getTopWeekNews();
        $votingPoll = $this->getVotingPoll();
        $languageId = get_language_id();

        $currentNewsId = $newsDetail->id;
        $previousNews = NewsArchive::where('id', '<', $currentNewsId)
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->orderBy('id', 'desc')
            ->take(2)
            ->get()
            ->reverse();

        $nextNews = NewsArchive::where('id', '>', $currentNewsId)
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->orderBy('id', 'asc')
            ->take(2)
            ->get();

        if ($this->getDetailsRelatedNews($newsDetail->category_id)->isNotEmpty()) {
            $sectionSixNews = $this->getDetailsRelatedNews($newsDetail->category_id);
        } else {
            $sectionSixNews = $this->getArchiveDetailsRelatedNews($newsDetail->category_id);
        }

        // Increment reader_hit
        $newsDetail->increment('reader_hit');

        $approvedCommentsCount = NewsComment::where('news_mst_id', $currentNewsId)->where('is_approved', 1)->count();
        $comments = NewsComment::with([
                'user',
                'replies.user'
            ])
            ->where('news_mst_id', $currentNewsId)
            ->where('is_approved', 1)
            ->orderBy('id', 'desc')
            ->get();

        return compact(
            'popularNews',
            'topWeekNews',
            'votingPoll',
            'newsDetail',
            'previousNews',
            'nextNews',
            'sectionSixNews',
            'approvedCommentsCount',
            'comments',
            'currentNewsId'
        );
    }

    private function retriveNewsDetail($slug)
    {
        $news = NewsMst::with(['category', 'subCategory', 'reporterBy', 'seoOnpage'])
                ->withCount('comments')
                ->with(['postByUser:id,full_name', 'comments'])
                ->where('encode_title', $slug)
                ->firstOrFail();

        return $news;
    }

    private function retriveArchiveNewsDetail($slug)
    {
        $news = NewsArchive::with(['category', 'subCategory', 'reporterBy', 'seoOnpage'])
                ->withCount('comments')
                ->with(['postByUser:id,full_name', 'comments'])
                ->where('encode_title', $slug)
                ->firstOrFail();

        return $news;
    }

    private function getDetailsRelatedNews($categoryId)
    {
        $languageId = get_language_id();

        $archiveNews = NewsMst::with(['category', 'postByUser:id,full_name', 'comments'])
            ->withCount('comments')
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('status', 1)
            ->where('category_id', $categoryId)
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();

        // Build collection with both formats
        $sectionThreeAllNews = $archiveNews->map(function ($item) {
            return (object)[
                'news'     => $item,
                'category' => $item->category,
            ];
        });

        return $sectionThreeAllNews;
    }
    private function getArchiveDetailsRelatedNews($categoryId)
    {
        $languageId = get_language_id();

        $archiveNews = NewsArchive::with(['category', 'postByUser:id,full_name', 'comments'])
            ->withCount('comments')
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('status', 1)
            ->where('category_id', $categoryId)
            ->orderBy('created_at', 'desc')
            ->take(12)
            ->get();

        // Build collection with both formats
        $sectionThreeAllNews = $archiveNews->map(function ($item) {
            return (object)[
                'news'     => $item,
                'category' => $item->category,
            ];
        });

        return $sectionThreeAllNews;
    }

    public function getVideoNewsDetails(string $slug)
    {
        $languageId = get_language_id();

        $videoNews = VideoNews::where('encode_title', $slug)->first();

        if (!$videoNews) {
            return null;
        }

        // Increment total_view
        $videoNews->increment('total_view');

        $previousNews = VideoNews::select(['title', 'encode_title', 'thumbnail_image'])
            ->where('id', '<', $videoNews->id)
            ->where('language_id', $languageId)
            ->where('status', ActivationStatusEnum::ACTIVE)
            ->where('publish_date', '<=', Carbon::now())
            ->orderBy('id', 'desc')
            ->take(2)
            ->get();

        $nextNews = VideoNews::select(['title', 'encode_title', 'thumbnail_image'])
            ->where('id', '>', $videoNews->id)
            ->where('language_id', $languageId)
            ->where('status', ActivationStatusEnum::ACTIVE)
            ->where('publish_date', '<=', Carbon::now())
            ->orderBy('id', 'asc')
            ->take(2)
            ->get();

        // Get recent 12 posts excluding current one
        $recentPosts = VideoNews::where('id', '!=', $videoNews->id)
            ->where('language_id', $languageId)
            ->where('status', ActivationStatusEnum::ACTIVE)
            ->where('publish_date', '<=', Carbon::now())
            ->orderBy('id', 'desc')
            ->take(12)
            ->get();

        $popularNews = $this->getPopularNews();
        $topWeekNews = $this->getTopWeekNews();
        $votingPoll = $this->getVotingPoll();

        $currentNewsId = $videoNews->id;
        $approvedCommentsCount = NewsComment::where('video_news_id', $currentNewsId)->where('is_approved', 1)->count();
        $comments = NewsComment::with([
                'user',
                'replies.user'
            ])
            ->where('video_news_id', $currentNewsId)
            ->where('is_approved', 1)
            ->orderBy('id', 'desc')
            ->get();

        return compact(
            'videoNews',
            'previousNews',
            'nextNews',
            'recentPosts',
            'popularNews',
            'topWeekNews',
            'votingPoll',
            'approvedCommentsCount',
            'comments',
            'currentNewsId'
        );
    }

    public function getProbashiNewsDetails(string $slug)
    {
        $languageId = get_language_id();

        $videoNews = ProbashiNews::where('encode_title', $slug)->first();

        if (!$videoNews) {
            return null;
        }

        // Increment total_view
        $videoNews->increment('total_view');

        $previousNews = ProbashiNews::select(['title', 'encode_title', 'thumbnail_image'])
            ->where('id', '<', $videoNews->id)
            ->where('language_id', $languageId)
            ->where('status', ActivationStatusEnum::ACTIVE)
            ->where('publish_date', '<=', Carbon::now())
            ->orderBy('id', 'desc')
            ->take(2)
            ->get();

        $nextNews = ProbashiNews::select(['title', 'encode_title', 'thumbnail_image'])
            ->where('id', '>', $videoNews->id)
            ->where('language_id', $languageId)
            ->where('status', ActivationStatusEnum::ACTIVE)
            ->where('publish_date', '<=', Carbon::now())
            ->orderBy('id', 'asc')
            ->take(2)
            ->get();

        // Get recent 12 posts excluding current one
        $recentPosts = ProbashiNews::where('id', '!=', $videoNews->id)
            ->where('language_id', $languageId)
            ->where('status', ActivationStatusEnum::ACTIVE)
            ->where('publish_date', '<=', Carbon::now())
            ->orderBy('id', 'desc')
            ->take(12)
            ->get();

        $popularNews = $this->getPopularNews();
        $topWeekNews = $this->getTopWeekNews();
        $votingPoll = $this->getVotingPoll();

        $currentNewsId = $videoNews->id;
        $approvedCommentsCount = NewsComment::where('video_news_id', $currentNewsId)->where('is_approved', 1)->count();
        $comments = NewsComment::with([
                'user',
                'replies.user'
            ])
            ->where('video_news_id', $currentNewsId)
            ->where('is_approved', 1)
            ->orderBy('id', 'desc')
            ->get();

        return compact(
            'videoNews',
            'previousNews',
            'nextNews',
            'recentPosts',
            'popularNews',
            'topWeekNews',
            'votingPoll',
            'approvedCommentsCount',
            'comments',
            'currentNewsId'
        );
    }

    /**
     * Get category_id(s) by position from home_page_positions table.
     * Always fetch up to 9 positions for the given language_id, ignoring status.
     * For each requested position, return the category_id if status is 1, otherwise null.
     */
    private function getCategoryPositionIds(...$positions)
    {
        $languageId = get_language_id();

        // Fetch up to 9 HomePagePosition records for this language ordered by position_no
        $positionsData = HomePagePosition::where('language_id', $languageId)
            ->orderBy('position_no', 'ASC')
            ->limit(9)
            ->get(['position_no', 'category_id', 'status'])
            ->keyBy('position_no');

        $result = [];

        foreach ($positions as $position) {
            if (isset($positionsData[$position])) {
                $entry = $positionsData[$position];
                $result[] = $entry->status == 1 ? $entry->category_id : null;
            } else {
                $result[] = null;
            }
        }

        return $result;
    }

    /**
     * Summary of getBreakingNews
     * @return BreakingNews[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getBreakingNews()
    {
        $appSetting = app_setting();
        if (isset($appSetting->newstriker_status) && (int) $appSetting->newstriker_status !== 1) {
            return collect();
        }

        $languageId = get_language_id();
        $theme = activeTheme();
        $cacheKey = "breaking_news_{$languageId}_{$theme}";

        return Cache::remember($cacheKey, now()->addMinutes(5), function () use ($languageId, $theme) {
            $limit = app_setting()->breaking_news_limit ?: 10;

            if ($theme == 'magazine') {
                $limit = 6;
            }

            $now = now();

            // Fetch active, scheduled news ordered by priority and recency
            $breakingNews = BreakingNews::where('language_id', $languageId)
                ->where('status', 1)
                ->where(function ($q) use ($now) {
                    $q->whereNull('start_time')->orWhere('start_time', '<=', $now);
                })
                ->where(function ($q) use ($now) {
                    $q->whereNull('end_time')->orWhere('end_time', '>=', $now);
                })
                ->orderBy('priority', 'desc')
                ->latest('created_at')
                ->take($limit)
                ->get()
                ->map(function ($news) {
                    $url = $news->resolved_url;
                    $formattedUrl = $url;
                    if ($url && !str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
                        $formattedUrl = __url(ltrim($url, '/'));
                    }

                    return [
                        'id'       => $news->id,
                        'title'    => $news->headline ?: 'Untitled',
                        'url'      => $formattedUrl,
                        'priority' => $news->priority,
                        'date'     => $news->time_stamp ? Carbon::parse($news->time_stamp)->toDateString() : ($news->created_at ? $news->created_at->toDateString() : '')
                    ];
                });

            return $breakingNews;
        });
    }

    /**
     * Summary of getHomePageTopNews
     * @return \Illuminate\Support\Collection<TKey, TValue>
     */
    private function getHomePageTopNews()
    {
        $languageId = get_language_id();
        $cacheKey = "home_page_top_news_{$languageId}";

        return Cache::remember($cacheKey, now()->addMinutes(5), function () use ($languageId) {
            // Fetch all news positions within positions 1 to 7 and filter only active news
            $newsPositions = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                    $query->select('id', 'news_id', 'encode_title', 'title', 'news', 'image', 'image_base_url', 'image_alt', 'image_title', 'post_by', 'publish_date', 'status')
                        ->withCount('comments')
                        ->where('language_id', $languageId)
                        ->where('publish_date', '<=', Carbon::now())
                        ->where('status', 1)
                        ->with(['postByUser:id,full_name', 'comments']);
                }])
                ->whereNotNull('home_position')
                ->whereBetween('home_position', [1, 7])
                ->where('status', 1)
                ->orderBy('created_at', 'desc')
                ->get();

            // Filter out any items with missing news (status 0 or not found)
            $newsPositions = $newsPositions->filter(function ($item) {
                return $item->news !== null;
            });

            $finalNews = collect();
            $usedNewsIds = [];

            // Loop through positions 1 to 7
            for ($pos = 1; $pos <= 7; $pos++) {
                // Find the latest news for the current position
                $currentPositionNews = $newsPositions->filter(function ($item) use ($pos, $usedNewsIds) {
                    return $item->home_position == $pos && !in_array($item->news_id, $usedNewsIds);
                });

                // If no latest news for the exact position, try lower positions
                if ($currentPositionNews->isEmpty()) {
                    for ($fallbackPos = $pos - 1; $fallbackPos >= 1; $fallbackPos--) {
                        $fallbackNews = $newsPositions->filter(function ($item) use ($fallbackPos, $usedNewsIds) {
                            return $item->home_position == $fallbackPos && !in_array($item->news_id, $usedNewsIds);
                        });

                        if ($fallbackNews->isNotEmpty()) {
                            $finalNews->push($fallbackNews->first());
                            $usedNewsIds[] = $fallbackNews->first()->news_id;
                            break;
                        }
                    }
                } else {
                    // Use the latest news for the current position
                    $finalNews->push($currentPositionNews->first());
                    $usedNewsIds[] = $currentPositionNews->first()->news_id;
                }
            }

            return $finalNews;
        });
    }


    /**
     * Summary of getProbashiJanalaPageTopNews
     * @return \Illuminate\Support\Collection<TKey, TValue>
     */
    private function getProbashiJanalaPageTopNews()
    {
        $languageId = get_language_id();

        // Fetch news from probashi category (category_id 68) with proper relationships
        $newsItems = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                $query->select('id', 'news_id', 'encode_title', 'title', 'news', 'image', 'image_base_url', 'image_alt', 'image_title', 'post_by', 'publish_date', 'status', 'category_id')
                    ->withCount('comments')
                    ->where('language_id', $languageId)
                    ->where('publish_date', '<=', Carbon::now())
                    ->where('status', 1)
                    ->with(['postByUser:id,full_name', 'comments', 'category']);
            }, 'category'])
            ->where('category_id', 68)
            ->where('status', 1)
            ->whereHas('news', function ($query) use ($languageId) {
                $query->where('language_id', $languageId)->where('status', 1)->where('publish_date', '<=', Carbon::now());
            })
            ->orderBy('created_at', 'desc')
            ->first();

        // If found, wrap in a collection with the same structure as getHomePageTopNews
        if ($newsItems && $newsItems->news) {
            return collect([(object)[
                'news' => $newsItems->news,
                'category' => $newsItems->news->category,
            ]]);
        }

        // Return empty collection if no news found
        return collect();
    }

    /**
     * Summary of getSectionTwoNews
     * @return array{leftNews: \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection<TKey, TValue>, rightNews: \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection<TKey, TValue>}
     */
    private function getSectionTwoNews()
    {
        $languageId = get_language_id();

        // Get category IDs from homepage positions
        if (activeTheme() == 'news') {
            $categories = $this->getCategoryPositionIds(2, 3);
        } else {
            $categories = $this->getCategoryPositionIds(1, 2);
        }

        $leftCategory = $categories[0] ?? null;
        $rightCategory = $categories[1] ?? null;

        // Manage news limit
        $limitLeft = 5;
        $limitRight = 3;
        if (activeTheme() == 'news') {
            $limitLeft = 4;
            $limitRight = 5;
        } elseif (activeTheme() == 'magazine') {
            $limitLeft = 1;
            $limitRight = 1;
        } elseif (activeTheme() == 'times') {
            $limitLeft = 4;
            $limitRight = 12;
        }

        // Initialize as empty collections
        $leftNews = collect();
        $rightNews = collect();

        if ($leftCategory) {
            $leftNews = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                    $query->select(
                        'id', 'news_id', 'encode_title', 'title', 'news', 'image',
                        'image_base_url', 'image_alt', 'image_title',
                        'post_by', 'publish_date', 'status'
                    )
                    ->withCount('comments')
                    ->where('language_id', $languageId)
                    ->where('publish_date', '<=', Carbon::now())
                    ->where('status', 1)
                    ->with(['postByUser:id,full_name', 'comments']);
                }])
                ->where('category_id', $leftCategory)
                // ->whereNotNull('category_position')
                ->where('status', 1)
                ->whereHas('news', function ($query) use ($languageId) {
                    $query->where('language_id', $languageId)->where('status', 1)->where('publish_date', '<=', Carbon::now());
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('category_position', 'asc')
                ->take($limitLeft)
                ->get();
        }

        // Fetch right news if category exists
        if ($rightCategory) {
            $rightNews = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                    $query->select(
                        'id', 'news_id', 'encode_title', 'title', 'news', 'image',
                        'image_base_url', 'image_alt', 'image_title',
                        'post_by', 'publish_date', 'status'
                    )
                    ->withCount('comments')
                    ->where('language_id', $languageId)
                    ->where('publish_date', '<=', Carbon::now())
                    ->where('status', 1)
                    ->with(['postByUser:id,full_name', 'comments']);
                }])
                ->where('category_id', $rightCategory)
                // ->whereNotNull('category_position')
                ->where('status', 1)
                ->whereHas('news', function ($query) use ($languageId) {
                    $query->where('language_id', $languageId)->where('status', 1)->where('publish_date', '<=', Carbon::now());
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('category_position', 'asc')
                ->take($limitRight)
                ->get();
        }

        return [
            'leftNews' => $leftNews,
            'rightNews' => $rightNews,
        ];
    }

    /**
     * Summary of getPopularNews
     * @return NewsMst[]|\Illuminate\Database\Eloquent\Collection
     */
    private function getPopularNews()
    {
        $languageId = get_language_id();
        $today = Carbon::today();
        $cacheKey = "popular_news_today_{$languageId}_{$today->toDateString()}";

        return Cache::remember($cacheKey, now()->addMinutes(5), function () use ($languageId, $today) {
            // Manage news limit
            $limit = 5;

            // Fetch today's published news, ranked by reader hits.
            $popularNews = NewsMst::select(columns: ['id', 'news_id', 'encode_title', 'title', 'news', 'image', 'image_base_url', 'image_alt', 'image_title', 'post_by', 'publish_date', 'status'])
                ->withCount('comments')
                ->with(['postByUser:id,full_name', 'comments'])
                ->where('language_id', $languageId)
                ->whereDate('publish_date', $today)
                ->where('publish_date', '<=', Carbon::now())
                ->where('status', 1)
                ->orderByDesc('reader_hit')
                ->take($limit)
                ->get();

            return $popularNews;
        });
    }

    /**
     * Summary of getLatestNews
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    private function getLatestNews()
    {
        $languageId = get_language_id();
        $cacheKey = "latest_news_{$languageId}";

        return Cache::remember($cacheKey, now()->addMinutes(5), function () use ($languageId) {
            // Fetch the most last news
            $latestNews = NewsMst::select(columns: ['id', 'news_id', 'encode_title', 'title', 'news', 'image', 'image_base_url', 'image_alt', 'image_title', 'post_by', 'publish_date', 'status', 'created_at'])
                ->where('language_id', $languageId)
                ->where('publish_date', '<=', Carbon::now())
                ->where('status', 1)
                ->latest('created_at')
                ->take(6)
                ->get();

            return $latestNews;
        });
    }

        /**
     * Summary of getLatestProbashiNews
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    private function getLatestProbashiNews()
    {
        $languageId = get_language_id();
        $cacheKey = "latest_probashi_news_{$languageId}";

        return Cache::remember($cacheKey, now()->addMinutes(5), function () use ($languageId) {
            // Fetch the most last news, skip first (index 0) and get next 3 (indices 1, 2, 3)
            $latestNews = NewsMst::select(columns: ['id', 'news_id', 'encode_title', 'title', 'news', 'image', 'image_base_url', 'image_alt', 'image_title', 'post_by', 'publish_date', 'status', 'created_at'])
                ->where('category_id', 68)
                ->where('language_id', $languageId)
                ->where('publish_date', '<=', Carbon::now())
                ->where('status', 1)
                ->latest('created_at')
                ->skip(1)
                ->take(3)
                ->get();

            return $latestNews;
        });
    }

    /**
     * Summary of getFollowUsLinks
     */
    private function getFollowUsLinks()
    {
        $social_link = Setting::where('id',111)->first();
        return json_decode($social_link->details);
    }

    /**
     * Summary of getRecommendedPosts
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    private function getRecommendedPosts()
    {
        $languageId = get_language_id();

        // Manage news limit
        $limit = 5;
        if (activeTheme() == 'news') {
            $limit = 8;
        }

        // Fetch the latest recommended news with post user and comments count
        $recommendedPosts = NewsMst::with(['postByUser:id,full_name', 'comments'])
            ->select(['id', 'news_id', 'encode_title', 'category_id', 'title', 'image', 'image_base_url', 'image_alt', 'image_title', 'publish_date', 'post_by'])
            ->withCount('comments')
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('is_recommanded', 1)
            ->where('status', 1)
            ->latest('created_at')
            ->take($limit)
            ->get();

        return $recommendedPosts;
    }

    /**
     * Summary of getSectionThreeAllNews
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection<TKey, TValue>
     */
    private function getSectionThreeAllNews()
    {
        $languageId = get_language_id();

        // Manage position and limit
        $position = 3;
        $limit = 12;
        if (activeTheme() == 'news') {
            $position = 1;
        } elseif (activeTheme() == 'magazine') {
            $limit = 5;
        } elseif (activeTheme() == 'times') {
            $limit = 8;
        }

        // Get category IDs from homepage positions
        $category = $this->getCategoryPositionIds($position);

        // Initialize as empty collections
        $sectionThreeAllNews = collect();

        if ($category) {
            $sectionThreeAllNews = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                    $query->select(
                        'id', 'news_id', 'encode_title', 'title', 'news', 'image',
                        'image_base_url', 'image_alt', 'image_title',
                        'post_by', 'publish_date', 'status'
                    )
                    ->withCount('comments')
                    ->where('language_id', $languageId)
                    ->where('publish_date', '<=', Carbon::now())
                    ->where('status', 1)
                    ->with(['postByUser:id,full_name', 'comments']);
                }])
                ->where('category_id', $category[0])
                // ->whereNotNull('category_position')
                // ->whereBetween('category_position', [1, 12])
                ->where('status', 1)
                ->whereHas('news', function ($query) use ($languageId) {
                    $query->where('language_id', $languageId)->where('status', 1)->where('publish_date', '<=', Carbon::now());
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('category_position', 'asc')
                ->take($limit)
                ->get();
        }

        return $sectionThreeAllNews;
    }


    /**
     * Summary of getSectionThreeAllSubNews
     * @return \Illuminate\Support\Collection<TKey, TValue>
     */
    private function getSectionThreeAllSubNews()
    {
        $languageId = get_language_id();

        // Manage position and limit
        $position = 3;
        $limit = 12;
        if (activeTheme() == 'news') {
            $position = 1;
        }

        $parentCategoryId = $this->getCategoryPositionIds($position);

        $newsGroupedBySubcategory = collect();

        if ($parentCategoryId) {
            $parentCategory = Category::find($parentCategoryId[0]);

            if ($parentCategory) {
                $subcategories = $parentCategory->children()->get();

                foreach ($subcategories as $subcategory) {

                    $newsItems = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                            $query->select(
                                'id', 'news_id', 'encode_title', 'title', 'news', 'image',
                                'image_base_url', 'image_alt', 'image_title',
                                'post_by', 'publish_date', 'status'
                            )
                            ->withCount('comments')
                            ->where('language_id', $languageId)
                            ->where('publish_date', '<=', Carbon::now())
                            ->where('status', 1)
                            ->with(['postByUser:id,full_name', 'comments']);
                            }])
                        ->where('sub_category_id', $subcategory->id)
                        // ->whereNotNull('category_position')
                        // ->whereBetween('category_position', [1, 12])
                        ->where('status', 1)
                        ->whereHas('news', function ($query) use ($languageId) {
                            $query->where('language_id', $languageId)->where('status', 1)->where('publish_date', '<=', Carbon::now());
                        })
                        ->orderBy('created_at', 'desc')
                        ->orderBy('category_position', 'asc')
                        ->take($limit)
                        ->get();

                    if ($newsItems->isNotEmpty()) {
                        $newsGroupedBySubcategory->put($subcategory->id, [
                            'subcategory' => $subcategory,
                            'news' => $newsItems,
                        ]);
                    }
                }
            }
        }

        return $newsGroupedBySubcategory;
    }

    /**
     * Summary of getSectionFourNews
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection<TKey, TValue>
     */
    private function getSectionFourNews()
    {
        $languageId = get_language_id();

        // Get category IDs from homepage positions
        $category = $this->getCategoryPositionIds(4);

        // Manage limit
        $limit = 6;
        if (activeTheme() == 'magazine') {
            $limit = 5;
        } elseif (activeTheme() == 'times') {
            $limit = 7;
        }

        // Initialize as empty collections
        $sectionFourNews = collect();

        if ($category) {
            $sectionFourNews = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                    $query->select(
                        'id', 'news_id', 'encode_title', 'title', 'news', 'image',
                        'image_base_url', 'image_alt', 'image_title',
                        'post_by', 'publish_date', 'status'
                    )
                    ->withCount('comments')
                    ->where('language_id', $languageId)
                    ->where('publish_date', '<=', Carbon::now())
                    ->where('status', 1)
                    ->with(['postByUser:id,full_name', 'comments']);
                }])
                ->where('category_id', $category[0])
                // ->whereNotNull('category_position')
                ->where('status', 1)
                ->whereHas('news', function ($query) use ($languageId) {
                    $query->where('language_id', $languageId)->where('status', 1)->where('publish_date', '<=', Carbon::now());
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('category_position', 'asc')
                ->take($limit)
                ->get();
        }

        return $sectionFourNews;
    }

    private function getTopWeekNews()
    {
        $languageId = get_language_id();

        // Step 1: Get the last 7 unique publish dates (latest first)
        $last7Dates = NewsMst::where('language_id', $languageId)
            ->where('status', 1)
            ->select(DB::raw('DATE(publish_date) as date'))
            ->orderByDesc('publish_date')
            ->distinct()
            ->limit(7)
            ->pluck('date')
            ->toArray();

        // Step 2: Fetch top 5 news from those dates
        $topWeekNews = NewsMst::with(['postByUser:id,full_name', 'comments'])
            ->select([
                'id', 'news_id', 'encode_title', 'category_id', 'title', 'image',
                'image_base_url', 'image_alt', 'image_title', 'publish_date', 'post_by'
            ])
            ->withCount('comments')
            ->where('language_id', $languageId)
            ->where('status', 1)
            ->whereIn(DB::raw('DATE(publish_date)'), $last7Dates)
            ->orderByDesc('reader_hit')
            ->take(5)
            ->get();

        return $topWeekNews;
    }

    private function getTrendingNews()
    {
        $languageId = get_language_id();

        // Fetch the most read news
        $topWeekNews = NewsMst::with(['postByUser:id,full_name', 'comments'])
            ->select(['id', 'news_id', 'encode_title', 'category_id', 'title', 'news', 'image', 'image_base_url', 'image_alt', 'image_title', 'publish_date', 'post_by'])
            ->withCount('comments')
            ->where('language_id', $languageId)
            ->where('status', 1)
            ->where('publish_date', '<=', Carbon::now())
            ->orderByDesc('reader_hit')
            ->take(5)
            ->get();

        return $topWeekNews;
    }

    /**
     * Summary of getOpinions
     * @return Opinion[]|\Illuminate\Database\Eloquent\Collection
     */
    private function getOpinions()
    {
        $languageId = get_language_id();

        // Manage news limit
        $limit = 20;
        if (activeTheme() == 'news') {
            $limit = 4;
        }

        // Fetch active opinions for the current language, ordered by ID DESC
        $opinions = Opinion::select(['id', 'name', 'designation', 'encode_title', 'title', 'person_image'])
            ->where('language_id', $languageId)
            ->where('status', ActivationStatusEnum::ACTIVE)
            ->orderByDesc('id')
            ->take($limit)
            ->get();

        return $opinions;
    }

    /**
     * Summary of getFeaturesNews
     * @return NewsMst|object|\Illuminate\Database\Eloquent\Model|null
     */
    private function getFeaturesNews()
    {
        $languageId = get_language_id();

        // Fetch the latest featured news with post user and comments count
        $featuresNews = NewsMst::with(['postByUser:id,full_name', 'comments'])
            ->select(['id', 'news_id', 'encode_title', 'title', 'image', 'image_base_url', 'image_alt', 'image_title', 'publish_date', 'post_by'])
            ->withCount('comments')
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('is_featured', 1)
            ->where('status', 1)
            ->latest('created_at')
            ->first();

        return $featuresNews;
    }

    /**
     * Summary of getVideoNews
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    private function getVideoNews()
    {
        $languageId = get_language_id();

        // Manage news limit
        $limit = 5;
        if (activeTheme() == 'news') {
            $limit = 10;
        } elseif (activeTheme() == 'magazine') {
            $limit = 4;
        }

        $videoNews = VideoNews::with(['postByUser:id,full_name'])
            ->select(['id', 'publish_date', 'total_view', 'encode_title', 'title', 'thumbnail_image', 'image_alt', 'image_title', 'created_by'])
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('status', ActivationStatusEnum::ACTIVE)
            ->latest('created_at')
            ->take($limit)
            ->get();

        return $videoNews;
    }

    private function getSectionFiveNews()
    {
        $languageId = get_language_id();

        // Get category IDs from homepage positions
        $categories = $this->getCategoryPositionIds(5, 6, 7, 8);

        $firstCategory = $categories[0] ?? null;
        $secondCategory = $categories[1] ?? null;
        $thirdCategory = $categories[2] ?? null;
        $fourthCategory = $categories[3] ?? null;

        // Manage news limit
        $firstNewsLimit = 5;
        $secondNewsLimit = 5;
        $thirdNewsLimit = 5;
        $fourthNewsLimit = 5;

        if (activeTheme() == 'times') {
            $secondNewsLimit = 4;
            $thirdNewsLimit = 6;
            $fourthNewsLimit = 6;
        }

        // Initialize as empty collections
        $firstNews = collect();
        $secondNews = collect();
        $thirdNews = collect();
        $fourthNews = collect();

        if ($firstCategory) {
            $firstNews = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                    $query->select(
                        'id', 'news_id', 'encode_title', 'title', 'news', 'image',
                        'image_base_url', 'image_alt', 'image_title',
                        'post_by', 'publish_date', 'status'
                    )
                    ->withCount('comments')
                    ->where('language_id', $languageId)
                    ->where('publish_date', '<=', Carbon::now())
                    ->where('status', 1)
                    ->with(['postByUser:id,full_name', 'comments']);
                }])
                ->where('category_id', $firstCategory)
                // ->whereNotNull('category_position')
                ->where('status', 1)
                ->whereHas('news', function ($query) use ($languageId) {
                    $query->where('language_id', $languageId)->where('status', 1)->where('publish_date', '<=', Carbon::now());
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('category_position', 'asc')
                ->take($firstNewsLimit)
                ->get();
        }

        if ($secondCategory) {
            $secondNews = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                    $query->select(
                        'id', 'news_id', 'encode_title', 'title', 'news', 'image',
                        'image_base_url', 'image_alt', 'image_title',
                        'post_by', 'publish_date', 'status'
                    )
                    ->withCount('comments')
                    ->where('language_id', $languageId)
                    ->where('publish_date', '<=', Carbon::now())
                    ->where('status', 1)
                    ->with(['postByUser:id,full_name', 'comments']);
                }])
                ->where('category_id', $secondCategory)
                // ->whereNotNull('category_position')
                ->where('status', 1)
                ->whereHas('news', function ($query) use ($languageId) {
                    $query->where('language_id', $languageId)->where('status', 1)->where('publish_date', '<=', Carbon::now());
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('category_position', 'asc')
                ->take($secondNewsLimit)
                ->get();
        }

        if ($thirdCategory) {
            $thirdNews = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                    $query->select(
                        'id', 'news_id', 'encode_title', 'title', 'news', 'image',
                        'image_base_url', 'image_alt', 'image_title',
                        'post_by', 'publish_date', 'status'
                    )
                    ->withCount('comments')
                    ->where('language_id', $languageId)
                    ->where('publish_date', '<=', Carbon::now())
                    ->where('status', 1)
                    ->with(['postByUser:id,full_name', 'comments']);
                }])
                ->where('category_id', $thirdCategory)
                // ->whereNotNull('category_position')
                ->where('status', 1)
                ->whereHas('news', function ($query) use ($languageId) {
                    $query->where('language_id', $languageId)->where('status', 1)->where('publish_date', '<=', Carbon::now());
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('category_position', 'asc')
                ->take($thirdNewsLimit)
                ->get();
        }

        if ($fourthCategory) {
            $fourthNews = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                    $query->select(
                        'id', 'news_id', 'encode_title', 'title', 'news', 'image',
                        'image_base_url', 'image_alt', 'image_title',
                        'post_by', 'publish_date', 'status'
                    )
                    ->withCount('comments')
                    ->where('language_id', $languageId)
                    ->where('publish_date', '<=', Carbon::now())
                    ->where('status', 1)
                    ->with(['postByUser:id,full_name', 'comments']);
                }])
                ->where('category_id', $fourthCategory)
                // ->whereNotNull('category_position')
                ->where('status', 1)
                ->whereHas('news', function ($query) use ($languageId) {
                    $query->where('language_id', $languageId)->where('status', 1)->where('publish_date', '<=', Carbon::now());
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('category_position', 'asc')
                ->take($fourthNewsLimit)
                ->get();
        }

        return [
            'firstNews' => $firstNews,
            'secondNews' => $secondNews,
            'thirdNews' => $thirdNews,
            'fourthNews' => $fourthNews,
        ];
    }

    private function getSectionSixNews()
    {
        $languageId = get_language_id();

        // Get category IDs from homepage positions
        $category = $this->getCategoryPositionIds(9);

        // Manage news limit
        $limit = 12;
        if (activeTheme() == 'times') {
           $limit = 6;
        } elseif (activeTheme() == 'news' || activeTheme() == 'magazine') {
            $limit = 5;
        }

        // Initialize as empty collections
        $sectionThreeAllNews = collect();

        if ($category) {
            $sectionThreeAllNews = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                    $query->select(
                        'id', 'news_id', 'encode_title', 'title', 'news', 'image',
                        'image_base_url', 'image_alt', 'image_title',
                        'post_by', 'publish_date', 'status'
                    )
                    ->withCount('comments')
                    ->where('language_id', $languageId)
                    ->where('publish_date', '<=', Carbon::now())
                    ->where('status', 1)
                    ->with(['postByUser:id,full_name', 'comments']);
                }])
                ->where('category_id', $category[0])
                // ->whereNotNull('category_position')
                ->where('status', 1)
                ->whereHas('news', function ($query) use ($languageId) {
                    $query->where('language_id', $languageId)->where('status', 1)->where('publish_date', '<=', Carbon::now());
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('category_position', 'asc')
                ->take($limit)
                ->get();
        }

        return $sectionThreeAllNews;
    }

    private function getCommonSectionNews()
    {
        $languageId = get_language_id();

        // Get excluded category IDs from HomePagePosition
        $excludedCategoryIds = HomePagePosition::pluck('category_id')->toArray();

        // Get all parent categories not in HomePagePosition
        $categories = Category::onlyParents()
            ->where('language_id', $languageId)
            ->whereNotIn('id', $excludedCategoryIds)
            ->get();

        // Manage news limit
        $limit = 16;
        if (activeTheme() == 'times') {
           $limit = 6;
        } elseif (activeTheme() == 'news' || activeTheme() == 'magazine') {
           $limit = 5;
        }

        // Initialize array to hold news grouped by category
        $newsByCategory = [];

        foreach ($categories as $category) {
            $news = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                    $query->select(
                        'id', 'news_id', 'encode_title', 'title', 'news', 'image',
                        'image_base_url', 'image_alt', 'image_title',
                        'post_by', 'publish_date', 'status'
                    )
                    ->withCount('comments')
                    ->where('language_id', $languageId)
                    ->where('publish_date', '<=', Carbon::now())
                    ->where('status', 1)
                    ->with(['postByUser:id,full_name', 'comments']);
                }])
                ->where('category_id', $category->id)
                // ->whereNotNull('category_position')
                ->where('status', 1)
                ->whereHas('news', function ($query) use ($languageId) {
                    $query->where('language_id', $languageId)->where('status', 1)->where('publish_date', '<=', Carbon::now());
                })
                ->orderBy('created_at', 'desc')
                ->orderBy('category_position', 'asc')
                ->take($limit)
                ->get();

            // Key format: ctg-1, ctg-2, etc.
            if ($news->isNotEmpty()) {
                $newsByCategory['ctg-' . $category->id] = $news;
            }
        }

        return $newsByCategory;
    }

    public function getCategoryNewsView(string $categorySlug)
    {
        // Try to find the category by slug
        $category = Category::select(['id', 'category_name', 'slug', 'parents_id', 'meta_keyword', 'meta_description'])->where('slug', $categorySlug)->first();
        // If not found, return null to controller or throw a custom signal
        if (!$category) {
            return null;
        }

        if ($category && $category->parents_id) {
            $categoryNews = $this->getSubCategoryNews($category->id);
        } else {
            $categoryNews = $this->getCategoryNews($category->id);
        }


        $popularNews = $this->getPopularNews();
        $topWeekNews = $this->getTopWeekNews();
        $votingPoll = $this->getVotingPoll();

        return compact('category', 'categoryNews', 'popularNews', 'topWeekNews', 'votingPoll');
    }

    public function getLatestNewsView(): array
    {
        $languageId = get_language_id();

        $category = (object) [
            'id' => 0,
            'category_name' => localize('breaking'),
            'slug' => 'latest',
            'meta_keyword' => null,
            'meta_description' => null,
        ];

        $categoryNews = NewsMst::select([
                'id',
                'news_id',
                'encode_title',
                'title',
                'news',
                'image',
                'image_base_url',
                'image_alt',
                'image_title',
                'post_by',
                'publish_date',
                'status',
            ])
            ->withCount('comments')
            ->with(['postByUser:id,full_name', 'comments', 'photoLibrary'])
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('status', 1)
            ->orderBy('publish_date', 'desc')
            ->orderBy('id', 'desc')
            ->take(21)
            ->get();

        $popularNews = $this->getPopularNews();
        $topWeekNews = $this->getTopWeekNews();
        $votingPoll = $this->getVotingPoll();

        return compact('category', 'categoryNews', 'popularNews', 'topWeekNews', 'votingPoll');
    }

    public function getProbashiNewsView(): array
    {
        $languageId = get_language_id();

        $category = (object) [
            'id' => 68,
            'category_name' => localize('probashi'),
            'slug' => 'প্রবাসী',
            'meta_keyword' => null,
            'meta_description' => null,
        ];

        $categoryNews = NewsMst::select([
                'id',
                'news_id',
                'encode_title',
                'title',
                'news',
                'image',
                'image_base_url',
                'image_alt',
                'image_title',
                'post_by',
                'publish_date',
                'status',
            ])
            ->withCount('comments')
            ->with(['postByUser:id,full_name', 'comments', 'photoLibrary'])
            ->where('language_id', $languageId)
            ->where('category_id', 68)
            ->where('publish_date', '<=', Carbon::now())
            ->where('status', 1)
            ->orderBy('publish_date', 'desc')
            ->orderBy('id', 'desc')
            ->skip(4)
            ->take(24)
            ->get();

        return compact('category', 'categoryNews');
    }

    public function getOpinionDetails(string $categorySlug)
    {
        // Try to find the category by slug
        $opinion = Opinion::where('encode_title', $categorySlug)->first();

        // If not found, return null to controller or throw a custom signal
        if (!$opinion) {
            return null;
        }

        $popularNews = $this->getPopularNews();
        $topWeekNews = $this->getTopWeekNews();
        $votingPoll = $this->getVotingPoll();

        $currentNewsId = $opinion->id;
        $approvedCommentsCount = NewsComment::where('opinion_id', $currentNewsId)->where('is_approved', 1)->count();
        $comments = NewsComment::with([
                'user',
                'replies.user'
            ])
            ->where('opinion_id', $currentNewsId)
            ->where('is_approved', 1)
            ->orderBy('id', 'desc')
            ->get();

        return compact(
            'opinion', 'popularNews', 'topWeekNews', 'votingPoll', 'approvedCommentsCount', 'comments', 'currentNewsId'
        );
    }

    private function getCategoryNews($categoryId)
    {
        $languageId = get_language_id();

        $popularNews = NewsMst::select(['id', 'news_id', 'encode_title', 'title', 'news', 'image', 'image_base_url', 'image_alt', 'image_title', 'post_by', 'publish_date', 'status'])
            ->withCount('comments')
            ->with(['postByUser:id,full_name', 'comments'])
            ->where('category_id', $categoryId)
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('status', 1)
            ->latest('created_at')
            ->take(21)
            ->get();

        return $popularNews;
    }

    private function getSubCategoryNews($categoryId)
    {
        $languageId = get_language_id();

        $popularNews = NewsMst::select(['id', 'news_id', 'encode_title', 'title', 'news', 'image', 'image_base_url', 'image_alt', 'image_title', 'post_by', 'publish_date', 'status'])
            ->withCount('comments')
            ->with(['postByUser:id,full_name', 'comments'])
            ->where('sub_category_id', $categoryId)
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('status', 1)
            ->latest('created_at')
            ->take(21)
            ->get();

        return $popularNews;
    }

    private function getVotingPoll()
    {
        $languageId = get_language_id();

        $poll = Poll::select(['id', 'question', 'vote_permission'])
            ->with('options')
            ->where('language_id', $languageId)
            ->where('status', ActivationStatusEnum::ACTIVE->value)
            ->latest('created_at')
            ->first();

        return $poll;
    }

    /**
     * Get search results based on the search term.
     * @param string $searchTerm
     * @return array
     */
    public function getSearchResults(string $searchTerm)
    {
        $languageId = get_language_id();

        $newsResults = NewsMst::with(['postByUser:id,full_name', 'comments', 'category'])
            ->withCount('comments')
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('status', 1)
            ->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('news', 'like', '%' . $searchTerm . '%');
            })
            ->latest('created_at')
            ->take(21)
            ->get();

        $popularNews = $this->getPopularNews();
        $topWeekNews = $this->getTopWeekNews();
        $votingPoll = $this->getVotingPoll();

        return compact('newsResults', 'searchTerm', 'popularNews', 'topWeekNews', 'votingPoll');
    }

    public function getArchiveData($request)
    {
        $languageId = get_language_id();

        $query = NewsArchive::query()
            ->select(['id', 'news_id', 'encode_title', 'title', 'news', 'image', 'image_base_url', 'image_alt', 'image_title', 'post_by', 'publish_date', 'status'])
            ->withCount('comments')
            ->where('language_id', $languageId)
            ->where('status', 1)
            ->where('publish_date', '<=', Carbon::now());

        // Filter: Date Range
        if ($request->filled('daterange')) {
            [$start, $end] = explode(' - ', $request->daterange);
            $query->whereBetween('publish_date', [
                Carbon::parse($start)->startOfDay(),
                Carbon::parse($end)->endOfDay()
            ]);
        }

        // Filter: Category
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Filter: Content (search in title or news)
        if ($request->filled('content')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->content . '%')
                ->orWhere('news', 'like', '%' . $request->content . '%')
                ->orWhere('encode_title', 'like', '%' . $request->content . '%');
            });
        }

        $archiveNews = $query->latest('publish_date')->paginate(20)->withQueryString();

        // Assuming you already fetch categories
        $categories = Category::select(['id', 'category_name', 'slug'])->onlyParents()->where('language_id', $languageId)->get();

        return compact('categories', 'archiveNews');
    }
    public function getStoryNewsData()
    {
        $languageId = get_language_id();

        $homeStories = Story::with('latestDetail')
            ->withCount('storyDetails')
            ->where('language_id', $languageId)
            ->latest()
            ->paginate(30);

        return compact('homeStories');
    }

    public function getVideoNewsList()
    {
        $languageId = get_language_id();

        $videoNews = VideoNews::with(['postByUser:id,full_name'])
            ->select(['id', 'publish_date', 'total_view', 'encode_title', 'title', 'details', 'thumbnail_image', 'image_alt', 'image_title', 'created_by'])
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('status', ActivationStatusEnum::ACTIVE)
            ->latest('created_at')
            ->take(21)
            ->get();

        $popularNews = $this->getPopularNews();
        $topWeekNews = $this->getTopWeekNews();
        $votingPoll = $this->getVotingPoll();

        return compact('videoNews', 'popularNews', 'topWeekNews', 'votingPoll');
    }

    private function getAllSubNews($position, $limit=16)
    {
        $languageId = get_language_id();

        $parentCategoryId = $this->getCategoryPositionIds($position);

        $newsGroupedBySubcategory = collect();

        if ($parentCategoryId) {
            $parentCategory = Category::find($parentCategoryId[0]);

            if ($parentCategory) {
                $subcategories = $parentCategory->children()->get();

                foreach ($subcategories as $subcategory) {

                    $newsItems = NewsPositionMap::with(['news' => function ($query) use ($languageId) {
                            $query->select(
                                'id', 'news_id', 'encode_title', 'title', 'news', 'image',
                                'image_base_url', 'image_alt', 'image_title',
                                'post_by', 'publish_date', 'status'
                            )
                            ->withCount('comments')
                            ->where('language_id', $languageId)
                            ->where('publish_date', '<=', Carbon::now())
                            ->where('status', 1)
                            ->with(['postByUser:id,full_name', 'comments']);
                            }])
                        ->where('sub_category_id', $subcategory->id)
                        // ->whereNotNull('category_position')
                        // ->whereBetween('category_position', [1, 12])
                        ->where('status', 1)
                        ->whereHas('news', function ($query) use ($languageId) {
                            $query->where('language_id', $languageId)->where('status', 1)->where('publish_date', '<=', Carbon::now());
                        })
                        ->orderBy('created_at', 'desc')
                        ->orderBy('category_position', 'asc')
                        ->take($limit)
                        ->get();

                    if ($newsItems->isNotEmpty()) {
                        $newsGroupedBySubcategory->put($subcategory->id, [
                            'subcategory' => $subcategory,
                            'news' => $newsItems,
                        ]);
                    }
                }
            }
        }

        return $newsGroupedBySubcategory;
    }

    private function extractImageFromRssItem($item)
    {
        // 1. Check for custom <image> tag
        $imageTags = $item->get_item_tags('', 'image');
        if (!empty($imageTags[0]['data'])) {
            return $imageTags[0]['data'];
        }

        // 2. Check for <media:content> with image
        $mediaContent = $item->get_item_tags('http://search.yahoo.com/mrss/', 'content');
        if (!empty($mediaContent[0]['attribs']['']['url'])) {
            return $mediaContent[0]['attribs']['']['url'];
        }

        // 3. Check for <media:thumbnail>
        $mediaThumbnails = $item->get_item_tags('http://search.yahoo.com/mrss/', 'thumbnail');
        if (!empty($mediaThumbnails[0]['attribs']['']['url'])) {
            return $mediaThumbnails[0]['attribs']['']['url'];
        }

        // 4. Check for <enclosure> with type image
        $enclosure = $item->get_enclosure();
        if ($enclosure && strpos($enclosure->get_type(), 'image') !== false) {
            return $enclosure->get_link();
        }

        // 5. Optional: try to extract from <description> with regex
        $desc = $item->get_description();
        if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/', $desc, $matches)) {
            return $matches[1];
        }

        return null;
    }

    protected function getSlugFromUrl($url)
    {
        $path = parse_url($url, PHP_URL_PATH);
        $slug = basename($path);

        $slug = preg_replace('/[\?#].*/', '', $slug);

        return $slug;
    }

    public function getRssFeedNews()
    {
        $languageId = get_language_id();

        // Get all active feeds
        $rssFeeds = RssFeed::where('status', 1)->where('paper_language', $languageId)->get();

        $allFeedsData = [];

        foreach ($rssFeeds as $feed) {
            $cacheKey = 'rss_feed_items_' . $feed->id;

            if (!Cache::has($cacheKey)) {
                try {
                    $items = FeedsFacade::make($feed->feed_url)->get_items();

                    $newsItems = collect($items)->take($feed->posts)->map(function ($item) use ($feed) {
                        // Get dc:creator tag
                        $dcCreator = $item->get_item_tags('http://purl.org/dc/elements/1.1/', 'creator');

                        return [
                            'title'       => $item->get_title(),
                            'encode_title'=> 'rss-details-' . $this->getSlugFromUrl($item->get_link()),
                            'link'        => $item->get_link(),
                            'guid'        => $item->get_id(),
                            'author'      => $dcCreator[0]['data'] ?? '',
                            'description' => $item->get_description(),
                            'pubDate'     => $item->get_date('Y-m-d H:i:s'),
                            'categories'  => collect($item->get_categories())->pluck('term')->toArray(),
                            'image'       => $this->extractImageFromRssItem($item),

                            'show_button'  => $feed->show_button,
                            'button_text'  => $feed->button_text,
                            'feed_name'    => $feed->feed_name,
                            'feed_slug'    => $feed->slug,
                        ];
                    })->toArray();

                    Cache::put($cacheKey, $newsItems, now()->addMinutes(10));
                } catch (\Exception $e) {
                    // Optional: Log error per feed
                    $newsItems = [];
                }
            } else {
                $newsItems = Cache::get($cacheKey);
            }

            $allFeedsData[$feed->id] = [
                'feed_name' => $feed->feed_name,
                'slug'      => $feed->slug,
                'news'      => $newsItems,
            ];
        }

        return $allFeedsData;
    }

    public function getSingleRssFeedNewsBySlug(string $slug)
    {
        $languageId = get_language_id();

        $feed = RssFeed::where('status', 1)
            ->where('paper_language', $languageId)
            ->where('slug', $slug)
            ->firstOrFail();

        $cacheKey = 'rss_feed_items_' . $feed->id;

        if (!Cache::has($cacheKey)) {
            try {
                $items = FeedsFacade::make($feed->feed_url)->get_items();

                $itemsCollection = collect($items);
                
                // 1. Keyword Filtering
                if (!empty($feed->include_keywords)) {
                    $includes = array_map('trim', explode(',', strtolower($feed->include_keywords)));
                    $itemsCollection = $itemsCollection->filter(function ($item) use ($includes) {
                        $text = strtolower($item->get_title() . ' ' . $item->get_description());
                        foreach ($includes as $keyword) {
                            if (str_contains($text, $keyword)) return true;
                        }
                        return false;
                    });
                }

                if (!empty($feed->exclude_keywords)) {
                    $excludes = array_map('trim', explode(',', strtolower($feed->exclude_keywords)));
                    $itemsCollection = $itemsCollection->reject(function ($item) use ($excludes) {
                        $text = strtolower($item->get_title() . ' ' . $item->get_description());
                        foreach ($excludes as $keyword) {
                            if (str_contains($text, $keyword)) return true;
                        }
                        return false;
                    });
                }

                $newsItems = $itemsCollection->take($feed->posts)->map(function ($item) use ($feed) {
                    $dcCreator = $item->get_item_tags('http://purl.org/dc/elements/1.1/', 'creator');
                    
                    // 2. Fallback Image
                    $image = $this->extractImageFromRssItem($item);
                    if (!$image && !empty($feed->fallback_image)) {
                        $image = asset($feed->fallback_image);
                    }

                    // 3. Content Truncation
                    $description = strip_tags($item->get_description());
                    if ($feed->summary_length > 0) {
                        $description = \Illuminate\Support\Str::limit($description, $feed->summary_length);
                    }

                    return [
                        'title'       => $item->get_title(),
                        'encode_title'=> 'rss-details-' . $this->getSlugFromUrl($item->get_link()),
                        'link'        => $item->get_link(),
                        'guid'        => $item->get_id(),
                        'author'      => $dcCreator[0]['data'] ?? '',
                        'description' => $description,
                        'pubDate'     => $item->get_date('Y-m-d H:i:s'),
                        'categories'  => collect($item->get_categories())->pluck('term')->toArray(),
                        'image'       => $image,

                        'show_button'  => $feed->show_button,
                        'button_text'  => $feed->button_text,
                        'feed_name'    => $feed->feed_name,
                        'feed_slug'    => $feed->slug,
                        'category_id'  => $feed->category_id,
                    ];
                })->toArray();

                // 4. Custom Cache Duration
                $cacheTTL = $feed->cache_duration > 0 ? $feed->cache_duration : 10;
                Cache::put($cacheKey, $newsItems, now()->addMinutes($cacheTTL));
            } catch (\Exception $e) {
                $newsItems = [];
                // \Log::error('RSS Fetch Error: ' . $e->getMessage());
            }
        } else {
            $newsItems = Cache::get($cacheKey);
        }

        return [
            'feed_name' => $feed->feed_name,
            'slug'      => $feed->slug,
            'news'      => $newsItems,
        ];
    }

    public function getCategoryViewRssNews()
    {
        $rssFeedNews  = $this->getRssFeedNews();

        $popularNews = $this->getPopularNews();
        $topWeekNews = $this->getTopWeekNews();
        $votingPoll = $this->getVotingPoll();

        return compact('rssFeedNews', 'popularNews', 'topWeekNews', 'votingPoll');
    }

    public function getSingleCategoryViewRssNews($slug)
    {
        $rssFeedNews  = $this->getSingleRssFeedNewsBySlug($slug);

        $popularNews = $this->getPopularNews();
        $topWeekNews = $this->getTopWeekNews();
        $votingPoll = $this->getVotingPoll();

        return compact('rssFeedNews', 'popularNews', 'topWeekNews', 'votingPoll');
    }

    public function getRssNewsDetails($slug)
    {
        $newsDetail = null;
        $feeds = RssFeed::all();

        foreach ($feeds as $feed) {
            $cacheKey = 'rss_feed_items_' . $feed->id;

            if (Cache::has($cacheKey)) {
                $newsItems = Cache::get($cacheKey);

                foreach ($newsItems as $news) {
                    if ($news['encode_title'] === $slug) {
                        $newsDetail = $news;
                        break 2;
                    }
                }
            }
        }

        if (!$newsDetail) {
            return null;
        }

        $popularNews = $this->getPopularNews();
        $relatedNews = $this->getSingleRssFeedNewsBySlug($newsDetail['feed_slug']);
        $votingPoll = $this->getVotingPoll();

        return compact('popularNews', 'newsDetail', 'relatedNews', 'votingPoll');
    }

    public function getDistrictNews($divisionId = null, $districtId = null, $limit = 8)
    {
        $languageId = get_language_id();
        $query = NewsMst::with(['category', 'district', 'division', 'postByUser:id,full_name', 'photoLibrary'])
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('status', 1);

        if ($districtId) {
            $query->where('district_id', $districtId);
        } elseif ($divisionId) {
            $query->where('division_id', $divisionId);
        } else {
            $query->where(function ($q) {
                $q->whereNotNull('district_id')
                  ->orWhereNotNull('division_id')
                  ->orWhereHas('category', function ($cq) {
                      $cq->where('slug', 'সারাদেশ')->orWhere('category_name', 'like', '%সারাদেশ%');
                  });
            });
        }

        return $query->orderBy('publish_date', 'desc')
            ->orderBy('id', 'desc')
            ->take($limit)
            ->get();
    }

    public function getDivisionsWithDistricts()
    {
        return \App\Models\Division::with(['districts' => function ($q) {
            $q->orderBy('name');
        }])->orderBy('name')->get();
    }

    public function getDistrictNewsView(string $slug)
    {
        $languageId = get_language_id();

        $district = \App\Models\District::where('url', $slug)->first();
        $division = null;
        if (!$district) {
            $division = \App\Models\Division::where('url', $slug)->first();
        }

        if (!$district && !$division && $slug !== 'all') {
            return null;
        }

        $title = 'সারাদেশের খবর';
        if ($district) {
            $title = $district->bn_name . ' (' . $district->name . ')';
        } elseif ($division) {
            $title = $division->bn_name . ' (' . $division->name . ' বিভাগ)';
        }

        $category = (object) [
            'id' => 0,
            'category_name' => $title,
            'slug' => 'district/' . $slug,
            'meta_keyword' => $title,
            'meta_description' => $title . ' - জেলা সংবাদ ও সর্বশেষ খবর',
        ];

        $query = NewsMst::select([
                'id',
                'news_id',
                'encode_title',
                'title',
                'news',
                'image',
                'image_base_url',
                'image_alt',
                'image_title',
                'post_by',
                'publish_date',
                'status',
                'district_id',
                'division_id',
            ])
            ->withCount('comments')
            ->with(['postByUser:id,full_name', 'comments', 'photoLibrary', 'district', 'division'])
            ->where('language_id', $languageId)
            ->where('publish_date', '<=', Carbon::now())
            ->where('status', 1);

        if ($district) {
            $query->where('district_id', $district->id);
        } elseif ($division) {
            $query->where('division_id', $division->id);
        } else {
            $query->where(function ($q) {
                $q->whereNotNull('district_id')
                  ->orWhereNotNull('division_id')
                  ->orWhereHas('category', function ($cq) {
                      $cq->where('slug', 'সারাদেশ')->orWhere('category_name', 'like', '%সারাদেশ%');
                  });
            });
        }

        $categoryNews = $query->orderBy('publish_date', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(12);

        $popularNews = $this->getPopularNews();
        $topWeekNews = $this->getTopWeekNews();
        $votingPoll = $this->getVotingPoll();

        return compact('category', 'categoryNews', 'popularNews', 'topWeekNews', 'votingPoll');
    }

}
