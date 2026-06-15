<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BorrowedBook;
use App\Models\Book;
use App\Notifications\GenericNotification;
use Carbon\Carbon;

class AuthenticationController extends Controller
{
    public function showLoginForm(){
        return view('authentication.login');

    }

    public function showRegistrationForm(){
        return view('authentication.register');


    }

    public function registration(Request $request){
        $user = new User();
        $user->user_name = $request->user_name;
        $user->role_id = 3;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make(trim($request->password));
        $user->save();
        return redirect()->route('authentication.register.form')->with('success', 'Registration Successfully');


    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
     
        if (Auth::attempt($credentials) && Auth::user()->status == 1) {

           //inset notification:
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
          

            return redirect()->intended('/admin/dashboard')
                        ->withSuccess('You have Successfully login');
        }
  
        return redirect("login")->with('error','Email ou password incorect,ou votre compte est bloquer');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }

    public function contact(){
        return view('authentication.contact');
    }
}
