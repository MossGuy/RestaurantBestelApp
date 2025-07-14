@extends('layouts.main')

@section('main')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold mb-6">Bestel overzicht</h1>
        <p><a href="{{ url()->previous() }}" class="text-teal-700 p-2 border border-2 rounded-md hover:text-teal-700 font-semibold">Terug</a></p>
    </div>

    @if ($sessies->isEmpty())
        <p>Er zijn nog geen afgeronde sessies.</p>
    @else
        <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded-md">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-4 py-2">Sessie ID</th>
                    <th class="text-left px-4 py-2">Tafelnummer</th>
                    <th class="text-left px-4 py-2">Datum</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sessies as $sessie)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $sessie->sessie_id }}</td>
                        <td class="px-4 py-2">{{ $sessie->tafel_nummer }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($sessie->created_at)->format('d-m-Y H:i') }}</td>
                        <td class="px-4 py-2 text-teal-800 font-semibold"><a href="{{ route('bestellingen.start', ['mapNaam' => 'admin', 'sessie_id' => $sessie->sessie_id]) }}">Bekijk</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
