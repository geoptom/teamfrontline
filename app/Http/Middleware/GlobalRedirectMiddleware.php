<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\RedirectSlug;

class GlobalRedirectMiddleware
{
    public function handle($request, Closure $next)
    {
        // Full path: "about", "about-us", "contact/form"
        $fullPath = trim($request->path(), '/');

        // Only look for FULL URL redirects (model = "url")
        $redirect = RedirectSlug::where('model', 'url')
            ->where('old_path', $fullPath)
            ->where('is_active', true)
            ->first();

        if ($redirect) {

            // 410 Gone (SEO safe)
            if (is_null($redirect->new_path)) {
                return abort(410, "This page has been permanently removed");
            }

            // Log hits
            $redirect->hits++;
            $redirect->last_hit_at = now();
            $redirect->save();

            return redirect('/' . $redirect->new_path, 301);
        }

        return $next($request);
    }
}
