@extends('layouts.main')

@section('main')
     <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold mb-6">Open bestellingen</h1>
        <p><a href="{{ url()->previous() }}" class="text-teal-700 p-2 border border-2 rounded-md hover:text-teal-700 font-semibold">Terug</a></p>
    </div>
@endsection