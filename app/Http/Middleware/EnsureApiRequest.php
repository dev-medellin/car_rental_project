<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureApiRequest
{
    public function handle(Request $request, Closure $next)
    {
        // Example: Check if the request is an API request
        if ($request->is('api/*')) {
            // Perform API-specific checks (like authorization, token validation, etc.)
            if (!$request->expectsJson()) {
                return response()->json(['message' => 'Not an API request.'], 406);
            }

            // Example: Check authorization
            // if (!$request->header('Authorization')) {
            //     return response()->json(['message' => 'Unauthorized'], 401);
            // }
        }

        return $next($request);
    }
}


