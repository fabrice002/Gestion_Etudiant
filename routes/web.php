<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GestionTDController;
use App\Http\Controllers\Admin\GestionUEsController;
use App\Http\Controllers\Admin\GestionClubController;
use App\Http\Controllers\Admin\GestionNiveauController;
use App\Http\Controllers\Admin\GestionFiliereController;
use App\Http\Controllers\Admin\GestionEtudiantController;
use App\Http\Controllers\Admin\GestionGroupeTDController;
use App\Http\Controllers\Admin\GestionEnseignantController;
use App\Http\Controllers\Admin\GestionAttributionController;
use App\Http\Controllers\Admin\GestionDepartementController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('Admin/', [AdminController::class, 'index'])->name('Admin.index');
/* Afficher les actions qu'un departement peut effectuer */
Route::get('Admin/Departement/Action/{id}', [AdminController::class, 'indexDept'])->name('Admin.indexDept');
/* Afficher les action d'une filiere */
Route::get('Admin/Filiere/Action/{id}', [AdminController::class, 'indexFil'])->name('Admin.indexFil');
Route::get('Admin/Niveau/Action/{id}', [AdminController::class, 'indexNiv'])->name('Admin.indexNiv');
Route::get('Admin/UE/Action/{id}', [AdminController::class, 'indexUE'])->name('Admin.indexUE');

/* Les routes pour la gestion des attributions */
/* Affichage des Attribution */
Route::get('Admin/Attribution/index', [GestionAttributionController::class, 'index'])->name('Admin.attribution.index');
Route::get('Admin/Attribution/show',  [GestionAttributionController::class, 'show'])->name('Admin.attribution.show');
/* Creation d'un Attribution */
Route::get('Admin/Attribution/create', [GestionAttributionController::class, 'create'])->name('Admin.attribution.create');
Route::post('Admin/Attribution/store', [GestionAttributionController::class, 'store'])->name('Admin.attribution.store');
/* Mise a jour d'une attribution */
Route::get('Admin/Attribution/edit', [GestionAttributionController::class, 'edit'])->name('Admin.attribution.edit');
Route::post('Admin/Attribution/update', [GestionAttributionController::class, 'update'])->name('Admin.attribution.update');
/* Suppression d'une attribution */
Route::get('Admin/Attribution/delete/{id}', [GestionAttributionController::class, 'destroy'])->name('Admin.attribution.delete');

/* Les routes pour la gestion des clubs*/
/* Affichage des clubs */
Route::get('Admin/Club/index', [GestionClubController::class, 'index'])->name('Admin.club.index');
Route::get('Admin/Club/show', [GestionClubController::class, 'show'])->name('Admin.club.show');
/* Affichage du club pour un departement */
Route::get('Admin/Club/showD/{id}', [GestionClubController::class, 'showDept'])->name('Admin.club.showDept');
Route::get('Admin/Club/showC', [GestionClubController::class, 'showC'])->name('Admin.club.showC');
/* Creation d'un Club */
Route::get('Admin/Club/create/{id}', [GestionClubController::class, 'create'])->name('Admin.club.create');
Route::post('Admin/club/store', [GestionClubController::class, 'store'])->name('Admin.club.store');
/* Mise a jour d'un club */
Route::get('Admin/Club/edit', [GestionClubController::class, 'edit'])->name('Admin.club.edit');
Route::post('Admin/Club/update', [GestionClubController::class, 'update'])->name('Admin.club.update');
/* Suppression d'un club */
Route::get('Admin/Club/delete/{id}', [GestionClubController::class, 'destroy'])->name('Admin.club.delete');

