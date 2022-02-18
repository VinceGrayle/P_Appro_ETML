<?php

namespace App\Http\Controllers;

//permet de récupérer des infos passées grâce au protocole HTTP
use App\Models\Locker;
use App\Models\Student;
use Illuminate\Http\Request;

class AppController extends Controller
{
    // Fonction renvoyant la vue de la page d'accueil
    public function indexHome()
    {
        //Tout les étudiants sont stockés dans la variable $studentHome
        $studentsHome = Student::all();

        // on retourne la vue "Home" ainsi que la variable studentsHome et son contenu
        return view('home', compact('studentsHome'));
    }

    public function indexLocker()
    {
        $lockersHome = Locker::with('student')->get();


        $studentsHome = Student::all();

        return view('homeLocker', compact('lockersHome','studentsHome'));
    }


    // Fonction permettant de retourner la vue contenant le formulaire d'ajout des élèves
    public function addStudent()
    {
        return view('studentForm');
    }

    // Fontion qui permet de stocker les données du formulaire d'ajout d'un élève
    public function storeStudent(Request $request)
    {

        // Stockage des informations du formulaire d'ajout d'élève
        Student::create([
            'nom'=>$request->nom,
            'prenom' =>$request->prenom,
            'classe' =>$request->classe

        ]);
    }

    // Fonction permettant de retourner la vue contenant le formulaire d'ajout des casiers
    public function addLocker()
    {
        return view('lockerForm');
    }

    // Fontion qui permet de stocker les données du formulaire d'ajout d'un casier
    public function storeLocker(Request $request)
    {

        // Stockage des informations du formulaire d'ajout de casier
        Locker::create([
            'nom_casier'=>$request->nom_casier,
            'etage_casier'=>$request->etage_casier,
            'infos_casier'=>$request->infos_casier

        ]);
    }

    public function showStudents($id)
    {
        //On met l'id des post dans la variable $post
        // le findOrFail permet de retourner une 404 si on tente d'accéder à une page inexistante
        $student = Student::findOrFail($id);


        return view('student', ['student' => $student]);
    }

    
    // Fonction permettant de stocker un étudiant dans une variable et de renvoyer vers la vue du formulaire de modification
    // La fonction se lance lorsque l'on clique sur "Modifier" sur la page d'accueil
    public function showUpdateStudentForm($id)
    {
        $student = Student::findOrFail($id);

        return view('updateStudentForm', ['student' => $student]);
    }

    // Fonction permettant de mettre à jour les informations d'un étudiant
    public function updateStudent(Request $request, $id)
    {
        $student = Student::find($id);
        $student->nom=$request->input('nom');
        $student->prenom=$request->input('prenom');
        $student->classe=$request->input('classe');
        
    
        $student->update();
        return redirect()->route('home')->with('statutModification', 'L\'utilisateur a été modifié avec succès !');

    }

    //Fontion permettant de supprimer un élève depuis depuis le bouton "Libérer casier" sur la page d'accueil
    public function deleteStudent($id)
    {
        $student=Student::find($id);
        $student->delete();
        return redirect()->route('home')->with('statutSuppression', 'L\'utilisateur a été supprimé avec succès !');
    }

    

    //
}
