<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeLanguage = strtolower((string) $request->route('lang', ''));
        $routeParam = strtolower((string) $request->route('param', ''));

        if ($routeLanguage === 'en') {
            abort(410);
        }

        if ($routeLanguage === 'bn') {
            $path = preg_replace('#^bn(?:/|$)#i', '', $request->path()) ?? '';
            $target = '/' . ltrim($path, '/');
            $query = $request->getQueryString();

            if ($query) {
                $target .= '?' . $query;
            }

            $status = in_array($request->method(), ['GET', 'HEAD'], true) ? 301 : 308;
            return redirect($target, $status);
        }

        if ($routeParam === 'en') {
            return redirect('/', 301);
        }

        if ($routeParam === 'bn') {
            return redirect('/', 301);
        }

        app()->setLocale('bn');

        return $next($request);
    }
}
