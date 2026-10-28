#!/bin/bash
# AI News Queue Worker starter
cd /var/www/khonor71-backend
php artisan queue:work database \
    --queue=ai-news,default \
    --sleep=3 \
    --tries=2 \
    --timeout=150 \
    --max-jobs=500 \
    --max-time=3600
