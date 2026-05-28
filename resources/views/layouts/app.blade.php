<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'IbraLoka Wear') . ' - Admin')</title>

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body class="font-sans antialiased admin-panel" x-data="theme">
        <div class="min-h-screen d-flex" style="display:flex">
            @include('layouts.admin-sidebar')

            <div class="main-content flex-1" style="flex:1;margin-left:250px;min-height:100vh;display:flex;flex-direction:column">
                <div class="topbar">
                    <div style="display:flex;align-items:center;gap:12px">
                        <button class="sidebar-hamburger" @click="document.querySelector('.sidebar')?.classList.toggle('open')"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:20px;height:20px"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg></button>
                        @yield('header')
                    </div>
                    <div class="topbar-actions">
                        <button class="theme-toggle" @click="toggle" title="Toggle theme">
                            <span x-show="dark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg></span>
                            <span x-show="!dark" style="display:none"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg></span>
                        </button>
                        <a href="{{ route('home') }}" target="_blank" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-colors" style="background:rgba(201,168,76,0.1);color:var(--color-gold);text-decoration:none;letter-spacing:0.5px">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:14px;height:14px;vertical-align:text-bottom;margin-right:4px"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg> Website
                        </a>
                    </div>
                </div>

                <main style="flex:1;padding:24px 32px;background:var(--color-surface)">
                    @yield('content')
                </main>

                <footer style="padding:12px 32px;border-top:1px solid rgba(201,168,76,0.06);text-align:center;font-size:11px;color:var(--color-surface-300);letter-spacing:0.5px">
                    &copy; {{ date('Y') }} IbraLoka Wear. All rights reserved.
                </footer>
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
