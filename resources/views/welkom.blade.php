@extends('layouts.main')

@section('main')
    <section class="text-center">
        <h1 class="text-xl">Welkom!</h1>
        <br>
        <form action="{{ route('codes.login') }}" method="post">
            @csrf
            <label for="login_code">Login code:</label><br>
            <input type="text" name="code" id="code" class="my-4 bg-stone-200 border border-stone-500 border-2 rounded"><br>
            <input type="submit" class="bg-teal-600 rounded text-white py-1 px-4" value="login">
        </form>
    </section>

    @if($ingelogd ?? false)
    <p>login true, code: {{ $code }}</p>
    @else
    <p>login false</p>
    @endif

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $er)
        <li>{{ $er }}</li>
        @endforeach
    </ul>
    @endif
@endsection