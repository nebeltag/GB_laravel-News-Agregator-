<?php

namespace App\Providers;

use App\Services\Interfaces\Parser;
use App\Services\Interfaces\Social;
use App\Services\Interfaces\StoreImage;
use App\Services\ParserService;
use App\Services\SocialService;
use App\Services\StoreImageService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(StoreImage::class, StoreImageService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
