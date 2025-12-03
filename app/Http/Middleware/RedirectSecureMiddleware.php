<?php
namespace App\Http\Middleware;

use Closure;

class RedirectSecureMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && $request->header('X-Forwarded-Proto') !== 'https' && env("APP_ENV") == 'production') {
             return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
