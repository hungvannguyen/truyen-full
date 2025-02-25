<?php

namespace App\Observers;

use App\Models\TagGroup;
use Illuminate\Support\Str;

class TagGroupObserver
{

	public function creating(TagGroup $tagGroup): void
	{
		if (empty($tagGroup->slug)) {
			$tagGroup->slug = Str::slug($tagGroup->name);
		}
	}

    /**
     * Handle the TagGroup "created" event.
     */
    public function created(TagGroup $tagGroup): void
    {
        //
    }

	public function updating(TagGroup $tagGroup): void
	{
		if (empty($tagGroup->slug) || $tagGroup->isDirty('name')) {
			$tagGroup->slug = Str::slug($tagGroup->name);
		}
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
