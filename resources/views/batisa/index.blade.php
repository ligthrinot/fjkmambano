<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">🙏 Lisi-Batisa</h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-4">

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center">
            <span class="text-gray-500 text-sm">{{ $batisas->total() }} batisa voarakitra</span>
            <a href="{{ route('batisa.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Batisa vaovao
            </a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Anarana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Daty</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mpanao batisa</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fanamarinana</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sehatra</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($batisas as $i => $batisa)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-400 text-sm">{{ $batisas->firstItem() + $i }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('kristianina.show', $batisa->kristianina) }}"
                               class="text-blue-600 hover:underline font-medium">
                                {{ $batisa->kristianina->anarana }} {{ $batisa->kristianina->fanampiny }}
                            </a>
                        </td>
                        <td class="px-4 py-3 text-sm">{{ $batisa->daty->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 text-sm">{{ $batisa->mpanao_batisa ?? '-' }}</td>
                        <td class="px-4 py-3 text-sm text-gray-500">
                            {{ Str::limit($batisa->fanamarinana, 50) ?? '-' }}
                        </td>
                        <td class="px-4 py-3 flex gap-3">
                            <a href="{{ route('batisa.show', $batisa) }}"
                               class="text-blue-600 hover:underline text-sm">Hijery</a>
                            <form action="{{ route('batisa.destroy', $batisa) }}" method="POST"
                                  onsubmit="return confirm('Hofaina io batisa io? Hiverina ho tsy vita batisa ilay kristianina.')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline text-sm">Hofaina</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-400">
                            Tsy misy batisa voarakitra
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>{{ $batisas->links() }}</div>

    </div>
</x-app-layout>