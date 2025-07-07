@extends('layouts.main')


@section('main')
    @if($ingelogd ?? false)
    <!-- tablet geactiveerd met inlogcode -->
    <section class="flex flex-col min-h-[60vh] max-w-lg mx-auto items-center">
        <h1 class="text-3xl font-semibold mb-3 text-center text-teal-700">Welkom</h1>

        <div class="flex flex-col flex-grow rounded-md p-1 justify-evenly">
            <div>
                <h2 class="text-xl font-semibold mb-1 text-teal-700">Koppel een tafelnummer</h2>
                <form action="{{ route('tafel_sessie.store') }}" method="post" class="space-y-4">
                    @csrf
                    <input type="number" name="tafel_nummer" id="tafel_nummer" class="w-full bg-stone-200 border border-teal-700 rounded py-2 px-3 focus:outline-teal-500" placeholder="Voer tafelnummer in">
                    <input type="submit" value="Start" class="w-full bg-teal-600 rounded text-teal-50 font-semibold py-2 border-2 border-teal-700 hover:bg-teal-700 cursor-pointer transition">
                </form>
            </div>

            <div class=" pt-2 text-center">
                <a href="{{ url('admin') }}" class="text-teal-700 p-2 border border-2 rounded-md hover:text-teal-700 font-semibold">Admin paneel</a>
            </div>
        </div>
    </section>



    @else
    <!-- inlogcode invoeren -->
    <section class="flex flex-col min-h-[60vh] max-w-lg mx-auto text-center justify-center">
        <form action="{{ route('codes.login') }}" method="post">
            @csrf
            <label class="text-2xl" for="login_code">Login code:</label><br>
            <input type="text" name="code" id="code" class=" my-1 bg-stone-200 border border-teal-700 border-2 rounded"><br>
            <input type="submit" class="mt-10 bg-teal-600 hover:bg-teal-700 transition rounded text-white font-semibold py-1 px-4 border-teal-700 border-2" value="login">
        </form>
    </section>

    @endif

    @if ($errors->any())
    <section>
        <ul>
            @foreach ($errors->all() as $er)
            <li>{{ $er }}</li>
            @endforeach
        </ul>
    </section>
    @endif
@endsection