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

    public function menu(?string $categorie = null, ?string $subcategorie = null)
    {
        if ($subcategorie) {
            $gerechten = Gerecht::where('subcategory', $subcategorie)->get();
        } elseif ($categorie) {
            $gerechten = Gerecht::where('category', $categorie)->get();
        } else {
            $gerechten = Gerecht::select('category', 'naam', 'prijs')
                ->get()
                ->groupBy('category')
                ->map(fn($items) => $items->take(2)); // select de top 2
        }

        return view('klant.index', compact('gerechten', 'categorie', 'subcategorie'));
    }
}
