<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

/* NewMessageNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['database']; // Notification stockée en base
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Vous avez reçu un nouveau message.',
        ];
    }
}*/
