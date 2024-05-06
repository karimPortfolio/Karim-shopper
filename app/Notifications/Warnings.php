<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Warnings extends Notification
{
    use Queueable;

    public $comment, $report_type = null;
    public function __construct($comment, $report_type=null)
    {
        $this->comment = $comment;
        $this->report_type = $report_type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
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
                    ->subject('Warning! comment has many reports')
                    ->greeting('Hello '.$notifiable->name)
                    ->line($this->getContent())
                    ->action('Visit dashboard', url(config('app.url').'/dashboard'))
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
        return [
            'subject' => 'Warning! comment has many reports',
            'content' => $this->getContent(),
            'comment' => $this->comment,
        ];
    }


    public function getContent()
    {
        $report_types_arr = [
            1 => "It's spam",
            2 => "Nudity or sexual activity",
            3 => "Hate speech or symbols",
            4 => "Violence or dangerous organiizations",
            5 => "Sale of illegal or regulated goods",
            6 => "Bullying or harassment",
            7 => "Intellectual property violation",
            8 => "False information",
            9 => "Something else",
        ];

        if ($this->report_type !== null)
        {
            return "Your comment in product ".$this->comment->product->product_name." has been deleted because of many reports and contains ".$report_types_arr[$this->report_type].".";
        }
        else
        {
            return "Your comment in product ".$this->comment->product->product_name." has been deleted because of many reports.";
        }
    }

}



