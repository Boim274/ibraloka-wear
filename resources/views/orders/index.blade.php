<x-layouts.public>
    <div class="pt-36 pb-20 px-4 sm:px-8 lg:px-16" style="max-width: 1000px; margin: 0 auto;">
        <h1 class="section-title text-center mb-12">Pesanan Saya</h1>

        @if (session('success'))
            <div class="alert alert-success mb-6">{{ session('success') }}</div>
        @endif

        @if ($orders->isEmpty())
            <div class="text-center py-16">
                <p class="mb-6" style="font-family: 'Montserrat', sans-serif; color: #999; font-size: 1.1rem;">Belum ada pesanan.</p>
                <a href="{{ route('home') }}" class="btn-primary">Belanja Sekarang</a>
            </div>
        @else
            <div class="table-wrapper" style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; font-family: 'Montserrat', sans-serif;">
                    <thead>
                        <tr style="border-bottom: 2px solid #C9A84C;">
                            <th style="padding: 12px 8px; text-align: left; color: #C9A84C;">Pesanan #</th>
                            <th style="padding: 12px 8px; text-align: center; color: #C9A84C;">Tanggal</th>
                            <th style="padding: 12px 8px; text-align: center; color: #C9A84C;">Total</th>
                            <th style="padding: 12px 8px; text-align: center; color: #C9A84C;">Status</th>
                            <th style="padding: 12px 8px; text-align: center; color: #C9A84C;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr style="border-bottom: 1px solid #eee;">
                                <td style="padding: 16px 8px; font-weight: 600; color: #1a1a2e;">#{{ $order->id }}</td>
                                <td style="padding: 16px 8px; text-align: center;">{{ $order->created_at->format('d M Y') }}</td>
                                <td style="padding: 16px 8px; text-align: center; font-weight: 600;">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                <td style="padding: 16px 8px; text-align: center;">
                                    @php
                                        $statusColors = [
                                            'pending' => '#f39c12', 'confirmed' => '#3498db', 'processing' => '#9b59b6',
                                            'shipped' => '#2ecc71', 'delivered' => '#27ae60', 'cancelled' => '#e74c3c',
                                        ];
                                    @endphp
                                    <span style="display: inline-block; padding: 4px 12px; border-radius: 20px; background: {{ $statusColors[$order->status] ?? '#999' }}; color: #fff; font-size: 0.85rem;">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td style="padding: 16px 8px; text-align: center;">
                                    <a href="{{ route('orders.show', $order) }}" style="color: #C9A84C; font-weight: 600; text-decoration: none;">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-8">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</x-layouts.public>
