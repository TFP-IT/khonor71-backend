<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PageCacheMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // 1. Bypass rules: only cache GET requests, no auth, no admin/login, no query strings
        if (
            $request->method() !== "GET" ||
            auth()->check() ||
            $request->is("admin*") ||
            $request->is("login") ||
            count($request->query()) > 0
        ) {
            return $next($request);
        }

        // 2. Generate cache key based on full URL
        $version = Cache::get('page_cache_version', 1);
        $key = "page_cache_{$version}_" . md5($request->fullUrl());

        // 3. Return from cache if exists
        if (Cache::has($key)) {
            $content = Cache::get($key);
            $token = csrf_token();
            if ($token) {
                $content = preg_replace(
                    '/<meta\s+name=["\']csrf-token["\']\s+content=["\'][^"\']*["\']/i',
                    '<meta name="csrf-token" content="' . $token . '"',
                    $content
                );
                $content = preg_replace(
                    '/(<input\b[^>]*?\bname=["\']_token["\'][^>]*?\bvalue=["\'])[^"\']*?(["\'][^>]*?>)/i',
                    '${1}' . $token . '${2}',
                    $content
                );
            }
            return response($content)->header("X-Page-Cache", "HIT");
        }

        // 4. Generate response and cache it
        $response = $next($request);

        // Only cache successful HTML responses
        if ($response->isSuccessful() && strpos($response->headers->get("Content-Type"), "text/html") !== false) {
            // Cache for 10 minutes (600 seconds)
            Cache::put($key, $response->getContent(), 600);
            $response->header("X-Page-Cache", "MISS");
        }

        return $response;
    }
}
