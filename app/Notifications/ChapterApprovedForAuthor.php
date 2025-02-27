<?php

namespace App\Notifications;

use App\Models\Chapter;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChapterApprovedForAuthor extends Notification
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
				'title' => 'Truyện' .$this->chapter->title .  'của bạn đã được duyệt',
				'body' => 'Hãy nhấn nút Xuất bản để truyện của bạn được hiển thị trên trang chủ.',
				'url' => url('/stories/' . $this->chapter->slug ?? $this->chapter->id)
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
