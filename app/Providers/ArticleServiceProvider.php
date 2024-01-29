<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ArticleService;

class ArticleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ArticleService::class, function ($app) {
            return new ArticleService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
