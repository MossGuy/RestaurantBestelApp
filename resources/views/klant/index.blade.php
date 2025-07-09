@extends('layouts.main')

@section('main')
    <section class="flex flex-col">
        <h1 class="text-4xl text-center">Menu</h1>

        <div>
            @foreach ($gerechten as $key => $groep)
                @if($groep instanceof \Illuminate\Support\Collection)
                    <div class="flex justify-between items-center">
                        <h2 class="text-2xl">{{ $key }}</h2>
                        <a href="{{ route('klant.menu.filtered', ['categorie' => $key]) }}" class="flex">
                            <span class="mr-1">Alles tonen</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>
                    </div>
                    <ul>
                        @foreach ($groep as $gerecht)
                            <li>{{ $gerecht->naam }} - €{{ $gerecht->prijs }}</li>
                        @endforeach
                    </ul>
                    <br>
                @else
                    <li>{{ $groep->naam }} - €{{ $groep->prijs }}</li>
                @endif
            @endforeach

        </div>
        <a href="{{ route('betalen') }}" class="mt-auto w-fit text-teal-700 p-2 border border-2 rounded-md hover:text-teal-700 font-semibold" onclick="return confirm('Door te betalen sluit je de sessie af. \nWeet je zeker dat je wilt betalen?')">
            Betalen
        </a>
    </section>
@endsection