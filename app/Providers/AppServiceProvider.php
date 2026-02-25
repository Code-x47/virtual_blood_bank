<?php

namespace App\Providers;

use App\Repositories\CartInterface;
use App\Repositories\CartRepository;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CartInterface::class,CartRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Paginator::useBootstrapFive();

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
