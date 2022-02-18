<!--Page d'accueil contenant la liste des casiers et eleves attribués --->

@extends('layouts.app')

@section('content')
    <h1>Liste des casiers</h1>
<!-- Si le nombre d'élèves est supérieur à 0, Alors on effectue le foreach et on les affiche, sinon on affiche un messsage d'erreur  -->
        @if ($studentsHome->count() > 0)
        <table class="tableStudentHome">
        <tr>
            <th>N° Casier</th>
            <th>Nom Élève</th>
            <th>Prénom Élève</th>
            <th>Classe</th>
            <th>Actions</th>
        </tr>
            <!-- pour chaque élève, on affiche son nom, prénomet   -->
            @foreach($studentsHome as $student)
            <tr>
            <td> ???</td>
            <td> {{$student->nom}}</td>
            <td><a href="{{route('students.show', ['id' => $student -> id])}}"> {{$student->prenom}}</a></td>
            <td>{{$student->classe}}</td>
            
            <td class="actionsHome">
                <a href="{{route('student.FormUpdate', ['id' => $student -> id])}}">Modifier</a> 
                <a href="{{route('student.delete', ['id' => $student -> id])}}" onclick="return confirm('Êtes-vous cûr de vouloir supprimer l\'utilisateur {{$student->nom}} {{$student->prenom}} ? ')">Libérer Casier</a> 
            </td>
            
           </tr>
             
            @endforeach
        </table>
        @else
            <span>Aucun élève dans la base de données</span>
        @endif

    <br>
    <br>

        @if (session('statutModification'))
        <div class="messageModificationOk">
         {{ session('statutModification') }}
        </div>
        @endif

        @if (session('statutSuppression'))
        <div class="messageSuppressionOk">
         {{ session('statutSuppression') }}
        </div>
    
    @endif 

@endsection