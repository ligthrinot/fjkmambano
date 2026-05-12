<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🙏 Batisa — {{ $batisa->kristianina->anarana }} {{ $batisa->kristianina->fanampiny }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-4">

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-lg p-6 space-y-4">

            {{-- Kristianina --}}
            <div class="flex items-center gap-2">
                <span class="font-medium text-gray-500 w-40">Kristianina :</span>
                <a href="{{ route('kristianina.show', $batisa->kristianina) }}"
                   class="text-blue-600 hover:underline font-medium">
                    {{ $batisa->kristianina->anarana }} {{ $batisa->kristianina->fanampiny }}
                </a>
            </div>

            {{-- Daty --}}
            <div class="flex items-center gap-2">
                <span class="font-medium text-gray-500 w-40">Daty batisa :</span>
                <span>{{ $batisa->daty->format('d/m/Y') }}</span>
            </div>

            {{-- Mpanao batisa --}}
            <div class="flex items-center gap-2">
                <span class="font-medium text-gray-500 w-40">Mpanao batisa :</span>
                <span>{{ $batisa->mpanao_batisa ?? '-' }}</span>
            </div>

            {{-- Fanamarinana --}}
            <div class="flex items-start gap-2">
                <span class="font-medium text-gray-500 w-40">Fanamarinana :</span>
                <span class="text-gray-700">{{ $batisa->fanamarinana ?? '-' }}</span>
            </div>

            {{-- Badge statut --}}
            <div class="border-t pt-4">
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">
                    ✅ Vita batisa
                </span>
            </div>

            {{-- Actions --}}
            <div class="flex gap-3 pt-2 border-t">
                <a href="{{ route('batisa.index') }}"
                   class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                    Miverina
                </a>
                <form action="{{ route('batisa.destroy', $batisa) }}" method="POST"
                      onsubmit="return confirm('Hofaina io batisa io? Hiverina ho tsy vita batisa ilay kristianina.')">
                    @csrf @method('DELETE')
                    <button class="bg-red-100 text-red-600 px-4 py-2 rounded hover:bg-red-200">
                        Hofaina
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>