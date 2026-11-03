<?php

namespace Modules\News\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;

class GoogleTrendsService
{
    private const NS = 'https://trends.google.com/trending/rss';

    public function __construct(private readonly AiNewsHostPolicy $hostPolicy)
    {
    }

    /**
     * Returns trending topics as [title, url, snippet, published_at].
     */
    public function fetch(?string $geo = null, ?int $limit = null): array
    {
        $geo = strtoupper(preg_replace('/[^A-Za-z-]/', '', (string) ($geo ?: config('ai_news.trends.geo', 'BD'))));
        $limit ??= (int) config('ai_news.trends.max_items', 5);
        $url = $this->hostPolicy->assertAllowed('https://trends.google.com/trending/rss?geo=' . $geo);

        $response = Http::connectTimeout(10)
            ->timeout((int) config('ai_news.feed_timeout', 15))
            ->get($url);

        if (! $response->successful()) {
            throw new RuntimeException('Google Trends returned HTTP ' . $response->status());
        }
        if (strlen($response->body()) > (int) config('ai_news.max_feed_bytes', 2097152)) {
            throw new RuntimeException('Google Trends response exceeds the configured size limit.');
        }

        $previous = libxml_use_internal_errors(true);
        $xml = simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NONET | LIBXML_NOCDATA);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);
        if (! $xml || ! isset($xml->channel->item)) {
            throw new RuntimeException('Google Trends response is not a readable RSS feed.');
        }

        $topics = [];
        foreach ($xml->channel->item as $item) {
            $title = trim((string) $item->title);
            if ($title === '') {
                continue;
            }

            $ht = $item->children(self::NS);
            $newsItem = $ht->news_item[0] ?? null;
            $articleUrl = $newsItem ? trim((string) $newsItem->news_item_url) : '';
            $link = filter_var($articleUrl, FILTER_VALIDATE_URL) ? $articleUrl : trim((string) $item->link);
            if (! filter_var($link, FILTER_VALIDATE_URL)) {
                continue;
            }

            $topics[] = [
                'title' => Str::limit($title, 500, ''),
                'url' => $link,
                'snippet' => $newsItem ? Str::limit(trim(strip_tags((string) $newsItem->news_item_snippet)), 1000, '') : '',
                'published_at' => ($date = strtotime((string) $item->pubDate)) ? date('Y-m-d H:i:s', $date) : null,
            ];

            if (count($topics) >= $limit) {
                break;
            }
        }

        return $topics;
    }
}
