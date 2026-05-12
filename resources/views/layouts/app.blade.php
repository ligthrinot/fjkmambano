<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'FJKM Ambano') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:600,700|dm-sans:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --c-900: #1a1a6e;
            --c-800: #2828a0;
            --c-700: #3535c8;
            --c-500: #5555e0;
            --c-300: #8888f0;
            --c-100: #bbbbf8;
            --c-50:  #eeeeff;
            --gold:  #f0c040;
            --sidebar-w: 260px;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'DM Sans', sans-serif; background: #f0f2fa; color: #1a1a2e; }

        /* SIDEBAR */
        #sidebar {
            position: fixed; top: 0; left: 0;
            width: var(--sidebar-w); height: 100vh;
            background: var(--c-900);
            background-image:
                radial-gradient(ellipse at 15% 10%, rgba(85,85,224,0.25) 0%, transparent 55%),
                radial-gradient(ellipse at 85% 85%, rgba(0,0,0,0.2) 0%, transparent 50%);
            display: flex; flex-direction: column;
            z-index: 50;
            transition: transform .3s cubic-bezier(.4,0,.2,1);
        }
        .s-brand { padding: 26px 22px 18px; border-bottom: 1px solid rgba(255,255,255,0.08); }
        .s-brand a { text-decoration: none; }
        .s-brand-name { font-family: 'Playfair Display', serif; font-size: 1.2rem; font-weight: 700; color: var(--gold); }
        .s-brand-sub { font-size: 0.67rem; font-weight: 500; color: var(--c-300); letter-spacing: 0.12em; text-transform: uppercase; margin-top: 4px; }

        .s-nav { flex: 1; padding: 12px 10px; overflow-y: auto; }
        .s-nav::-webkit-scrollbar { width: 3px; }
        .s-nav::-webkit-scrollbar-thumb { background: var(--c-800); border-radius: 2px; }

        .s-section { font-size: 0.63rem; font-weight: 600; letter-spacing: 0.15em; text-transform: uppercase; color: var(--c-300); padding: 16px 12px 6px; }

        .s-item {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 12px; border-radius: 9px;
            color: var(--c-100); font-size: 0.855rem; font-weight: 500;
            text-decoration: none;
            transition: background .15s, color .15s;
            margin-bottom: 2px; position: relative;
        }
        .s-item:hover { background: var(--c-800); color: #fff; }
        .s-item.active { background: rgba(240,192,64,.13); color: var(--gold); font-weight: 600; }
        .s-item.active::before {
            content: ''; position: absolute; left: 0; top: 22%; bottom: 22%;
            width: 3px; background: var(--gold); border-radius: 0 3px 3px 0;
        }
        .s-icon { font-size: 1rem; width: 20px; text-align: center; flex-shrink: 0; }

        .s-footer { padding: 14px 10px; border-top: 1px solid rgba(255,255,255,0.08); }
        .s-user { display: flex; align-items: center; gap: 10px; padding: 9px 12px; border-radius: 10px; background: rgba(255,255,255,0.06); }
        .s-avatar { width: 33px; height: 33px; background: var(--gold); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.78rem; font-weight: 700; color: var(--c-900); flex-shrink: 0; }
        .s-uname { font-size: 0.81rem; font-weight: 600; color: #fff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .s-uemail { font-size: 0.68rem; color: var(--c-300); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .s-logout {
            display: flex; align-items: center; gap: 8px; margin-top: 6px;
            padding: 8px 12px; border-radius: 8px; color: var(--c-300);
            font-size: 0.79rem; font-weight: 500; cursor: pointer;
            background: none; border: none; width: 100%; text-align: left;
            transition: background .15s, color .15s; font-family: 'DM Sans', sans-serif;
        }
        .s-logout:hover { background: rgba(255,80,80,0.14); color: #ff8888; }

        /* MAIN */
        #main { margin-left: var(--sidebar-w); min-height: 100vh; display: flex; flex-direction: column; transition: margin-left .3s cubic-bezier(.4,0,.2,1); }

        .topbar {
            background: #fff; border-bottom: 1px solid #dde0f5;
            height: 58px; padding: 0 26px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 40;
            box-shadow: 0 1px 4px rgba(53,53,200,0.06);
        }
        .topbar-left { display: flex; align-items: center; gap: 14px; }
        .topbar-title { font-size: 0.95rem; font-weight: 600; color: var(--c-900); }
        .topbar-profile { font-size: 0.78rem; color: #6b7280; text-decoration: none; padding: 5px 12px; border-radius: 8px; border: 1px solid #dde0f5; transition: all .15s; }
        .topbar-profile:hover { background: var(--c-50); color: var(--c-700); border-color: var(--c-300); }

        #menu-btn { display: none; background: none; border: none; cursor: pointer; color: var(--c-700); padding: 6px; }

        .flash { background: #ecfdf5; border: 1px solid #6ee7b7; color: #065f46; border-radius: 10px; padding: 11px 16px; margin-bottom: 20px; font-size: 0.855rem; display: flex; align-items: center; gap: 8px; }

        #overlay { display: none; position: fixed; inset: 0; background: rgba(26,26,110,0.45); z-index: 45; }

        .page-content { padding: 26px; flex: 1; }

        @media (max-width: 768px) {
            #sidebar { transform: translateX(-100%); }
            #sidebar.open { transform: translateX(0); }
            #overlay.open { display: block; }
            #main { margin-left: 0; }
            #menu-btn { display: flex; align-items: center; }
        }
    </style>
</head>
<body>

<div id="overlay" onclick="closeSidebar()"></div>

<aside id="sidebar">
    <div class="s-brand">
        <a href="{{ route('dashboard') }}">
            <div class="s-brand-name">✝ FJKM Ambano</div>
            <div class="s-brand-sub">Fitantanana ny fiangonana</div>
        </a>
    </div>

    <nav class="s-nav">
        <div class="s-section">Fitantanana</div>
        <a href="{{ route('dashboard') }}" class="s-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span class="s-icon">🏠</span> Dashboard
        </a>
        <a href="{{ route('fianakaviana.index') }}" class="s-item {{ request()->routeIs('fianakaviana.*') ? 'active' : '' }}">
            <span class="s-icon">👨‍👩‍👧</span> Fianakaviana
        </a>
        <a href="{{ route('kristianina.index') }}" class="s-item {{ request()->routeIs('kristianina.*') ? 'active' : '' }}">
            <span class="s-icon">✝️</span> Kristianina
        </a>

        <div class="s-section">Sakaramenta</div>
        <a href="{{ route('batisa.index') }}" class="s-item {{ request()->routeIs('batisa.*') ? 'active' : '' }}">
            <span class="s-icon">🙏</span> Batisa
        </a>
        <a href="{{ route('fandraisana.index') }}" class="s-item {{ request()->routeIs('fandraisana.*') ? 'active' : '' }}">
            <span class="s-icon">🍞</span> Fandraisana
        </a>

        <div class="s-section">Mpitondra</div>
        <a href="{{ route('groupe_diakona.index') }}" class="s-item {{ request()->routeIs('groupe_diakona.*') ? 'active' : '' }}">
            <span class="s-icon">🕊️</span> Groupe Diakona
        </a>
        <a href="{{ route('diakona.index') }}" class="s-item {{ request()->routeIs('diakona.*') ? 'active' : '' }}">
            <span class="s-icon">📋</span> Diakona / Loholona
        </a>
    </nav>

    <div class="s-footer">
        <div class="s-user">
            <div class="s-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
            <div style="overflow:hidden; flex:1;">
                <div class="s-uname">{{ Auth::user()->name }}</div>
                <div class="s-uemail">{{ Auth::user()->email }}</div>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="s-logout">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Hivoaka
            </button>
        </form>
    </div>
</aside>

<div id="main">
    <div class="topbar">
        <div class="topbar-left">
            <button id="menu-btn" onclick="toggleSidebar()">
                <svg width="21" height="21" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <line x1="3" y1="18" x2="21" y2="18"/>
                </svg>
            </button>
            @isset($header)
                <div class="topbar-title">{{ $header }}</div>
            @endisset
        </div>
        <a href="{{ route('profile.edit') }}" class="topbar-profile">⚙️ Profily</a>
    </div>

    <div class="page-content">
        @if(session('success'))
            <div class="flash">✅ {{ session('success') }}</div>
        @endif
        {{ $slot }}
    </div>
</div>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('open');
        document.getElementById('overlay').classList.toggle('open');
    }
    function closeSidebar() {
        document.getElementById('sidebar').classList.remove('open');
        document.getElementById('overlay').classList.remove('open');
    }
</script>
</body>
</html>