<x-app-layout>
    <x-slot name="header">Lisitry ny Groupe Diakona</x-slot>

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
        }
        .k-card-name { 
            font-size: 15px; 
            font-weight: 600; 
            color: #1a1a2e; 
        }
        .k-card-meta { 
            font-size: 13px; 
            color: #6b7280; 
            margin-top: 6px; 
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
            <a href="{{ route('groupe_diakona.create') }}" class="k-btn-add">
                + Groupe vaovao
            </a>
            <span class="k-count">
                <strong>{{ $groupes->total() }}</strong> groupe diakona hita
            </span>
        </div>

        {{-- Mobile: Cards --}}
        <div class="k-mobile-list">
            @forelse($groupes as $groupe)
            <div class="k-card">
                <div class="k-card-header">
                    <div class="k-card-name">{{ $groupe->anarana }}</div>
                    @if($groupe->fanamariana)
                        <div class="k-card-meta">
                            {{ $groupe->fanamariana }}
                        </div>
                    @endif
                </div>
                <div class="k-card-footer">
                    <a href="{{ route('groupe_diakona.show', $groupe) }}" class="k-act">👁 Hijery</a>
                    <a href="{{ route('groupe_diakona.edit', $groupe) }}" class="k-act">✏️ Hanova</a>
                    <form action="{{ route('groupe_diakona.destroy', $groupe) }}" method="POST" 
                          onsubmit="return confirm('Hofaina io groupe diakona io ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="k-act k-act-del">🗑 Hofaina</button>
                    </form>
                </div>
            </div>
            @empty
            <div style="text-align:center;padding:60px 20px;color:#9ca3af;font-size:14.5px">
                Tsy misy groupe diakona voasoratra 📋
            </div>
            @endforelse
        </div>

        {{-- Desktop: Table --}}
        <div class="k-desktop-table">
            <table class="k-dtable">
                <colgroup>
                    <col style="width:220px">
                    <col style="width:280px">
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th>Anarana</th>
                        <th>Fanamariana</th>
                        <th>Sehatra</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($groupes as $groupe)
                    <tr>
                        <td class="k-name-col">{{ $groupe->anarana }}</td>
                        <td>{{ $groupe->fanamariana ?? '—' }}</td>
                        <td>
                            <div class="t-actions">
                                <a href="{{ route('groupe_diakona.show', $groupe) }}" class="t-act">👁 Hijery</a>
                                <a href="{{ route('groupe_diakona.edit', $groupe) }}" class="t-act">✏️ Hanova</a>
                                <form action="{{ route('groupe_diakona.destroy', $groupe) }}" method="POST" 
                                      onsubmit="return confirm('Hofaina io groupe diakona io ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="t-act t-act-del">🗑 Hofaina</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="text-align:center;padding:60px;color:#9ca3af;font-size:14.5px">
                            Tsy misy groupe diakona voasoratra
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="k-pagination">
            {{ $groupes->links() }}
        </div>

    </div>
</x-app-layout>