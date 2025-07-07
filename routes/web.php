<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WerknemerscodeController;
use App\Http\Controllers\GerechtController;
use App\Http\Controllers\TafelSessieController;

use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Klant\MenuController as KlantMenuController;

// Startpagina
Route::view('/', 'welkom');

// Klantgedeelte
Route::prefix('klant')->group(function () {
    Route::view('/', 'klant.index');
    Route::get('/menu', [KlantMenuController::class, 'index'])->name('klant.menu');
    Route::view('/besteloverzicht', 'klant.bestel_overzicht_lokaal')->name('klant.bestellingen');
    Route::view('/betalen', 'klant.betalen')->name('betalen');
    Route::view('/gerecht', 'klant.gerecht');
});

// Admingedeelte
Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.index');
    Route::view('/besteloverzicht', 'admin.bestel_overzicht_globaal');
    Route::view('/open-bestellingen', 'admin.open_bestellingen');
    Route::get('/menu', [AdminMenuController::class, 'index'])->name('admin.menu');
});

// classes met routes en methodes
Route::post('/codes/login', [WerknemerscodeController::class, 'login'])->name('codes.login');
Route::resource('gerecht', GerechtController::class);

Route::resource('tafel_sessie', TafelSessieController::class);
Route::post('/tafel_sessie/stop', [TafelSessieController::class, 'stop_session'])->name('tafel_sessie.stop_session');
