<?php

namespace App\Http\Controllers;

use App\Models\Gerecht;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GerechtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gerechtenPerCategorie = GerechtController::gesorteerdeGerechtenPerCategorie();

        return view('admin.menu_weergave', [
            'gerechtenPerCategorie' => $gerechtenPerCategorie
        ]);
    }

    public static function gesorteerdeGerechtenPerCategorie(): \Illuminate\Support\Collection
{
    $volgorde = ['ramen', 'bijgerecht', 'dessert', 'drank', 'cocktails'];

    $gerechten = DB::table('gerechten')
        ->orderBy('category')
        ->orderBy('subcategory')
        ->orderBy('naam')
        ->get()
        ->groupBy('category');

    return collect($volgorde)
        ->mapWithKeys(fn($cat) => [$cat => $gerechten[$cat] ?? collect()]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Gerecht $gerecht)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gerecht $gerecht)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gerecht $gerecht)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gerecht $gerecht)
    {
        //
    }
}
