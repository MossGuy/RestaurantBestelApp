<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TafelSessie;
use Illuminate\Support\Facades\Session;

class TafelSessieController extends Controller
{
    public function store(Request $request) {
        /* 1. Tafelnummer valideren */
        $validated = $request->validate([
            'tafel_nummer' => 'required|integer|min:1'
        ]);

        $tafelnummer = $validated['tafel_nummer'];

        /* 2. Nieuwe sessie wegschrijven */
        $tafelSessie = TafelSessie::create([
            'tafel_nummer' => $tafelnummer,
            'afgerond' => false,
        ]);

        /* 3. Sessie-id + tafelnummer in Laravel-session bewaren */
        Session::put([
            'sessie_id'    => $tafelSessie->sessie_id,
            'tafel_nummer' => $tafelnummer,
        ]);

        /* 4. Doorsturen naar het klant-menu (index) */
        return redirect()->route('klant.menu');

        return view('klant.index');
    }

    public function stop_session(Request $request) {
        // 1. Haal sessie_id op (bij voorkeur uit de Laravel-session)
        $sessieId = session('sessie_id');

        if ($sessieId) {
            // 2. Zoek en update de sessie
            $tafelSessie = TafelSessie::find($sessieId);

            if ($tafelSessie) {
                $tafelSessie->afgerond = true;
                $tafelSessie->save();
            }

            // 3. Verwijder de sessiegegevens uit Laravel's session
            session()->forget(['sessie_id', 'tafel_nummer']);
        }

        // 4. Redirect terug naar de welkom-pagina
        return redirect('/');
    }
}