/* Les routes pour la gestion des departements */
/* Affichage des departements */
Route::get('Admin/Departement/index', [GestionDepartementController::class, 'index'])->name('Admin.departement.index');
Route::get('Admin/Departement/show', [GestionDepartementController::class, 'show'])->name('Admin.departement.show');
/* Creation d'un departement */
Route::get('Admin/Departement/create', [GestionDepartementController::class, 'create'])->name('Admin.departement.create');
Route::post('Admin/Departement/store', [GestionDepartementController::class, 'store'])->name('Admin.departement.store');
/* Editon d'un departement */
Route::get('Admin/Departement/edit', [GestionDepartementController::class, 'edit'])->name('Admin.departement.edit');
Route::post('Admin/Departement/update', [GestionDepartementController::class, 'update'])->name('Admin.departement.update');
/* Suppression d'un Departement */
Route::get('Admin/Departement/delete/{id}', [GestionDepartementController::class, 'destroy'])->name('Admin.departement.delete');

/* Les routes pour la gestion de Enseignant*/
/* Affichage des Enseignant */
Route::get('Admin/Enseignant/index', [GestionEnseignantController::class, 'index'])->name('Admin.enseignant.index');
Route::get('Admin/Enseignant/show', [GestionEnseignantController::class, 'show'])->name('Admin.enseignant.show');
/* Creation d'un Enseignant */
Route::get('Admin/Enseignant/create', [GestionEnseignantController::class, 'create'])->name('Admin.enseignant.create');
Route::post('Admin/Enseignant/store', [GestionEnseignantController::class, 'store'])->name('Admin.enseignant.store');
/* Edition d'un Enseignant */
Route::get('Admin/Enseignant/edit', [GestionEnseignantController::class, 'edit'])->name('Admin.enseignant.edit');
Route::post('Admin/Enseignant/update', [GestionEnseignantController::class, 'update'])->name('Admin.enseignant.update');
/* Suppression d'un Enseignant */
Route::get('Admin/Enseignant/delete/{id}', [GestionEnseignantController::class, 'destroy'])->name('Admin.enseignant.delete');

/* les routes pour la gestion des Etudiant */
/* Affichage des Etudiants */
Route::get('Admin/Etudiant/index', [GestionEtudiantController::class, 'index'])->name('Admin.etudiant.index');
Route::get('Admin/Etudiant/show', [GestionEtudiantController::class, 'show'])->name('Admin.etudiant.show');
/* Creation d'un Etudiant */
Route::get('Admin/Etudiant/create', [GestionEtudiantController::class, 'create'])->name('Admin.etudiant.create');
Route::post('Admin/Etudiant/store', [GestionEtudiantController::class, 'store'])->name('Admin.etudiant.store');
/* Edition d'un Etudiant */
Route::get('Admin/Etudiant/edit', [GestionEtudiantController::class, 'edit'])->name('Admin.etudiant.edit');
Route::post('Admin/Etudiant/update', [GestionEtudiantController::class, 'update'])->name('Admin.etudiant.update');
/* Suppression d'un Etudiant */
Route::get('Admin/Etudiant/delete/{id}', [GestionEtudiantController::class, 'destroy'])->name('Admin.etudiant.delete');

/* Les route pour  la gestion des filieres*/
Route::get('Admin/Filiere/index', [GestionFiliereController::class, 'index'])->name('Admin.filiere.index');
Route::get('Admin/Filiere/show', [GestionFiliereController::class, 'show'])->name('Admin.filiere.show');
Route::get('Admin/Filiere/showD/{id}', [GestionFiliereController::class, 'showDept'])->name('Admin.filiere.showDept');
/* Route Ajax pour faire la rechereche */
Route::get('Admin/Filiere/showFil', [GestionFiliereController::class, 'showFil'])->name('Admin.filiere.showFil');
/* Creation d'une filiere */
Route::get('Admin/Filiere/create/{id}', [GestionFiliereController::class, 'create'])->name('Admin.filiere.create');
Route::get('Admin/Filiere/createFil', [GestionFiliereController::class, 'createFil'])->name('Admin.filiere.createFil');
Route::post('Admin/Filiere/store', [GestionFiliereController::class, 'store'])->name('Admin.filiere.store');
/* Edition d'une filiere */
Route::get('Admin/Filiere/edit', [GestionFiliereController::class, 'edit'])->name('Admin.filiere.edit');
Route::post('Admin/Filiere/update', [GestionFiliereController::class, 'update'])->name('Admin.filiere.update');
/* Suppression d'une filiere */
Route::get('Admin/Filiere/delete/{id}', [GestionFiliereController::class, 'destroy'])->name('Admin.filiere.delete');

