<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
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
        // Get locale from session, default to 'sq' (Albanian)
        $locale = session('locale', 'sq');
        
        // Validate locale is one of the supported languages
        if (in_array($locale, ['en', 'de', 'sq'])) {
            App::setLocale($locale);
        } else {
            App::setLocale('sq');
        }

        return $next($request);
    }
}
