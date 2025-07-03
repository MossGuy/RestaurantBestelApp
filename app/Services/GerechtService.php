<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\Gerecht;

class GerechtService
{
    public static function selectAll(): Collection
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

    public function menu(Request $request)
    {
        $categorie = $request->query('categorie');
        $subcategorie = $request->query('subcategory');

        if ($subcategorie) {
            $gerechten = Gerecht::where('subcategory', $subcategorie)->get();
        } elseif ($categorie) {
            $gerechten = Gerecht::where('category', $categorie)->get();
        } else {
            // Top 4 per categorie (voorbeeld)
            $gerechten = Gerecht::select('category', 'naam', 'prijs')
                ->get()
                ->groupBy('category')
                ->map(fn($items) => $items->take(4));
        }

        return view('klant.menu', compact('gerechten', 'categorie', 'subcategorie'));
    }
}
