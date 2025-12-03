<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    public const ADMIN = '/admin/dashboard';

    public const USER = '/';



    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {

            $this->publicApiRoutes();

            $this->webRoutes();

        });
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    private function apiVersion(): string
    {
        return "api/v1";
    }

    private function publicApiRoutes(): void
    {
        Route::middleware('api')
            ->prefix($this->apiVersion())
            ->group(base_path('routes/api.php'));

    }

    private function webRoutes(): void
    {
        Route::middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
            ->prefix(LaravelLocalization::setLocale())
            ->group(base_path('routes/web/admin.php'));

            Route::middleware(['web', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
            ->prefix(LaravelLocalization::setLocale())
            ->group(base_path('routes/web/web.php'));
    }

}