/* Les routes pour la gestion des TD */
Route::get('Admin/GroupeTD/index', [GestionTDController::class, 'index'])->name('Admin.groupeTD.index');
Route::get('Admin/GroupeTD/show', [GestionTDController::class, 'show'])->name('Admin.groupeTD.show');
Route::get('Admin/GroupeTD/showTd/{id}', [GestionTDController::class, 'showTd'])->name('Admin.groupeTD.showTd');
Route::get('Admin/GroupeTD/showTdSpecial/{id}', [GestionGroupeTDController::class, 'showTdSpecial'])->name('Admin.groupeTD.showTdSpecial');
/* Creation d'un TD */
Route::get('Admin/GroupeTD/createTd/{id}', [GestionTDController::class, 'createTd'])->name('Admin.groupeTD.createTd');
Route::get('Admin/GroupeTD/createTdSpeciale/{id}', [GestionTDController::class, 'createTdSpeciale'])->name('Admin.groupeTD.createTdSpeciale');
Route::post('Admin/GroupeTD/store', [GestionTDController::class, 'store'])->name('Admin.groupeTD.store');
Route::post('Admin/GroupeTD/storeTdSpecial', [GestionTDController::class, 'storeTdSpecial'])->name('Admin.groupeTD.storeTdSpecial');
/* Edition d'un TD */
Route::get('Admin/GroupeTD/edit', [GestionTDController::class, 'edit'])->name('Admin.groupeTD.edit');
Route::get('Admin/GroupeTD/editTdSpecial', [GestionTDController::class, 'editTdSpecial'])->name('Admin.groupeTD.editTdSpecial');
Route::post('Admin/GroupeTD/update', [GestionTDController::class, 'update'])->name('Admin.groupeTD.update');
Route::post('Admin/GroupeTD/updateTdSpecial', [GestionTDController::class, 'updateTdSpecial'])->name('Admin.groupeTD.updateTdSpecial');
/* suppression d'un TD */
Route::get('Admin/GroupeTD/delete/{id}', [GestionTDController::class, 'destroy'])->name('Admin.groupeTD.delete');
Route::get('Admin/GroupeTD/deleteTdSpecial/{id}', [GestionTDController::class, 'destroyTdSpecial'])->name('Admin.groupeTD.deleteTdSpecial');

