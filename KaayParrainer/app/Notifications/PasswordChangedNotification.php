<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordChangedNotification extends Notification
{
    /**
     * The candidate's name.
     *
     * @var string
     */
    public $candidateName;

    /**
     * Create a new notification instance.
     *
     * @param  string  $candidateName
     * @return void
     */
    public function __construct($candidateName)
    {
        $this->candidateName = $candidateName;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail']; // Nous envoyons cette notification par mail
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
                    ->line('Bonjour, ' . $this->candidateName . '.')
                    ->line('Votre mot de passe a été modifié avec succès.')
                    ->line('Si vous n\'êtes pas à l\'origine de ce changement, veuillez contacter le support.');
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
            'message' => 'Votre mot de passe a été modifié.',
        ];
    }
}
