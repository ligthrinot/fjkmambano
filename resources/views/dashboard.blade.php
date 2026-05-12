<x-app-layout>
    <x-slot name="header">Dashboard</x-slot>

    <style>
        .stat-card {
            background: #fff;
            border-radius: 14px;
            border: 1px solid #e8eaf6;
            padding: 20px 22px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            text-decoration: none;
            color: inherit;
            transition: box-shadow 0.2s, transform 0.2s;
            position: relative;
            overflow: hidden;
        }
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: var(--card-accent, #1E0691);
            border-radius: 14px 14px 0 0;
        }
        a.stat-card:hover {
            box-shadow: 0 8px 24px rgba(30,6,145,0.1);
            transform: translateY(-2px);
        }
        .stat-card-icon { font-size: 1.5rem; }
        .stat-card-value {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            line-height: 1;
            color: #1a1a2e;
        }
        .stat-card-label {
            font-size: 0.8rem;
            font-weight: 500;
            color: #6b7280;
        }
        .stat-progress {
            height: 4px;
            background: #eef0f8;
            border-radius: 2px;
            overflow: hidden;
        }
        .stat-progress-bar {
            height: 100%;
            border-radius: 2px;
        }
        .stat-pct { font-size: 0.72rem; color: #9ca3af; }
        .section-title {
            font-size: 0.68rem;
            font-weight: 600;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #9ca3af;
            margin-bottom: 14px;
            padding-left: 2px;
        }
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
            gap: 16px;
        }
        .section-block { margin-bottom: 32px; }
    </style>

    {{-- ── Membres ── --}}
    <div class="section-block">
        <div class="section-title">Kristianina</div>
        <div class="cards-grid">

            <a href="{{ route('kristianina.index') }}" class="stat-card" style="--card-accent:#1E0691;">
                <div class="stat-card-icon">✝️</div>
                <div class="stat-card-value">{{ $stats['total_kristianina'] }}</div>
                <div class="stat-card-label">Membres total</div>
            </a>

            <a href="{{ route('batisa.index') }}" class="stat-card" style="--card-accent:#2563eb;">
                <div class="stat-card-icon">🙏</div>
                <div class="stat-card-value" style="color:#2563eb;">{{ $stats['batisa_eny'] }}</div>
                <div class="stat-card-label">Vita batisa</div>
                @if($stats['total_kristianina'] > 0)
                    <div class="stat-progress">
                        <div class="stat-progress-bar" style="width:{{ round($stats['batisa_eny'] / $stats['total_kristianina'] * 100) }}%; background:#2563eb;"></div>
                    </div>
                    <div class="stat-pct">{{ round($stats['batisa_eny'] / $stats['total_kristianina'] * 100) }}% ny rehetra</div>
                @endif
            </a>

            <div class="stat-card" style="--card-accent:#f59e0b;">
                <div class="stat-card-icon">⏳</div>
                <div class="stat-card-value" style="color:#f59e0b;">{{ $stats['batisa_tsia'] }}</div>
                <div class="stat-card-label">Tsy batisa</div>
            </div>

            <div class="stat-card" style="--card-accent:#10b981;">
                <div class="stat-card-icon">🆕</div>
                <div class="stat-card-value" style="color:#10b981;">{{ $stats['nouveaux_ce_mois'] }}</div>
                <div class="stat-card-label">Niditra volana ity</div>
            </div>

        </div>
    </div>

    {{-- ── Fandraisana ── --}}
    <div class="section-block">
        <div class="section-title">Fandraisana</div>
        <div class="cards-grid">

            <a href="{{ route('fandraisana.index') }}" class="stat-card" style="--card-accent:#7c3aed;">
                <div class="stat-card-icon">🍞</div>
                <div class="stat-card-value" style="color:#7c3aed;">{{ $stats['mpandray_eny'] }}</div>
                <div class="stat-card-label">Mpandray</div>
                @if($stats['total_kristianina'] > 0)
                    <div class="stat-progress">
                        <div class="stat-progress-bar" style="width:{{ round($stats['mpandray_eny'] / $stats['total_kristianina'] * 100) }}%; background:#7c3aed;"></div>
                    </div>
                    <div class="stat-pct">{{ round($stats['mpandray_eny'] / $stats['total_kristianina'] * 100) }}% ny rehetra</div>
                @endif
            </a>

            <div class="stat-card" style="--card-accent:#f59e0b;">
                <div class="stat-card-icon">⏳</div>
                <div class="stat-card-value" style="color:#f59e0b;">{{ $stats['mpandray_tsia'] }}</div>
                <div class="stat-card-label">Tsy mpandray</div>
            </div>

        </div>
    </div>

    {{-- ── Fianakaviana & Diakona ── --}}
    <div class="section-block">
        <div class="section-title">Fianakaviana &amp; Mpitondra</div>
        <div class="cards-grid">

            <a href="{{ route('fianakaviana.index') }}" class="stat-card" style="--card-accent:#0d9488;">
                <div class="stat-card-icon">👨‍👩‍👧</div>
                <div class="stat-card-value" style="color:#0d9488;">{{ $stats['total_fianakaviana'] }}</div>
                <div class="stat-card-label">Fianakaviana</div>
            </a>

            <a href="{{ route('diakona.index') }}" class="stat-card" style="--card-accent:#0ea5e9;">
                <div class="stat-card-icon">🕊️</div>
                <div class="stat-card-value" style="color:#0ea5e9;">{{ $stats['diakonas_actifs'] }}</div>
                <div class="stat-card-label">Diakona mavitrika</div>
            </a>

            <a href="{{ route('diakona.index') }}" class="stat-card" style="--card-accent:#e11d48;">
                <div class="stat-card-icon">📋</div>
                <div class="stat-card-value" style="color:#e11d48;">{{ $stats['loholona_actifs'] }}</div>
                <div class="stat-card-label">Loholona mavitrika</div>
            </a>

        </div>
    </div>

</x-app-layout>