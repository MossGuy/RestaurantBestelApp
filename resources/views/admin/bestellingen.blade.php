@extends('layouts.main')

@section('main')
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold mb-6">Bestellingen van Tafel sessie: {{ $sessie_id }}</h1>
        <p><a href="{{ url()->previous() }}" class="text-teal-700 p-2 border border-2 rounded-md hover:text-teal-700 font-semibold">Terug</a></p>
    </div>

    @if ($bestellingen->isEmpty())
            <p>Er zijn geen bestellingen geregistreerd voor deze sessie.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="text-left px-4 py-2 border-b">Gerecht</th>
                            <th class="text-right px-4 py-2 border-b">Aantal</th>
                            <th class="text-right px-4 py-2 border-b">Prijs per stuk</th>
                            <th class="text-right px-4 py-2 border-b">Totaal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $totaal = 0; @endphp
                        @foreach ($bestellingen as $bestelling)
                            @php
                                $subtotaal = $bestelling->prijs * $bestelling->aantal;
                                $totaal += $subtotaal;
                            @endphp
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $bestelling->gerecht_naam }}</td>
                                <td class="px-4 py-2 text-right">{{ $bestelling->aantal }}</td>
                                <td class="px-4 py-2 text-right">€{{ number_format($bestelling->prijs, 2, ',', '.') }}</td>
                                <td class="px-4 py-2 text-right">€{{ number_format($subtotaal, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 text-right">
                <p class="text-lg font-semibold">Totaal: €{{ number_format($totaal, 2, ',', '.') }}</p>
            </div>
        @endif
@endsection
