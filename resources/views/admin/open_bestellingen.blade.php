@extends('layouts.main')

@section('main')
    <section>
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold mb-6">Open bestellingen</h1>
            <p><a href="{{ url('admin') }}" class="text-teal-700 p-2 border border-2 rounded-md hover:text-teal-700 font-semibold">Terug</a></p>
        </div>
    </section>

    <section>
        @if ($bestellingen->isEmpty())
            <p class="text-gray-600">Er zijn geen open bestellingen.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 shadow rounded-md">
                    <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
                        <tr>
                            <th class="px-4 py-3 border-b">Sessie ID</th>
                            <th class="px-4 py-3 border-b">Gerecht</th>
                            <th class="px-4 py-3 border-b">Besteld op</th>
                            <th class="px-4 py-3 border-b">Actie</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm text-gray-800">
                        @foreach ($bestellingen as $bestelling)
                            <tr class="hover:bg-gray-50 border-t">
                                <td class="px-4 py-2">{{ $bestelling->sessie_id }}</td>
                                <td class="px-4 py-2">{{ $bestelling->gerecht_naam }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($bestelling->created_at)->format('d-m-Y H:i') }}</td>
                                <td class="px-4 py-2">
                                    @if (!$bestelling->is_klaar)
                                    <form action="{{ route('bestelling.klaar', $bestelling->id) }}" method="POST" onsubmit="return confirm('Markeer deze bestelling als klaar?');">
                                        @csrf
                                        <button type="submit" class="bg-teal-600 text-white px-3 py-1 rounded hover:bg-teal-700 text-sm">
                                            Klaar
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection