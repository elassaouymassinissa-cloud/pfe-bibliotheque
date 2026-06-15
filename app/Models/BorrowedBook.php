<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
  use HasFactory;
  // Dans BorrowedBook.php
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function livre()
  {
    return $this->belongsTo(Book::class, 'book_id'); // assure-toi que 'book_id' est bien la clé étrangère
  }

  public function book()
  {
    return $this->belongsTo(Book::class);
  }
}
