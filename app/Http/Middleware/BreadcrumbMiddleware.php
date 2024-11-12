<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class BreadcrumbMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if the previous URL is different from the current one
        if (session('current_url') !== url()->current()) {
            session(['previous_url' => session('current_url')]);
            session(['current_url' => url()->current()]);
        }

        return $next($request);
    }
}
