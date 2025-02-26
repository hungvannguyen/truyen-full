<?php

namespace App\Observers;

use App\Models\ChapterReview;
use App\Services\RatingService;

class ChapterReviewObserver
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
     * Handle the ChapterReview "created" event.
     */
    public function created(ChapterReview $chapterReview): void
    {
	    $chapter = $chapterReview->chapter;
	    $chapter->rating = $this->ratingService->getRating($chapter, $chapterReview->rating);
	    $chapter->increment('rating_count');
	    $chapter->save();
    }

    /**
     * Handle the ChapterReview "updated" event.
     */
    public function updated(ChapterReview $chapterReview): void
    {
	    $chapter = $chapterReview->chapter;
	    $oldRating = $chapterReview->getOriginal('rating');
	    $newRating = $chapterReview->rating;
	    $chapter->rating = $this->ratingService->updateRating($chapter, $oldRating, $newRating);
    }

    /**
     * Handle the ChapterReview "deleted" event.
     */
    public function deleted(ChapterReview $chapterReview): void
    {
	    $chapter = $chapterReview->chapter;
	    $chapter->rating = $this->ratingService->removeRating($chapter, $chapterReview->rating);
    }

    /**
     * Handle the ChapterReview "restored" event.
     */
    public function restored(ChapterReview $chapterReview): void
    {
	    $chapter = $chapterReview->chapter;
	    $chapter->rating = $this->ratingService->getRating($chapter, $chapterReview->rating);
	    $chapter->increment('rating_count');
	    $chapter->save();
    }

    /**
     * Handle the ChapterReview "force deleted" event.
     */
    public function forceDeleted(ChapterReview $chapterReview): void
    {
	    $chapter = $chapterReview->chapter;
	    $chapter->rating = $this->ratingService->removeRating($chapter, $chapterReview->rating);
    }
}
