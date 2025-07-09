<?php

namespace App\Http\Controllers\Klant;

use App\Http\Controllers\Controller;
use App\Services\GerechtService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request, GerechtService $service){
        $categorie = $request->route('categorie');
        $subcategorie = $request->route('subcategorie');

        $gerechten = $service->menu($categorie, $subcategorie);

        return view('klant.index', compact('gerechten', 'categorie', 'subcategorie'));
    }
}
