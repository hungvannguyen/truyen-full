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

	public function test_review(): void
	{
		$user = User::factory()->create();

		$stories = Story::factory()->count(10)->create();

		$user->stories()->attach($stories);

		foreach ($stories as $story) {
			$chaptersData = Chapter::factory()->count(5)->make()->toArray();
			$story->chapters()->createMany($chaptersData);
		}

		$stories = $user->stories()->with('chapters')->get();

		$stories->each(function ($story) use ($user) {
			StoryReview::factory()->count(3)->create([
					'story_id' => $story->id,
					'user_id'  => $user->id,
			]);

			$story->chapters->each(function ($chapter) use ($user) {
				ChapterReview::factory()->count(3)->create([
						'story_id'   => $chapter->story->id,
						'chapter_id' => $chapter->id,
						'user_id'    => $user->id,
				]);
			});
		});

		$this->assertDatabaseCount('story_reviews', 30);
		$this->assertDatabaseCount('chapter_reviews', 150);
	}
}
