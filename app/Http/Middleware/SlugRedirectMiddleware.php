<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\RedirectSlug;

class SlugRedirectMiddleware
{
    public function handle($request, Closure $next)
    {
        $route = $request->route();
        $routeName = $route ? $route->getName() : null;

        // Middleware MUST run only after route is resolved
        if (!$routeName) {
            return $next($request);
        }

        // Last segment is the slug (product name, category name, etc.)
        $slug = last($request->segments());

        // Find redirect entry for this slug + this route
        $redirect = RedirectSlug::where('old_slug', $slug)
            ->where('route_name', $routeName)
            ->where('is_active', true)
            ->first();

        if ($redirect) {

            // 410 Gone (SEO safe)
            if (is_null($redirect->new_slug)) {
                return abort(410, "This page has been permanently removed");
            }

            // Loop protection
            if (RedirectSlug::causesLoop($redirect->old_slug, $redirect->new_slug)) {
                $redirect->deactivate();
                return $next($request);
            }

            // Log hits
            $redirect->hits++;
            $redirect->last_hit_at = now();
            $redirect->save();

            // Redirect using original route
            return redirect()->route($redirect->route_name, $redirect->new_slug, 301);
        }

        return $next($request);
    }
}
