<!--Page d'accueil contenant la liste des casiers et eleves attribués --->

@extends('layouts.app')

@section('content')
    <h1>Liste des casiers</h1>

 <!--TESTS  AFFICHAGE nom depuis foreignKey  --->   
@foreach ($lockersHome as $lockstudent)
<span>{{$lockstudent->student}}</span>
@endforeach
    <!--TESTS POUR AFFICHAGE CASIER  --->
   @if ($studentsHome->count() > 0 and $lockersHome->count() > 0 )

        <table class="tableStudentHome">
        <tr>
            <th>N° Casier</th>
            <th>Nom Élève</th>
            <th>Actions</th>
        </tr>
            <!-- pour chaque élève, on affiche son nom, prénomet   -->
        @foreach($studentsHome as $students)
            @foreach($lockersHome as $locker)   

            <tr>
            <td> {{$locker->nom_casier}}</td>
            <td> {{$locker->student_id}}</td>
            
            <td class="actionsHome">
                <a href="{{route('student.FormUpdate', ['id' => $locker -> student_id])}}">Modifier</a> 
                <a href="{{route('student.delete', ['id' => $locker -> student_id])}}" onclick="return confirm('Êtes-vous cûr de vouloir supprimer l\'utilisateur? ')">Libérer Casier</a> 
            </td>
            
           </tr>
             
            @endforeach
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