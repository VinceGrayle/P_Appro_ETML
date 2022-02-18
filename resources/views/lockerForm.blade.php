<!--Formulaire d'ajout d'un casier --->

@extends('layouts.app')

@section('content')
    <h1>Ajouter Un casier</h1>

    <form method="POST" action="{{route('lockers.store')}}">
    <!-- csrf permet de sécuriser le formulaire -->
    @csrf
    <label for="nom_casier">Nom du casier : </label>
    <input type="text" name="nom_casier">
    <label for="etage_casier">Étage du casier : </label>
    <input type="text" name="etage_casier">
    <label for="infos_casier">Infos :  </label>
    <textarea name="infos_casier" cols="30" rows="10"></textarea>
    <button type="submit">Créer</button>

    

@endsection