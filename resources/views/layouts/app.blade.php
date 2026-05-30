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
                        <button class="sidebar-hamburger" @click="$dispatch('toggle-sidebar')"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:20px;height:20px"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg></button>
                        @yield('header')
                    </div>
                    <div class="topbar-actions">
                        {{-- Notifications --}}
                        <div class="relative" x-data="{ notifOpen: false }">
                            <button @click="notifOpen = !notifOpen" class="relative border {{ $totalNotif > 0 ? 'border-red-500/30' : 'border-[rgba(201,168,76,0.2)]' }} rounded-lg px-2.5 py-2 cursor-pointer transition-all hover:border-[var(--color-gold)] hover:bg-[rgba(201,168,76,0.08)]" style="color:rgba(250,248,244,0.6)">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-[18px] h-[18px]"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                                @if ($totalNotif > 0)
                                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[9px] font-bold min-w-[16px] h-4 rounded-full flex items-center justify-center px-1 leading-none animate-[pulse_2s_ease-in-out_infinite]">{{ $totalNotif > 99 ? '99+' : $totalNotif }}</span>
                                @endif
                            </button>
                            <div
                                x-show="notifOpen"
                                @click.outside="notifOpen=false"
                                x-cloak
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 translate-y-1 scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                x-transition:leave-end="opacity-0 translate-y-1 scale-95"
                                class="absolute top-full mt-2 right-0 w-80 bg-[var(--color-surface-600)] border border-[rgba(201,168,76,0.15)] rounded-xl z-50 overflow-hidden shadow-[0_12px_40px_rgba(0,0,0,0.4)]"
                            >
                                {{-- Header --}}
                                <div class="flex items-center justify-between px-4 py-3 border-b border-[rgba(201,168,76,0.08)]">
                                    <span class="text-[11px] font-semibold uppercase tracking-wider text-[rgba(250,248,244,0.4)]">Notifikasi</span>
                                    @if ($totalNotif > 0)
                                        <span class="bg-red-500 text-white text-[9px] font-bold min-w-[18px] h-[18px] rounded-full flex items-center justify-center px-1.5">{{ $totalNotif }}</span>
                                    @endif
                                </div>

                                <div class="max-h-80 overflow-y-auto">
                                    {{-- Summary Cards --}}
                                    @if ($pendingOrders > 0 || $processingOrders > 0 || $unreadMessages > 0)
                                    <div class="flex gap-1.5 p-3 pb-1">
                                        @if ($pendingOrders > 0)
                                        <a href="{{ route('admin.orders.index') }}" class="flex-1 flex items-center gap-2 px-2.5 py-2 rounded-lg bg-[rgba(234,179,8,0.06)] hover:bg-[rgba(234,179,8,0.12)] transition-colors border border-transparent hover:border-[rgba(234,179,8,0.15)]">
                                            <span class="text-base">⏱</span>
                                            <div>
                                                <div class="text-base font-bold text-[var(--color-surface-50)] leading-none">{{ $pendingOrders }}</div>
                                                <div class="text-[8px] text-[rgba(250,248,244,0.35)] uppercase tracking-wide mt-0.5">Pending</div>
                                            </div>
                                        </a>
                                        @endif
                                        @if ($processingOrders > 0)
                                        <a href="{{ route('admin.orders.index') }}" class="flex-1 flex items-center gap-2 px-2.5 py-2 rounded-lg bg-[rgba(59,130,246,0.06)] hover:bg-[rgba(59,130,246,0.12)] transition-colors border border-transparent hover:border-[rgba(59,130,246,0.15)]">
                                            <span class="text-base">📦</span>
                                            <div>
                                                <div class="text-base font-bold text-[var(--color-surface-50)] leading-none">{{ $processingOrders }}</div>
                                                <div class="text-[8px] text-[rgba(250,248,244,0.35)] uppercase tracking-wide mt-0.5">Diproses</div>
                                            </div>
                                        </a>
                                        @endif
                                        @if ($unreadMessages > 0)
                                        <a href="{{ route('admin.messages.index') }}" class="flex-1 flex items-center gap-2 px-2.5 py-2 rounded-lg bg-[rgba(34,197,94,0.06)] hover:bg-[rgba(34,197,94,0.12)] transition-colors border border-transparent hover:border-[rgba(34,197,94,0.15)]">
                                            <span class="text-base">💬</span>
                                            <div>
                                                <div class="text-base font-bold text-[var(--color-surface-50)] leading-none">{{ $unreadMessages }}</div>
                                                <div class="text-[8px] text-[rgba(250,248,244,0.35)] uppercase tracking-wide mt-0.5">Pesan</div>
                                            </div>
                                        </a>
                                        @endif
                                    </div>
                                    @endif

                                    {{-- Recent Orders --}}
                                    @if ($recentOrders->count())
                                    <div class="border-t border-[rgba(201,168,76,0.06)]">
                                        <div class="px-4 pt-2.5 pb-1 text-[8px] font-semibold uppercase tracking-wider text-[rgba(250,248,244,0.25)]">Pesanan Terbaru</div>
                                        @foreach ($recentOrders as $order)
                                        <a href="{{ route('admin.orders.show', $order) }}" class="flex items-center gap-2.5 px-4 py-2.5 hover:bg-[rgba(201,168,76,0.06)] transition-colors no-underline">
                                            <span class="w-[7px] h-[7px] rounded-full flex-shrink-0
                                                @if($order->status === 'pending') bg-yellow-500
                                                @elseif($order->status === 'processing') bg-blue-500
                                                @elseif($order->status === 'shipped') bg-purple-500
                                                @elseif($order->status === 'completed') bg-green-500
                                                @else bg-red-500
                                                @endif
                                            "></span>
                                            <div class="flex-1 min-w-0">
                                                <div class="text-xs font-medium text-[var(--color-surface-50)] truncate">#{{ $order->id }} — {{ $order->user->name }}</div>
                                                <div class="flex items-center gap-1.5 mt-0.5 text-[10px] text-[rgba(250,248,244,0.3)]">
                                                    <span class="truncate max-w-[140px]">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                                                    <span class="flex-shrink-0">{{ $order->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                    @endif

                                    {{-- Recent Messages --}}
                                    @if ($recentMessages->count())
                                    <div class="border-t border-[rgba(201,168,76,0.06)]">
                                        <div class="px-4 pt-2.5 pb-1 text-[8px] font-semibold uppercase tracking-wider text-[rgba(250,248,244,0.25)]">Pesan Terbaru</div>
                                        @foreach ($recentMessages as $msg)
                                        <a href="{{ route('admin.messages.show', $msg) }}" class="flex items-center gap-2.5 px-4 py-2.5 transition-colors no-underline {{ !$msg->is_read ? 'bg-[rgba(201,168,76,0.04)] hover:bg-[rgba(201,168,76,0.08)]' : 'hover:bg-[rgba(201,168,76,0.06)]' }}">
                                            <span class="w-[7px] h-[7px] rounded-full flex-shrink-0 {{ !$msg->is_read ? 'bg-[var(--color-gold)] animate-[pulse_2s_ease-in-out_infinite]' : 'bg-[rgba(250,248,244,0.12)]' }}"></span>
                                            <div class="flex-1 min-w-0">
                                                <div class="text-xs font-medium text-[var(--color-surface-50)] truncate">{{ $msg->name }}</div>
                                                <div class="flex items-center gap-1.5 mt-0.5 text-[10px] text-[rgba(250,248,244,0.3)]">
                                                    <span class="truncate max-w-[140px]">{{ $msg->subject }}</span>
                                                    <span class="flex-shrink-0">{{ $msg->created_at->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                    @endif

                                    {{-- Empty State --}}
                                    @if ($totalNotif === 0)
                                    <div class="py-8 px-4 text-center text-xs text-[rgba(250,248,244,0.25)]">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 mx-auto mb-2 opacity-20"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/><line x1="1" y1="1" x2="23" y2="23"/></svg>
                                        <div>Semua sudah ditangani</div>
                                    </div>
                                    @endif
                                </div>

                                {{-- Footer --}}
                                @if ($totalNotif > 0)
                                <div class="px-4 py-2.5 border-t border-[rgba(201,168,76,0.08)] text-center flex items-center justify-center gap-1.5">
                                    <a href="{{ route('admin.orders.index') }}" class="text-[10px] text-[var(--color-gold)] no-underline hover:opacity-70 transition-opacity">Lihat Semua Pesanan</a>
                                    <span class="text-[rgba(250,248,244,0.2)] text-[10px]">·</span>
                                    <a href="{{ route('admin.messages.index') }}" class="text-[10px] text-[var(--color-gold)] no-underline hover:opacity-70 transition-opacity">Semua Pesan</a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <button class="theme-toggle" @click="toggle" title="Toggle theme">
                            <span x-show="dark"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg></span>
                            <span x-show="!dark" style="display:none"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg></span>
                        </button>
                        <a href="{{ route('home') }}" target="_blank" class="px-3 py-1.5 rounded-lg text-xs font-medium transition-colors" style="background:rgba(201,168,76,0.1);color:var(--color-gold);text-decoration:none;letter-spacing:0.5px">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:14px;height:14px;vertical-align:text-bottom;margin-right:4px"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg> Website
                        </a>
                    </div>
                </div>

                <main class="admin-main" style="flex:1;padding:24px 32px;background:var(--color-surface)">
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
