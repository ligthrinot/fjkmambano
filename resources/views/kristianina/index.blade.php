<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lisitry ny Kristianina
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <a href="{{ route('kristianina.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Kristianina vaovao
            </a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Laharana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Anarana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fanampiny</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fianakaviana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Batisa</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mpandray</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sehatra</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($kristianinas as $item)
                    <tr>
                        <td class="px-4 py-3">{{ $item->laharana ?? '-' }}</td>
                        <td class="px-4 py-3">{{ $item->anarana }}</td>
                        <td class="px-4 py-3">{{ $item->fanampiny }}</td>
                        <td class="px-4 py-3">{{ $item->fianakaviana->anarana ?? '-' }}</td>
                        <td class="px-4 py-3">
                            @if($item->batisa)
                                <span class="text-green-600 font-medium">Eny</span>
                            @else
                                <span class="text-red-400">Tsia</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if($item->mpandray)
                                <span class="text-green-600 font-medium">Eny</span>
                            @else
                                <span class="text-red-400">Tsia</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('kristianina.show', $item) }}"
                               class="text-blue-600 hover:underline">Hijery</a>
                            <a href="{{ route('kristianina.edit', $item) }}"
                               class="text-yellow-600 hover:underline">Hanova</a>
                            <form action="{{ route('kristianina.destroy', $item) }}" method="POST"
                                  onsubmit="return confirm('Hofaina?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Hofaina</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-400">Tsy misy kristianina</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $kristianinas->links() }}</div>
    </div>
</x-app-layout>