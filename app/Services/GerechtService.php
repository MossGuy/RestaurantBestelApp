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
        $volgorde = ['ramen', 'poke', 'bijgerecht', 'dessert', 'drank', 'cocktails'];

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
            return Gerecht::where('subcategory', $subcategorie)->get();
        } elseif ($categorie) {
            return Gerecht::where('category', $categorie)->get();
        } else {
            $volgorde = ['ramen', 'poke', 'bijgerecht', 'dessert', 'drank', 'cocktails'];

            $gerechten = Gerecht::select('gerecht_id', 'category', 'naam', 'prijs')
                ->orderBy('category')
                ->orderBy('subcategory')
                ->orderBy('naam')
                ->get()
                ->groupBy('category');

            // Sorteer op basis van $volgorde
            return collect($volgorde)
                ->mapWithKeys(function ($cat) use ($gerechten) {
                    return [$cat => $gerechten->get($cat, collect())->take(2)];
                })
                ->filter(fn($items) => $items->isNotEmpty()); // optioneel: verwijder lege categorieën
        }
    }

}
