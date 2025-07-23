@extends('layouts.main')

@section('main')
    <script src="//unpkg.com/alpinejs" defer></script>

    <div x-data="{ showFilters: false }">
        <section class="flex justify-between items-center">
            <h1 class="text-2xl font-bold mb-6">Bestel overzicht</h1>

            <button
                @click="showFilters = !showFilters"
                class="text-teal-700 px-4 py-2 ml-auto mr-2 border border-2 rounded-md font-semibold cursor-pointer"
            >
                zoek / filter
            </button>

            <p>
                <a href="{{ url('admin') }}"
                   class="text-teal-700 px-4 py-2 border border-2 rounded-md font-semibold inline-block">
                    Terug
                </a>
            </p>
        </section>

        <!-- Filterpaneel -->
        <div x-show="showFilters" x-transition x-cloak
             class="mt-4 p-4 border border-gray-300 rounded-md bg-gray-50 bg-stone-300">
            <form method="GET" action="" class="grid md:grid-cols-2 gap-4">
                {{-- Tafelnummer --}}
                <div>
                    <label for="tafelnummer" class="block font-semibold text-sm text-gray-700">Tafelnummer</label>
                    <input type="text" name="tafelnummer" id="tafelnummer" value="{{ request('tafelnummer') }}"
                           class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-teal-300">
                </div>

                {{-- Datum --}}
                <div>
                    <label for="datum" class="block font-semibold text-sm text-gray-700">Datum</label>
                    <input type="date" name="datum" id="datum" value="{{ request('datum') }}"
                           class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-teal-300">
                </div>

                {{-- Afgerond --}}
                <div>
                    <label for="afgerond" class="block font-semibold text-sm text-gray-700">Afgerond</label>
                    <select name="afgerond" id="afgerond"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-teal-300">
                        <option value="">-- Alles --</option>
                        <option value="1" {{ request('afgerond') == '1' ? 'selected' : '' }}>Ja</option>
                        <option value="0" {{ request('afgerond') === '0' ? 'selected' : '' }}>Nee</option>
                    </select>
                </div>

                {{-- Sorteer op --}}
                <div>
                    <label for="sort_by" class="block font-semibold text-sm text-gray-700">Sorteer op</label>
                    <select name="sort_by" id="sort_by"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-teal-300">
                        <option value="">-- Geen --</option>
                        <option value="tafelnummer" {{ request('sort_by') == 'tafelnummer' ? 'selected' : '' }}>Tafelnummer</option>
                        <option value="datum" {{ request('sort_by') == 'datum' ? 'selected' : '' }}>Datum</option>
                    </select>
                </div>

                {{-- Sorteer richting --}}
                <div>
                    <label for="sort_dir" class="block font-semibold text-sm text-gray-700">Richting</label>
                    <select name="sort_dir" id="sort_dir"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-teal-300">
                        <option value="asc" {{ request('sort_dir') == 'asc' ? 'selected' : '' }}>Oplopend</option>
                        <option value="desc" {{ request('sort_dir') == 'desc' ? 'selected' : '' }}>Aflopend</option>
                    </select>
                </div>

                {{-- Actieknoppen --}}
                <div class="col-span-full flex justify-end gap-2 mt-4">
                    <button type="submit" class="bg-teal-700 px-4 py-2 border border-2 border-teal-800 text-teal-800 font-semibold rounded-md hover:bg-teal-800">
                        Filter toepassen
                    </button>
                    <a href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName()) }}"
                       class="bg-gray-300 text-gray-800 px-4 py-2 rounded-md hover:bg-gray-400">
                        Wissen
                    </a>
                    <button type="button" @click="showFilters = false"
                            class="text-gray-500 px-4 py-2 rounded-md hover:underline">
                        Sluiten
                    </button>
                </div>
            </form>
        </div>

        {{-- De sessietabel (blijft hetzelfde) --}}
        <section class="mt-6">
            @if ($sessies->isEmpty())
                <p>Geen sessies gevonden.</p>
            @else
                <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded-md">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="text-left px-4 py-2">Sessie ID</th>
                            <th class="text-left px-4 py-2">Tafelnummer</th>
                            <th class="text-left px-4 py-2">Datum</th>
                            <th class="text-left px-4 py-2">Actie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sessies as $sessie)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $sessie->sessie_id }}</td>
                                <td class="px-4 py-2">{{ $sessie->tafel_nummer }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($sessie->created_at)->format('d-m-Y H:i') }}</td>
                                <td class="px-4 py-2 text-teal-800 font-semibold">
                                    <a href="{{ route('bestellingen.start', ['mapNaam' => 'admin', 'sessie_id' => $sessie->sessie_id]) }}">
                                        Bekijk
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </section>
    </div>
@endsection
