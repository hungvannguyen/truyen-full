<?php

namespace App\Observers;

use App\Models\TagGroup;

class TagGroupObserver
{
    /**
     * Handle the TagGroup "created" event.
     */
    public function created(TagGroup $tagGroup): void
    {
        //
    }

    /**
     * Handle the TagGroup "updated" event.
     */
    public function updated(TagGroup $tagGroup): void
    {
        //
    }

    /**
     * Handle the TagGroup "deleted" event.
     */
    public function deleted(TagGroup $tagGroup): void
    {
        //
    }

    /**
     * Handle the TagGroup "restored" event.
     */
    public function restored(TagGroup $tagGroup): void
    {
        //
    }

    /**
     * Handle the TagGroup "force deleted" event.
     */
    public function forceDeleted(TagGroup $tagGroup): void
    {
        //
    }
}
