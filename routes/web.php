<?php

use App\Http\Controllers\MatiereController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\ReferencielController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware(['auth', 'verified']);
Route::get('/users', [UserController::class, 'users'])->name('users')->middleware(['auth', 'verified']);

/**
 * Enseignants
 */
Route::get('/enseignants', [EnseignantController::class, 'getEnseignants'])->name('enseignants')->middleware(['auth', 'verified']);
Route::get('/enseignants/form', [EnseignantController::class, 'getFormEnseignant'])->name('enseignants/form')->middleware(['auth', 'verified']);
Route::post('/enseignants/create', [EnseignantController::class, 'createEnseignant'])->name('enseignants/create')->middleware(['auth', 'verified']);

/**
 * Disciplines
 */
Route::get('/disciplines', [DisciplineController::class, 'getDisciplines'])->name('disciplines')->middleware(['auth', 'verified']);
Route::get('/disciplines/form', [DisciplineController::class, 'getFormDiscipline'])->name('disciplines/form')->middleware(['auth', 'verified']);
Route::post('/disciplines/create', [DisciplineController::class, 'createDiscipline'])->name('disciplines/create')->middleware(['auth', 'verified']);

/**
 * Status
 */
Route::get('/status', [StatusController::class, 'getStatus'])->name('status')->middleware(['auth', 'verified']);
Route::get('/status/form', [StatusController::class, 'getFormStatus'])->name('status/form')->middleware(['auth', 'verified']);
Route::post('/status/create', [StatusController::class, 'createStatus'])->name('status/create')->middleware(['auth', 'verified']);

/**
 * Matières
 */
Route::get('/matieres', [MatiereController::class, 'getMatieres'])->name('matieres')->middleware(['auth', 'verified']);
Route::get('/matieres/form', [MatiereController::class, 'getFormMatiere'])->name('matieres/form')->middleware(['auth', 'verified']);
Route::post('/matieres/create', [MatiereController::class, 'createMatiere'])->name('matieres/create')->middleware(['auth', 'verified']);

/**

 * Groupes
 */
Route::get('/groupes', [GroupeController::class, 'getGroupes'])->name('groupes')->middleware(['auth', 'verified']);
Route::get('/groupes/form', [GroupeController::class, 'getFormGroupe'])->name('groupes/form')->middleware(['auth', 'verified']);
Route::post('/groupes/create', [GroupeController::class, 'createGroupe'])->name('groupes/create')->middleware(['auth', 'verified']);

/**
 * Référenciel
 */
Route::get('/referenciels', [ReferencielController::class, 'getReferenciels'])->name('referenciels')->middleware(['auth', 'verified']);
Route::get('/referenciels/form', [ReferencielController::class, 'getFormReferenciel'])->name('referenciels/form')->middleware(['auth', 'verified']);
Route::post('/referenciels/create', [ReferencielController::class, 'createReferenciel'])->name('referenciels/create')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
