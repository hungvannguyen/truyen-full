<?php

namespace App\Observers;

use App\Models\Tag;
use App\Models\TagGroup;

class TagObserver
{
    /**
     * Handle the Tag "created" event.
     */
    public function created(Tag $tag): void
    {
        $tag->tagGroup()->increment('tag_count');
    }

    /**
     * Handle the Tag "updated" event.
     */
    public function updated(Tag $tag): void
    {
	    if ($tag->isDirty('tag_group_id')) {

		    $oldTagGroupId = $tag->getOriginal('tag_group_id');

		    TagGroup::where('id', $oldTagGroupId)->decrement('tag_count');

		    $tag->tagGroup()->increment('tag_count');
	    }

    }

    /**
     * Handle the Tag "deleted" event.
     */
    public function deleted(Tag $tag): void
    {
        $tag->tagGroup()->decrement('tag_count');
    }

    /**
     * Handle the Tag "restored" event.
     */
    public function restored(Tag $tag): void
    {
        //
    }

    /**
     * Handle the Tag "force deleted" event.
     */
    public function forceDeleted(Tag $tag): void
    {
        //
    }
}
