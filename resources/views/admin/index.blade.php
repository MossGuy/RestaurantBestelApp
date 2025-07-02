@extends('layouts.main')

@section('main')
<section class="flex flex-col min-h-[60vh] max-w-lg mx-auto items-center">
    <h1 class="text-3xl font-semibold mb-3 text-center text-teal-700">Het administrator paneel</h1>
    
    <div class="flex flex-grow flex-wrap content-center justify-between gap-y-15">
        <p><a href="{{ url('admin/menu') }}" class="text-teal-700 p-2 border border-2 rounded-md hover:text-teal-700 font-semibold">menu overzicht</a></p>
    </div>
</section>
@endsection