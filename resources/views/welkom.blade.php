@extends('layouts.main')

@section('main')
    <section class="text-center">
        <h1 class="text-xl">Welkom!</h1>
        <br>
        <form action="" method="post">
            <!-- TODO: form action uitzoeken -->
            <label for="login_code">Login code:</label><br>
            <input type="text" name="login_code" id="login_code" class="my-7 bg-stone-200 border border-stone-500 border-2 rounded"><br>
            <input type="submit" class="bg-teal-600 rounded text-white py-1 px-4" value="login">
        </form>
    </section>
@endsection