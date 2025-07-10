@extends('layouts.main')

@section('main')
    <section class="p-6">
        <a href="{{ url()->previous() }}" class="text-sm text-teal-700 hover:underline mb-4 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            <span class="ml-1">Terug</span>
        </a>

        <figure class="bg-white rounded-xl shadow-md overflow-hidden max-w-md mx-auto">
            <img src="{{ asset('images/dish_placeholder.png') }}" alt="Foto van {{ $gerecht->naam }}" class="w-full h-64 object-cover">
            <figcaption class="p-4">
                <h1 class="text-2xl font-bold">{{ $gerecht->naam }}</h1>
                <p>{{ $gerecht->beschrijving }}.</p>
                <p class="text-stone-700 my-2">€{{ number_format($gerecht->prijs, 2, ',', '.') }}</p>
                <form action="{{ route('bestelling.store') }}" method="POST">
                    @csrf
                    <input type="hidden" id="gerecht_id" name="gerecht_id" value="{{ $gerecht->gerecht_id }}">

                    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded">
                        Toevoegen aan bestelling
                    </button>
                </form>
            </figcaption>
        </figure>
    </section>
@endsection
