<?php

namespace Tests\Feature;

use App\Models\Chapter;
use App\Models\Story;
use App\Models\Tag;
use App\Models\TagGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Create extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function slug_generate(): void
    {
        Story::factory()->create([
			'title' => 'Hello World',
		]);

		$this->assertDatabaseHas('stories', [
			'slug' => 'hello-world',
		]);

		Chapter::factory()->create([
			'title' => 'Hello World',
		]);

		$this->assertDatabaseHas('chapters', [
			'slug' => 'hello-world',
		]);

		TagGroup::factory()->create([
			'name' => 'Hello World',
		]);

		$this->assertDatabaseHas('tag_groups', [
			'slug' => 'hello-world',
		]);

		Tag::factory()->create([
			'name' => 'Hello World',
		]);

		$this->assertDatabaseHas('tags', [
			'slug' => 'hello-world',
		]);
    }

	public function test_count(): void
	{
		$story = Story::factory()->create();

		$story->chapters()->createMany(
			Chapter::factory()->count(5)->make()->toArray()
		);

		$story->refresh();

		$this->assertEquals(5, $story->chapter_count);

		$tagGroup = TagGroup::factory()->create();

		$tagGroup->tags()->createMany(
			Tag::factory()->count(5)->make()->toArray()
		);

		$tagGroup->refresh();

		$this->assertEquals(5, $tagGroup->tag_count);
	}
}
