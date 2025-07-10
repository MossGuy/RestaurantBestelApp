@extends('layouts.main')

@section('main')
<section>
    @if (session('success'))
    <div class="bg-green-100 text-green-800 border border-green-300 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif
</section>
<section class="flex flex-col min-h-screen">
    <div class="text-center">
        <h1 class="text-2xl font-bold mb-6">Menu</h1>
        <p><a href="{{ route('klant.bestellingen') }}" class="text-teal-700 p-2 border border-2 rounded-md hover:text-teal-700 font-semibold">Alle bestellingen</a></p>
    </div>

    <div class="flex-1">
        @if (isset($categorie) || isset($subcategorie))
            {{-- FILTER ACTIEF: vlakke lijst van gerechten --}}
            @if (isset($categorie))
                <h2 class="text-2xl font-semibold mb-2">{{ ucfirst($categorie) }}</h2>
            @elseif (isset($subcategorie))
                <h2 class="text-2xl font-semibold mb-2">{{ ucfirst($subcategorie) }}</h2>
            @endif

            <a href="{{ route('klant.menu') }}" class="text-sm text-teal-700 hover:underline mb-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                <span class="ml-1">Terug naar hoofdmenu</span>
            </a>

            <div class="flex flex-wrap justify-evenly">
                @foreach ($gerechten as $gerecht)
                    <a href="{{ route('klant.gerecht.show', ['id' => $gerecht->gerecht_id]) }}" class="block w-50 m-3">
                        <figure class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
                            <img src="{{ asset('images/dish_placeholder.png') }}" alt="Foto van {{ $gerecht->naam }}" class="w-full h-40 object-cover">
                            <figcaption class="p-4">
                                <h3 class="text-lg font-semibold">{{ $gerecht->naam }}</h3>
                                <p class="text-stone-600">€{{ number_format($gerecht->prijs, 2, ',', '.') }}</p>
                            </figcaption>
                        </figure>
                    </a>
                @endforeach
            </div>
        @else
            {{-- GEEN FILTER: geneste structuur per categorie --}}
            @foreach ($gerechten as $key => $groep)
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-2xl font-semibold">{{ ucfirst($key) }}</h2>
                    <a href="{{ route('klant.menu', ['categorie' => $key]) }}" class="flex text-sm text-teal-700 hover:underline">
                        <span class="mr-1">Alles tonen</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                </div>

                <div class="mb-4 flex flex-wrap justify-evenly">
                    @foreach ($groep as $gerecht)
                        <a href="{{route('klant.gerecht.show', ['id' => data_get($gerecht, 'gerecht_id') ]) }}">
                            <figure class="bg-white rounded-xl shadow-md overflow-hidden w-50 m-3">
                                <img src="{{ asset('images/dish_placeholder.png') }}" alt="Foto van {{ $gerecht->naam }}" class="w-full h-40 object-cover">
                                <figcaption class="p-4">
                                    <h3 class="text-lg font-semibold">{{ $gerecht->naam }}</h3>
                                    <p class="text-stone-600">€{{ number_format($gerecht->prijs, 2, ',', '.') }}</p>
                                </figcaption>
                            </figure>
                        </a>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>

    @unless (isset($categorie) || isset($subcategorie))
        {{-- Alleen tonen als er geen filter actief is --}}
        <a href="{{ route('betalen') }}" class="mt-auto self-center text-teal-700 p-2 border border-2 rounded-md hover:text-teal-700 font-semibold" onclick="return confirm('Door te betalen sluit je de sessie af. \nWeet je zeker dat je wilt betalen?')">
            Betalen
        </a>
    @endunless
</section>
@endsection

