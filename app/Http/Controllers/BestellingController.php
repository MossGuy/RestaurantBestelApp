<?php

namespace App\Http\Controllers;

use App\Models\Bestelling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $validated = $request->validate([
            'gerecht_id' => ['required', 'exists:gerechten,gerecht_id']
        ]);

        $sessie_id = session('sessie_id');
        $tafel_nummer = session('tafel_nummer');

        if (!$sessie_id || !$tafel_nummer) {
            return redirect()->back()->withErrors('Sessiegegevens ontbreken.');
        }

        Bestelling::create([
            'sessie_id' => $sessie_id,
            'gerecht_id' => $validated['gerecht_id'],
            'tafel_nummer' => $tafel_nummer,
        ]);
        return redirect()->route('klant.menu')->with('success', 'Bestelling toegevoegd!');
    }


    /**
     * Display the specified resource.
     */
    public function startView(string $mapNaam, ?string $sessie_id = null)
    {
        if (!in_array($mapNaam, ['klant', 'admin'])) {
            abort(404);
        }

        // Als sessie_id niet als parameter is doorgegeven, probeer dan uit session te halen
        $session_id = $sessie_id ?? session('sessie_id');

        if (!$session_id) {
            return redirect()->route('klant.menu')->with('error', 'Geen sessie actief.');
        }

        // Bestellingen groeperen per gerecht_id en aantal berekenen
        $bestellingen = DB::table('bestellingen')
            ->join('gerechten', 'bestellingen.gerecht_id', '=', 'gerechten.gerecht_id')
            ->select(
                'gerechten.naam as gerecht_naam',
                'gerechten.prijs',
                DB::raw('COUNT(bestellingen.id) as aantal')
            )
            ->where('bestellingen.sessie_id', $session_id)
            ->groupBy('bestellingen.gerecht_id', 'gerechten.naam', 'gerechten.prijs')
            ->get();

        return view("$mapNaam.bestellingen", [
            'bestellingen' => $bestellingen,
            'sessie_id' => $session_id, // eventueel meegeven aan de view
        ]);
    }


    public function show_all()
    {
        $sessies = DB::table('tafel_sessies')
            ->where('afgerond', true)
            ->orderBy('created_at', 'desc') // Meest recente eerst
            ->select('sessie_id', 'tafel_nummer', 'created_at')
            ->get();

        return view('admin.bestel_overzicht_globaal', compact('sessies'));
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
