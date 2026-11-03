<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Http;
use Modules\News\Services\AiNewsHostPolicy;
use Modules\News\Services\AiNewsHtmlSanitizer;
use Modules\News\Services\GoogleCustomSearchService;
use Modules\News\Services\GoogleTrendsService;
use Tests\TestCase;

class AiNewsPipelineTest extends TestCase
{
    public function test_sanitizer_strips_scripts_attributes_and_unknown_tags(): void
    {
        $html = '<p onclick="x()">Hello <script>alert(1)</script><span style="x">world</span></p><h2>Title</h2><a href="javascript:x">link</a>';
        $clean = (new AiNewsHtmlSanitizer())->toSafeHtml($html);

        $this->assertStringNotContainsString('script', $clean);
        $this->assertStringNotContainsString('onclick', $clean);
        $this->assertStringNotContainsString('<span', $clean);
        $this->assertStringNotContainsString('<a ', $clean);
        $this->assertStringContainsString('<p>Hello world</p>', $clean);
        $this->assertStringContainsString('<h2>Title</h2>', $clean);
    }

    public function test_sanitizer_wraps_plain_text_paragraphs(): void
    {
        $clean = (new AiNewsHtmlSanitizer())->toSafeHtml("First <b>para</b>\n\nSecond");

        $this->assertSame("<p>First &lt;b&gt;para&lt;/b&gt;</p>\n<p>Second</p>", $clean);
    }

    public function test_custom_search_returns_empty_when_not_configured(): void
    {
        config(['ai_news.google_search.api_key' => '', 'ai_news.google_search.engine_id' => '']);
        Http::fake();

        $this->assertSame([], (new GoogleCustomSearchService())->search('topic'));
        Http::assertNothingSent();
    }

    public function test_custom_search_maps_results(): void
    {
        config(['ai_news.google_search.api_key' => 'k', 'ai_news.google_search.engine_id' => 'cx']);
        Http::fake(['www.googleapis.com/*' => Http::response(['items' => [
            ['title' => 'A <b>title</b>', 'snippet' => 'Snippet', 'link' => 'https://example.com/a'],
        ]])]);

        $results = (new GoogleCustomSearchService())->search('topic');

        $this->assertSame([['title' => 'A title', 'snippet' => 'Snippet', 'url' => 'https://example.com/a']], $results);
    }

    public function test_trends_service_parses_rss(): void
    {
        config(['ai_news.allowed_feed_hosts' => ['*']]);
        $rss = '<?xml version="1.0"?><rss xmlns:ht="https://trends.google.com/trending/rss" version="2.0"><channel>'
            . '<item><title>Topic One</title><pubDate>Mon, 03 Nov 2026 10:00:00 +0000</pubDate>'
            . '<ht:news_item><ht:news_item_title>T</ht:news_item_title><ht:news_item_snippet>Snip</ht:news_item_snippet>'
            . '<ht:news_item_url>https://example.com/news/1</ht:news_item_url></ht:news_item></item>'
            . '</channel></rss>';
        Http::fake(['trends.google.com/*' => Http::response($rss)]);

        // Host policy resolves DNS; stub it so the test is offline-safe.
        $policy = $this->createMock(AiNewsHostPolicy::class);
        $policy->method('assertAllowed')->willReturnArgument(0);

        $topics = (new GoogleTrendsService($policy))->fetch('BD', 5);

        $this->assertCount(1, $topics);
        $this->assertSame('Topic One', $topics[0]['title']);
        $this->assertSame('https://example.com/news/1', $topics[0]['url']);
        $this->assertSame('Snip', $topics[0]['snippet']);
    }
}
