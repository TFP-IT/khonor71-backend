<?php

return [
    'enabled' => (bool) env('AI_NEWS_ENABLED', false),
    'queue_connection' => env('AI_NEWS_QUEUE_CONNECTION', 'database'),
    'model_provider' => env('AI_NEWS_MODEL_PROVIDER', 'ollama'),
    'daily_limit' => max(1, (int) env('AI_NEWS_DAILY_LIMIT', 5)),
    'allowed_feed_hosts' => array_values(array_filter(array_map(
        static fn ($host) => strtolower(trim($host)),
        explode(',', (string) env('AI_NEWS_ALLOWED_FEED_HOSTS', ''))
    ))),
    'max_feed_items' => max(1, (int) env('AI_NEWS_MAX_FEED_ITEMS', 20)),
    'max_feed_bytes' => max(65536, (int) env('AI_NEWS_MAX_FEED_BYTES', 2097152)),
    'feed_timeout' => max(3, (int) env('AI_NEWS_FEED_TIMEOUT', 15)),

    // Google Trends RSS signal ingestion. Candidates need a language and category.
    'trends' => [
        'enabled' => (bool) env('AI_NEWS_TRENDS_ENABLED', false),
        'geo' => env('AI_NEWS_TRENDS_GEO', 'BD'),
        'language_id' => (int) env('AI_NEWS_TRENDS_LANGUAGE_ID', 0),
        'category_id' => (int) env('AI_NEWS_TRENDS_CATEGORY_ID', 0),
        'max_items' => max(1, (int) env('AI_NEWS_TRENDS_MAX_ITEMS', 5)),
    ],

    // Google Programmable Search (Custom Search JSON API) used to enrich trend context.
    'google_search' => [
        'api_key' => env('GOOGLE_SEARCH_API_KEY'),
        'engine_id' => env('GOOGLE_SEARCH_ENGINE_ID'),
        'max_queries_per_run' => max(0, (int) env('GOOGLE_SEARCH_MAX_QUERIES_PER_RUN', 5)),
    ],

    // Google Indexing API notification after an article is published.
    'indexing' => [
        'enabled' => (bool) env('GOOGLE_INDEXING_ENABLED', false),
        'service_account_json' => env('GOOGLE_SERVICE_ACCOUNT_JSON_PATH', 'storage/app/google-service-account.json'),
    ],
];
