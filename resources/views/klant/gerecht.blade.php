@extends('layouts.main')

@section('main')
    <section class="p-6">
        <figure class="bg-white rounded-xl shadow-md overflow-hidden max-w-md mx-auto">
            <img src="{{ asset('images/dish_placeholder.png') }}" alt="Foto van {{ $gerecht->naam }}" class="w-full h-64 object-cover">
            <figcaption class="p-4">
                <h1 class="text-2xl font-bold">{{ $gerecht->naam }}</h1>
                <p class="text-stone-700 my-2">€{{ number_format($gerecht->prijs, 2, ',', '.') }}</p>
                <form action="{{ route('bestelling.store') }}" method="POST">
                    @csrf
                    <input type="hidden" id="gerecht_id" name="gerecht_id" value="{{ $gerecht->id }}">

                    <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white px-4 py-2 rounded">
                        Toevoegen aan bestelling
                    </button>
                </form>
            </figcaption>
        </figure>
    </section>
@endsection
