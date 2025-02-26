<?php

namespace Tests\Feature;

use App\Models\Chapter;
use App\Models\ChapterReview;
use App\Models\Story;
use App\Models\StoryReview;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReviewTest extends TestCase
{

    /**
     * A basic feature test example.
     */
    public function review_test(): void
    {
	    $user = User::factory()->create();

	    $storiesData = Story::factory()->count(10)->make()->each(function ($story) {
		    $story->chapters = Chapter::factory()->count(5)->make()->toArray();
	    })->toArray();

	    $user->stories()->createMany($storiesData);

	    $stories = $user->stories()->with('chapters')->get();

	    $stories->each(function ($story) {
		    StoryReview::factory()->count(3)->create([
				    'story_id'     => $story->id,
			        'user_id'      => $story->user_id,
		    ]);

		    $story->chapters->each(function ($chapter) {
			    ChapterReview::factory()->count(3)->create([
					    'chapter_id'   => $chapter->id,
				        'user_id'      => $chapter->user_id,
			    ]);
		    });
	    });

	    $this->assertDatabaseCount('story_reviews', 30);
	    $this->assertDatabaseCount('chapter_reviews', 150);
    }
}
