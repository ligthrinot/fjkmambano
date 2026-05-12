<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

        {{-- Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-white shadow rounded-lg p-6 flex items-center gap-4">
                <div class="text-4xl">👨‍👩‍👧</div>
                <div>
                    <p class="text-gray-400 text-sm">Fianakaviana</p>
                    <p class="text-3xl font-bold text-gray-800">{{ \App\Models\Fianakaviana::count() }}</p>
                </div>
                <a href="{{ route('fianakaviana.index') }}"
                   class="ml-auto text-blue-600 text-sm hover:underline">Hijery →</a>
            </div>

            <div class="bg-white shadow rounded-lg p-6 flex items-center gap-4">
                <div class="text-4xl">✝️</div>
                <div>
                    <p class="text-gray-400 text-sm">Kristianina</p>
                    <p class="text-3xl font-bold text-gray-800">{{ \App\Models\Kristianina::count() }}</p>
                </div>
                <a href="{{ route('kristianina.index') }}"
                   class="ml-auto text-blue-600 text-sm hover:underline">Hijery →</a>
            </div>

        </div>

        {{-- Stats détaillées Kristianina --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-white shadow rounded-lg p-6 flex items-center gap-4">
                <div class="text-4xl">💧</div>
                <div>
                    <p class="text-gray-400 text-sm">Kristianina natao Batisa</p>
                    <p class="text-3xl font-bold text-green-600">{{ \App\Models\Kristianina::where('batisa', true)->count() }}</p>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg p-6 flex items-center gap-4">
                <div class="text-4xl">🍞</div>
                <div>
                    <p class="text-gray-400 text-sm">Kristianina Mpandray</p>
                    <p class="text-3xl font-bold text-blue-600">{{ \App\Models\Kristianina::where('mpandray', true)->count() }}</p>
                </div>
            </div>

        </div>

        {{-- Derniers Kristianina --}}
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-700">✝️ Kristianina farany niditra</h3>
                <a href="{{ route('kristianina.create') }}"
                   class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                    + Manampy
                </a>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Anarana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fanampiny</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fianakaviana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Daty nidirana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Batisa</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mpandray</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse(\App\Models\Kristianina::with('fianakaviana')->latest()->take(5)->get() as $k)
                    <tr>
                        <td class="px-4 py-3">
                            <a href="{{ route('kristianina.show', $k) }}" class="text-blue-600 hover:underline">
                                {{ $k->anarana }}
                            </a>
                        </td>
                        <td class="px-4 py-3">{{ $k->fanampiny }}</td>
                        <td class="px-4 py-3">
                            @if($k->fianakaviana)
                                <a href="{{ route('fianakaviana.show', $k->fianakaviana) }}" class="text-blue-600 hover:underline">
                                    {{ $k->fianakaviana->anarana }}
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-4 py-3">{{ $k->daty_nidirana?->format('d/m/Y') ?? '-' }}</td>
                        <td class="px-4 py-3">
                            @if($k->batisa)
                                <span class="text-green-600 font-medium">Eny</span>
                            @else
                                <span class="text-red-400">Tsia</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if($k->mpandray)
                                <span class="text-green-600 font-medium">Eny</span>
                            @else
                                <span class="text-red-400">Tsia</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-400">Tsy misy kristianina</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Dernières Fianakaviana --}}
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-700">👨‍👩‍👧 Fianakaviana farany niditra</h3>
                <a href="{{ route('fianakaviana.create') }}"
                   class="bg-blue-600 text-white px-3 py-1 rounded text-sm hover:bg-blue-700">
                    + Manampy
                </a>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Anarana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Faritra</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fokontany</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fifandraisana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kristianina</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse(\App\Models\Fianakaviana::withCount('kristianinas')->latest()->take(5)->get() as $f)
                    <tr>
                        <td class="px-4 py-3">
                            <a href="{{ route('fianakaviana.show', $f) }}" class="text-blue-600 hover:underline">
                                {{ $f->anarana }}
                            </a>
                        </td>
                        <td class="px-4 py-3">{{ $f->faritra }}</td>
                        <td class="px-4 py-3">{{ $f->fokontany }}</td>
                        <td class="px-4 py-3">{{ $f->fifandraisana ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm">
                                {{ $f->kristianinas_count }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-4 text-center text-gray-400">Tsy misy fianakaviana</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>