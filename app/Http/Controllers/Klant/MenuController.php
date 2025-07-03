<?php

namespace App\Http\Controllers\Klant;

use App\Http\Controllers\Controller;
use App\Services\GerechtService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request, GerechtService $service)
    {
        return $service->menu(
            categorie: $request->query('categorie'),
            subcategorie: $request->query('subcategory')
        );
    }

}
