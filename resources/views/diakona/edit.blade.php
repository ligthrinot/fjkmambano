<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hanova Mandat
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <form action="{{ route('diakona.update', $diakona) }}" method="POST">
                @csrf @method('PUT')

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Kristianina Mpandray</label>
                    <select name="kristianina_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @foreach($kristianinas as $k)
                            <option value="{{ $k->id }}"
                                {{ old('kristianina_id', $diakona->kristianina_id) == $k->id ? 'selected' : '' }}>
                                {{ $k->anarana }} {{ $k->fanampiny }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Karazana</label>
                    <select name="karazana"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="Diakona" {{ old('karazana', $diakona->karazana) == 'Diakona' ? 'selected' : '' }}>Diakona</option>
                        <option value="Loholona" {{ old('karazana', $diakona->karazana) == 'Loholona' ? 'selected' : '' }}>Loholona</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Groupe Diakona</label>
                    <select name="groupe_diakona_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @foreach($groupes as $g)
                            <option value="{{ $g->id }}"
                                {{ old('groupe_diakona_id', $diakona->groupe_diakona_id) == $g->id ? 'selected' : '' }}>
                                {{ $g->anarana }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Daty fidiana</label>
                        <input type="date" name="daty_fidiana"
                               value="{{ old('daty_fidiana', $diakona->daty_fidiana->format('Y-m-d')) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Daty manomboka</label>
                        <input type="date" name="daty_manomboka"
                               value="{{ old('daty_manomboka', $diakona->daty_manomboka->format('Y-m-d')) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Daty farany</label>
                        <input type="date" name="daty_farany"
                               value="{{ old('daty_farany', $diakona->daty_farany?->format('Y-m-d')) }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="flex items-center gap-2 font-medium text-gray-700">
                        <input type="checkbox" name="active" value="1"
                               {{ old('active', $diakona->active) ? 'checked' : '' }}>
                        Mandat mbola mitohy (actif)
                    </label>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Fanamariana</label>
                    <textarea name="fanamariana" rows="3"
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('fanamariana', $diakona->fanamariana) }}</textarea>
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