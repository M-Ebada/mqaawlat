<?php

namespace App\Notifications;

use App\Core\Support\FirebaseNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class GlobalNotification extends Notification
{
    use Queueable;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function via(object $notifiable): array
    {
        return ['database', 'firebase'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        //
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => $this->data['title'],
            'message' => $this->data['message'],
            'link' => $this->data['link'],
        ];
    }

    public function toFirebase($notifiable): void
    {
        FirebaseNotification::sendFirebaseNotification(
            device_token: $notifiable->device_token,
            title: $this->data["title"][$notifiable->default_lang],
            content: $this->data["message"][$notifiable->default_lang],
        );
    }
}
