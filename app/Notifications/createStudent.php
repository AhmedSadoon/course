<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class createStudent extends Notification
{
    use Queueable;
    private $studentName,$cotent;

    /**
     * Create a new notification instance.
     */
    public function __construct($studentName,$cotent)
    {

        $this->studentName=$studentName;
        $this->cotent=$cotent;
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



    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [

            'studentName'=>$this->studentName,
            'cotent'=>$this->cotent,
        ];
    }
}
