<?php

namespace App\Jobs;

use App\Models\Chapter;
use App\Notifications\ChapterBanForAuthor;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Notification;

class SendChapterBanNotificationJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Chapter $chapter)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $author = $this->chapter->story->users();

		Notification::send($author, new ChapterBanForAuthor($this->chapter));
    }
}
