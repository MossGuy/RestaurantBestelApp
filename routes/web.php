<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminMenuController;
use App\Http\Controllers\WerknemerscodeController;

// Startpagina
Route::view('/', 'welkom');

// Klantgedeelte
Route::prefix('klant')->group(function () {
    Route::view('/', 'klant.index');
    Route::view('/menu', 'klant.menu');
    Route::view('/besteloverzicht', 'klant.bestel_overzicht_lokaal');
    Route::view('/betalen', 'klant.betalen');
    Route::view('/gerecht', 'klant.gerecht');
});

// Admingedeelte
Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.index');
    Route::view('/besteloverzicht', 'admin.bestel_overzicht_globaal');
    Route::view('/open-bestellingen', 'admin.open_bestellingen');
    Route::get('/menu', [AdminMenuController::class, 'index']);
});

Route::resource('codes', WerknemerscodeController::class);
Route::post('/codes/login', [WerknemerscodeController::class, 'login'])->name('codes.login');
