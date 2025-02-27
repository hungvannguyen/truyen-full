<?php

namespace App\Jobs;

use App\Models\Chapter;
use App\Models\Story;
use App\Notifications\NewChapter;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendNewChapterNotificationJob implements ShouldQueue
{
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     */
    public function __construct(public Chapter $chapter, public Story $story)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $followers = $this->story->follows;
		Notification::send($followers, new NewChapter($this->chapter, $this->story));
    }
}
