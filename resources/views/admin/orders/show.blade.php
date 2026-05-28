@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">Pesanan #{{ $order->id }}</h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-900/50 border border-green-700 rounded-lg text-green-300">{{ session('success') }}</div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="card-surface p-6">
                    <h3 class="font-semibold text-lg text-surface-50 mb-3">Informasi Pelanggan</h3>
                    <p class="text-surface-300"><strong>Nama:</strong> {{ $order->user->name }}</p>
                    <p class="text-surface-300"><strong>Email:</strong> {{ $order->user->email }}</p>
                    <p class="text-surface-300"><strong>Telepon:</strong> {{ $order->phone }}</p>
                </div>

                <div class="card-surface p-6">
                    <h3 class="font-semibold text-lg text-surface-50 mb-3">Status Pesanan</h3>
                    <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="flex items-center gap-2">
                        @csrf @method('PUT')
                        <select name="status" class="bg-surface-800 border border-surface-600 rounded-lg px-3 py-2 text-surface-200 text-sm">
                            @foreach (['pending','confirmed','processing','shipped','delivered','cancelled'] as $s)
                                <option value="{{ $s }}" {{ $order->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="px-4 py-2 bg-gold-500 text-surface-900 font-medium rounded-lg hover:bg-gold-400 transition-colors text-sm">Update</button>
                    </form>
                    <p class="mt-3 text-surface-400 text-sm"><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
                </div>
            </div>

            <div class="card-surface p-6 mb-6">
                <h3 class="font-semibold text-lg text-surface-50 mb-3">Bukti Pembayaran</h3>
                @if ($order->payment_proof)
                    <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank" class="inline-flex items-center gap-2 text-gold-400 hover:text-gold-300 transition-colors">
                        <img src="{{ asset('storage/' . $order->payment_proof) }}" alt="Bukti Pembayaran" style="max-width:300px;max-height:200px;object-fit:cover;border:1px solid rgba(201,168,76,0.15);border-radius:4px">
                        <span class="text-sm">Lihat Bukti Pembayaran</span>
                    </a>
                @else
                    <p class="text-surface-400 text-sm">Belum ada bukti pembayaran</p>
                @endif
            </div>

            <div class="card-surface p-6 mb-6">
                <h3 class="font-semibold text-lg text-surface-50 mb-3">Alamat Pengiriman</h3>
                <p class="text-surface-300">{{ $order->shipping_address }}</p>
                @if ($order->notes)
                    <p class="mt-2 text-surface-300"><strong>Catatan:</strong> {{ $order->notes }}</p>
                @endif
            </div>

            <div class="card-surface p-6">
                <h3 class="font-semibold text-lg text-surface-50 mb-3">Item Pesanan</h3>
                <table class="w-full text-sm text-left">
                    <thead>
                        <tr class="bg-surface-800 text-gold-400">
                            <th class="px-4 py-3">Produk</th>
                            <th class="px-4 py-3">Harga</th>
                            <th class="px-4 py-3">Jumlah</th>
                            <th class="px-4 py-3">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr class="border-b border-surface-700">
                                <td class="px-4 py-3">
                                    <div class="flex items-center gap-2">
                                        @if ($item->product->image)
                                            <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                        @endif
                                        <span class="text-surface-200">{{ $item->product->name }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-surface-300">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="px-4 py-3 text-surface-300">{{ $item->quantity }}</td>
                                <td class="px-4 py-3 text-surface-200">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="text-surface-50 font-bold">
                            <th colspan="3" class="px-4 py-3 text-right">Total</th>
                            <th class="px-4 py-3 text-gold-400">Rp {{ number_format($order->total, 0, ',', '.') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="mt-6">
                <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 bg-surface-700 text-surface-200 rounded-lg hover:bg-surface-600 transition-colors">&larr; Kembali</a>
            </div>
        </div>
    </div>
@endsection
