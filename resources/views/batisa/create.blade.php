<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">🙏 Batisa vaovao</h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6 space-y-5">

            @if($errors->any())
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded space-y-1">
                    @foreach($errors->all() as $error)
                        <div>• {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if($kristianinas->isEmpty())
                <div class="bg-yellow-50 border border-yellow-200 text-yellow-700 px-4 py-4 rounded text-sm">
                    ✅ Kristianina rehetra vita batisa sahady. Tsy misy ilaina eto.
                </div>
                <a href="{{ route('batisa.index') }}"
                   class="inline-block bg-gray-200 text-gray-700 px-5 py-2 rounded hover:bg-gray-300">
                    Miverina
                </a>
            @else

            <form action="{{ route('batisa.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Kristianina --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Kristianina tsy vita batisa <span class="text-red-500">*</span>
                    </label>
                    <select name="kristianina_id" required
                            class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Safidio --</option>
                        @foreach($kristianinas as $k)
                            <option value="{{ $k->id }}" {{ old('kristianina_id') == $k->id ? 'selected' : '' }}>
                                {{ $k->anarana }} {{ $k->fanampiny }}
                            </option>
                        @endforeach
                    </select>
                    @error('kristianina_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Daty --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Daty batisa <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="daty" value="{{ old('daty') }}" required
                           class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('daty')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Mpanao batisa --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mpanao batisa</label>
                    <input type="text" name="mpanao_batisa" value="{{ old('mpanao_batisa') }}"
                           placeholder="Anaran'ny mpitandrina"
                           class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('mpanao_batisa')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Fanamarinana --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fanamarinana</label>
                    <textarea name="fanamarinana" rows="3"
                              placeholder="Fanamarihana fanampiny..."
                              class="w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('fanamarinana') }}</textarea>
                    @error('fanamarinana')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit"
                            class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
                        Tehirizo
                    </button>
                    <a href="{{ route('batisa.index') }}"
                       class="bg-gray-200 text-gray-700 px-5 py-2 rounded hover:bg-gray-300">
                        Miverina
                    </a>
                </div>
            </form>

            @endif
        </div>
    </div>
</x-app-layout>