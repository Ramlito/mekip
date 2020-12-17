<?php

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


Route::get('/enonce', function () {
    return view('enonce.index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('games','App\Http\Controllers\GamesController');
Route::view('/', 'accueil')->name('home.accueil');

Route::get('/jeux', [\App\Http\Controllers\JeuController::class,  'index'])->name('jeux.index');
Route::get('/random', [\App\Http\Controllers\JeuController::class, 'randomJeu']);
Route::get('/regle/{id}', [\App\Http\Controllers\JeuController::class, 'regle'])->name('jeux.regle');
Route::get('/jeux/{id}', [\App\Http\Controllers\JeuController::class,  'show'])->name('jeux.show');
Route::get('/tri', [\App\Http\Controllers\JeuController::class,  'tri'])->name('jeux.tri');
Route::get('/prix/{id}', [\App\Http\Controllers\JeuController::class,  'prix'])->name('jeux.prix');
Route::get('/editeur/{edit}', [\App\Http\Controllers\JeuController::class,  'editeur'])->name('jeux.editeur');
Route::get('/theme/{theme}', [\App\Http\Controllers\JeuController::class,  'theme'])->name('jeux.theme');
Route::get('/mecanique/{meca}', [\App\Http\Controllers\JeuController::class,  'mecanique'])->name('jeux.mecanique');
Route::post('/image-upload', 'GamesController@imageUploadPost');
Route::get('/user', [\App\Http\Controllers\UsersController::class,  'index'])->name('user.index');
Route::get('/collection', [\App\Http\Controllers\UsersController::class,  'collection'])->name('user.collection');
Route::get('/suppression/{jid}', [\App\Http\Controllers\UsersController::class,  'suppression'])->name('user.suppression');
Route::get('/achat/{jid}', [\App\Http\Controllers\UsersController::class,  'ajouterAchat'])->name('user.ajouterAchat');
Route::post('/achat/{jid}', [\App\Http\Controllers\UsersController::class,  'storeAchat'])->name('user.storeAchat');
Route::get('/tri_commentaire/{id}', [\App\Http\Controllers\JeuController::class,  'tri_commentaire'])->name('commentaire.tri');
Route::get('/ajouterComment/{jid}', [\App\Http\Controllers\JeuController::class,  'ajouterComment'])->name('jeux.ajouterComment');
Route::post('/storeComment/{jid}', [\App\Http\Controllers\JeuController::class,  'storeComment'])->name('jeux.storeComment');




