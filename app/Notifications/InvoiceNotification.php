<?php

namespace App\Notifications;

use App\Core\Support\FirebaseNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoiceNotification extends Notification
{
    public function __construct(public array $title, public array $description, public int $invoice)
    {
    }

    public function via($notifiable): array
    {
        return ['database', "firebase"];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable): array
    {
        return [
            "title" => $this->title,
            'description' => $this->description,
            "additional" => $this->invoice
        ];
    }

    public function toFirebase($notifiable): void
    {
        FirebaseNotification::sendFirebaseNotification(
            device_token: $notifiable->device_token,
            title: $this->title[$notifiable->default_lang ?? "ar"],
            content: $this->description[$notifiable->default_lang ?? "ar"],
        );
    }
}
