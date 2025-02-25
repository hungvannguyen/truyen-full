<?php

namespace App\Observers;

use App\Models\Tag;
use App\Models\TagGroup;
use Illuminate\Support\Str;

class TagObserver

{

	public function creating(Tag $tag): void
	{
		if (empty($tag->slug)) {
			$tag->slug = Str::slug($tag->name);
		}
	}

    /**
     * Handle the Tag "created" event.
     */
    public function created(Tag $tag): void
    {
        $tag->tagGroup()->increment('tag_count');
    }

	public function updating(Tag $tag): void
	{
		if (empty($tag->slug) || $tag->isDirty('name')) {
			$tag->slug = Str::slug($tag->name);
		}
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
