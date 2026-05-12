<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hanova Kristianina
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <form action="{{ route('kristianina.update', $kristianina) }}" method="POST">
                @csrf @method('PUT')

                <div class="grid grid-cols-2 gap-4">

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Anarana</label>
                        <input type="text" name="anarana" value="{{ old('anarana', $kristianina->anarana) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Fanampiny</label>
                        <input type="text" name="fanampiny" value="{{ old('fanampiny', $kristianina->fanampiny) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Daty nahaterahana</label>
                        <input type="date" name="daty_nahaterahana"
                               value="{{ old('daty_nahaterahana', $kristianina->daty_nahaterahana?->format('Y-m-d')) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Daty nidirana</label>
                        <input type="date" name="daty_nidirana"
                               value="{{ old('daty_nidirana', $kristianina->daty_nidirana?->format('Y-m-d')) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4 col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Fiangonana niaviana</label>
                        <input type="text" name="fiangonana_niaviana"
                               value="{{ old('fiangonana_niaviana', $kristianina->fiangonana_niaviana) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                </div>

                {{-- Batisa --}}
                <div class="mb-4 border rounded-lg p-4">
                    <label class="flex items-center gap-2 font-medium text-gray-700">
                        <input type="checkbox" name="batisa" id="batisa" value="1"
                               {{ old('batisa', $kristianina->batisa) ? 'checked' : '' }}
                               onchange="toggleBatisa()">
                        Batisa
                    </label>
                    <div id="batisa_fields" class="{{ old('batisa', $kristianina->batisa) ? '' : 'hidden' }} grid grid-cols-2 gap-4 mt-3">
                        <div>
                            <label class="block text-sm text-gray-600">Daty</label>
                            <input type="date" name="batisa_daty"
                                   value="{{ old('batisa_daty', $kristianina->batisa_daty?->format('Y-m-d')) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600">Toerana</label>
                            <input type="text" name="batisa_toerana"
                                   value="{{ old('batisa_toerana', $kristianina->batisa_toerana) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>
                </div>

                {{-- Mpandray --}}
                <div class="mb-4 border rounded-lg p-4">
                    <label class="flex items-center gap-2 font-medium text-gray-700">
                        <input type="checkbox" name="mpandray" id="mpandray" value="1"
                               {{ old('mpandray', $kristianina->mpandray) ? 'checked' : '' }}
                               onchange="toggleMpandray()">
                        Mpandray
                    </label>
                    <div id="mpandray_fields" class="{{ old('mpandray', $kristianina->mpandray) ? '' : 'hidden' }} grid grid-cols-2 gap-4 mt-3">
                        <div>
                            <label class="block text-sm text-gray-600">Daty</label>
                            <input type="date" name="mpandray_daty"
                                   value="{{ old('mpandray_daty', $kristianina->mpandray_daty?->format('Y-m-d')) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600">Toerana</label>
                            <input type="text" name="mpandray_toerana"
                                   value="{{ old('mpandray_toerana', $kristianina->mpandray_toerana) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Fianakaviana</label>
                        <select name="fianakaviana_id"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">-- Safidio --</option>
                            @foreach($fianakaviana as $f)
                                <option value="{{ $f->id }}"
                                    {{ old('fianakaviana_id', $kristianina->fianakaviana_id) == $f->id ? 'selected' : '' }}>
                                    {{ $f->anarana }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Andraikitra</label>
                        <input type="text" name="andraikitra"
                               value="{{ old('andraikitra', $kristianina->andraikitra) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Laharana (optionnel)</label>
                        <input type="text" name="laharana"
                               value="{{ old('laharana', $kristianina->laharana) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Fanamarinana</label>
                        <textarea name="fanamarinana" rows="2"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('fanamarinana', $kristianina->fanamarinana) }}</textarea>
                    </div>

                </div>

                <div class="flex gap-3 mt-2">
                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Tehirizo
                    </button>
                    <a href="{{ route('kristianina.index') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                        Miverina
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleBatisa() {
            document.getElementById('batisa_fields').classList.toggle('hidden');
        }
        function toggleMpandray() {
            document.getElementById('mpandray_fields').classList.toggle('hidden');
        }
    </script>
</x-app-layout>