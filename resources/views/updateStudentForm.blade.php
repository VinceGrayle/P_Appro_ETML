<!--Formulaire de modification d'un étudiant --->

@extends('layouts.app')

@section('content')
    <h1>Modification Attribution casier</h1>


    <form method="POST" action="{{ url('update-student/'.$student->id) }}">
    <!-- csrf permet de sécuriser le formulaire -->
    @csrf
    @method('PUT')
    
    <label for="nom">Nom de l'élève : </label>
    <input type="text" name="nom" value="{{$student['nom']}}"><br><br>
    <label for="prenom">Prénom de l'élève : </label>
    <input type="text" name="prenom" value="{{$student['prenom']}}"><br><br>
    <label for="classe">Classe l'élève : </label>
    <input type="text" name="classe" value="{{$student['classe']}}"><br><br>




    
 

    <button type="submit">Modifier</button>

@endsection