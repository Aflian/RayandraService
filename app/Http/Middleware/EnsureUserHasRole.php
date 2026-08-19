<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, UserRole ...$roles): Response
    {
        if (! in_array($request->user()?->role, $roles, true)) {
            abort(403);
        }

        return $next($request);
    }
}
