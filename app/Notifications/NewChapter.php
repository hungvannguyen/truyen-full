<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewChapter extends Notification
{
    use Queueable;

	protected $chapter;
	protected $story;

    /**
     * Create a new notification instance.
     */
    public function __construct($chapter, $story)
    {
        $this->chapter = $chapter;
		$this->story = $story;
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

//    /**
//     * Get the mail representation of the notification.
//     */
//    public function toMail(object $notifiable): MailMessage
//    {
//        return (new MailMessage)
//                    ->line('The introduction to the notification.')
//                    ->action('Notification Action', url('/'))
//                    ->line('Thank you for using our application!');
//    }

	public function toDatabase(object $notifiable): array
	{
		return [
				'title'         => $this->story->title . ' đã có chương mới',
				'chapter_title' => $this->chapter->title,
				'body'          => 'Truyện "' . $this->story->title . '" vừa cập nhật chương "' . $this->chapter->title . '".',
				'url'           => url('/stories/' . $this->story->slug . '/chapters/' . $this->chapter->id)
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
