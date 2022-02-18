<!--Formulaire d'ajout d'un élève --->
@extends('layouts.app')

@section('content')
    <h1>Ajouter Un élève</h1>

    <form method="POST" action="{{route('students.store')}}">
    <!-- csrf permet de sécuriser le formulaire -->
    @csrf
    <label for="nom">Nom de l'élève : </label>
    <input type="text" name="nom">
    <label for="prenom">Prénom de l'élève : </label>
    <input type="text" name="prenom">
    <label for="classe">Classe l'élève : </label>
    <input type="text" name="classe">

    <button type="submit">Créer</button>

@endsection