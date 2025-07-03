@extends('layouts.main')

@section('main')
    <section>
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold mb-6">Menuoverzicht</h1>
            <p><a href="{{ url('/admin') }}" class="text-teal-700 p-2 border border-2 rounded-md hover:text-teal-700 font-semibold">Terug</a></p>
        </div>


        @foreach($gerechtenPerCategorie as $categorie => $gerechten)
            <div class="mb-5">
                <h2 class="text-xl font-semibold mb-2 capitalize">{{ $categorie }}</h2>
                
                <ul class="space-y-1">
                    @foreach($gerechten->sortBy('subcategory') as $gerecht)
                        <li class="border-b pb-1">
                            <span class="font-medium">{{ $gerecht->naam }}</span> 
                            <span class="text-sm text-gray-500">
                                {{ $gerecht->subcategory ?: '' }} – 
                                €{{ number_format($gerecht->prijs, 2, ',', '.') }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
</section>
@endsection