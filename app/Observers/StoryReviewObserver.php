<?php

namespace App\Observers;

use App\Jobs\ReplyNotificationJob;
use App\Models\StoryReview;
use App\Services\RatingService;

class StoryReviewObserver
{
	protected $ratingService;

	/**
	 * Inject RatingService qua constructor.
	 *
	 * @param RatingService $ratingService
	 */
	public function __construct(RatingService $ratingService)
	{
		$this->ratingService = $ratingService;
	}

	/**
	 * Calculate the rating when a new review is created.
	 *
	 * @param StoryReview $storyReview
	 */
	public function created(StoryReview $storyReview): void
	{
		if ($storyReview->rating > 0)
		{
			$story = $storyReview->story;
			$story->rating = $this->ratingService->getRating($story, $storyReview->rating);
			$story->increment('rating_count');
			$story->save();
		}
		if (!empty($storyReview->parent_id)) {
			dispatch(new ReplyNotificationJob($storyReview));
		}
	}

	/**
	 * Calculate the rating when a review is updated.
	 *
	 * @param StoryReview $storyReview
	 */
	public function updated(StoryReview $storyReview): void
	{
		$story = $storyReview->story;
		$oldRating = $storyReview->getOriginal('rating');
		$newRating = $storyReview->rating;
		$story->rating = $this->ratingService->updateRating($story, $oldRating, $newRating);
	}

	/**
	 * Calculate the rating when a review is deleted.
	 *
	 * @param StoryReview $storyReview
	 */
	public function deleted(StoryReview $storyReview): void
	{
		$story = $storyReview->story;
		$story->rating = $this->ratingService->removeRating($story, $storyReview->rating);
	}

	/**
	 *  Calculate the rating when a review is restored.
	 *
	 * @param StoryReview $storyReview
	 */
	public function restored(StoryReview $storyReview): void
	{
		$story = $storyReview->story;
		$story->rating = $this->ratingService->getRating($story, $storyReview->rating);
		$story->increment('rating_count');
		$story->save();
	}

	/**
	 * Calculate the rating when a review is force deleted.
	 *
	 * @param StoryReview $storyReview
	 */
	public function forceDeleted(StoryReview $storyReview): void
	{
		$story = $storyReview->story;
		$story->rating = $this->ratingService->removeRating($story, $storyReview->rating);
	}
}
