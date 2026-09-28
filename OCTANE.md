# Laravel Octane Integration Guide — News365 (Khonor71 Backend)

This document describes the Laravel Octane setup, architecture, compatibility adaptations, development workflows, and production deployment procedures for this application.

---

## 1. Overview & Architecture

Laravel Octane supercharges application performance by booting the framework once in memory and serving incoming HTTP requests using high-performance long-running worker processes (via RoadRunner).

### System Specifications
* **Laravel Framework:** 13.33.0
* **PHP Version:** 8.4.25 (NTS, OPcache enabled)
* **Octane Package:** `laravel/octane` v2.20+
* **Octane Server Engine:** **RoadRunner** (Spiral RoadRunner CLI `2025.1.15`, Worker `v3.3.0`)
* **Database:** MySQL
* **Cache / Session Driver:** File / Redis supported
* **Queue Connection:** Sync / Redis supported

---

## 2. Why RoadRunner Was Selected

* **Direct Compatibility:** The server environment is Ubuntu Linux with standard PHP 8.4 CLI and Nginx/Valet.
* **Extension Preservation:** RoadRunner runs the existing standard PHP 8.4 CLI binary via process pipes/sockets. All installed PHP extensions (`pdo_mysql`, `gd`, `bcmath`, `curl`, `mbstring`, `fileinfo`, `zip`, etc.) work natively without special builds.
* **Infrastructure Safety:** FrankenPHP requires either a custom Caddy static binary with embedded PHP or compiling `libphp.so` against matching Caddy modules. RoadRunner integrates directly via Composer packages (`spiral/roadrunner-cli` and `spiral/roadrunner-http`) and a lightweight self-contained Go supervisor binary (`./rr`), avoiding invasive changes to the server's PHP installation.

---

## 3. Configuration Files

### 3.1 `config/octane.php`
* **Server:** `roadrunner` (configurable via `OCTANE_SERVER`).
* **Listeners:**
  * `OperationTerminated`:
    * `FlushOnce`: resets `once()` helper memoizations.
    * `FlushTemporaryContainerInstances`: clears scoped instances.
    * `DisconnectFromDatabases`: closes idle MySQL connections between requests to prevent stale connection timeouts.
    * `CollectGarbage`: runs garbage collection when worker memory crosses threshold.
  * `RequestTerminated`:
    * `FlushUploadedFiles`: purges temporary uploaded file pointers.
  * `WorkerStopping`:
    * `CloseMonologHandlers`: safely flushes and closes log file streams.
* **Flushed Services:**
  * `\App\Actions\Localizer::class`: ensures localization in-memory cache does not leak across requests.
* **Resource Limits:**
  * `garbage`: 50 MB threshold for automatic garbage collection (`OCTANE_GARBAGE_MB`).
  * `max_execution_time`: 30 seconds (`OCTANE_MAX_EXECUTION_TIME`).

### 3.2 `.rr.yaml`
* **Worker command:** `php vendor/bin/roadrunner-worker`
* **Address:** `0.0.0.0:${OCTANE_PORT:-8000}`
* **Middleware:** `static` (direct file serving from `public/`), `gzip`
* **Pool Settings:**
  * `num_workers`: `${OCTANE_WORKERS:-0}` (0 = automatically match CPU core count).
  * `max_jobs`: `${OCTANE_MAX_REQUESTS:-500}` (recycles worker after 500 requests to prevent any slow memory creep).
  * `max_worker_memory`: 128 MB per worker.
  * `supervisor`: health checks every 5 seconds, kills workers exceeding 128 MB or 30s execution TTL.

### 3.3 Environment Variables (`.env` and `.env.example`)
```env
# Laravel Octane Configuration
OCTANE_SERVER=roadrunner
OCTANE_PORT=8000
OCTANE_WORKERS=auto
OCTANE_MAX_REQUESTS=500
OCTANE_HTTPS=false
OCTANE_GARBAGE_MB=50
OCTANE_MAX_EXECUTION_TIME=30

# External Services
YOUTUBE_API_KEY=
YOUTUBE_PLAYLIST_ID=
FFMPEG_PATH=/usr/local/bin/ffmpeg
FFPROBE_PATH=/usr/local/bin/ffprobe
```

---

## 4. Octane Compatibility Fixes Applied

