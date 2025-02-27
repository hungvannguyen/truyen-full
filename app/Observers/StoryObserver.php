<?php

namespace App\Observers;

use App\Enum\StoryStatus;
use App\Jobs\SendStoryApprovedNotificationJob;
use App\Jobs\SendStoryBanNotificationJob;
use App\Models\Story;
use Illuminate\Support\Str;

class StoryObserver
{

	public function creating(Story $story): void
	{
		if (empty($story->slug)) {
			$story->slug = Str::slug($story->title);
		}
	}

    /**
     * Handle the Story "created" event.
     */
    public function created(Story $story): void
    {
        //
    }

	public function updating(Story $story): void
	{
		if (empty($story->slug) || $story->isDirty('title')) {
			$story->slug = Str::slug($story->title);
		}
	}

    /**
     * Handle the Story "updated" event.
     */
    public function updated(Story $story): void
    {
        if ($story->isDirty('status') && $story->status->value === StoryStatus::APPROVED->value) {
			dispatch(new SendStoryApprovedNotificationJob($story));
		}

		if ($story->isDirty('status') && $story->status->value === StoryStatus::BAN->value) {
			dispatch(new SendStoryBanNotificationJob($story));
		}
    }

    /**
     * Handle the Story "deleted" event.
     */
    public function deleted(Story $story): void
    {
        //
    }

    /**
     * Handle the Story "restored" event.
     */
    public function restored(Story $story): void
    {
        //
    }

    /**
     * Handle the Story "force deleted" event.
     */
    public function forceDeleted(Story $story): void
    {
        //
    }
}
