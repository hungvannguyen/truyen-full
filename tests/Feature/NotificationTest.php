<?php

namespace Tests\Feature;

use App\Enum\StoryStatus;
use App\Models\Chapter;
use App\Models\Story;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotificationTest extends TestCase
{
	public function test_notification(): void
	{
		$user = User::factory(10)->create();

		$author = User::factory()->create();

		$story = $author->stories()->create(
				Story::factory()->make(
						['status' => 'published']
				)->toArray()
		);

		$story->refresh();

		$user->each(function ($user) use ($story) {
			$user->follows()->attach($story->id);
		});

		$chapter = $story->chapters()->create(
				Chapter::factory()->make(
						['status' => 'draft']
				)->toArray()
		);

		$chapter->refresh();

		$this->assertEquals('draft', $chapter->status->value);

		$chapter->update([
				'status' => StoryStatus::PUBLISHED->value,
		]);

		$chapter->refresh();

		$this->artisan('queue:work --once');

		$this->assertDatabaseCount('notifications', 10);
	}
}
