<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welkom');
Route::view('/admin_welkom', 'admin_welkom');
Route::view('/afrekenen', 'afrekenen');
Route::view('/bestel_menu', 'bestel_menu');
Route::view('/bestel_overzicht_lokaal', 'bestel_overzicht_lokaal');
Route::view('/bestel_overzicht_globaal', 'bestel_overzicht_globaal');

Route::prefix('menu')->group(function () {
    Route::view('/voorgerechten', 'menu.voorgerechten');
    Route::view('/hoofdgerecht', 'menu.hoofdgerechten');
    Route::view('/nagerechten', 'menu.nagerechten');
    Route::view('/dranken', 'menu.dranken');
});

