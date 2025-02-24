<?php

namespace App\Observers;

use App\Models\Chapter;

class ChapterObserver
{

	public function creating(Chapter $chapter): void
	{
		$chapter->chapter_number = $chapter->story->chapter_count + 1;
		$chapter->story->increment('chapter_count');
	}
    /**
     * Handle the Chapter "created" event.
     */
    public function created(Chapter $chapter): void
    {
        //
    }

    /**
     * Handle the Chapter "updated" event.
     */
    public function updated(Chapter $chapter): void
    {
        //
    }

    /**
     * Handle the Chapter "deleted" event.
     */
    public function deleted(Chapter $chapter): void
    {
        //
    }

    /**
     * Handle the Chapter "restored" event.
     */
    public function restored(Chapter $chapter): void
    {
        //
    }

    /**
     * Handle the Chapter "force deleted" event.
     */
    public function forceDeleted(Chapter $chapter): void
    {
        //
    }
}
