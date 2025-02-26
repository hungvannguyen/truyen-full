<?php

namespace App\Providers;

use App\Models\Chapter;
use App\Models\Story;
use App\Models\StoryReview;
use App\Models\Tag;
use App\Models\TagGroup;
use App\Observers\ChapterObserver;
use App\Observers\StoryObserver;
use App\Observers\StoryReviewObserver;
use App\Observers\TagGroupObserver;
use App\Observers\TagObserver;
use App\Services\RatingService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('rating', function () {
			return new RatingService();
		});
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
	    Model::unguard();
		Story::observe(StoryObserver::class);
		Chapter::observe(ChapterObserver::class);
		Tag::observe(TagObserver::class);
		TagGroup::observe(TagGroupObserver::class);
		StoryReview::observe(StoryReviewObserver::class);
    }
}
