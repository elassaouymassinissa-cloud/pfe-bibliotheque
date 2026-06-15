<?php
use App\Models\User;
use App\Notifications\NewMessageNotification;

class MessageController extends controller{
public function send(){

    $user = User::find(1); // utilisateur concerné
    $user->notify(new NewMessageNotification());
}
}
