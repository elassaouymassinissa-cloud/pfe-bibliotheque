<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    // Si tu as une relation "appartient à" avec User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Si tu as une relation "appartient à" avec Book
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}

