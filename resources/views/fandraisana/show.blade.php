<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🍞 Fandraisana — {{ $fandraisana->kristianina->anarana }} {{ $fandraisana->kristianina->fanampiny }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-4">

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg p-6 space-y-4">

            <div class="flex items-center gap-2">
                <span class="font-medium text-gray-500 w-40">Kristianina :</span>
                <a href="{{ route('kristianina.show', $fandraisana->kristianina) }}"
                   class="text-blue-600 hover:underline font-medium">
                    {{ $fandraisana->kristianina->anarana }} {{ $fandraisana->kristianina->fanampiny }}
                </a>
            </div>

            <div class="flex items-center gap-2">
                <span class="font-medium text-gray-500 w-40">Daty fandraisana :</span>
                <span>{{ $fandraisana->daty->format('d/m/Y') }}</span>
            </div>

            <div class="flex items-center gap-2">
                <span class="font-medium text-gray-500 w-40">Mpanao :</span>
                <span>{{ $fandraisana->mpanao ?? '-' }}</span>
            </div>

            @if($fandraisana->fanamarinana)
            <div class="flex items-start gap-2">
                <span class="font-medium text-gray-500 w-40">Fanamarinana :</span>
                <span class="text-gray-700">{{ $fandraisana->fanamarinana }}</span>
            </div>
            @endif

            <div class="border-t pt-4">
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                    ✅ Mpandray
                </span>
            </div>

            <div class="flex gap-3 pt-2 border-t">
                <a href="{{ route('fandraisana.index') }}"
                   class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                    Miverina
                </a>
                <form action="{{ route('fandraisana.destroy', $fandraisana) }}" method="POST"
                      onsubmit="return confirm('Hofaina io fandraisana io? Hiverina ho tsy mpandray ilay kristianina.')">
                    @csrf @method('DELETE')
                    <button class="bg-red-100 text-red-600 px-4 py-2 rounded hover:bg-red-200">
                        Hofaina
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>