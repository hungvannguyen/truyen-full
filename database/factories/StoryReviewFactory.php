<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoryReview>
 */
class StoryReviewFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 * @throws RandomException
	 */
    public function definition(): array
    {
        return [
            'rating' => $this->faker->numberBetween(1, 5),
			'content' => $this->faker->paragraph,
	        'created_at'=> now()->subDays(random_int(0, 30)),
        ];
    }
}
