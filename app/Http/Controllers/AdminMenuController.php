<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMenuController extends Controller
{
    public function index()
    {
        $volgorde = ['ramen', 'dessert', 'drank', 'cocktails'];

        $gerechten = DB::table('gerechten')
        ->orderBy('category')
        ->orderBy('subcategory')
        ->orderBy('naam')
        ->get()
        ->groupBy('category');

        $gerechtenPerCategorie = collect($volgorde)
        ->mapWithKeys(fn($cat) => [$cat => $gerechten[$cat] ?? collect()]);

    return view('admin.menu_weergave', [
        'gerechtenPerCategorie' => $gerechtenPerCategorie
    ]);
    }
}

