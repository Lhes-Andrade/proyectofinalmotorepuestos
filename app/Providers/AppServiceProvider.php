<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(UrlGenerator $url): void
    {
        // Render termina el SSL antes de que la petición llegue a Laravel,
        // así que forzamos HTTPS en las URLs generadas (assets, rutas, etc.)
        if (env('APP_ENV') === 'production') {
            $url->forceScheme('https');
        }
    }
}