<?php

namespace App\Models;

use App\Models\Locker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    //On dit au modele qu'il doit enregistrer ces champs, sinon il y a une erreur
    protected $fillable = ['nom', 'prenom', 'classe'];

    // fonction locker permettant de dire qu'un étudiant ne peut avoir qu'un casier (modifiable selon temps a disposition)
    public function locker()
    {
        // Dispose d'un seul casie
        return $this->hasOne(Locker::class);
    }
}
