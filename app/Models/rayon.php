<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rayon extends Model
{
    use HasFactory;

    protected $fillable = [
        'Nom_R',    // Nom du rayon
        'Num_R',    // Numéro du rayon
        'bibliotheque_id', // Clé étrangère vers Bibliotheque
    ];
    
    // 🔁 Relation One-to-Many avec Rayon (composition)
    public function book()
    {
        return $this->hasMany(book::class);
    }


    // 🔁 Relation inverse : chaque rayon appartient à une bibliothèque
    public function bibliotheque()
    {
        return $this->belongsTo(Bibliotheque::class);
    }
}
