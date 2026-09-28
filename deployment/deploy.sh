#!/usr/bin/env bash
# Zero-Downtime Deployment Script for Laravel Octane
set -e

echo "==> Deploying updates..."

# 1. Enter maintenance mode (optional, only if migrations have destructive changes)
# php artisan down --render="errors::503" --retry=60

# 2. Pull latest code
# git pull origin main

# 3. Install/update Composer dependencies
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# 4. Run database migrations
php artisan migrate --force

# 5. Clear and cache configuration, routes, and views
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# 6. Gracefully reload Octane workers (zero downtime!)
php artisan octane:reload

# 7. Restart queue workers
php artisan queue:restart

# 8. Bring application up if down was called
# php artisan up

echo "==> Deployment completed successfully with zero downtime!"
