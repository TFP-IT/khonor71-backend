<?php

namespace Modules\News\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Throwable;

class GoogleCustomSearchService
{
    public function isConfigured(): bool
    {
        return (string) config('ai_news.google_search.api_key') !== ''
            && (string) config('ai_news.google_search.engine_id') !== '';
    }

    /**
     * Returns up to $limit results as [title, snippet, url].
     */
    public function search(string $query, int $limit = 5): array
    {
        if (! $this->isConfigured() || trim($query) === '') {
            return [];
        }

        try {
            $response = Http::acceptJson()
                ->connectTimeout(5)
                ->timeout(15)
                ->get('https://www.googleapis.com/customsearch/v1', [
                    'key' => config('ai_news.google_search.api_key'),
                    'cx' => config('ai_news.google_search.engine_id'),
                    'q' => Str::limit($query, 200, ''),
                    'num' => max(1, min(10, $limit)),
                ]);

            if (! $response->successful()) {
                Log::warning('Google Custom Search returned HTTP ' . $response->status());
                return [];
            }

            return collect($response->json('items', []))
                ->take($limit)
                ->map(static fn ($item) => [
                    'title' => Str::limit(trim(strip_tags((string) ($item['title'] ?? ''))), 200, ''),
                    'snippet' => Str::limit(trim(strip_tags((string) ($item['snippet'] ?? ''))), 400, ''),
                    'url' => (string) ($item['link'] ?? ''),
                ])
                ->filter(static fn ($item) => $item['title'] !== '' && $item['url'] !== '')
                ->values()
                ->all();
        } catch (Throwable $exception) {
            Log::warning('Google Custom Search failed: ' . $exception->getMessage());
            return [];
        }
    }

    public function contextFor(string $query, int $limit = 5): string
    {
        return collect($this->search($query, $limit))
            ->map(static fn ($item) => "- {$item['title']}: {$item['snippet']} ({$item['url']})")
            ->implode("\n");
    }
}