In a long-running worker environment, code running outside the request cycle or referencing static/singleton request state can cause cross-request leakage or null configuration values. The following fixes were implemented:

1. **`AppServiceProvider::boot()`**:
   * *Problem:* `View::share('themeSettings', ...)` was evaluated once at worker boot, freezing theme settings for the entire lifespan of the worker.
   * *Fix:* Converted to `View::composer('*', ...)` so theme settings are dynamically resolved per request while retaining request-level caching.
   * *Problem:* `$this->app['request']->server->set('HTTPS', 'on')` mutated the global boot-time request object.
   * *Fix:* Removed direct mutation; `URL::forceScheme('https')` handles HTTPS safely.

2. **Runtime `env()` to `config()` Conversions**:
   * *Problem:* In Octane and when running `php artisan config:cache`, `env()` calls in controllers and helpers return `null`.
   * *Fixes:*
     * `app/Helpers/Helpers.php`: `env('FILESYSTEM_DISK')` -> `config('filesystems.default')`
     * `app/Helpers/ImageHelper.php`: `env('FILESYSTEM_DISK')` -> `config('filesystems.default')`
     * `app/Http/Controllers/Website/ProbashiNewsController.php`: `env('FFMPEG_PATH')` / `env('FFPROBE_PATH')` -> `config('services.ffmpeg.*')`
     * `app/Providers/MailServiceConfigProvider.php`: `env('MAIL_*')` -> `config('mail.*')` and wrapped DB schema checks in `try-catch` to avoid bootstrap crashes.
     * `modules/VideoNews/Http/Controllers/VideoNewsController.php`: `env('APP_URL')` -> `config('app.url')`
     * `modules/Seo/Resources/views/script_manager.blade.php`: `env('REDIS_*')` / `env('CACHE_DRIVER')` / `env('ASSET_URL')` -> `config(...)`
     * `resources/views/sentry.blade.php`: `env('SENTRY_LARAVEL_DSN')` -> `config('services.sentry.dsn')`

3. **In-Memory Cache State Isolation**:
   * *Problem:* `App\Actions\Localizer` retains `$localData` in memory.
   * *Fix:* Added `App\Actions\Localizer::class` to Octane's `'flush'` list in `config/octane.php`.

---

## 5. Development Commands

### Start Octane (Standard)
```bash
php artisan octane:start
```

### Start with Auto-Reload on Code Change (File Watcher)
Requires Node.js `chokidar` (`npm install -g chokidar` or local installation):
```bash
php artisan octane:start --watch
```

### Check Server Status
```bash
php artisan octane:status
```

### Gracefully Reload Workers (No Downtime)
```bash
php artisan octane:reload
```

### Stop Octane
```bash
php artisan octane:stop
```

---

## 6. Production Deployment

### Option A: Systemd Service (Recommended)
A ready-to-use service unit is provided in `deployment/octane.service`.

1. Copy service file:
   ```bash
   sudo cp deployment/octane.service /etc/systemd/system/octane.service
   ```
2. Reload systemd daemon:
   ```bash
   sudo systemctl daemon-reload
   ```
3. Enable and start:
   ```bash
   sudo systemctl enable --now octane
   ```
4. Check status and logs:
   ```bash
   sudo systemctl status octane
   journalctl -u octane -f
   ```

### Option B: Supervisor
A supervisor configuration is provided in `deployment/supervisord-octane.conf`.

1. Copy config file:
   ```bash
   sudo cp deployment/supervisord-octane.conf /etc/supervisor/conf.d/octane.conf
   ```
2. Update supervisor:
   ```bash
   sudo supervisorctl reread
   sudo supervisorctl update
   sudo supervisorctl start octane:*
   ```

### Reverse Proxy (Nginx)
A production reverse proxy template is provided in `deployment/nginx-octane.conf`.
It proxies dynamic traffic to `http://127.0.0.1:8000` while allowing Nginx to serve static files (`.css`, `.js`, images) directly from disk with caching headers.

### Zero-Downtime Deployment Flow
Execute `deployment/deploy.sh` or integrate into your CI/CD pipeline:
```bash
./deployment/deploy.sh
```
This runs composer install, migrations, config cache, and executes `php artisan octane:reload`, which replaces worker processes with zero dropped connections.
