<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $kristianina->anarana }} {{ $kristianina->fanampiny }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
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
                    — {{ $kristianina->batisa_daty?->format('d/m/Y') }} — {{ $kristianina->batisa_toerana }}
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

            <div>
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
    </div>
</x-app-layout>