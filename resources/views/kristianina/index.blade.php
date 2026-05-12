<x-app-layout>
    <x-slot name="header">Lisitry ny Kristianina</x-slot>

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
        .badge { display: inline-flex; align-items: center; gap: 3px; border-radius: 99px; padding: 3px 10px; font-size: 11.5px; font-weight: 600; }
        .badge-yes { background: #dcfce7; color: #166534; }
        .badge-no  { background: #f3f4f6; color: #9ca3af; border: 1px solid #e5e7eb; }

        /* ── Mobile cards (default) ── */
        .k-mobile-list { display: block; }
        .k-desktop-table { display: none; }

        .k-card { background: #fff; border: 1px solid #dde0f5; border-radius: 12px; margin-bottom: 10px; overflow: hidden; }
        .k-card-header { display: flex; align-items: flex-start; justify-content: space-between; padding: 13px 14px 8px; gap: 10px; flex-wrap: wrap; }
        .k-card-name { font-size: 14.5px; font-weight: 600; color: #1a1a2e; }
        .k-card-meta { font-size: 11.5px; color: #9ca3af; margin-top: 2px; }
        .k-card-badges { display: flex; gap: 5px; flex-wrap: wrap; }
        .k-card-body { padding: 0 14px 12px; display: grid; grid-template-columns: 1fr 1fr; gap: 8px 14px; }
        .k-field-label { font-size: 10px; font-weight: 600; text-transform: uppercase; letter-spacing: .07em; color: #9ca3af; margin-bottom: 2px; }
        .k-field-val { font-size: 13px; color: #374151; }
        .k-card-footer { display: flex; gap: 7px; padding: 10px 14px; border-top: 1px solid #f0f2fa; background: #f8f9ff; }
        .k-act {
            display: inline-flex; align-items: center; justify-content: center; gap: 4px;
            padding: 7px 0; border-radius: 8px; font-size: 12.5px; font-weight: 500;
            border: 1px solid #dde0f5; background: #fff; cursor: pointer;
            text-decoration: none; color: #6b7280; flex: 1;
            font-family: 'DM Sans', sans-serif; transition: background .12s;
        }
        .k-act:hover { background: #f0f2fa; color: #1a1a2e; }
        .k-act-del { color: #991b1b; border-color: #fca5a5; background: #fff5f5; }
        .k-act-del:hover { background: #fee2e2; }

        /* ── Desktop table (≥640px) ── */
        @media (min-width: 640px) {
            .k-mobile-list { display: none; }
            .k-desktop-table { display: block; background: #fff; border: 1px solid #dde0f5; border-radius: 12px; overflow: hidden; }
            .k-dtable { width: 100%; border-collapse: collapse; font-size: 13.5px; table-layout: fixed; }
            .k-dtable thead th {
                background: #f8f9ff; padding: 11px 14px; text-align: left;
                font-size: 11px; font-weight: 600; letter-spacing: .07em;
                text-transform: uppercase; color: #6b7280;
                border-bottom: 1px solid #dde0f5; white-space: nowrap;
            }
            .k-dtable tbody tr { border-bottom: 1px solid #f0f2fa; transition: background .1s; }
            .k-dtable tbody tr:last-child { border-bottom: none; }
            .k-dtable tbody tr:hover { background: #f8f9ff; }
            .k-dtable td { padding: 11px 14px; color: #1a1a2e; vertical-align: middle; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
            .k-dtable td.k-num-col { color: #9ca3af; font-size: 12px; }
            .k-dtable td.k-name-col { font-weight: 600; }
            .k-dtable td.k-sec { color: #6b7280; }
            .t-actions { display: flex; gap: 5px; }
            .t-act {
                display: inline-flex; align-items: center; gap: 3px;
                padding: 5px 10px; border-radius: 7px; font-size: 12px;
                border: 1px solid #dde0f5; background: none; cursor: pointer;
                text-decoration: none; color: #6b7280; font-family: 'DM Sans', sans-serif;
                transition: background .12s;
            }
            .t-act:hover { background: #f0f2fa; color: #1a1a2e; border-color: #a5b4fc; }
            .t-act-del { color: #991b1b; }
            .t-act-del:hover { background: #fef2f2; border-color: #fca5a5; }
        }

        /* ── Pagination ── */
        .k-pagination { margin-top: 16px; display: flex; align-items: center; justify-content: flex-end; gap: 5px; }
        .k-pagination .page-item a,
        .k-pagination .page-item span {
            display: inline-flex; align-items: center; padding: 6px 12px;
            border-radius: 7px; border: 1px solid #dde0f5;
            font-size: 13px; color: #6b7280; text-decoration: none;
            background: #fff; transition: background .12s;
        }
        .k-pagination .page-item.active span {
            background: var(--c-900); color: var(--gold); border-color: transparent;
        }
        .k-pagination .page-item a:hover { background: #f0f2fa; }
    </style>

    <div class="k-wrap">

        <div class="k-toolbar">
            <a href="{{ route('kristianina.create') }}" class="k-btn-add">
                + Kristianina vaovao
            </a>
            <span class="k-count">
                <strong>{{ $kristianinas->total() }}</strong> kristianina hita
            </span>
        </div>

        {{-- ── Mobile: cards ── --}}
        <div class="k-mobile-list">
            @forelse($kristianinas as $item)
            <div class="k-card">
                <div class="k-card-header">
                    <div>
                        <div class="k-card-name">{{ $item->anarana }} {{ $item->fanampiny }}</div>
                        <div class="k-card-meta">
                            N° {{ str_pad($item->laharana ?? '?', 3, '0', STR_PAD_LEFT) }}
                            &middot; {{ $item->fianakaviana->anarana ?? '—' }}
                        </div>
                    </div>
                    <div class="k-card-badges">
                        @if($item->batisa)
                            <span class="badge badge-yes">✓ Batisa</span>
                        @else
                            <span class="badge badge-no">Tsy batisa</span>
                        @endif
                        @if($item->mpandray)
                            <span class="badge badge-yes">✓ Mpandray</span>
                        @else
                            <span class="badge badge-no">Tsy mpandray</span>
                        @endif
                    </div>
                </div>
                <div class="k-card-footer">
                    <a href="{{ route('kristianina.show', $item) }}" class="k-act">👁 Hijery</a>
                    <a href="{{ route('kristianina.edit', $item) }}" class="k-act">✏️ Hanova</a>
                </div>
            </div>
            @empty
            <div style="text-align:center;padding:48px 0;color:#9ca3af;font-size:14px">
                Tsy misy kristianina voasoratra 📋
            </div>
            @endforelse
        </div>

        {{-- ── Desktop: table ── --}}
        <div class="k-desktop-table">
            <table class="k-dtable">
                <colgroup>
                    <col style="width:60px">
                    <col style="width:160px">
                    <col style="width:130px">
                    <col style="width:130px">
                    <col style="width:80px">
                    <col style="width:90px">
                    <col>
                </colgroup>
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Anarana</th>
                        <th>Fanampiny</th>
                        <th>Fianakaviana</th>
                        <th>Batisa</th>
                        <th>Mpandray</th>
                        <th>Sehatra</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kristianinas as $item)
                    <tr>
                        <td class="k-num-col">{{ str_pad($item->laharana ?? '?', 3, '0', STR_PAD_LEFT) }}</td>
                        <td class="k-name-col">{{ $item->anarana }}</td>
                        <td class="k-sec">{{ $item->fanampiny ?: '—' }}</td>
                        <td>{{ $item->fianakaviana->anarana ?? '—' }}</td>
                        <td>
                            @if($item->batisa)
                                <span class="badge badge-yes">✓ Eny</span>
                            @else
                                <span class="badge badge-no">Tsia</span>
                            @endif
                        </td>
                        <td>
                            @if($item->mpandray)
                                <span class="badge badge-yes">✓ Eny</span>
                            @else
                                <span class="badge badge-no">Tsia</span>
                            @endif
                        </td>
                        <td>
                            <div class="t-actions">
                                <a href="{{ route('kristianina.show', $item) }}" class="t-act">👁 Hijery</a>
                                <a href="{{ route('kristianina.edit', $item) }}" class="t-act">✏️ Hanova</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align:center;padding:48px;color:#9ca3af;font-size:14px">
                            Tsy misy kristianina voasoratra
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="k-pagination">
            {{ $kristianinas->links() }}
        </div>

    </div>
</x-app-layout>