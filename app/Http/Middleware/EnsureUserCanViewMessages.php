<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserCanViewMessages
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if (! $user || (! $user->is_admin && ! ($user->can_view_messages ?? false))) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
