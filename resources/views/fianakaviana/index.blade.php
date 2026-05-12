<x-app-layout>
    <x-slot name="header">Lisitry ny Fianakaviana</x-slot>

    <style>
        /* ── Shared ── */
        .k-wrap { font-family: 'DM Sans', sans-serif; }
        .k-toolbar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; gap: 10px; flex-wrap: wrap; }
        .k-btn-add {
            display: inline-flex; align-items: center; gap: 6px;
            background: var(--c-900); color: var(--gold);
            border: none; border-radius: 8px; padding: 9px 16px;
            font-size: 13.5px; font-weight: 600; cursor: pointer;
            text-decoration: none; font-family: 'DM Sans', sans-serif;
            transition: background .15s;
        }
        .k-btn-add:hover { background: var(--c-800); }
        .k-count { font-size: 13px; color: #6b7280; }
        .k-count strong { color: #1a1a2e; }

        /* ── Mobile cards ── */
        .k-mobile-list { display: block; }
        .k-desktop-table { display: none; }

        .k-card { 
            background: #fff; 
            border: 1px solid #dde0f5; 
            border-radius: 12px; 
            margin-bottom: 12px; 
            overflow: hidden; 
        }
        .k-card-header { 
            padding: 14px 16px; 
            border-bottom: 1px solid #f0f2fa;
        }
        .k-card-name { 
            font-size: 15px; 
            font-weight: 600; 
            color: #1a1a2e; 
        }
        .k-card-meta { 
            font-size: 12.5px; 
            color: #6b7280; 
            margin-top: 4px; 
            line-height: 1.4;
        }
        .k-card-body { 
            padding: 14px 16px; 
            display: grid; 
            grid-template-columns: 1fr 1fr; 
            gap: 10px 16px; 
            font-size: 13px;
        }
        .k-field-label { 
            font-size: 10px; 
            font-weight: 600; 
            text-transform: uppercase; 
            letter-spacing: .07em; 
            color: #9ca3af; 
            margin-bottom: 1px; 
        }
        .k-field-val { 
            color: #374151; 
        }

        .k-card-footer { 
            display: flex; 
            gap: 7px; 
            padding: 10px 14px; 
            border-top: 1px solid #f0f2fa; 
            background: #f8f9ff; 
        }
        .k-act {
            display: inline-flex; 
            align-items: center; 
            justify-content: center; 
            gap: 5px;
            padding: 7px 0; 
            border-radius: 8px; 
            font-size: 12.5px; 
            font-weight: 500;
            border: 1px solid #dde0f5; 
            background: #fff; 
            cursor: pointer;
            text-decoration: none; 
            color: #6b7280; 
            flex: 1;
            font-family: 'DM Sans', sans-serif; 
            transition: all .12s;
        }
        .k-act:hover { 
            background: #f0f2fa; 
            color: #1a1a2e; 
        }
        .k-act-del { 
            color: #991b1b; 
            border-color: #fca5a5; 
            background: #fff5f5; 
        }
        .k-act-del:hover { 
            background: #fee2e2; 
        }

        /* ── Desktop table ── */
        @media (min-width: 640px) {
            .k-mobile-list { display: none; }
            .k-desktop-table { 
                display: block; 
                background: #fff; 
                border: 1px solid #dde0f5; 
                border-radius: 12px; 
                overflow: hidden; 
            }
            .k-dtable { 
                width: 100%; 
                border-collapse: collapse; 
                font-size: 13.5px; 
                table-layout: fixed; 
            }
            .k-dtable thead th {
                background: #f8f9ff; 
                padding: 12px 14px; 
                text-align: left;
                font-size: 11px; 
                font-weight: 600; 
                letter-spacing: .07em;
                text-transform: uppercase; 
                color: #6b7280;
                border-bottom: 1px solid #dde0f5;
            }
            .k-dtable tbody tr { 
                border-bottom: 1px solid #f0f2fa; 
                transition: background .1s; 
            }
            .k-dtable tbody tr:last-child { border-bottom: none; }
            .k-dtable tbody tr:hover { background: #f8f9ff; }
            .k-dtable td { 
                padding: 12px 14px; 
                color: #1a1a2e; 
                vertical-align: middle; 
                overflow: hidden; 
                text-overflow: ellipsis; 
                white-space: nowrap;
            }
            .k-dtable td.k-name-col { font-weight: 600; }
            .t-actions { display: flex; gap: 6px; }
            .t-act {
                display: inline-flex; 
                align-items: center; 
                gap: 4px;
                padding: 6px 12px; 
                border-radius: 7px; 
                font-size: 12.5px;
                border: 1px solid #dde0f5; 
                background: none; 
                cursor: pointer;
                text-decoration: none; 
                color: #6b7280; 
                font-family: 'DM Sans', sans-serif;
                transition: all .12s;
            }
            .t-act:hover { 
                background: #f0f2fa; 
                color: #1a1a2e; 
                border-color: #a5b4fc; 
            }
            .t-act-del:hover { 
                background: #fee2e2; 
                border-color: #fca5a5; 
                color: #991b1b; 
            }
        }

        /* Pagination */
        .k-pagination { 
            margin-top: 20px; 
            display: flex; 
            justify-content: flex-end; 
        }
    </style>

    <div class="k-wrap px-4 sm:px-6 lg:px-8 py-6">

        @if(session('success'))
            <div class="mb-5 p-4 bg-green-100 border border-green-200 text-green-700 rounded-xl text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="k-toolbar">
            <a href="{{ route('fianakaviana.create') }}" class="k-btn-add">
                + Fianakaviana vaovao
            </a>
            <span class="k-count">
                <strong>{{ $fianakaviana->total() }}</strong> fianakaviana hita
            </span>
        </div>

        {{-- Mobile: Cards --}}
        <div class="k-mobile-list">
            @forelse($fianakaviana as $item)
            <div class="k-card">
                <div class="k-card-header">
                    <div class="k-card-name">{{ $item->anarana }}</div>
                    <div class="k-card-meta">
                        {{ $item->adressy }}
                    </div>
                </div>
                <div class="k-card-body">
                    <div>
                        <div class="k-field-label">Faritra</div>
                        <div class="k-field-val">{{ $item->faritra ?: '—' }}</div>
                    </div>
                    <div>
                        <div class="k-field-label">Fokontany</div>
                        <div class="k-field-val">{{ $item->fokontany ?: '—' }}</div>
                    </div>
                    <div>
                        <div class="k-field-label">Fifandraisana</div>
                        <div class="k-field-val">{{ $item->fifandraisana ?: '—' }}</div>
                    </div>
                </div>
                <div class="k-card-footer">
                    <a href="{{ route('fianakaviana.show', $item) }}" class="k-act">👁 Hijery</a>
                    <a href="{{ route('fianakaviana.edit', $item) }}" class="k-act">✏️ Hanova</a>
                    <form action="{{ route('fianakaviana.destroy', $item) }}" method="POST" 
                          onsubmit="return confirm('Hofaina io fianakaviana io ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="k-act k-act-del">🗑 Hofaina</button>
                    </form>
                </div>
            </div>
            @empty
            <div style="text-align:center;padding:60px 20px;color:#9ca3af;font-size:14.5px">
                Tsy misy fianakaviana voasoratra 📋
            </div>
            @endforelse
        </div>

        {{-- Desktop: Table --}}
        <div class="k-desktop-table">
            <table class="k-dtable">
                <colgroup>
                    <col style="width:180px">
                    <col style="width:160px">
                    <col style="width:110px">
                    <col style="width:110px">
                    <col style="width:130px">
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th>Anarana</th>
                        <th>Adressy</th>
                        <th>Faritra</th>
                        <th>Fokontany</th>
                        <th>Fifandraisana</th>
                        <th>Sehatra</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fianakaviana as $item)
                    <tr>
                        <td class="k-name-col">{{ $item->anarana }}</td>
                        <td>{{ $item->adressy }}</td>
                        <td>{{ $item->faritra ?: '—' }}</td>
                        <td>{{ $item->fokontany ?: '—' }}</td>
                        <td>{{ $item->fifandraisana ?: '—' }}</td>
                        <td>
                            <div class="t-actions">
                                <a href="{{ route('fianakaviana.show', $item) }}" class="t-act">👁 Hijery</a>
                                <a href="{{ route('fianakaviana.edit', $item) }}" class="t-act">✏️ Hanova</a>
                                <form action="{{ route('fianakaviana.destroy', $item) }}" method="POST" 
                                      onsubmit="return confirm('Hofaina io fianakaviana io ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="t-act t-act-del">🗑 Hofaina</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align:center;padding:60px;color:#9ca3af;font-size:14.5px">
                            Tsy misy fianakaviana voasoratra
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="k-pagination">
            {{ $fianakaviana->links() }}
        </div>

    </div>
</x-app-layout>