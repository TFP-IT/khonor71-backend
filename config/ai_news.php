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
];
