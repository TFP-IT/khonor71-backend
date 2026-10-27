# AI-assisted news drafts

The pipeline creates private editorial candidates from administrator-approved RSS/Atom feeds. It does not publish articles, post to social networks, or call Google's Indexing API. An editor reviews each candidate, saves that review, imports it into the existing CMS as `status = 0`, then uses the normal news workflow to publish it.

## What it uses

- Existing CMS model: `App\Models\NewsMst` (`news_msts`) and its `PostSeoOnpage` metadata relation.
- Existing language and category records. Each feed is assigned one language and one category.
- Ollama's local `/api/generate` endpoint with a JSON response format.
- `simplepie/simplepie` already installed in this repository for RSS/Atom parsing.
- New `ai_news_sources` and `ai_news_candidates` tables for source configuration, deduplication, review state, and provenance.
- Existing news sitemap at `/sitemap_news.xml`; sitemap caches are cleared when an editor publishes or unpublishes a story.

The collector sends the RSS title and excerpt to Gemma. It does not fetch or scrape the linked article page. The source URL and excerpt remain visible to the editor for verification.

## Deployment setup

1. Choose `AI_NEWS_MODEL_PROVIDER=ollama` or `gemini`. For local Ollama, run the service where the worker can reach it, pull the selected model, and set `GEMMA_API_BASE_URL` and `GEMMA_MODEL_NAME`. For Ollama Cloud, use its API base URL and set `OLLAMA_API_KEY`; select a model available to your account. For Gemini, set `GEMINI_API_KEY` and `GEMINI_MODEL_NAME`. See the [Ollama Cloud API guide](https://ollama.com/blog/coding-models) and [Gemini API key](https://ai.google.dev/gemini-api/docs/generate-content/api-key), [model](https://ai.google.dev/gemini-api/docs/models), and [structured output](https://ai.google.dev/gemini-api/docs/generate-content/structured-output) docs. Keep both keys in the ignored `.env` file or a secrets manager, never in source control. The service accepts structured JSON and validates the returned fields before saving.
2. Set `AI_NEWS_ALLOWED_FEED_HOSTS` to exact, comma-separated feed hostnames that the newsroom has reviewed. Feed URLs must use HTTPS on port 443, resolve to public IP addresses, and cannot redirect. No hosts are allowed by default.
3. Run the migrations:

   ```sh
   php artisan migrate --path=modules/News/Database/Migrations/2026_10_27_120000_create_ai_news_pipeline_tables.php
   php artisan migrate --path=modules/News/Database/Migrations/2026_10_27_120100_create_ai_news_queue_tables.php
   php artisan migrate --path=modules/News/Database/Migrations/2026_10_27_120200_add_generation_attempts_to_ai_news_candidates.php
   ```

4. Configure `AI_NEWS_QUEUE_CONNECTION=database` (or `redis`), run a worker for that connection, and keep it supervised. This keeps AI jobs persistent without changing the queue behavior of other application work. Example for the database queue:

   ```sh
   php artisan queue:work database --queue=ai-news,default --sleep=3 --tries=2 --timeout=150
   ```

5. Keep Laravel's scheduler running every minute with `php artisan schedule:run`. AI feed collection is scheduled every ten minutes and is skipped while `AI_NEWS_ENABLED=false`.
6. Once Ollama, the queue worker, and the allowlist are ready, set `AI_NEWS_ENABLED=true`. Add a feed in **Admin → Post → AI RSS Sources**. Add only sources whose terms permit this use; feeds are disabled until an administrator enables them.
7. Use **AI News Review** to inspect source context, edit the generated draft, save the editorial review, and create an unpublished CMS draft. Publish it later through the existing CMS workflow.

`AI_NEWS_DAILY_LIMIT` defaults to 5 candidates per application day. Failed and rejected candidates count toward this cap. Each candidate has at most 5 total model attempts across queue retries and manual retries. An editor can regenerate an unreviewed draft or retry a failed one without creating another candidate. Duplicate source URLs are deduplicated across feeds.

Run the scheduler on one host. If multiple hosts can run scheduled or manual collection, configure them to share a lock-capable central Laravel cache store so the overlap lock and daily cap are coordinated.

The existing Google Indexing API sample is intentionally not implemented for news articles. Google's [Indexing API documentation](https://developers.google.com/search/apis/indexing-api/v3/quickstart) limits eligibility to job-posting and livestream pages. Khobor71's sitemap and Search Console remain the discovery path for ordinary news. The [News sitemap guidance](https://developers.google.com/search/docs/crawling-indexing/sitemaps/news-sitemap) sets the recent-news window and entry limit; sitemap submission does not guarantee crawl or indexing.

## Safety behavior

- The feature is off by default and no feed is seeded or enabled by default.
- Feed hosts require an exact environment allowlist match. Private/reserved addresses and redirects are rejected.
- RSS descriptions are stripped to plain text, bounded in length, and passed as untrusted input to the model.
- Generated article text is stored as plain text and escaped into paragraphs when imported to the CMS; model-generated HTML is never trusted.
- Candidates cannot be imported until a user with `update_news` permission saves a review. CMS import uses the existing `create_news` permission and forces unpublished status.
- CMS import disables auto-social-posting. Editors publish through the existing status control.
- Failed model output remains a failed candidate; malformed JSON or invalid fields never reach the CMS.
