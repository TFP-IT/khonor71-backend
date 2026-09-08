<?php

namespace App\Services\Sitemap;

use Carbon\Carbon;
use App\Models\NewsMst;
use Illuminate\Support\Str;
use Modules\Page\Entities\Page;
use Modules\Opinion\Entities\Opinion;
use Modules\Category\Entities\Category;
use Modules\VideoNews\Entities\VideoNews;
use Modules\ProbashiJanala\Entities\ProbashiNews;
use Illuminate\Support\Facades\Cache;

class SitemapService
{
    const PER_PAGE = 45000;
    const CACHE_TTL = 3600; // 1 hour

    /**
     * Helper to get full absolute URL correctly.
     */
    private function getUrl($path)
    {
        return url(ltrim($path, '/'));
    }

    /**
     * Return valid XML response.
     */
    public function response($xml)
    {
        return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    /**
     * Generate Sitemap Index.
     */
    public function generateIndex()
    {
        return Cache::remember('sitemap_index', self::CACHE_TTL, function () {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $xml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

            $sitemaps = [
                'sitemap_pages.xml',
                'sitemap_categories.xml',
                'sitemap_news.xml',
                'sitemap_videos.xml',
                'sitemap_opinions.xml',
                'sitemap_probashi.xml',
            ];

            foreach ($sitemaps as $sitemap) {
                $xml .= '    <sitemap><loc>' . $this->getUrl($sitemap) . '</loc></sitemap>' . "\n";
            }

            // Post chunks
            $totalPosts = NewsMst::where('status', 1)->whereDate('publish_date', '<=', Carbon::today())->count();
            $pages = ceil($totalPosts / self::PER_PAGE);
            if ($pages == 0) $pages = 1;

            for ($i = 1; $i <= $pages; $i++) {
                $xml .= '    <sitemap><loc>' . $this->getUrl("sitemap_posts_{$i}.xml") . '</loc></sitemap>' . "\n";
            }

            $xml .= '</sitemapindex>';
            return $xml;
        });
    }

    /**
     * Generate Posts Sitemap (chunked).
     */
    public function generatePosts($page)
    {
        $cacheKey = "sitemap_posts_{$page}";

        return Cache::remember($cacheKey, self::CACHE_TTL, function () use ($page) {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

            $offset = ($page - 1) * self::PER_PAGE;
            
            $posts = NewsMst::with('photoLibrary')
                ->where('status', 1)
                ->whereDate('publish_date', '<=', Carbon::today())
                ->orderBy('id', 'desc')
                ->offset($offset)
                ->limit(self::PER_PAGE)
                ->get();

            foreach ($posts as $post) {
                $url = $this->getUrl(__url($post->encode_title));
                $lastmod = $post->last_update ? $post->last_update->toIso8601String() : ($post->created_at ? $post->created_at->toIso8601String() : Carbon::now()->toIso8601String());

                $xml .= '    <url>' . "\n";
                $xml .= '        <loc>' . htmlspecialchars($url) . '</loc>' . "\n";
                $xml .= '        <lastmod>' . $lastmod . '</lastmod>' . "\n";

                if ($post->photoLibrary && !empty($post->photoLibrary->image_base_url)) {
                    $xml .= '        <image:image><image:loc>' . htmlspecialchars($post->photoLibrary->image_base_url) . '</image:loc></image:image>' . "\n";
                }

                $xml .= '    </url>' . "\n";
            }

            $xml .= '</urlset>';
            return $xml;
        });
    }

    /**
     * Generate Static Pages Sitemap.
     */
    public function generatePages()
    {
        return Cache::remember('sitemap_pages', self::CACHE_TTL, function () {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

            $xml .= '    <url><loc>' . $this->getUrl('/') . '</loc><changefreq>daily</changefreq><priority>1.0</priority></url>' . "\n";

            $pages = Page::where('status', 1)->get();
            foreach ($pages as $page) {
                $url = $this->getUrl(__url($page->page_slug));
                $lastmod = $page->updated_at ? $page->updated_at->toIso8601String() : Carbon::now()->toIso8601String();

                $xml .= '    <url>' . "\n";
                $xml .= '        <loc>' . htmlspecialchars($url) . '</loc>' . "\n";
                $xml .= '        <lastmod>' . $lastmod . '</lastmod>' . "\n";
                $xml .= '    </url>' . "\n";
            }

            $xml .= '</urlset>';
            return $xml;
        });
    }

    /**
     * Generate Categories Sitemap.
     */
    public function generateCategories()
    {
        return Cache::remember('sitemap_categories', self::CACHE_TTL, function () {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

            $categories = Category::where('status', 1)->get();
            foreach ($categories as $cat) {
                $url = $this->getUrl(__url($cat->slug));
                $lastmod = $cat->updated_at ? $cat->updated_at->toIso8601String() : Carbon::now()->toIso8601String();

                $xml .= '    <url>' . "\n";
                $xml .= '        <loc>' . htmlspecialchars($url) . '</loc>' . "\n";
                $xml .= '        <lastmod>' . $lastmod . '</lastmod>' . "\n";
                $xml .= '    </url>' . "\n";
            }

            $xml .= '</urlset>';
            return $xml;
        });
    }

    /**
     * Generate Google News Sitemap (Max 48 hours).
     */
    public function generateNews()
    {
        return Cache::remember('sitemap_news', self::CACHE_TTL, function () {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">' . "\n";

            $twoDaysAgo = Carbon::now()->subDays(2);
            
            $posts = NewsMst::where('status', 1)
                ->whereDate('publish_date', '<=', Carbon::today())
                ->where('created_at', '>=', $twoDaysAgo)
                ->orderBy('id', 'desc')
                ->limit(1000)
                ->get();

            foreach ($posts as $post) {
                $url = $this->getUrl(__url($post->encode_title));
                $published = $post->publish_date ? Carbon::parse($post->publish_date)->toIso8601String() : ($post->created_at ? $post->created_at->toIso8601String() : Carbon::now()->toIso8601String());
                $title = $post->title ?: $post->stitle;

                $xml .= '    <url>' . "\n";
                $xml .= '        <loc>' . htmlspecialchars($url) . '</loc>' . "\n";
                $xml .= '        <news:news>' . "\n";
                $xml .= '            <news:publication>' . "\n";
                $xml .= '                <news:name>khobor71</news:name>' . "\n";
                $xml .= '                <news:language>bn</news:language>' . "\n";
                $xml .= '            </news:publication>' . "\n";
                $xml .= '            <news:publication_date>' . $published . '</news:publication_date>' . "\n";
                $xml .= '            <news:title>' . htmlspecialchars($title) . '</news:title>' . "\n";
                $xml .= '        </news:news>' . "\n";
                $xml .= '    </url>' . "\n";
            }

            $xml .= '</urlset>';
            return $xml;
        });
    }

    /**
     * Generate Videos Sitemap.
     */
    public function generateVideos()
    {
        return Cache::remember('sitemap_videos', self::CACHE_TTL, function () {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

            $videos = VideoNews::where('status', 1)
                ->orderBy('id', 'desc')
                ->limit(self::PER_PAGE)
                ->get();

            foreach ($videos as $video) {
                $url = $this->getUrl(__url($video->encode_title));
                $lastmod = $video->updated_at ? $video->updated_at->toIso8601String() : Carbon::now()->toIso8601String();

                $xml .= '    <url>' . "\n";
                $xml .= '        <loc>' . htmlspecialchars($url) . '</loc>' . "\n";
                $xml .= '        <lastmod>' . $lastmod . '</lastmod>' . "\n";

                if ($video->thumbnail_image) {
                    $xml .= '        <image:image><image:loc>' . htmlspecialchars(asset('storage/' . $video->thumbnail_image)) . '</image:loc></image:image>' . "\n";
                }

                $xml .= '    </url>' . "\n";
            }

            $xml .= '</urlset>';
            return $xml;
        });
    }

    /**
     * Generate Opinions Sitemap.
     */
    public function generateOpinions()
    {
        return Cache::remember('sitemap_opinions', self::CACHE_TTL, function () {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

            $opinions = Opinion::where('status', 1)
                ->orderBy('id', 'desc')
                ->limit(self::PER_PAGE)
                ->get();

            foreach ($opinions as $opinion) {
                $url = $this->getUrl(__url($opinion->encode_title));
                $lastmod = $opinion->updated_at ? $opinion->updated_at->toIso8601String() : Carbon::now()->toIso8601String();

                $xml .= '    <url>' . "\n";
                $xml .= '        <loc>' . htmlspecialchars($url) . '</loc>' . "\n";
                $xml .= '        <lastmod>' . $lastmod . '</lastmod>' . "\n";

                if ($opinion->news_image) {
                    $xml .= '        <image:image><image:loc>' . htmlspecialchars(asset('storage/' . $opinion->news_image)) . '</image:loc></image:image>' . "\n";
                }

                $xml .= '    </url>' . "\n";
            }

            $xml .= '</urlset>';
            return $xml;
        });
    }

    /**
     * Generate Probashi News Sitemap.
     */
    public function generateProbashi()
    {
        return Cache::remember('sitemap_probashi', self::CACHE_TTL, function () {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

            $newsItems = ProbashiNews::where('status', 1)
                ->orderBy('id', 'desc')
                ->limit(self::PER_PAGE)
                ->get();

            foreach ($newsItems as $news) {
                $url = $this->getUrl(__url($news->encode_title));
                $lastmod = $news->updated_at ? $news->updated_at->toIso8601String() : Carbon::now()->toIso8601String();

                $xml .= '    <url>' . "\n";
                $xml .= '        <loc>' . htmlspecialchars($url) . '</loc>' . "\n";
                $xml .= '        <lastmod>' . $lastmod . '</lastmod>' . "\n";

                if ($news->thumbnail_image) {
                    $xml .= '        <image:image><image:loc>' . htmlspecialchars(asset('storage/' . $news->thumbnail_image)) . '</image:loc></image:image>' . "\n";
                }

                $xml .= '    </url>' . "\n";
            }

            $xml .= '</urlset>';
            return $xml;
        });
    }

    /**
     * Clear all sitemap caches
     */
    public function clearCaches()
    {
        Cache::forget('sitemap_index');
        Cache::forget('sitemap_pages');
        Cache::forget('sitemap_categories');
        Cache::forget('sitemap_news');
        Cache::forget('sitemap_videos');
        Cache::forget('sitemap_opinions');
        Cache::forget('sitemap_probashi');
        
        $totalPosts = NewsMst::where('status', 1)->whereDate('publish_date', '<=', Carbon::today())->count();
        $pages = ceil($totalPosts / self::PER_PAGE);

        for ($i = 1; $i <= $pages; $i++) {
            Cache::forget("sitemap_posts_{$i}");
        }
    }
}
