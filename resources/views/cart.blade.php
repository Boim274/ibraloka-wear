@php $total = 0; @endphp
<x-layouts.public>
    <section style="padding:140px 80px 80px;background:var(--color-surface);min-height:100vh">
        <div style="max-width:1200px;margin:0 auto">
            <div style="text-align:center;margin-bottom:50px">
                <span class="section-tag">Belanja</span>
                <h1 class="section-title">Keranjang <em>Belanja</em></h1>
                <div class="section-divider" style="margin:16px auto 0"></div>
            </div>

            @if (empty($cart))
                <div style="text-align:center;padding:80px 20px">
                    <div style="font-size:48px;margin-bottom:20px;opacity:0.3">🛒</div>
                    <p style="color:rgba(250,248,244,0.4);font-size:15px;font-weight:300;margin-bottom:24px">Keranjang belanja Anda masih kosong.</p>
                    <a href="{{ route('home') }}" class="btn-gold" style="text-decoration:none;padding:12px 32px;font-size:11px">Belanja Sekarang</a>
                </div>
            @else
                <div style="background:var(--color-surface-700);border:1px solid rgba(201,168,76,0.12);overflow:hidden">
                    <table style="width:100%;border-collapse:collapse;font-family:'Montserrat',sans-serif">
                        <thead>
                            <tr style="border-bottom:1px solid rgba(201,168,76,0.15);background:var(--color-surface-800)">
                                <th style="padding:16px 20px;text-align:left;color:var(--color-gold);font-size:10px;letter-spacing:2px;text-transform:uppercase;font-weight:600">Produk</th>
                                <th style="padding:16px 20px;text-align:center;color:var(--color-gold);font-size:10px;letter-spacing:2px;text-transform:uppercase;font-weight:600">Harga</th>
                                <th style="padding:16px 20px;text-align:center;color:var(--color-gold);font-size:10px;letter-spacing:2px;text-transform:uppercase;font-weight:600">Jumlah</th>
                                <th style="padding:16px 20px;text-align:center;color:var(--color-gold);font-size:10px;letter-spacing:2px;text-transform:uppercase;font-weight:600">Subtotal</th>
                                <th style="padding:16px 20px;text-align:center;color:var(--color-gold);font-size:10px;letter-spacing:2px;text-transform:uppercase;font-weight:600">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $id => $details)
                                @php $product = $products->get($id); @endphp
                                @if ($product)
                                    @php $subtotal = $product->price * $details['quantity']; $total += $subtotal; @endphp
                                    <tr style="border-bottom:1px solid rgba(255,255,255,0.04)">
                                        <td style="padding:20px;display:flex;align-items:center;gap:16px">
                                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="width:64px;height:64px;object-fit:cover;border:1px solid rgba(201,168,76,0.1)">
                                            <div>
                                                <div style="font-family:var(--font-serif);font-size:16px;color:var(--color-surface-50);font-weight:400;margin-bottom:2px">{{ $product->name }}</div>
                                                <span style="font-size:10px;color:rgba(250,248,244,0.3);letter-spacing:1.5px;text-transform:uppercase">{{ $product->category }}</span>
                                            </div>
                                        </td>
                                        <td style="padding:20px;text-align:center;color:rgba(250,248,244,0.6);font-size:13px;font-weight:300">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                        <td style="padding:20px;text-align:center">
                                            <div style="display:inline-flex;align-items:center;border:1px solid rgba(201,168,76,0.15);border-radius:2px;overflow:hidden">
                                                @if ($details['quantity'] > 1)
                                                    <form action="{{ route('cart.update', $product) }}" method="POST" style="display:inline-flex">
                                                        @csrf
                                                        <input type="hidden" name="quantity" value="{{ $details['quantity'] - 1 }}">
                                                        <button type="submit" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;background:var(--color-surface-800);border:none;color:var(--color-gold);cursor:pointer;padding:0;transition:all .2s" onmouseover="this.style.background='rgba(201,168,76,0.15)'" onmouseout="this.style.background='var(--color-surface-800)'" aria-label="Kurangi jumlah">
                                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                                        </button>
                                                    </form>
                                                @else
                                                    <span style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;background:var(--color-surface-800);color:rgba(250,248,244,0.15)">
                                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                                    </span>
                                                @endif
                                                <span style="width:48px;height:36px;display:flex;align-items:center;justify-content:center;font-size:14px;color:var(--color-surface-50);font-weight:500;font-family:'Montserrat',sans-serif;background:var(--color-surface-800);border-left:1px solid rgba(201,168,76,0.08);border-right:1px solid rgba(201,168,76,0.08)">{{ $details['quantity'] }}</span>
                                                <form action="{{ route('cart.update', $product) }}" method="POST" style="display:inline-flex">
                                                    @csrf
                                                    <input type="hidden" name="quantity" value="{{ $details['quantity'] + 1 }}">
                                                    <button type="submit" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center;background:var(--color-surface-800);border:none;color:var(--color-gold);cursor:pointer;padding:0;transition:all .2s" onmouseover="this.style.background='rgba(201,168,76,0.15)'" onmouseout="this.style.background='var(--color-surface-800)'" aria-label="Tambah jumlah">
                                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td style="padding:20px;text-align:center;font-family:var(--font-serif);font-size:18px;color:var(--color-gold);font-weight:400">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                        <td style="padding:20px;text-align:center">
                                            <form action="{{ route('cart.remove', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                                @csrf @method('DELETE')
                                                <button type="submit" style="background:none;border:1px solid rgba(220,38,38,0.3);color:#ef4444;cursor:pointer;font-size:16px;width:32px;height:32px;display:flex;align-items:center;justify-content:center;transition:all .25s;opacity:0.6" onmouseover="this.style.opacity='1';this.style.borderColor='rgba(220,38,38,0.6)'" onmouseout="this.style.opacity='0.6';this.style.borderColor='rgba(220,38,38,0.3)'">&times;</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="margin-top:32px;display:flex;justify-content:space-between;align-items:center;font-family:'Montserrat',sans-serif;padding:24px 32px;background:var(--color-surface-700);border:1px solid rgba(201,168,76,0.08)">
                    <div>
                        <span style="font-size:11px;color:rgba(250,248,244,0.3);letter-spacing:1.5px;text-transform:uppercase;font-weight:300">Total Belanja</span>
                        <div style="font-family:var(--font-serif);font-size:28px;color:var(--color-gold);margin-top:4px">Rp {{ number_format($total, 0, ',', '.') }}</div>
                    </div>
                    <div style="display:flex;gap:12px">
                        <a href="{{ route('home') }}" class="btn-ghost" style="text-decoration:none;padding:12px 28px;font-size:11px">Lanjut Belanja</a>
                        <a href="{{ route('checkout') }}" class="btn-gold" style="text-decoration:none;padding:12px 28px;font-size:11px">Checkout</a>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <style>
    @media (max-width:768px) {
        section { padding: 120px 16px 60px !important; }
        table thead { display: none !important; }
        table tbody tr { display: flex; flex-direction: column; padding: 20px; border-bottom: 1px solid rgba(255,255,255,0.06) !important; }
        table tbody tr td { padding: 6px 0 !important; text-align: left !important; display: flex; align-items: center; justify-content: space-between; border: none !important; }
        table tbody tr td:first-child { padding-top: 0 !important; }
        table tbody tr td:last-child { padding-bottom: 0 !important; }
        table tbody tr td[style*="display: flex"] { display: flex !important; }
        table tbody tr td form { justify-content: flex-end !important; }
        .cart-summary { flex-direction: column !important; gap: 20px !important; text-align: center !important; padding: 20px !important; }
    }
    </style>
</x-layouts.public>
