<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Fidiana Diakona / Loholona vaovao
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <form action="{{ route('diakona.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Kristianina Mpandray</label>
                    <select name="kristianina_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Safidio --</option>
                        @foreach($kristianinas as $k)
                            <option value="{{ $k->id }}" {{ old('kristianina_id') == $k->id ? 'selected' : '' }}>
                                {{ $k->anarana }} {{ $k->fanampiny }}
                                @if($k->diakonaActif) (Diakona/Loholona ankehitriny) @endif
                            </option>
                        @endforeach
                    </select>
                    @error('kristianina_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Karazana</label>
                    <select name="karazana"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Safidio --</option>
                        <option value="Diakona" {{ old('karazana') == 'Diakona' ? 'selected' : '' }}>Diakona</option>
                        <option value="Loholona" {{ old('karazana') == 'Loholona' ? 'selected' : '' }}>Loholona</option>
                    </select>
                    @error('karazana') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Groupe Diakona</label>
                    <select name="groupe_diakona_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Safidio --</option>
                        @foreach($groupes as $g)
                            <option value="{{ $g->id }}" {{ old('groupe_diakona_id') == $g->id ? 'selected' : '' }}>
                                {{ $g->anarana }}
                            </option>
                        @endforeach
                    </select>
                    @error('groupe_diakona_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Daty fidiana (élection)</label>
                        <input type="date" name="daty_fidiana" value="{{ old('daty_fidiana') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('daty_fidiana') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Daty manomboka (début mandat)</label>
                        <input type="date" name="daty_manomboka" value="{{ old('daty_manomboka') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('daty_manomboka') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Daty farany (fin mandat, optional)</label>
                        <input type="date" name="daty_farany" value="{{ old('daty_farany') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Fanamariana</label>
                    <textarea name="fanamariana" rows="3"
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('fanamariana') }}</textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Tehirizo
                    </button>
                    <a href="{{ route('diakona.index') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                        Miverina
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>