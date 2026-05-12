<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard — FJKM Ambano
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- ══════════════════════════════════════════
                 SECTION 1 : Membres
            ══════════════════════════════════════════ --}}
            <div>
                <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-4">
                    Kristianina
                </h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">

                    {{-- Total membres --}}
                    <a href="{{ route('kristianina.index') }}"
                       class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex flex-col gap-2 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl">✝️</span>
                            <span class="text-xs text-gray-400 group-hover:text-indigo-500 transition-colors">Voir →</span>
                        </div>
                        <p class="text-3xl font-bold text-gray-800">{{ $stats['total_kristianina'] }}</p>
                        <p class="text-sm text-gray-500">Membres total</p>
                    </a>

                    {{-- Baptisés --}}
                    <a href="{{ route('batisa.index') }}"
                       class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex flex-col gap-2 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl">🙏</span>
                            <span class="text-xs text-gray-400 group-hover:text-indigo-500 transition-colors">Voir →</span>
                        </div>
                        <p class="text-3xl font-bold text-blue-600">{{ $stats['batisa_eny'] }}</p>
                        <p class="text-sm text-gray-500">Vita batisa</p>
                        <div class="mt-1 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            @if($stats['total_kristianina'] > 0)
                                <div class="h-full bg-blue-400 rounded-full"
                                     style="width: {{ round($stats['batisa_eny'] / $stats['total_kristianina'] * 100) }}%">
                                </div>
                            @endif
                        </div>
                        <p class="text-xs text-gray-400">
                            @if($stats['total_kristianina'] > 0)
                                {{ round($stats['batisa_eny'] / $stats['total_kristianina'] * 100) }}% ny rehetra
                            @else
                                —
                            @endif
                        </p>
                    </a>

                    {{-- Non baptisés --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex flex-col gap-2">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl">⏳</span>
                        </div>
                        <p class="text-3xl font-bold text-orange-500">{{ $stats['batisa_tsia'] }}</p>
                        <p class="text-sm text-gray-500">Tsy batisa</p>
                    </div>

                    {{-- Nouveaux ce mois --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex flex-col gap-2">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl">🆕</span>
                        </div>
                        <p class="text-3xl font-bold text-emerald-600">{{ $stats['nouveaux_ce_mois'] }}</p>
                        <p class="text-sm text-gray-500">Niditra volana ity</p>
                    </div>

                </div>
            </div>

            {{-- ══════════════════════════════════════════
                 SECTION 2 : Fandraisana
            ══════════════════════════════════════════ --}}
            <div>
                <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-4">
                    Fandraisana
                </h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">

                    {{-- Mpandray --}}
                    <a href="{{ route('fandraisana.index') }}"
                       class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex flex-col gap-2 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl">🍞</span>
                            <span class="text-xs text-gray-400 group-hover:text-indigo-500 transition-colors">Voir →</span>
                        </div>
                        <p class="text-3xl font-bold text-purple-600">{{ $stats['mpandray_eny'] }}</p>
                        <p class="text-sm text-gray-500">Mpandray</p>
                        <div class="mt-1 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                            @if($stats['total_kristianina'] > 0)
                                <div class="h-full bg-purple-400 rounded-full"
                                     style="width: {{ round($stats['mpandray_eny'] / $stats['total_kristianina'] * 100) }}%">
                                </div>
                            @endif
                        </div>
                        <p class="text-xs text-gray-400">
                            @if($stats['total_kristianina'] > 0)
                                {{ round($stats['mpandray_eny'] / $stats['total_kristianina'] * 100) }}% ny rehetra
                            @else
                                —
                            @endif
                        </p>
                    </a>

                    {{-- Non mpandray --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex flex-col gap-2">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl">⏳</span>
                        </div>
                        <p class="text-3xl font-bold text-orange-400">{{ $stats['mpandray_tsia'] }}</p>
                        <p class="text-sm text-gray-500">Tsy mpandray</p>
                    </div>

                </div>
            </div>

            {{-- ══════════════════════════════════════════
                 SECTION 3 : Fianakaviana & Diacres
            ══════════════════════════════════════════ --}}
            <div>
                <h3 class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-4">
                    Fianakaviana & Diakona
                </h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">

                    {{-- Familles --}}
                    <a href="{{ route('fianakaviana.index') }}"
                       class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex flex-col gap-2 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl">👨‍👩‍👧</span>
                            <span class="text-xs text-gray-400 group-hover:text-indigo-500 transition-colors">Voir →</span>
                        </div>
                        <p class="text-3xl font-bold text-teal-600">{{ $stats['total_fianakaviana'] }}</p>
                        <p class="text-sm text-gray-500">Fianakaviana</p>
                    </a>

                    {{-- Diacres actifs --}}
                    <a href="{{ route('diakona.index') }}"
                       class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex flex-col gap-2 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl">🕊️</span>
                            <span class="text-xs text-gray-400 group-hover:text-indigo-500 transition-colors">Voir →</span>
                        </div>
                        <p class="text-3xl font-bold text-sky-600">{{ $stats['diakonas_actifs'] }}</p>
                        <p class="text-sm text-gray-500">Diakona mavitrika</p>
                    </a>

                    {{-- Anciens actifs --}}
                    <a href="{{ route('diakona.index') }}"
                       class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 flex flex-col gap-2 hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <span class="text-2xl">📋</span>
                            <span class="text-xs text-gray-400 group-hover:text-indigo-500 transition-colors">Voir →</span>
                        </div>
                        <p class="text-3xl font-bold text-rose-600">{{ $stats['loholona_actifs'] }}</p>
                        <p class="text-sm text-gray-500">Loholona mavitrika</p>
                    </a>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>