<?php

namespace App\Notifications;

use App\Models\Chapter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChapterBanForAuthor extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Chapter $chapter)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

	public function toDatabase(object $notifiable): array
	{
		return [
				'title' => 'Chương ' .$this->chapter->chapter_number .' của truyện' .$this->chapter->story->title .  'của bạn đã bị khóa',
				'body' => 'Do vi phạm một số điều khoản của chúng tôi, chương của bạn đã bị khóa. Hãy liên hệ với chúng tôi để biết thêm chi tiết.',
				'url' => url('/stories/' . $this->chapter->story->slug . '/chapters/' . $this->chapter->id)
		];
	}

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
