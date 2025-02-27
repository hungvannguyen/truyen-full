<?php

namespace App\Jobs;

use App\Models\Story;
use App\Notifications\StoryApprovedForAuthor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Notification;

class SendStoryApprovedNotificationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Story $story)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $author = $this->story->users();

		Notification::send($author, new StoryApprovedForAuthor($this->story));
    }
}
