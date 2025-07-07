<!-- klant kan hier het menu bekijken -->
<!-- filters toevoegen voor de verschillende categoriën -->

@extends('layouts.main')

@section('main')
    <section class="flex flex-col">
        <h1 class="text-4xl text-center">Menu</h1>

        <div>
            @foreach ($gerechten as $key => $groep)
                @if($groep instanceof \Illuminate\Support\Collection)
                    <h2>{{ $key }}</h2>
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