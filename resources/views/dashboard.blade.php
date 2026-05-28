@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">Dashboard Admin</h2>
@endsection

@push('styles')
<style>
    .stat-card { background:var(--color-surface-600);border:1px solid var(--color-surface-500);border-radius:10px;padding:16px 20px;transition:border-color 0.3s; }
    .stat-card:hover { border-color:var(--color-gold); }
    .stat-icon { width:38px;height:38px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:16px; }
    .chart-container { background:var(--color-surface-600);border:1px solid var(--color-surface-500);border-radius:10px;padding:16px; }
    .recent-table { width:100%;border-collapse:collapse; }
    .recent-table th { text-align:left;padding:10px 12px;font-size:11px;text-transform:uppercase;letter-spacing:0.5px;color:var(--color-surface-300);border-bottom:1px solid var(--color-surface-500); }
    .recent-table td { padding:12px;font-size:13px;color:var(--color-surface-100);border-bottom:1px solid var(--color-surface-500); }
    .recent-table tr:last-child td { border-bottom:none; }
    .badge { display:inline-block;padding:3px 10px;border-radius:999px;font-size:11px;font-weight:600;letter-spacing:0.3px; }
    .badge-pending { background:rgba(234,179,8,0.15);color:#EAB308; }
    .badge-processing { background:rgba(59,130,246,0.15);color:#3B82F6; }
    .badge-completed { background:rgba(34,197,94,0.15);color:#22C55E; }
    .badge-cancelled { background:rgba(239,68,68,0.15);color:#EF4444; }
    .badge-shipped { background:rgba(139,92,246,0.15);color:#8B5CF6; }
</style>
@endpush

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto">

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-6">
            <div class="stat-card">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-[10px] font-semibold uppercase tracking-wider text-surface-400">Total Pesanan</span>
                    <div class="stat-icon" style="background:rgba(59,130,246,0.12);color:#3B82F6"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg></div>
                </div>
                <div class="text-lg font-bold text-surface-50">{{ number_format($totalOrders) }}</div>
                <div class="text-[10px] text-surface-400 mt-0.5">Semua status pesanan</div>
            </div>
            <div class="stat-card">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-[10px] font-semibold uppercase tracking-wider text-surface-400">Total Pendapatan</span>
                    <div class="stat-icon" style="background:rgba(34,197,94,0.12);color:#22C55E"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
                </div>
                <div class="text-lg font-bold text-surface-50">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
                <div class="text-[10px] text-surface-400 mt-0.5">Dari pesanan selesai</div>
            </div>
            <div class="stat-card">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-[10px] font-semibold uppercase tracking-wider text-surface-400">Pesanan Bulan Ini</span>
                    <div class="stat-icon" style="background:rgba(201,168,76,0.12);color:var(--color-gold)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
                </div>
                <div class="text-lg font-bold text-surface-50">{{ number_format($ordersThisMonth) }}</div>
                <div class="text-[10px] text-surface-400 mt-0.5">{{ now()->format('F Y') }}</div>
            </div>
            <div class="stat-card">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-[10px] font-semibold uppercase tracking-wider text-surface-400">Menunggu</span>
                    <div class="stat-icon" style="background:rgba(239,68,68,0.12);color:#EF4444"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
                </div>
                <div class="text-lg font-bold text-surface-50">{{ number_format($pendingOrders) }}</div>
                <div class="text-[10px] text-surface-400 mt-0.5">Pesanan perlu diproses</div>
            </div>
        </div>

        {{-- Charts Row --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
            <div class="chart-container">
                <h3 class="text-xs font-semibold text-surface-50 mb-3 uppercase tracking-wider">Distribusi Status Pesanan</h3>
                <canvas id="statusChart" height="120"></canvas>
            </div>
            <div class="chart-container">
                <h3 class="text-xs font-semibold text-surface-50 mb-3 uppercase tracking-wider">Pendapatan Bulanan {{ now()->year }}</h3>
                <canvas id="revenueChart" height="120"></canvas>
            </div>
        </div>

        {{-- Recent Orders --}}
        <div class="chart-container mb-8">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-semibold text-surface-50 uppercase tracking-wider">Pesanan Terbaru</h3>
                <a href="{{ route('admin.orders.index') }}" class="text-xs font-medium" style="color:var(--color-gold)">Lihat Semua →</a>
            </div>
            <div style="overflow-x:auto">
                <table class="recent-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pelanggan</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentOrders as $order)
                            <tr>
                                <td class="font-mono text-xs text-surface-400">#{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td class="font-medium">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                <td>
                                    @php
                                        $statusMap = ['pending'=>'badge-pending','processing'=>'badge-processing','shipped'=>'badge-shipped','completed'=>'badge-completed','cancelled'=>'badge-cancelled'];
                                        $statusLabels = ['pending'=>'Pending','processing'=>'Diproses','shipped'=>'Dikirim','completed'=>'Selesai','cancelled'=>'Dibatalkan'];
                                    @endphp
                                    <span class="badge {{ $statusMap[$order->status] ?? 'badge-pending' }}">{{ $statusLabels[$order->status] ?? $order->status }}</span>
                                </td>
                                <td class="text-surface-400 text-xs">{{ $order->created_at->format('d M Y H:i') }}</td>
                                <td><a href="{{ route('admin.orders.show', $order) }}" class="text-xs font-medium" style="color:var(--color-gold)">Detail</a></td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center text-surface-400 py-8">Belum ada pesanan</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Management Cards --}}
        <div>
            <h3 class="text-sm font-semibold text-surface-50 mb-4 uppercase tracking-wider">Menu Manajemen</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <a href="{{ route('admin.articles.index') }}" class="card-surface p-5 hover:bg-surface-600 transition block rounded-xl" style="border:1px solid var(--color-surface-500)">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="stat-icon" style="background:rgba(59,130,246,0.12);color:#3B82F6;width:36px;height:36px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg></div>
                        <h4 class="font-semibold text-surface-50">Artikel</h4>
                    </div>
                    <p class="text-xs text-surface-400">{{ $counts['articles'] }} artikel</p>
                </a>
                <a href="{{ route('admin.products.index') }}" class="card-surface p-5 hover:bg-surface-600 transition block rounded-xl" style="border:1px solid var(--color-surface-500)">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="stat-icon" style="background:rgba(34,197,94,0.12);color:#22C55E;width:36px;height:36px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg></div>
                        <h4 class="font-semibold text-surface-50">Produk</h4>
                    </div>
                    <p class="text-xs text-surface-400">{{ $counts['products'] }} produk</p>
                </a>
                <a href="{{ route('admin.events.index') }}" class="card-surface p-5 hover:bg-surface-600 transition block rounded-xl" style="border:1px solid var(--color-surface-500)">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="stat-icon" style="background:rgba(201,168,76,0.12);color:var(--color-gold);width:36px;height:36px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div>
                        <h4 class="font-semibold text-surface-50">Event</h4>
                    </div>
                    <p class="text-xs text-surface-400">{{ $counts['events'] }} event</p>
                </a>
                <a href="{{ route('admin.galleries.index') }}" class="card-surface p-5 hover:bg-surface-600 transition block rounded-xl" style="border:1px solid var(--color-surface-500)">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="stat-icon" style="background:rgba(139,92,246,0.12);color:#8B5CF6;width:36px;height:36px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg></div>
                        <h4 class="font-semibold text-surface-50">Galeri</h4>
                    </div>
                    <p class="text-xs text-surface-400">{{ $counts['galleries'] }} galeri</p>
                </a>
                <a href="{{ route('admin.messages.index') }}" class="card-surface p-5 hover:bg-surface-600 transition block rounded-xl" style="border:1px solid var(--color-surface-500)">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="stat-icon" style="background:rgba(249,115,22,0.12);color:#F97316;width:36px;height:36px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
                        <h4 class="font-semibold text-surface-50">Pesan</h4>
                    </div>
                    <p class="text-xs text-surface-400">{{ $counts['messages'] }} pesan</p>
                </a>
                <a href="{{ route('admin.orders.index') }}" class="card-surface p-5 hover:bg-surface-600 transition block rounded-xl" style="border:1px solid var(--color-surface-500)">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="stat-icon" style="background:rgba(239,68,68,0.12);color:#EF4444;width:36px;height:36px"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1" ry="1"/></svg></div>
                        <h4 class="font-semibold text-surface-50">Pesanan</h4>
                    </div>
                    <p class="text-xs text-surface-400">{{ $counts['orders'] }} pesanan</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const isDark = localStorage.getItem('admin-theme') !== 'light';

    const textColor = isDark ? '#E0E0E0' : '#333';
    const gridColor = isDark ? 'rgba(255,255,255,0.06)' : 'rgba(0,0,0,0.06)';

    // Status Donut Chart
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode(array_keys($ordersByStatus)) !!}.map(function(s) {
                var labels = {pending:'Pending',processing:'Diproses',shipped:'Dikirim',completed:'Selesai',cancelled:'Dibatalkan'};
                return labels[s] || s;
            }),
            datasets: [{
                data: {{ json_encode(array_values($ordersByStatus)) }},
                backgroundColor: ['#EAB308','#3B82F6','#8B5CF6','#22C55E','#EF4444'],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { color: textColor, padding: 16, usePointStyle: true, font: { size: 12 } }
                }
            },
            cutout: '80%'
        }
    });

    // Revenue Bar Chart
    const months = {!! json_encode($monthlyRevenue->pluck('month')->toArray()) !!};
    const revenues = {!! json_encode($monthlyRevenue->pluck('total')->toArray()) !!};
    const allMonths = [];
    const allRevenues = [];
    for (var m = 1; m <= 12; m++) {
        var idx = months.indexOf(m);
        allMonths.push(['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'][m-1]);
        allRevenues.push(idx !== -1 ? revenues[idx] : 0);
    }

    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx, {
        type: 'bar',
        data: {
            labels: allMonths,
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: allRevenues,
                backgroundColor: 'rgba(201,168,76,0.7)',
                borderColor: '#C9A84C',
                borderWidth: 1,
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: gridColor },
                    ticks: {
                        color: textColor,
                        font: { size: 11 },
                        callback: function(v) { if (v >= 1000000) return 'Rp'+(v/1000000).toFixed(1)+'jt'; if (v >= 1000) return 'Rp'+(v/1000).toFixed(0)+'rb'; return 'Rp'+v; }
                    }
                },
                x: {
                    grid: { display: false },
                    ticks: { color: textColor, font: { size: 11 } }
                }
            }
        }
    });
});
</script>
@endpush
