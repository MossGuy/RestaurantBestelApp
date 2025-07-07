@extends('layouts.main')

@section('main')
    <section>
        <h1 class="text-4xl text-center">Betalen</h1>

        <div>
            <!-- display het bedrag dat de gebruiker moet betalen -->
             <form action="{{ route('tafel_sessie.stop_session') }}" method="post">
                @csrf
                <input type="hidden" name="sessie_id" value="{{ session('sessie_id') }}">
                <input type="submit" value="Betalen" class="text-teal-700 p-2 border border-2 rounded-md hover:text-teal-700 font-semibold">
             </form>
        </div>
    </section>
@endsection