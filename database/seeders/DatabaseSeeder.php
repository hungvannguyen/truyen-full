<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\ChapterReview;
use App\Models\Story;
use App\Models\StoryReview;
use App\Models\Tag;
use App\Models\TagGroup;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Random\RandomException;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @throws RandomException
	 */
	public function run(): void
	{
		// Tạo admin user
		User::factory()->create([
				'name'     => 'admin',
				'email'    => 'admin@gmail.com',
				'password' => bcrypt('secret'),
				'role'     => 'admin',
		]);

		$users = User::factory(10)->create();

		$nonAdminUserIds = User::where('role', '!=', 'admin')->pluck('id')->toArray();

		$tagGroups = TagGroup::factory(15)->create();

		$tagGroups->each(function ($tagGroup) {
			$tagGroup->tags()->saveMany(Tag::factory(random_int(2, 10))->make());
		});

		$allTags = Tag::all();

		$users->each(function ($user) use ($nonAdminUserIds, $allTags) {

			$stories = Story::factory(random_int(6, 20))->create();

			$stories->each(function ($story) use ($nonAdminUserIds, $allTags) {

				$tagCount = random_int(1, 5);
				$story->tags()->attach(
						$allTags->random($tagCount)->pluck('id')->toArray()
				);

				$parentReviews = StoryReview::factory(random_int(1, 10))->create([
						'story_id'  => $story->id,
						'user_id'   => Arr::random($nonAdminUserIds),
						'parent_id' => null,
				]);

				foreach ($parentReviews as $review) {
					if (random_int(1, 100) <= 30) {
						StoryReview::factory(random_int(1, 3))->create([
								'story_id'  => $story->id,
								'user_id'   => Arr::random($nonAdminUserIds),
								'parent_id' => $review->id,
						]);
					}
				}
			});

			$user->stories()->attach($stories->pluck('id')->toArray());

			$stories->each(function ($story) use ($nonAdminUserIds) {

				$chapterCount = random_int(10, 20);
				$chapters = Chapter::factory()
						->count($chapterCount)
						->sequence(fn ($sequence) => ['chapter_number' => $sequence->index + 1])
						->create([
								'story_id' => $story->id,
						]);

				$parentChapterReviews = ChapterReview::factory(random_int(1, 10))->create([
						'story_id'   => $story->id,
						'chapter_id' => $chapters->random()->id,
						'user_id'    => Arr::random($nonAdminUserIds),
						'parent_id'  => null,
				]);

				foreach ($parentChapterReviews as $review) {
					if (random_int(1, 100) <= 30) {
						ChapterReview::factory(random_int(1, 3))->create([
								'story_id'   => $story->id,
								'chapter_id' => $chapters->random()->id,
								'user_id'    => Arr::random($nonAdminUserIds),
								'parent_id'  => $review->id,
						]);
					}
				}
			});
		});
	}
}
