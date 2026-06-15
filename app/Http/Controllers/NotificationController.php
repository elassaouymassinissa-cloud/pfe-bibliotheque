<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BorrowedBook;
use App\Models\Book;
use App\Models\user;
use App\Notifications\GenericNotification;
use Carbon\Carbon;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    // Affiche toutes les notifications de l'utilisateur authentifié
    public function index()
    {
        if (auth()->check()) {
         
              $today = Carbon::today();
              $threeDaysLater = Carbon::today()->addDays(3);
              // Récupère les emprunts expirés non notifiés
              $borrows = BorrowedBook::where('return_date', '<', $threeDaysLater )
                  ->where('is_notified', false) // Assurer que la notification n'a pas encore été envoyée
                  ->with('user', 'livre') 
                  ->get();
      
              foreach ($borrows as $borrow) {
                  $user = $borrow->user;
                  $livre = $borrow->livre; // Si la relation livre existe

                  if (!$livre) {
                    // Optionnel : tu peux logger l'erreur ou notifier un admin
                    logger("Livre manquant pour l'emprunt ID: {$borrow->id}");
                    continue; // On saute cet emprunt, car le livre a été supprimé
                  }

                  if (!$user) {
                    logger("Utilisateur manquant pour l'emprunt ID: {$borrow->id}");
                    continue;
                  }
                
                  $message = "Il vous reste 3 jours pour rendre le livre « {$livre->title} »
                   La date limite de retour est le {$borrow->return_date}. 
                    Veuillez le rendre avant cette date pour éviter l'amende";
                
              
                 $user->notify(new GenericNotification($message));
      
                  // Marquer l'emprunt comme notifié
                  $borrow->is_notified = true;
                  $borrow->save();
              }
            //end notification
           
           $notifications = auth()->user()->notifications;
            $this->markNotificationsAsRead(); // Marquer les notifications comme lues

            return view('notifications.ll', compact('notifications'));
        }

        return redirect()->route('login'); // Redirige si l'utilisateur n'est pas connecté
    }
    

    // NotificationController.php
    public function getUnreadNotifications()
   {
    if (auth()->check()) {
    // Récupère les notifications non lues de l'utilisateur authentifié
    $notifications = auth()->user()->unreadNotifications;

    $this->markNotificationsAsRead(); 

    return response()->json($notifications);
     }
   }


    // Marquer toutes les notifications non lues comme lues
    private function markNotificationsAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }


   public function destroy($id)
    {
    

    $notification = DatabaseNotification::findOrFail($id);

    $notification->delete();

    return redirect()->back()->with('success', 'Notification supprimée.');
}





 }


    




