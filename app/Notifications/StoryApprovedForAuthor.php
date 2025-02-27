<?php

namespace App\Notifications;

use App\Models\Story;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StoryApprovedForAuthor extends Notification
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
				'title' => 'Truyện' .$this->story->title .  'của bạn đã được duyệt',
				'body' => 'Hãy nhấn nút Xuất bản để truyện của bạn được hiển thị trên trang chủ.',
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
