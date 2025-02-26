<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 * @throws RandomException
	 */
    public function definition(): array
    {
	    $startOfLastMonth = now()->subMonth()->startOfMonth();
	    $daysInLastMonth = now()->subMonth()->daysInMonth;
	    $randomDate = $startOfLastMonth->copy()->addDays(random_int(0, $daysInLastMonth - 1));
        return [
            'title' => $this->faker->sentence,
	        'description' => $this->faker->paragraph,
	        'status' => $this->faker->randomElement(['draft', 'published']),
	        'created_at'=> $randomDate,
        ];
    }
}
