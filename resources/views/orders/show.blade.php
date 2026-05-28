<x-layouts.public>
    <section style="padding:140px 80px 80px;background:var(--color-surface);min-height:100vh">
        <div style="max-width:800px;margin:0 auto">
            <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:40px">
                <div>
                    <span class="section-tag">Detail Pesanan</span>
                    <h1 class="section-title" style="margin-bottom:0">Pesanan #{{ $order->id }}</h1>
                </div>
                <a href="{{ route('orders.index') }}" class="btn-ghost" style="text-decoration:none;padding:10px 24px;font-size:10px">&larr; Kembali</a>
            </div>

            <div style="display:grid;gap:24px;font-family:'Montserrat',sans-serif">
                <div style="background:var(--color-surface-700);border:1px solid rgba(201,168,76,0.12);padding:28px">
                    <h3 style="font-family:var(--font-serif);font-size:18px;font-weight:400;color:var(--color-surface-50);margin-bottom:16px;letter-spacing:0.5px">Informasi <em style="color:var(--color-gold);font-style:italic">Pesanan</em></h3>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
                        <div>
                            <span style="font-size:10px;color:rgba(250,248,244,0.3);letter-spacing:1.5px;text-transform:uppercase">Status</span>
                            @php $statusColors = ['pending'=>'#f39c12','confirmed'=>'#3498db','processing'=>'#9b59b6','shipped'=>'#2ecc71','delivered'=>'#27ae60','cancelled'=>'#e74c3c']; @endphp
                            <div style="margin-top:4px"><span style="display:inline-block;padding:4px 14px;background:{{ $statusColors[$order->status] ?? '#666' }};color:#fff;font-size:11px;letter-spacing:1px;text-transform:uppercase">{{ $order->status }}</span></div>
                        </div>
                        <div style="text-align:right">
                            <span style="font-size:10px;color:rgba(250,248,244,0.3);letter-spacing:1.5px;text-transform:uppercase">Tanggal</span>
                            <div style="font-size:13px;color:rgba(250,248,244,0.6);margin-top:4px">{{ $order->created_at->format('d M Y H:i') }}</div>
                        </div>
                        <div>
                            <span style="font-size:10px;color:rgba(250,248,244,0.3);letter-spacing:1.5px;text-transform:uppercase">Total</span>
                            <div style="font-family:var(--font-serif);font-size:22px;color:var(--color-gold);margin-top:4px">Rp {{ number_format($order->total, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>

                <div style="background:var(--color-surface-700);border:1px solid rgba(201,168,76,0.12);padding:28px">
                    <h3 style="font-family:var(--font-serif);font-size:18px;font-weight:400;color:var(--color-surface-50);margin-bottom:14px;letter-spacing:0.5px">Bukti <em style="color:var(--color-gold);font-style:italic">Pembayaran</em></h3>
                    @if ($order->payment_proof)
                        <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank">
                            <img src="{{ asset('storage/' . $order->payment_proof) }}" alt="Bukti Pembayaran" style="max-width:100%;max-height:300px;object-fit:contain;border:1px solid rgba(201,168,76,0.1)">
                        </a>
                        <p style="margin-top:8px;font-size:11px;color:rgba(250,248,244,0.3)">Klik gambar untuk melihat ukuran penuh</p>
                    @else
                        <p style="font-size:13px;color:rgba(250,248,244,0.3)">Belum ada bukti pembayaran.</p>
                    @endif
                </div>

                <div style="background:var(--color-surface-700);border:1px solid rgba(201,168,76,0.12);padding:28px">
                    <h3 style="font-family:var(--font-serif);font-size:18px;font-weight:400;color:var(--color-surface-50);margin-bottom:14px;letter-spacing:0.5px">Alamat <em style="color:var(--color-gold);font-style:italic">Pengiriman</em></h3>
                    <p style="font-size:13px;color:rgba(250,248,244,0.6);line-height:1.7;margin-bottom:8px">{{ $order->shipping_address }}</p>
                    <p style="font-size:12px;color:rgba(250,248,244,0.4)"><span style="color:rgba(250,248,244,0.5)">Telepon:</span> {{ $order->phone }}</p>
                    @if ($order->notes)
                        <p style="font-size:12px;color:rgba(250,248,244,0.4);margin-top:8px"><span style="color:rgba(250,248,244,0.5)">Catatan:</span> {{ $order->notes }}</p>
                    @endif
                </div>

                <div style="background:var(--color-surface-700);border:1px solid rgba(201,168,76,0.12);padding:28px">
                    <h3 style="font-family:var(--font-serif);font-size:18px;font-weight:400;color:var(--color-surface-50);margin-bottom:16px;letter-spacing:0.5px">Item <em style="color:var(--color-gold);font-style:italic">Pesanan</em></h3>
                    @foreach ($order->items as $item)
                        <div style="display:flex;justify-content:space-between;align-items:center;padding:12px 0;border-bottom:1px solid rgba(255,255,255,0.04)">
                            <div style="display:flex;align-items:center;gap:14px">
                                <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" style="width:48px;height:48px;object-fit:cover;border:1px solid rgba(201,168,76,0.08)">
                                <div>
                                    <div style="font-family:var(--font-serif);font-size:15px;color:var(--color-surface-50)">{{ $item->product->name }}</div>
                                    <span style="font-size:11px;color:rgba(250,248,244,0.3)">{{ $item->quantity }} &times; Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            <span style="font-family:var(--font-serif);font-size:16px;color:var(--color-gold)">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <style>
    @media (max-width:768px) {
        section { padding: 120px 16px 60px !important; }
        section > div > div:first-child { flex-direction: column !important; align-items: flex-start !important; gap: 16px !important; }
        [style*="grid-template-columns: 1fr 1fr"] { grid-template-columns: 1fr !important; }
        [style*="grid-template-columns: 1fr 1fr"] > div:last-child { text-align: left !important; }
    }
    </style>
</x-layouts.public>
