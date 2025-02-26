<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapter>
 */
class ChapterFactory extends Factory
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
            'chapter_number' => $this->faker->randomDigit,
	        'title' => $this->faker->sentence,
	        'content' => $this->faker->paragraph,
	        'status' => $this->faker->randomElement(['draft', 'published']),
	        'created_at'=> now()->subDays(random_int(0, 30)),
        ];
    }
}
