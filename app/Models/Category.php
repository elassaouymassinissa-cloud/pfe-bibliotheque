<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    public function parentCategory(){
        return $this->belongsTo(Category::class, 'parent_id','id');
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

     protected static function booted()
    {
        static::deleting(function ($catalogue) {
            $catalogue->books()->delete();
        });
    }
}
