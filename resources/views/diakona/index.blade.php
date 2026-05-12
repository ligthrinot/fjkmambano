<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Diakona / Loholona
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Mandat actif --}}
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-700">
                    🕊️ Mandat Ankehitriny
                    <span class="ml-2 bg-green-100 text-green-700 px-2 py-1 rounded text-sm">
                        {{ $actifs->count() }}
                    </span>
                </h3>
                <a href="{{ route('diakona.create') }}"
                   class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                    + Fidiana vaovao
                </a>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Anarana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Karazana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Groupe</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Daty fidiana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Manomboka</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sehatra</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($actifs as $item)
                    <tr>
                        <td class="px-4 py-3">
                            <a href="{{ route('diakona.show', $item->kristianina) }}"
                               class="text-blue-600 hover:underline">
                                {{ $item->kristianina->anarana }} {{ $item->kristianina->fanampiny }}
                            </a>
                        </td>
                        <td class="px-4 py-3">
                            @if($item->karazana === 'Diakona')
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm">Diakona</span>
                            @else
                                <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-sm">Loholona</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('groupe_diakona.show', $item->groupeDiakona) }}"
                               class="text-blue-600 hover:underline">
                                {{ $item->groupeDiakona->anarana }}
                            </a>
                        </td>
                        <td class="px-4 py-3">{{ $item->daty_fidiana->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">{{ $item->daty_manomboka->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">
                            <div class="flex gap-2">
                                <a href="{{ route('diakona.edit', $item) }}"
                                   class="text-yellow-600 hover:underline">Hanova</a>
                                <form action="{{ route('diakona.terminer', $item) }}" method="POST"
                                      onsubmit="return confirm('Hafaranana ny mandat?')">
                                    @csrf
                                    <button class="text-red-600 hover:underline">Farana</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-400">Tsy misy mandat ankehitriny</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Historique --}}
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-700">
                    📋 Historique Mandat
                    <span class="ml-2 bg-gray-100 text-gray-600 px-2 py-1 rounded text-sm">
                        {{ $termines->count() }}
                    </span>
                </h3>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Anarana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Karazana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Groupe</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Daty fidiana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Manomboka</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Farany</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sehatra</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($termines as $item)
                    <tr class="bg-gray-50">
                        <td class="px-4 py-3">
                            <a href="{{ route('diakona.show', $item->kristianina) }}"
                               class="text-blue-600 hover:underline">
                                {{ $item->kristianina->anarana }} {{ $item->kristianina->fanampiny }}
                            </a>
                        </td>
                        <td class="px-4 py-3">
                            @if($item->karazana === 'Diakona')
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm">Diakona</span>
                            @else
                                <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-sm">Loholona</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $item->groupeDiakona->anarana }}</td>
                        <td class="px-4 py-3">{{ $item->daty_fidiana->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">{{ $item->daty_manomboka->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">{{ $item->daty_farany?->format('d/m/Y') ?? '-' }}</td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('diakona.edit', $item) }}"
                               class="text-yellow-600 hover:underline">Hanova</a>
                            <form action="{{ route('diakona.destroy', $item) }}" method="POST"
                                  onsubmit="return confirm('Hofaina?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Hofaina</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-400">Tsy misy historique</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>