<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class newLike extends Notification
{
    use Queueable;

    public $newLike, $comment;
    public function __construct($comment, $newLike)
    {
        $this->comment = $comment;
        $this->newLike = $newLike;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $likesNum = $this->comment->likes()->count();
        if ($likesNum > 1)
        {
            $content = auth()->user()->name." and +".$likesNum." others liked your comment.";
        }
        else
        {
            $content = auth()->user()->name." liked your comment.";
        }
        return [
            'subject' => "New like to your comment",
            'content' => $content,
            'comment' => $this->comment,
            'product_id' => $this->comment->product->id,
        ];
    }
}
