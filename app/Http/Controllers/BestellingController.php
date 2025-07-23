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
            'sessie_id' => $session_id,
        ]);
    }


    public function show_all()
    {
        $query = DB::table('tafel_sessies')
            ->select('sessie_id', 'tafel_nummer', 'created_at', 'afgerond');

        // Filter op afgerond (standaard true, tenzij anders gekozen)
        if (request()->filled('afgerond')) {
            $query->where('afgerond', (bool) request('afgerond'));
        } else {
            $query->where('afgerond', true); // default
        }

        // Filter op tafelnummer
        if ($tafel = request('tafelnummer')) {
            $query->where('tafel_nummer', 'like', "%$tafel%");
        }

        // Filter op specifieke datum
        if ($datum = request('datum')) {
            $query->whereDate('created_at', $datum);
        }

        // Sortering
        $sortBy = request('sort_by');
        $sortDir = request('sort_dir', 'asc');

        if ($sortBy === 'tafelnummer') {
            $query->orderBy('tafel_nummer', $sortDir);
        } elseif ($sortBy === 'datum') {
            $query->orderBy('created_at', $sortDir);
        } else {
            $query->orderBy('created_at', 'desc'); // default sortering
        }

        $sessies = $query->get();

        return view('admin.bestel_overzicht_globaal', compact('sessies'));
    }

    public function show_open()
    {
        $openBestellingen = DB::table('bestellingen')
            ->join('gerechten', 'bestellingen.gerecht_id', '=', 'gerechten.gerecht_id')
            ->where('bestellingen.is_klaar', false)
            ->select(
                'bestellingen.id',
                'bestellingen.sessie_id',
                'bestellingen.created_at',
                'gerechten.naam as gerecht_naam',
                'bestellingen.is_klaar'
            )
            ->orderBy('bestellingen.created_at', 'asc')
            ->get();

        return view('admin.open_bestellingen', [
            'bestellingen' => $openBestellingen
        ]);
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

    public function markeerAlsKlaar($id)
    {
        $bestelling = Bestelling::findOrFail($id);
        $bestelling->is_klaar = true;
        $bestelling->save();

        return redirect()->back()->with('success', 'Bestelling gemarkeerd als klaar.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
