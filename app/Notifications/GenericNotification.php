<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class GenericNotification extends Notification
{
    use Queueable;

    public $message;

    // Le constructeur prend le message de la notification
    public function __construct($message)
    {
        $this->message = $message;
    }

    // Définit les canaux de notification
    public function via($notifiable)
    {
        return ['database']; // Enregistrement dans la base de données
    }

    // Structure des données envoyées dans la table `notifications`
    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
            //'url' => url('/emprunts'), // Exemple de lien vers une page spécifique
        ];
    }
}
