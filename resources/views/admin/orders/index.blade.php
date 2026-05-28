@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">Manajemen Pesanan</h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-900/50 border border-green-700 rounded-lg text-green-300">{{ session('success') }}</div>
            @endif

            <div class="card-surface overflow-hidden">
                <div class="p-6" style="overflow-x: auto;">
                    <table class="w-full text-sm text-left">
                        <thead>
                            <tr class="bg-surface-800 text-gold-400">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Pelanggan</th>
                                <th class="px-4 py-3">Total</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Tanggal</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr class="border-b border-surface-700 hover:bg-surface-800/50">
                                    <td class="px-4 py-3">{{ $order->id }}</td>
                                    <td class="px-4 py-3">{{ $order->user->name }}<br><small class="text-surface-400">{{ $order->user->email }}</small></td>
                                    <td class="px-4 py-3">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3">
                                        @php
                                            $badgeColors = ['pending'=>'bg-yellow-600','confirmed'=>'bg-blue-600','processing'=>'bg-purple-600','shipped'=>'bg-green-600','delivered'=>'bg-green-700','cancelled'=>'bg-red-600'];
                                        @endphp
                                        <span class="px-2 py-1 text-xs font-medium text-white rounded-full {{ $badgeColors[$order->status] ?? 'bg-surface-600' }}">{{ ucfirst($order->status) }}</span>
                                    </td>
                                    <td class="px-4 py-3">{{ $order->created_at->format('d M Y H:i') }}</td>
                                    <td class="px-4 py-3">
                                        <a href="{{ route('admin.orders.show', $order) }}" class="text-gold-400 hover:text-gold-300">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="px-4 py-8 text-center text-surface-400">Belum ada pesanan</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
