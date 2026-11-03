# AI News and SEO pipeline: setup

Flow: RSS feeds and Google Trends -> optional Custom Search research -> Gemma (Ollama) draft -> editor review -> CMS draft -> publish -> sitemap refresh and optional Google Indexing API ping.

## 1. Model server
Install Ollama (or vLLM) with `gemma3` on a GPU host, then set `GEMMA_API_BASE_URL`, `GEMMA_MODEL_NAME`, `AI_NEWS_MODEL_PROVIDER=ollama` (or `gemini` with `GEMINI_API_KEY`).

## 2. Enable the pipeline
Set `AI_NEWS_ENABLED=true`, then run `php artisan migrate`. Add RSS sources in the admin AI News screen. Hosts must be listed in `AI_NEWS_ALLOWED_FEED_HOSTS` (include `trends.google.com` for trends).

## 3. Google Trends and Custom Search (optional)
`AI_NEWS_TRENDS_ENABLED=true`, plus `AI_NEWS_TRENDS_LANGUAGE_ID` and `AI_NEWS_TRENDS_CATEGORY_ID` (ids from the CMS). For research context set `GOOGLE_SEARCH_API_KEY` and `GOOGLE_SEARCH_ENGINE_ID`. The free quota is 100 queries per day; `GOOGLE_SEARCH_MAX_QUERIES_PER_RUN` caps usage per ingest run.

## 4. Google Indexing API (optional)
1. Create a Google Cloud service account and download its JSON key to `storage/app/google-service-account.json` (never commit it).
2. In Search Console add the service account email as an owner of the property.
3. Set `GOOGLE_INDEXING_ENABLED=true`.
Google documents the Indexing API only for job posting and livestream pages, so the refreshed sitemap is the main signal for news. Keep this off unless you accept that.

## 5. Queue worker
The scheduler already runs `queue:work database --queue=ai-news,default`. For a persistent worker use Supervisor with `php artisan queue:work database --queue=ai-news,default --tries=3` (see `start-queue-worker.sh`).

## Editorial safeguards
Drafts always stay unpublished until an editor reviews and publishes them. The prompt forbids invented facts, and FAQ entries must come from the supplied source context.
