<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $groupeDiakona->anarana }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

        {{-- Infos Groupe --}}
        <div class="bg-white shadow rounded-lg p-6 space-y-3">
            <div><span class="font-medium text-gray-500">Anarana :</span> {{ $groupeDiakona->anarana }}</div>
            <div><span class="font-medium text-gray-500">Fanamariana :</span> {{ $groupeDiakona->fanamariana ?? '-' }}</div>

            <div class="flex gap-3 pt-4">
                <a href="{{ route('groupe_diakona.edit', $groupeDiakona) }}"
                   class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                    Hanova
                </a>
                <a href="{{ route('groupe_diakona.index') }}"
                   class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                    Miverina
                </a>
            </div>
        </div>

        {{-- Liste Diakona actifs --}}
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-700">
                    🕊️ Diakona / Loholona ao amin'ity groupe ity
                    <span class="ml-2 bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm">
                        {{ $groupeDiakona->diakonas->count() }}
                    </span>
                </h3>
                <a href="{{ route('diakona.create') }}"
                   class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                    + Manampy
                </a>
            </div>

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Anarana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Karazana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Daty nofidiana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sehatra</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($groupeDiakona->diakonas as $diakona)
                    <tr>
                        <td class="px-4 py-3">
                            <a href="{{ route('diakona.show', $diakona) }}" class="text-blue-600 hover:underline">
                                {{ $diakona->kristianina->anarana }} {{ $diakona->kristianina->fanampiny }}
                            </a>
                        </td>
                        <td class="px-4 py-3">
                            @if($diakona->karazana === 'Diakona')
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm">Diakona</span>
                            @else
                                <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-sm">Loholona</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $diakona->daty_fidiana?->format('d/m/Y') ?? '-' }}</td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('diakona.edit', $diakona) }}"
                               class="text-yellow-600 hover:underline">Hanova</a>
                            <form action="{{ route('diakona.destroy', $diakona) }}" method="POST"
                                  onsubmit="return confirm('Hofaina?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Hofaina</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-gray-400">
                            Tsy misy Diakona / Loholona ao amin'ity groupe ity
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>