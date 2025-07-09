<?php

namespace App\Http\Controllers;

use App\Models\Bestelling;
use Illuminate\Http\Request;

class BestellingController extends Controller
{
    public function index()
    {
        // Bijvoorbeeld:
        return view('klant.index');
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
        // Validatie (optioneel, maar aanbevolen)
        // $validated = $request->validate([
        //     'gerecht_id' => ['required', 'exists:gerechten,id']
        // ]);

        $sessie_id = session('sessie_id');
        $tafel_nummer = session('tafel_nummer');


        // if (!$sessie_id || !$tafel_nummer) {
        //     return redirect()->back()->withErrors('Sessiegegevens ontbreken.');
        // }

        echo "methode berijkt" . PHP_EOL;
        echo "";
        dd($request->all());

        // Bestelling::create([
        //     'sessie_id' => $sessie_id,
        //     'gerecht_id' => $validated['gerecht_id'],
        //     'tafel_nummer' => $tafel_nummer,
        // ]);
        // return redirect()->route('klant.menu')->with('success', 'Bestelling toegevoegd!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