/* Route pour la gestion des Groupe de TD */
Route::get('Admin/GroupeTD/TD/index/{id}', [GestionGroupeTDController::class, 'indexGroupeTd'])->name('Admin.GroupeTD.TD.index');
Route::get('Admin/GroupeTD/TDSpeciale/index/{id}', [GestionGroupeTDController::class, 'indexGroupeTdSpecial'])->name('Admin.GroupeTD.TDSpeciale.index');
/* Creation d'un groupe de TD */
Route::get('Admin/GroupeTD/TD/create/{id}', [GestionGroupeTDController::class, 'createGroupeTd'])->name('Admin.GroupeTD.TD.create');
Route::get('Admin/GroupeTD/TDSpeciale/create/{id}', [GestionGroupeTDController::class, 'createGroupeTdSpeciale'])->name('Admin.GroupeTD.TDSpeciale.create');
Route::post('Admin/GroupeTD/TD/store', [GestionGroupeTDController::class, 'storeGroupeTd'])->name('Admin.GroupeTD.TD.store');
Route::post('Admin/GroupeTD/TDSpecial/store', [GestionGroupeTDController::class, 'storeGroupeTdSpeciale'])->name('Admin.GroupeTD.TDSpeciale.store');
/* Edition d'un groupe de TD */
Route::get('Admin/GroupeTD/TD/edit/{id}', [GestionGroupeTDController::class, 'editGroupeTd'])->name('Admin.GroupeTD.TD.edit');
Route::get('Admin/GroupeTD/TDSpeciale/edit/{id}', [GestionGroupeTDController::class, 'editGroupeTdSpeciale'])->name('Admin.GroupeTD.TDSpeciale.edit');
Route::post('Admin/GroupeTD/TD/update', [GestionGroupeTDController::class, 'updateGroupeTd'])->name('Admin.GroupeTD.TD.update');
Route::post('Admin/GroupeTD/TDSpeciale/update', [GestionGroupeTDController::class, 'updateGroupeTdSpeciale'])->name('Admin.GroupeTDSpeciale.TD.update');
/* Suppression d'un groupe de td*/
Route::get('Admin/GroupeTD/TD/delete/{id}', [GestionGroupeTDController::class, 'destroyGroupeTd'])->name('Admin.GroupeTD.TD.');
Route::get('Admin/GroupeTD/TDSpeciale/delete/{id}', [GestionGroupeTDController::class, 'destroyGroupeTdSpeciale'])->name('Admin.GroupeTD.TD.');

// Les routes pour les sceances Td Controller
Route::get('Admin/SceanceTD/', [GestionSceanceContoller::class, ''])->name('Admin.sceance.');

/* Les routes pour la gestion de niveau */
Route::get('Admin/Niveau/index', [GestionNiveauController::class, 'index'])->name('Admin.niveau.index');
Route::get('Admin/Niveau/show', [GestionNiveauController::class, 'show'])->name('Admin.niveau.show');
/* Creation d'un niveau */
Route::get('Admin/Niveau/create', [GestionNiveauController::class, 'create'])->name('Admin.niveau.create');
Route::post('Admin/Niveau/store', [GestionNiveauController::class, 'store'])->name('Admin.niveau.store');
/* Edition d'un niveau */
Route::get('Admin/Niveau/edit', [GestionNiveauController::class, 'edit'])->name('Admin.niveau.edit');
Route::post('Admin/Niveau/update', [GestionNiveauController::class, 'update'])->name('Admin.niveau.update');
/* Suppression d'un niveau */
Route::get('Admin/Niveau/delete/{id}', [GestionNiveauController::class, 'destroy'])->name('Admin.niveau.delete');

/* Les routes pour la gestion des UEs */
Route::get('Admin/UE/index', [GestionUEsController::class, 'index'])->name('Admin.ue.index');
Route::get('Admin/UE/show', [GestionUEsController::class, 'show'])->name('Admin.ue.show');
Route::get('Admin/UE/showFil/{id}', [GestionUEsController::class, 'showFil'])->name('Admin.ue.showFil');
Route::get('Admin/UE/showNiv/{id}', [GestionUEsController::class, 'showNiv'])->name('Admin.ue.showNiv');
/* Creation d'un UE */
Route::get('Admin/UE/create/{id}', [GestionUEsController::class, 'create'])->name('Admin.ue.create');
Route::get('Admin/UE/createNiv/{id}', [GestionUEsController::class, 'createNiv'])->name('Admin.ue.createNiv');
Route::post('Admin/UE/store', [GestionUEsController::class, 'store'])->name('Admin.ue.store');
/* Edition d'un UE */
Route::get('Admin/UE/edit', [GestionUEsController::class, 'edit'])->name('Admin.ue.edit');
Route::post('Admin/UE/update', [GestionUEsController::class, 'update'])->name('Admin.ue.update');
/* suppression d'un UE */
Route::get('Admin/UE/delete/{id}', [GestionUEsController::class, 'destroy'])->name('Admin.ue.delete');
