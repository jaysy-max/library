<?php

namespace App\Notifications;
use App\Reserve;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApproveReservation extends Notification
{
    use Queueable;
    private $reserve;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Reserve $reserve)
    {
        $this->reserve = $reserve;
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'book_name' => $this->reserve['reserve_book_name'],
            'string1' => "Your reservation for",
            'string2' => "has been approved",
        ];
    }
}
