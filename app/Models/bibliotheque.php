<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bibliotheque extends Model
{
    use HasFactory;

    protected $fillable = [
        'Num',
        'Nom',
        'Adress',
        'Nom_Faculté',
        'Adress_Email',
    ];

    // 🔁 Relation One-to-Many avec Rayon (composition)
    public function rayons()
    {
        return $this->hasMany(Rayon::class);
    }

    // 🔁 Relation One-to-One avec Catalogue
    public function category()
    {
        return $this->hasOne(Category::class);
    }

    // 🧹 Suppression en cascade des rayons (composition)
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($bibliotheque) {
            $bibliotheque->rayons()->delete();
            $bibliotheque->category()->delete(); // Si tu veux aussi supprimer le catalogue associé
        });
    }
}
