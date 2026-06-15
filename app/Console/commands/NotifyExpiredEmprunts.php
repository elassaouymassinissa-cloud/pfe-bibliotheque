<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BorrowedBook;
use App\Models\Book;
use App\Models\user;
use App\Notifications\GenericNotification;
use Carbon\Carbon;

class NotifyExpiredEmprunts extends Command
{

    
    protected $signature = 'notify:expired-borrows';
    protected $description = 'Notifier les utilisateurs dont les emprunts ont expiré';

    public function handle()
    {
       
        $threeDaysLater = Carbon::today()->addDays(3);
        
        // Récupère les emprunts expirés non notifiés
        $borrows = BorrowedBook::where('return_date', '<', $threeDaysLater)
            ->where('is_notified', false) // Assurer que la notification n'a pas encore été envoyée
            ->with('user', 'livre') 
            // Récupérer l'utilisateur qui a emprunté le livre
            ->get();

        foreach ($borrows as $borrow) {
            $user = $borrow->user;
            $livre = $borrow->livre; // Si la relation livre existe
            if (!$user || !$livre) continue;
           

            $message = "Il vous reste 3 jours pour rendre le livre « {$livre->title} »
               La date limite de retour est le {$borrow->return_date}. 
               Veuillez le rendre avant cette date pour éviter l'amende";

          
           $user->notify(new GenericNotification($message));
           
            // Marquer l'emprunt comme notifié
            $borrow->is_notified = true;
            $borrow->save();
        }

        $this->info("Notifications envoyées avec succès.");
    }
  }
