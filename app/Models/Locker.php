<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Locker extends Model
{
    use HasFactory;

    //On dit au modele qu'il doit enregistrer ces champs, sinon il y a une erreur
    protected $fillable = ['nom_casier', 'etage_casier', 'infos_casier'];

    //Fontion afin de spécifier qu'un casier ne peut appartenir qu'a un seul élève'
    public function student()
    {
        //Appartient à un étudiant
        return $this->belongsTo(Student::class);
    }
}
