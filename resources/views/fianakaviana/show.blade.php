<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $fianakaviana->anarana }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

        {{-- Infos Fianakaviana --}}
        <div class="bg-white shadow rounded-lg p-6 space-y-3">
            <div><span class="font-medium text-gray-500">Anarana :</span> {{ $fianakaviana->anarana }}</div>
            <div><span class="font-medium text-gray-500">Adressy :</span> {{ $fianakaviana->adressy }}</div>
            <div><span class="font-medium text-gray-500">Faritra :</span> {{ $fianakaviana->faritra }}</div>
            <div><span class="font-medium text-gray-500">Fokontany :</span> {{ $fianakaviana->fokontany }}</div>
            <div><span class="font-medium text-gray-500">Fifandraisana :</span> {{ $fianakaviana->fifandraisana }}</div>
            <div><span class="font-medium text-gray-500">Fanamarihana :</span> {{ $fianakaviana->fanamarihana }}</div>

            <div class="flex gap-3 pt-4">
                <a href="{{ route('fianakaviana.edit', $fianakaviana) }}"
                   class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                    Hanova
                </a>
                <a href="{{ route('fianakaviana.index') }}"
                   class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                    Miverina
                </a>
            </div>
        </div>

        {{-- Liste des Kristianina --}}
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-700">✝️ Kristianina ao amin'ity fianakaviana ity</h3>
                <a href="{{ route('kristianina.create') }}"
                   class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                    + Manampy
                </a>
            </div>

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Anarana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fanampiny</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Andraikitra</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Batisa</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mpandray</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sehatra</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($fianakaviana->kristianinas as $kristianina)
                    <tr>
                        <td class="px-4 py-3">{{ $kristianina->anarana }}</td>
                        <td class="px-4 py-3">{{ $kristianina->fanampiny }}</td>
                        <td class="px-4 py-3">{{ $kristianina->andraikitra ?? '-' }}</td>
                        <td class="px-4 py-3">
                            @if($kristianina->batisa)
                                <span class="text-green-600 font-medium">Eny</span>
                            @else
                                <span class="text-red-400">Tsia</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if($kristianina->mpandray)
                                <span class="text-green-600 font-medium">Eny</span>
                            @else
                                <span class="text-red-400">Tsia</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('kristianina.show', $kristianina) }}"
                               class="text-blue-600 hover:underline">Hijery</a>
                            <a href="{{ route('kristianina.edit', $kristianina) }}"
                               class="text-yellow-600 hover:underline">Hanova</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-400">
                            Tsy misy kristianina ao amin'ity fianakaviana ity
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>