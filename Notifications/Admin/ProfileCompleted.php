<?php

namespace Raffles\Modules\Linkre\Notifications\Admin;

use Raffles\Modules\Linkre\Models\User;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ProfileCompleted extends Notification
{
    use Queueable;

    /**
     * The User model.
     *
     * @var User
     */
    protected $user;

    /**
     * Create a new notification instance.
     *
     * @param  User $user The User model.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
        $user = $this->user;
        $subject = 'El usuario "'.$user->email.'" completó su perfil';
        return (new MailMessage)
            ->subject($subject)
            ->greeting($notifiable->first_name.', el usuario "'.$user->name.'" con email: "'.$user->email.'" completó su perfil')
            ->line('Los datos ingresados son los siguientes:')
            ->action('Ir a "Inversores"', url('/admin/investors/'.$user->id.'/edit'));
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
