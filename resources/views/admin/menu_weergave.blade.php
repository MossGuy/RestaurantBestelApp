@extends('layouts.main')

@section('main')
    <h1 class="text-2xl font-bold mb-6">Menuoverzicht</h1>

@foreach($gerechtenPerCategorie as $categorie => $gerechten)
    <section class="mb-8">
        <h2 class="text-xl font-semibold mb-2 capitalize">{{ $categorie }}</h2>
        
        <ul class="space-y-1">
            @foreach($gerechten->sortBy('subcategory') as $gerecht)
                <li class="border-b pb-1">
                    <span class="font-medium">{{ $gerecht->naam }}</span> 
                    <span class="text-sm text-gray-500">
                        ({{ $gerecht->subcategory ?: 'geen subcategorie' }}) – 
                        €{{ number_format($gerecht->prijs, 2, ',', '.') }}
                    </span>
                </li>
            @endforeach
        </ul>
    </section>
@endforeach

@endsection