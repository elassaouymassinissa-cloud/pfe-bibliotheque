<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // 🔁 Relation One-to-One avec Catalogue
    public function rayon(){
            return $this->hasOne(rayon::class);
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class,);  // Un livre peut être emprunté plusieurs fois
    }

 
     
}
