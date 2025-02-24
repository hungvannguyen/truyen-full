<?php

namespace App\Providers;

use App\Models\Chapter;
use App\Models\Story;
use App\Models\Tag;
use App\Models\TagGroup;
use App\Observers\ChapterObserver;
use App\Observers\StoryObserver;
use App\Observers\TagGroupObserver;
use App\Observers\TagObserver;
use Illuminate\Database\Eloquent\Model;
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
    public function boot(): void
    {
        //
	    Model::unguard();
		Story::observe(StoryObserver::class);
		Chapter::observe(ChapterObserver::class);
		Tag::observe(TagObserver::class);
		TagGroup::observe(TagGroupObserver::class);
    }
}
