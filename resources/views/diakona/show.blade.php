<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Historique — {{ $kristianina->anarana }} {{ $kristianina->fanampiny }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

        {{-- Info Kristianina --}}
        <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between">
            <div class="space-y-1">
                <p class="text-xl font-bold text-gray-800">{{ $kristianina->anarana }} {{ $kristianina->fanampiny }}</p>
                <p class="text-gray-500 text-sm">Fianakaviana : 
                    @if($kristianina->fianakaviana)
                        <a href="{{ route('fianakaviana.show', $kristianina->fianakaviana) }}"
                           class="text-blue-600 hover:underline">{{ $kristianina->fianakaviana->anarana }}</a>
                    @else - @endif
                </p>
                <p class="text-gray-500 text-sm">Daty nidirana : {{ $kristianina->daty_nidirana?->format('d/m/Y') ?? '-' }}</p>
            </div>
            <a href="{{ route('kristianina.show', $kristianina) }}"
               class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 text-sm">
                Hijery profil
            </a>
        </div>

        {{-- Historique Mandat --}}
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-700">
                    📋 Historique Mandat
                    <span class="ml-2 bg-gray-100 text-gray-600 px-2 py-1 rounded text-sm">
                        {{ $historique->count() }}
                    </span>
                </h3>
                <a href="{{ route('diakona.create') }}"
                   class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                    + Fidiana vaovao
                </a>
            </div>

            <div class="p-6 space-y-4">
                @forelse($historique as $mandat)
                <div class="border rounded-lg p-4 {{ $mandat->active ? 'border-green-300 bg-green-50' : 'border-gray-200' }}">
                    <div class="flex items-center justify-between mb-2">
                        <div class="flex items-center gap-2">
                            @if($mandat->karazana === 'Diakona')
                                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm">Diakona</span>
                            @else
                                <span class="bg-purple-100 text-purple-700 px-2 py-1 rounded text-sm">Loholona</span>
                            @endif
                            @if($mandat->active)
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm">● Ankehitriny</span>
                            @else
                                <span class="bg-gray-100 text-gray-500 px-2 py-1 rounded text-sm">Vita</span>
                            @endif
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('diakona.edit', $mandat) }}"
                               class="text-yellow-600 hover:underline text-sm">Hanova</a>
                            @if($mandat->active)
                            <form action="{{ route('diakona.terminer', $mandat) }}" method="POST"
                                  onsubmit="return confirm('Hafaranana ny mandat?')">
                                @csrf
                                <button class="text-red-600 hover:underline text-sm">Farana</button>
                            </form>
                            @endif
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-sm text-gray-600">
                        <div>
                            <p class="text-gray-400 text-xs">Groupe</p>
                            <p class="font-medium">{{ $mandat->groupeDiakona->anarana }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Daty fidiana</p>
                            <p class="font-medium">{{ $mandat->daty_fidiana->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Manomboka</p>
                            <p class="font-medium">{{ $mandat->daty_manomboka->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs">Farany</p>
                            <p class="font-medium">{{ $mandat->daty_farany?->format('d/m/Y') ?? '—' }}</p>
                        </div>
                    </div>
                    @if($mandat->fanamariana)
                    <p class="mt-2 text-sm text-gray-500">{{ $mandat->fanamariana }}</p>
                    @endif
                </div>
                @empty
                <p class="text-center text-gray-400 py-4">Tsy misy historique mandat</p>
                @endforelse
            </div>
        </div>

    </div>
</x-app-layout>