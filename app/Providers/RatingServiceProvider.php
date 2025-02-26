<?php

namespace App\Providers;

use App\Services\RatingService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RatingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
		$this->app->bind('RatingService', function () {
			return new RatingService();
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
