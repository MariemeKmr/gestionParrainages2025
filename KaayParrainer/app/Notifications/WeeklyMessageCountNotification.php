<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WeeklyMessageCountNotification extends Notification
{
    use Queueable;

    protected $messageCount;

    /**
     * Create a new notification instance.
     *
     * @param int $messageCount
     */
    public function __construct(int $messageCount)
    {
        $this->messageCount = $messageCount;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param object $notifiable
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database']; // Envoi par mail et en base de données
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param object $notifiable
     * @return MailMessage
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Vous avez ' . $this->messageCount . ' nouveaux messages cette semaine.')
                    ->action('Voir vos messages', url('/messages'))  // Remplacez par l'URL de votre application
                    ->line('Merci d\'utiliser notre application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param object $notifiable
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Vous avez ' . $this->messageCount . ' nouveaux messages cette semaine.',
            'type' => 'weekly_message_count',  // Le type de notification
        ];
    }
}
