<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Fianakaviana vaovao
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <form action="{{ route('fianakaviana.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Anarana</label>
                    <input type="text" name="anarana" value="{{ old('anarana') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('anarana') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Adressy</label>
                    <input type="text" name="adressy" value="{{ old('adressy') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('adressy') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Faritra</label>
                    <input type="text" name="faritra" value="{{ old('faritra') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('faritra') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Fokontany</label>
                    <input type="text" name="fokontany" value="{{ old('fokontany') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('fokontany') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Fifandraisana</label>
                    <input type="text" name="fifandraisana" value="{{ old('fifandraisana') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Fanamarihana</label>
                    <textarea name="fanamarihana" rows="3"
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('fanamarihana') }}</textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Tehirizo
                    </button>
                    <a href="{{ route('fianakaviana.index') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
                        Miverina
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>