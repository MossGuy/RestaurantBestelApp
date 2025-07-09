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

    public function menu(?string $categorie = null, ?string $subcategorie = null){
        if ($subcategorie) {
            return Gerecht::where('subcategory', $subcategorie)->get();
        } elseif ($categorie) {
            return Gerecht::where('category', $categorie)->get();
        } else {
            return Gerecht::select('gerecht_id', 'category', 'naam', 'prijs') // gerecht_id toegevoegd
                ->get()
                ->groupBy('category')
                ->map(fn($items) => $items->take(2));
        }
    }
}
