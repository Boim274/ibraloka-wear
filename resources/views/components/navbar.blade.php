@php
    $route = request()->route() ? request()->route()->getName() : '';
    $isProduk = $route === 'produk' || request()->is('produk*');
    $isArtikel = $route === 'artikel' || $route === 'artikel.show' || request()->is('artikel*');
    function navActive($condition) { return $condition ? 'color:var(--color-gold) !important;background:rgba(201,168,76,0.1);' : ''; }
@endphp
<nav x-data="{ open: false }" style="position:fixed;top:0;left:0;width:100%;z-index:1000;background:rgba(10,10,10,0.96);border-bottom:1px solid rgba(201,168,76,0.2);padding:0 60px;display:flex;align-items:center;justify-content:space-between;height:70px;backdrop-filter:blur(8px)">
  <div class="nav-logo" style="display:flex;align-items:center;gap:14px">
    <div class="nav-logo-icon"><span>IL</span></div>
    <a href="{{ route('home') }}" class="nav-brand">Ibra<span>Loka</span> Wear</a>
  </div>
  <div class="nav-links" style="display:flex;align-items:center;gap:10px">
    <a href="{{ route('home') }}#home" style="color:rgba(250,248,244,0.75);text-decoration:none;font-size:11px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;padding:8px 14px;border-radius:2px;transition:all .25s">Home</a>
    <a href="{{ route('produk') }}" style="color:rgba(250,248,244,0.75);text-decoration:none;font-size:11px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;padding:8px 14px;border-radius:2px;transition:all .25s;{{ navActive($isProduk) }}">Produk</a>
    <a href="{{ route('home') }}#about" style="color:rgba(250,248,244,0.75);text-decoration:none;font-size:11px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;padding:8px 14px;border-radius:2px;transition:all .25s">About</a>
    <a href="{{ route('home') }}#profile" style="color:rgba(250,248,244,0.75);text-decoration:none;font-size:11px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;padding:8px 14px;border-radius:2px;transition:all .25s">Profile</a>
    <a href="{{ route('home') }}#visi" style="color:rgba(250,248,244,0.75);text-decoration:none;font-size:11px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;padding:8px 14px;border-radius:2px;transition:all .25s">Visi & Misi</a>
    <div class="dropdown" style="position:relative">
      <a href="{{ route('artikel') }}" style="color:rgba(250,248,244,0.75);text-decoration:none;font-size:11px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;padding:8px 14px;border-radius:2px;transition:all .25s;{{ navActive($isArtikel) }}">Artikel ▾</a>
      <div class="dropdown-menu" style="display:none;position:absolute;top:100%;left:0;background:var(--color-surface-600);border:1px solid rgba(201,168,76,0.2);min-width:200px;z-index:100;border-top:2px solid var(--color-gold)">
        @forelse($navbarCategories as $category)
        <a href="{{ route('artikel', $category) }}" style="color:rgba(250,248,244,0.75);text-decoration:none;font-size:11px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;padding:8px 14px;border-radius:2px;transition:all .25s;display:block">{{ ucfirst(str_replace('-', ' ', $category)) }}</a>
        @empty
        <span style="display:block;padding:8px 14px;font-size:11px;color:rgba(250,248,244,0.4)">Belum ada kategori</span>
        @endforelse
      </div>
    </div>
    <a href="{{ route('home') }}#event" style="color:rgba(250,248,244,0.75);text-decoration:none;font-size:11px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;padding:8px 14px;border-radius:2px;transition:all .25s">Event</a>
    <a href="{{ route('home') }}#galeri" style="color:rgba(250,248,244,0.75);text-decoration:none;font-size:11px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;padding:8px 14px;border-radius:2px;transition:all .25s">Galeri</a>
    <a href="{{ route('home') }}#klien" style="color:rgba(250,248,244,0.75);text-decoration:none;font-size:11px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;padding:8px 14px;border-radius:2px;transition:all .25s">Klien</a>
    <a href="{{ route('home') }}#kontak" style="color:rgba(250,248,244,0.75);text-decoration:none;font-size:11px;font-weight:500;letter-spacing:1.5px;text-transform:uppercase;padding:8px 14px;border-radius:2px;transition:all .25s">Kontak</a>
  </div>
  @php $cartCount = count(session()->get('cart', [])); @endphp
  <div class="nav-auth" style="display:flex;gap:10px;align-items:center">
    @auth
      <a href="{{ route('cart') }}" class="cart-icon-mobile" style="position:relative;color:rgba(250,248,244,0.75);text-decoration:none;font-size:14px;padding:8px 12px">
        🛒
        @if ($cartCount > 0)
          <span style="position:absolute;top:-2px;right:-2px;background:#C9A84C;color:#000;font-size:10px;font-weight:700;width:18px;height:18px;border-radius:50%;display:flex;align-items:center;justify-content:center">{{ $cartCount }}</span>
        @endif
      </a>
      <span class="desktop-auth-buttons" style="display:flex;gap:10px;align-items:center">
        @if (Auth::user()->isAdmin())
          <a href="{{ route('dashboard') }}" class="btn-gold" style="text-decoration:none">Dashboard</a>
        @else
          <a href="{{ route('orders.index') }}" class="btn-ghost" style="text-decoration:none">Pesanan Saya</a>
        @endif
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
          @csrf
          <button type="submit" class="btn-ghost" style="border:none;cursor:pointer;font-family:'Montserrat',sans-serif">Logout</button>
        </form>
      </span>
    @else
      <a href="#" onclick="openModal('signin')" class="btn-ghost" style="text-decoration:none">Sign In</a>
      <a href="#" onclick="openModal('signup')" class="btn-gold" style="text-decoration:none">Sign Up</a>
    @endauth
    <button class="hamburger" @click="open = !open" style="display:none;background:none;border:none;color:rgba(250,248,244,0.75);font-size:24px;cursor:pointer;padding:4px;width:40px;height:40px;border-radius:6px;transition:all .25s" aria-label="Toggle menu">
      <span x-show="!open" style="display:flex;align-items:center;justify-content:center;width:100%;height:100%">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </span>
      <span x-show="open" style="display:none;align-items:center;justify-content:center;width:100%;height:100%">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </span>
    </button>
  </div>

  {{-- Mobile Fullscreen Menu --}}
  <template x-teleport="body">
    <div x-show="open" x-cloak
      @keydown.escape.window="open=false"
      style="position:fixed;inset:0;z-index:9999;display:flex;flex-direction:column"
      x-transition:enter="transition-all duration-300 ease-out"
      x-transition:enter-start="opacity-0 translate-x-8"
      x-transition:enter-end="opacity-100 translate-x-0"
      x-transition:leave="transition-all duration-200 ease-in"
      x-transition:leave-start="opacity-100 translate-x-0"
      x-transition:leave-end="opacity-0 translate-x-8"
    >
      <div style="position:absolute;inset:0;background:rgba(0,0,0,0.5);backdrop-filter:blur(4px)" @click="open=false"></div>
      <div @click.outside="open=false" style="position:relative;margin-left:auto;width:100%;max-width:340px;height:100%;background:var(--color-surface);border-left:1px solid rgba(201,168,76,0.15);display:flex;flex-direction:column;overflow:hidden">
        {{-- Mobile Header --}}
        <div style="display:flex;align-items:center;justify-content:space-between;padding:16px 20px;border-bottom:1px solid rgba(201,168,76,0.08);flex-shrink:0">
          <div style="display:flex;align-items:center;gap:10px">
            @auth
            <div style="width:32px;height:32px;border-radius:50%;background:var(--color-gold);display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:#000;font-family:var(--font-serif);text-transform:uppercase">{{ substr(Auth::user()->name, 0, 1) }}</div>
            <div>
              <div style="font-size:13px;font-weight:500;color:var(--color-surface-50);line-height:1.2">{{ Auth::user()->name }}</div>
              <div style="font-size:9px;color:rgba(250,248,244,0.3);letter-spacing:0.5px">{{ Auth::user()->email }}</div>
            </div>
            @else
            <div style="width:32px;height:32px;border-radius:6px;background:var(--color-gold);display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:700;color:#000;font-family:var(--font-serif)">IL</div>
            <span class="nav-brand" style="font-size:16px">Ibra<span>Loka</span></span>
            @endauth
          </div>
          <button @click="open=false" style="width:36px;height:36px;border-radius:8px;border:1px solid rgba(201,168,76,0.15);background:transparent;color:var(--color-surface-50);cursor:pointer;display:flex;align-items:center;justify-content:center">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
          </button>
        </div>

        {{-- Mobile Nav Items --}}
        <div class="mobile-nav" style="flex:1;overflow-y:auto;padding:12px 16px 20px">
          {{-- Brand section links --}}
          <div style="font-size:9px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.25);font-weight:600;padding:16px 12px 8px">Navigasi</div>
          <a href="{{ route('home') }}#home" style="display:flex;align-items:center;gap:12px;color:rgba(250,248,244,0.75);text-decoration:none;padding:12px;border-radius:8px;font-size:14px;font-weight:400;transition:all .2s">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Home
          </a>
          <a href="{{ route('produk') }}" style="display:flex;align-items:center;gap:12px;text-decoration:none;padding:12px;border-radius:8px;font-size:14px;font-weight:400;transition:all .2s;{{ $isProduk ? 'color:var(--color-gold);background:rgba(201,168,76,0.1);' : 'color:rgba(250,248,244,0.75);' }}">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            Produk
          </a>

          <div style="font-size:9px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.25);font-weight:600;padding:16px 12px 8px">Tentang</div>
          <a href="{{ route('home') }}#about" style="display:flex;align-items:center;gap:12px;color:rgba(250,248,244,0.75);text-decoration:none;padding:12px;border-radius:8px;font-size:14px;font-weight:400;transition:all .2s">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>
            About
          </a>
          <a href="{{ route('home') }}#profile" style="display:flex;align-items:center;gap:12px;color:rgba(250,248,244,0.75);text-decoration:none;padding:12px;border-radius:8px;font-size:14px;font-weight:400;transition:all .2s">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            Profile
          </a>
          <a href="{{ route('home') }}#visi" style="display:flex;align-items:center;gap:12px;color:rgba(250,248,244,0.75);text-decoration:none;padding:12px;border-radius:8px;font-size:14px;font-weight:400;transition:all .2s">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            Visi & Misi
          </a>

          <div style="font-size:9px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.25);font-weight:600;padding:16px 12px 8px">Konten</div>

          {{-- Artikel submenu with expand --}}
          <div x-data="{ sub: {{ $isArtikel ? 'true' : 'false' }} }" style="margin-bottom:4px">
            <button @click="sub=!sub" style="display:flex;align-items:center;justify-content:space-between;width:100%;padding:12px;border-radius:8px;font-size:14px;font-weight:400;cursor:pointer;transition:all .2s;border:none;background:none;text-align:left;{{ $isArtikel ? 'color:var(--color-gold);background:rgba(201,168,76,0.1);' : 'color:rgba(250,248,244,0.75);' }}">
              <span style="display:flex;align-items:center;gap:12px">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                Artikel
              </span>
              <svg x-show="!sub" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="9 18 15 12 9 6"/></svg>
              <svg x-show="sub" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="6 9 12 15 18 9"/></svg>
            </button>
            <div x-show="sub" x-collapse.duration.200ms style="overflow:hidden">
              <div style="padding-left:8px;margin-top:4px">
                <a href="{{ route('artikel') }}" style="display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:6px;text-decoration:none;font-size:13px;font-weight:400;transition:all .2s;{{ $isArtikel && !request()->route('kategori') ? 'color:var(--color-gold);background:rgba(201,168,76,0.08);' : 'color:rgba(250,248,244,0.6);' }}">
                  <svg width="4" height="4" viewBox="0 0 4 4" fill="currentColor"><circle cx="2" cy="2" r="2"/></svg>
                  Semua Artikel
                </a>
                @forelse($navbarCategories as $category)
                <a href="{{ route('artikel', $category) }}" style="display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:6px;text-decoration:none;font-size:13px;font-weight:400;transition:all .2s;{{ request()->route('kategori') === $category ? 'color:var(--color-gold);background:rgba(201,168,76,0.08);' : 'color:rgba(250,248,244,0.6);' }}">
                  <svg width="4" height="4" viewBox="0 0 4 4" fill="currentColor"><circle cx="2" cy="2" r="2"/></svg>
                  {{ ucfirst(str_replace('-', ' ', $category)) }}
                </a>
                @empty
                <span style="display:block;padding:10px 12px;font-size:12px;color:rgba(250,248,244,0.3)">Belum ada kategori</span>
                @endforelse
              </div>
            </div>
          </div>

          <a href="{{ route('home') }}#event" style="display:flex;align-items:center;gap:12px;color:rgba(250,248,244,0.75);text-decoration:none;padding:12px;border-radius:8px;font-size:14px;font-weight:400;transition:all .2s">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
            Event
          </a>
          <a href="{{ route('home') }}#galeri" style="display:flex;align-items:center;gap:12px;color:rgba(250,248,244,0.75);text-decoration:none;padding:12px;border-radius:8px;font-size:14px;font-weight:400;transition:all .2s">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            Galeri
          </a>
          <a href="{{ route('home') }}#klien" style="display:flex;align-items:center;gap:12px;color:rgba(250,248,244,0.75);text-decoration:none;padding:12px;border-radius:8px;font-size:14px;font-weight:400;transition:all .2s">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
            Klien
          </a>
          <a href="{{ route('home') }}#kontak" style="display:flex;align-items:center;gap:12px;color:rgba(250,248,244,0.75);text-decoration:none;padding:12px;border-radius:8px;font-size:14px;font-weight:400;transition:all .2s">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
            Kontak
          </a>

          {{-- Auth Section --}}
          @auth
          <div style="border-top:1px solid rgba(201,168,76,0.08);margin-top:16px;padding-top:12px">
            <div style="font-size:9px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.25);font-weight:600;padding:8px 12px">Akun</div>
            <a href="{{ route('cart') }}" style="display:flex;align-items:center;gap:12px;color:rgba(250,248,244,0.75);text-decoration:none;padding:12px;border-radius:8px;font-size:14px;font-weight:400;transition:all .2s">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
              Keranjang
              @if ($cartCount > 0)
              <span style="margin-left:auto;background:rgba(201,168,76,0.15);color:var(--color-gold);font-size:10px;font-weight:700;padding:2px 8px;border-radius:99px">{{ $cartCount }}</span>
              @endif
            </a>
            @if (Auth::user()->isAdmin())
            <a href="{{ route('dashboard') }}" style="display:flex;align-items:center;gap:12px;text-decoration:none;padding:12px;border-radius:8px;font-size:14px;font-weight:400;transition:all .2s;color:var(--color-gold)">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
              Dashboard
            </a>
            @else
            <a href="{{ route('orders.index') }}" style="display:flex;align-items:center;gap:12px;color:rgba(250,248,244,0.75);text-decoration:none;padding:12px;border-radius:8px;font-size:14px;font-weight:400;transition:all .2s">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
              Pesanan Saya
            </a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" style="display:flex;align-items:center;gap:12px;width:100%;padding:12px;border-radius:8px;font-size:14px;font-weight:400;cursor:pointer;transition:all .2s;border:none;background:none;text-align:left;color:rgba(250,248,244,0.55);font-family:'Montserrat',sans-serif">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                Logout
              </button>
            </form>
          </div>
          @else
          <div style="border-top:1px solid rgba(201,168,76,0.08);margin-top:16px;padding:16px 12px 8px;display:flex;flex-direction:column;gap:10px">
            <div style="font-size:9px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.25);font-weight:600;padding:0 0 4px">Akun</div>
            <a href="#" onclick="openModal('signin'); return false;" style="display:block;padding:12px;border-radius:8px;font-size:13px;font-weight:600;text-align:center;text-decoration:none;border:1px solid rgba(201,168,76,0.2);color:var(--color-surface-50);transition:all .2s">Sign In</a>
            <a href="#" onclick="openModal('signup'); return false;" style="display:block;padding:12px;border-radius:8px;font-size:13px;font-weight:600;text-align:center;text-decoration:none;background:var(--color-gold);color:#000;border:none;transition:all .2s">Daftar Sekarang</a>
          </div>
          @endauth
        </div>
      </div>
    </div>
  </template>
</nav>

<style>
.dropdown:hover .dropdown-menu { display: block !important; }
.nav-links > a:hover, .dropdown-menu a:hover { color: var(--color-gold) !important; background: rgba(201,168,76,0.08); }
.nav-links > a.active { color: var(--color-gold) !important; background: rgba(201,168,76,0.1); }
@media (max-width: 1024px) {
  nav > .nav-links { display: none !important; }
  nav > .nav-auth .hamburger { display: block !important; }
  nav > .nav-auth .desktop-auth-buttons { display: none !important; }
  nav > .nav-auth .cart-icon-mobile { padding: 10px 14px !important; font-size: 16px !important; }
  nav { padding: 0 20px !important; }
}
</style>
