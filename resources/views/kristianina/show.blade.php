<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $kristianina->anarana }} {{ $kristianina->fanampiny }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

        {{-- Infos principales --}}
        <div class="bg-white shadow rounded-lg p-6 space-y-3">

            <div><span class="font-medium text-gray-500">Anarana :</span> {{ $kristianina->anarana }}</div>
            <div><span class="font-medium text-gray-500">Fanampiny :</span> {{ $kristianina->fanampiny }}</div>
            <div><span class="font-medium text-gray-500">Daty nahaterahana :</span> {{ $kristianina->daty_nahaterahana?->format('d/m/Y') ?? '-' }}</div>
            <div><span class="font-medium text-gray-500">Daty nidirana :</span> {{ $kristianina->daty_nidirana?->format('d/m/Y') ?? '-' }}</div>
            <div><span class="font-medium text-gray-500">Fiangonana niaviana :</span> {{ $kristianina->fiangonana_niaviana ?? '-' }}</div>

            <div class="border-t pt-3">
                <span class="font-medium text-gray-500">Batisa :</span>
                @if($kristianina->batisa)
                    <span class="text-green-600">Eny</span>
                    — {{ $kristianina->batisa_daty?->format('d/m/Y') }}
                @else
                    <span class="text-red-400">Tsia</span>
                @endif
            </div>

            <div class="border-t pt-3">
                <span class="font-medium text-gray-500">Mpandray :</span>
                @if($kristianina->mpandray)
                    <span class="text-green-600">Eny</span>
                    — {{ $kristianina->mpandray_daty?->format('d/m/Y') }} — {{ $kristianina->mpandray_toerana }}
                @else
                    <span class="text-red-400">Tsia</span>
                @endif
            </div>

            <div class="border-t pt-3">
                <span class="font-medium text-gray-500">Fianakaviana :</span>
                @if($kristianina->fianakaviana)
                    <a href="{{ route('fianakaviana.show', $kristianina->fianakaviana) }}"
                       class="text-blue-600 hover:underline">
                        {{ $kristianina->fianakaviana->anarana }}
                    </a>
                @else
                    -
                @endif
            </div>

            <div><span class="font-medium text-gray-500">Andraikitra :</span> {{ $kristianina->andraikitra ?? '-' }}</div>
            <div><span class="font-medium text-gray-500">Laharana :</span> {{ $kristianina->laharana ?? '-' }}</div>
            <div><span class="font-medium text-gray-500">Fanamarinana :</span> {{ $kristianina->fanamarinana ?? '-' }}</div>

            <div class="flex gap-3 pt-4">
                <a href="{{ route('kristianina.edit', $kristianina) }}"
                   class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                    Hanova
                </a>
                <a href="{{ route('kristianina.index') }}"
                   class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                    Miverina
                </a>
            </div>
        </div>

        {{-- Batisa --}}
        @if($kristianina->batisaRecord)
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b flex items-center gap-3">
                <h3 class="text-lg font-semibold text-gray-700">🙏 Batisa</h3>
                <span class="bg-green-100 text-green-700 px-2 py-1 rounded text-sm font-medium">✅ Vita</span>
            </div>
            <div class="p-6 space-y-3">
                <div class="flex items-center gap-2">
                    <span class="font-medium text-gray-500 w-40">Daty batisa :</span>
                    <span>{{ $kristianina->batisaRecord->daty->format('d/m/Y') }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="font-medium text-gray-500 w-40">Mpanao batisa :</span>
                    <span>{{ $kristianina->batisaRecord->mpanao_batisa ?? '-' }}</span>
                </div>
                @if($kristianina->batisaRecord->fanamarinana)
                <div class="flex items-start gap-2">
                    <span class="font-medium text-gray-500 w-40">Fanamarinana :</span>
                    <span class="text-gray-700">{{ $kristianina->batisaRecord->fanamarinana }}</span>
                </div>
                @endif
                <div class="pt-2 flex items-center justify-between">
                    <a href="{{ route('batisa.show', $kristianina->batisaRecord) }}"
                       class="text-blue-600 hover:underline text-sm">
                        Hijery ny antontan-taratasy batisa →
                    </a>
                    <form action="{{ route('batisa.destroy', $kristianina->batisaRecord) }}" method="POST"
                          onsubmit="return confirm('Hofaina io batisa io? Hiverina ho tsy vita batisa ilay kristianina.')">
                        @csrf @method('DELETE')
                        <button class="text-red-500 hover:underline text-sm">Hofaina</button>
                    </form>
                </div>
            </div>
        </div>
        @else
        <div class="bg-white shadow rounded-lg p-5 flex items-center gap-3">
            <span class="text-gray-400 text-sm">🙏 Batisa :</span>
            <span class="bg-red-100 text-red-500 px-2 py-1 rounded text-sm">Tsy vita batisa</span>
            <a href="{{ route('batisa.create') }}"
               class="ml-auto text-sm bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                + Manampy batisa
            </a>
        </div>
        @endif

        {{-- Historique mandats Diakona --}}
        @if($kristianina->diakonas->isNotEmpty())
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b flex items-center gap-3">
                <h3 class="text-lg font-semibold text-gray-700">🕊️ Historique Diakona / Loholona</h3>
                <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm">
                    {{ $kristianina->diakonas->count() }}
                </span>
            </div>

            <div class="p-6">
                <ol class="relative border-l border-gray-200 space-y-6 ml-3">
                    @foreach($kristianina->diakonas->sortByDesc('daty_fidiana') as $mandat)
                    <li class="ml-6">

                        <span class="absolute -left-2 flex items-center justify-center w-4 h-4 rounded-full ring-4 ring-white
                            {{ $mandat->active ? 'bg-green-500' : 'bg-gray-300' }}">
                        </span>

                        <div class="flex items-start justify-between gap-4">
                            <div class="space-y-1">

                                <div class="flex items-center gap-2 flex-wrap">
                                    @if($mandat->karazana === 'Diakona')
                                        <span class="bg-blue-100 text-blue-700 px-2 py-0.5 rounded text-sm font-medium">Diakona</span>
                                    @else
                                        <span class="bg-purple-100 text-purple-700 px-2 py-0.5 rounded text-sm font-medium">Loholona</span>
                                    @endif

                                    @if($mandat->active)
                                        <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded text-sm font-medium">
                                            ✅ Mandat encours
                                        </span>
                                    @else
                                        <span class="bg-gray-100 text-gray-500 px-2 py-0.5 rounded text-sm">
                                            Vita
                                        </span>
                                    @endif
                                </div>

                                <div class="text-sm text-gray-600">
                                    <span class="font-medium">Groupe :</span>
                                    {{ $mandat->groupeDiakona->anarana ?? '-' }}
                                </div>

                                <div class="text-sm text-gray-500">
                                    {{ $mandat->daty_fidiana?->format('d/m/Y') ?? '-' }}
                                    →
                                    @if($mandat->active)
                                        <span class="text-green-600 font-medium">ankehitriny</span>
                                    @else
                                        {{ $mandat->daty_farany?->format('d/m/Y') ?? '-' }}
                                    @endif
                                </div>

                                @if($mandat->fanamariana)
                                    <div class="text-sm text-gray-400 italic">{{ $mandat->fanamariana }}</div>
                                @endif

                            </div>

                            <div class="flex flex-col gap-1 text-right shrink-0">
                                @if($mandat->active)
                                    <form action="{{ route('diakona.terminer', $mandat) }}" method="POST"
                                          onsubmit="return confirm('Hamarina fa vita ny mandat?')">
                                        @csrf
                                        <button class="text-xs text-orange-600 hover:underline">Hafarana</button>
                                    </form>
                                @endif
                                <a href="{{ route('diakona.edit', $mandat) }}"
                                   class="text-xs text-yellow-600 hover:underline">Hanova</a>
                                <form action="{{ route('diakona.destroy', $mandat) }}" method="POST"
                                      onsubmit="return confirm('Hofaina?')">
                                    @csrf @method('DELETE')
                                    <button class="text-xs text-red-500 hover:underline">Hofaina</button>
                                </form>
                            </div>
                        </div>

                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
        @endif

    </div>
</x-app-layout>