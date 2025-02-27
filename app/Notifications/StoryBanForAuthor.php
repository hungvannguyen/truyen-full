<?php

namespace App\Notifications;

use App\Models\Story;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StoryBanForAuthor extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Story $story)
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
				'title' => 'Truyện' .$this->story->title .  'của bạn đã bị khóa',
				'body' => 'Do vi phạm một số điều khoản của chúng tôi, truyện của bạn đã bị khóa. Hãy liên hệ với chúng tôi để biết thêm chi tiết.',
				'url' => url('/stories/' . $this->story->slug)
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
