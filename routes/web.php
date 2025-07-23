<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WerknemerscodeController;
use App\Http\Controllers\GerechtController;
use App\Http\Controllers\TafelSessieController;

use App\Http\Controllers\BestellingController;
Route::resource('bestelling', BestellingController::class);

use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Klant\MenuController as KlantMenuController;

// Startpagina
Route::view('/', 'welkom')->middleware('session.none');

// Klantgedeelte
Route::prefix('klant')->middleware('session.active')->group(function () {
    // alleen toegankelijk met sessie_id
    Route::get('/menu/{categorie?}/{subcategorie?}', [KlantMenuController::class, 'index'])->name('klant.menu');
    Route::get('/besteloverzicht', fn() => app()->call([BestellingController::class, 'index'], ['mapNaam' => 'klant']))->name('klant.bestellingen');
    Route::get('/gerecht/{id}', [GerechtController::class, 'show'])->name('klant.gerecht.show');
    Route::view('/betalen', 'klant.betalen')->name('betalen');
});


// Admingedeelte
Route::prefix('admin')->middleware('session.none')->group(function () {
    Route::view('/', 'admin.index');
    Route::get('/besteloverzicht', [BestellingController::class, 'show_all'])->name('admin.besteloverzicht');
    Route::get('/start/{mapNaam}', [BestellingController::class, 'startView'])->name('bestellingen.start');
    Route::get('/open_bestellingen', [BestellingController::class, 'show_open'])->name('bestellingen.open');
    // Route::view('/open-bestellingen', 'admin.open_bestellingen');
    Route::get('/menu', [AdminMenuController::class, 'index'])->name('admin.menu');
});


Route::get('/start/{mapNaam}/{sessie_id?}', [BestellingController::class, 'startView'])->name('bestellingen.start');



// classes met routes en methodes
Route::post('/codes/login', [WerknemerscodeController::class, 'login'])->name('codes.login');
Route::resource('gerecht', GerechtController::class);

Route::resource('tafel_sessie', TafelSessieController::class);
Route::resource('bestelling', BestellingController::class);
Route::post('/tafel_sessie/stop', [TafelSessieController::class, 'stop_session'])->name('tafel_sessie.stop_session');
