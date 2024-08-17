<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AvisController;
use App\Http\Controllers\Admin\EquipesController;
use App\Http\Controllers\Admin\GaleriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ActualitesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PartenairesController;
use App\Http\Controllers\Admin\CommentairesController;
use App\Http\Controllers\Admin\InfrastructuresController;
use App\Http\Controllers\Admin\VieuniversitairesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Affiche le formulaire de connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Traite la requête de connexion
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::post('categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::get('categories/{categorie}', [CategoriesController::class, 'show'])->name('categories.show');
    Route::get('categories/{categorie}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('categories/{categorie}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('categories/{categorie}', [CategoriesController::class, 'destroy'])->name('categories.destroy');


    Route::get('actualites', [ActualitesController::class, 'index'])->name('actualites.index');
    Route::get('actualites/create', [ActualitesController::class, 'create'])->name('actualites.create');
    Route::post('actualites', [ActualitesController::class, 'store'])->name('actualites.store');
    Route::get('actualites/{actualite}', [ActualitesController::class, 'show'])->name('actualites.show');
    Route::get('actualites/{actualite}/edit', [ActualitesController::class, 'edit'])->name('actualites.edit');
    Route::put('actualites/{actualite}', [ActualitesController::class, 'update'])->name('actualites.update');
    Route::delete('actualites/{actualite}', [ActualitesController::class, 'destroy'])->name('actualites.destroy');



    Route::get('infrastructures', [InfrastructuresController::class, 'index'])->name('infrastructures.index');
    Route::get('infrastructures/create', [InfrastructuresController::class, 'create'])->name('infrastructures.create');
    Route::post('infrastructures', [InfrastructuresController::class, 'store'])->name('infrastructures.store');
    Route::get('infrastructures/{infrastructure}', [InfrastructuresController::class, 'show'])->name('infrastructures.show');
    Route::get('infrastructures/{infrastructure}/edit', [InfrastructuresController::class, 'edit'])->name('infrastructures.edit');
    Route::put('infrastructures/{infrastructure}', [InfrastructuresController::class, 'update'])->name('infrastructures.update');
    Route::delete('infrastructures/{infrastructure}', [InfrastructuresController::class, 'destroy'])->name('infrastructures.destroy');



    Route::get('partenaires', [PartenairesController::class, 'index'])->name('partenaires.index');
    Route::get('partenaires/create', [PartenairesController::class, 'create'])->name('partenaires.create');
    Route::post('partenaires', [PartenairesController::class, 'store'])->name('partenaires.store');
    Route::get('partenaires/{partenaire}', [PartenairesController::class, 'show'])->name('partenaires.show');
    Route::get('partenaires/{partenaire}/edit', [PartenairesController::class, 'edit'])->name('partenaires.edit');
    Route::put('partenaires/{partenaire}', [PartenairesController::class, 'update'])->name('partenaires.update');
    Route::delete('partenaires/{partenaire}', [PartenairesController::class, 'destroy'])->name('partenaires.destroy');



    
    Route::get('vieuniversitaires', [VieuniversitairesController::class, 'index'])->name('vieuniversitaires.index');
    Route::get('vieuniversitaires/create', [VieuniversitairesController::class, 'create'])->name('vieuniversitaires.create');
    Route::post('vieuniversitaires', [VieuniversitairesController::class, 'store'])->name('vieuniversitaires.store');
    Route::get('vieuniversitaires/{vieuniversitaire}', [VieuniversitairesController::class, 'show'])->name('vieuniversitaires.show');
    Route::get('vieuniversitaires/{vieuniversitaire}/edit', [VieuniversitairesController::class, 'edit'])->name('vieuniversitaires.edit');
    Route::put('vieuniversitaires/{vieuniversitaire}', [VieuniversitairesController::class, 'update'])->name('vieuniversitaires.update');
    Route::delete('vieuniversitaires/{vieuniversitaire}', [VieuniversitairesController::class, 'destroy'])->name('vieuniversitaires.destroy');



    Route::get('avis', [AvisController::class, 'index'])->name('avis.index');
    Route::get('avis/create', [AvisController::class, 'create'])->name('avis.create');
    Route::post('avis', [AvisController::class, 'store'])->name('avis.store');
    Route::get('avis/{avi}', [AvisController::class, 'show'])->name('avis.show');
    Route::get('avis/{avi}/edit', [AvisController::class, 'edit'])->name('avis.edit');
    Route::put('avis/{avi}', [AvisController::class, 'update'])->name('avis.update');
    Route::delete('avis/{avi}', [AvisController::class, 'destroy'])->name('avis.destroy');

    Route::get('galeries', [GaleriesController::class, 'index'])->name('galeries.index');
    Route::get('galeries/create', [GaleriesController::class, 'create'])->name('galeries.create');
    Route::post('galeries', [GaleriesController::class, 'store'])->name('galeries.store');
    Route::get('galeries/{galerie}', [GaleriesController::class, 'show'])->name('galeries.show');
    Route::get('galeries/{galerie}/edit', [GaleriesController::class, 'edit'])->name('galeries.edit');
    Route::put('galeries/{galerie}', [GaleriesController::class, 'update'])->name('galeries.update');
    Route::delete('galeries/{galerie}', [GaleriesController::class, 'destroy'])->name('galeries.destroy');


    Route::get('commentaires', [CommentairesController::class, 'index'])->name('commentaires.index');
    Route::get('commentaires/create', [CommentairesController::class, 'create'])->name('commentaires.create');
    Route::post('commentaires', [CommentairesController::class, 'store'])->name('commentaires.store');
    Route::get('commentaires/{commentaire}', [CommentairesController::class, 'show'])->name('commentaires.show');
    Route::get('commentaires/{commentaire}/edit', [CommentairesController::class, 'edit'])->name('commentaires.edit');
    Route::put('commentaires/{commentaire}', [CommentairesController::class, 'update'])->name('commentaires.update');
    Route::delete('commentaires/{commentaire}', [CommentairesController::class, 'destroy'])->name('commentaires.destroy');

    Route::get('equipes', [EquipesController::class, 'index'])->name('equipes.index');
    Route::get('equipes/create', [EquipesController::class, 'create'])->name('equipes.create');
    Route::post('equipes', [EquipesController::class, 'store'])->name('equipes.store');
    Route::get('equipes/{equipe}', [EquipesController::class, 'show'])->name('equipes.show');
    Route::get('equipes/{equipe}/edit', [EquipesController::class, 'edit'])->name('equipes.edit');
    Route::put('equipes/{equipe}', [EquipesController::class, 'update'])->name('equipes.update');
    Route::delete('equipes/{equipe}', [EquipesController::class, 'destroy'])->name('equipes.destroy');

    Route::get('profile', [AuthController::class, 'showProfileForm'])->name('profile.show');
    Route::put('profile', [AuthController::class, 'updateProfile'])->name('profile.update');


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});