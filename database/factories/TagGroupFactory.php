<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Random\RandomException;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TagGroup>
 */
class TagGroupFactory extends Factory
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
            'name' => $this->faker->name,
	        'created_at'=> $randomDate,
        ];
    }
}
