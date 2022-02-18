<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route permettant de définir le chemin de la page d'accueil. Le nom donné à la route est "home"
Route::get('/', [AppController::class, 'indexHome'])->name('home');

// Même route que la précédente, mais pour l'affichage des casiers Le nom donné à la route est "lockers.home"
Route::get('/lockersHome', [AppController::class, 'indexLocker'])->name('lockers.home');

//Route renvoyant sur une page de formulaire permettant d'y ajouter un casier
Route::get('/addLocker', [AppController::class, 'addLocker'])->name('lockers.add');  

//Route permettant de rediriger les données du formulaire d'ajout de casiers afin qu'elles puissent être stockées dans la bdd
Route::post('/addLocker', [AppController::class, 'storeLocker'])->name('lockers.store');

//Route renvoyant sur une page de formulaire permettant d'y ajouter un élève
Route::get('/addStudent', [AppController::class, 'addStudent'])->name('students.add'); 

//Route permettant de rediriger les données du formulaire d'ajout des élèves afin qu'elles puissent être stockées dans la bdd
Route::post('/addStudent', [AppController::class, 'storeStudent'])->name('students.store');

//Route permettant d'afficher les étudiants
Route::get('/students/{id}', [AppController::class, 'showStudents'])->name('students.show');

//Route permettant d'effacer un étudiant'
Route::get('/delete/{id}', [AppController::class, 'deleteStudent'])->name('student.delete');

//Route permettant d'aller sur le formulaire de modification d'un étudiant
Route::get('/edit/{id}', [AppController::class, 'showUpdateStudentForm'])->name('student.FormUpdate');

//Route permettant de mettre à jour un étudiant
Route::put('/update-student/{id}', [AppController::class, 'updateStudent'])->name('student.update');


