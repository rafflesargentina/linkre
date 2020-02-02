<?php

namespace Raffles\Modules\Linkre\Notifications;

use Raffles\Modules\Linkre\Models\Investment;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvestmentsAssigned extends Notification
{
    use Queueable;

    protected $investments;

    /**
     * Create a new notification instance.
     *
     * array $investments The array of investments id.
     * @return void
     */
    public function __construct(array $investments)
    {
        $this->investments = Investment::whereIn('id', $investments)->get();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
                    ->subject('Tus inversiones asignadas fueron modificadas')
                    ->markdown('linkre::mail.investments-assigned', ['investments' => $this->investments]);
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
            //
        ];
    }
}
