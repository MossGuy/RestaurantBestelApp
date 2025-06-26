<?php

use Illuminate\Support\Facades\Route;

// Startpagina
Route::view('/', 'welkom');

// Klantgedeelte
Route::prefix('klant')->group(function () {
    Route::view('/', 'klant.index');
    Route::view('/menu', 'klant.menu');
    Route::view('/besteloverzicht', 'klant.bestel_overzicht_lokaal');
    Route::view('/betalen', 'klant.betalen');

    Route::prefix('menu')->group(function () {
        Route::view('/voorgerecht', 'klant.menu.voorgerechten');
        Route::view('/hoofdgerecht', 'klant.menu.hoofdgerechten');
        Route::view('/nagerecht', 'klant.menu.nagerechten');
        Route::view('/drank', 'klant.menu.dranken');
        Route::view('/gerecht', 'klant.menu.gerecht');
    });
});

// Admingedeelte
Route::prefix('admin')->group(function () {
    Route::view('/', 'admin.index');
    Route::view('/besteloverzicht', 'admin.bestel_overzicht_globaal');
    Route::view('/open-bestellingen', 'admin.open_bestellingen');
    Route::view('/menu', 'admin.menu_weergave');
});



