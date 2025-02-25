<?php

namespace App\Services;

use App\Models\Story;

class RatingService
{
	public function getRating(Story $story, $newRating): float
	{
		$ratingCount = $story->rating_count;

		return ($story->rating * $ratingCount + $newRating) / ($ratingCount + 1);
	}
}