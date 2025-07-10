@extends('layouts.main')

@section('main')
    <section>
        <div class="flex flex-row-reverse justify-end gap-20">
            <h1 class="text-2xl font-bold mb-6">Jouw Bestellingen</h1>
            <a href="{{ url()->previous() }}" class="text-sm text-teal-700 border border-2 border-teal-800 rounded rounded-lg mx-2 py-2 px-3 hover:underline mb-4 flex items-center w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                <span class="ml-1">Terug</span>
            </a>
        </div>

        @if ($bestellingen->isEmpty())
            <p>Je hebt nog geen bestellingen geplaatst.</p>
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

    </section>
@endsection