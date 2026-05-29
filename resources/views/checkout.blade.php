<x-layouts.public>
    <section style="padding:140px 80px 80px;background:var(--color-surface);min-height:100vh">
        <div style="max-width:800px;margin:0 auto">
            <div style="text-align:center;margin-bottom:50px">
                <span class="section-tag">Pemesanan</span>
                <h1 class="section-title">Checkout</h1>
                <div class="section-divider" style="margin:16px auto 0"></div>
            </div>

            <div style="background:var(--color-surface-700);border:1px solid rgba(201,168,76,0.12);padding:32px;margin-bottom:32px">
                <h3 style="font-family:var(--font-serif);font-size:20px;font-weight:400;color:var(--color-surface-50);margin-bottom:20px;letter-spacing:0.5px">Ringkasan <em style="color:var(--color-gold);font-style:italic">Pesanan</em></h3>
                <div style="border-bottom:1px solid rgba(201,168,76,0.08);margin-bottom:16px;padding-bottom:8px">
                    @foreach ($cart as $id => $details)
                        @php $product = $products->get($id); @endphp
                        @if ($product)
                            <div style="display:flex;justify-content:space-between;align-items:center;padding:10px 0;border-bottom:1px solid rgba(255,255,255,0.04)">
                                <div style="display:flex;align-items:center;gap:12px">
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width:44px;height:44px;object-fit:cover;border:1px solid rgba(201,168,76,0.08)">
                                    <div>
                                        <div style="font-family:var(--font-serif);font-size:15px;color:var(--color-surface-50)">{{ $product->name }}</div>
                                        <span style="font-size:11px;color:rgba(250,248,244,0.3)">{{ $details['quantity'] }} &times; Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                <span style="font-family:var(--font-serif);font-size:16px;color:var(--color-gold)">Rp {{ number_format($product->price * $details['quantity'], 0, ',', '.') }}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;padding-top:8px">
                    <span style="font-size:11px;color:rgba(250,248,244,0.4);letter-spacing:1.5px;text-transform:uppercase;font-weight:300">Total</span>
                    <span style="font-family:var(--font-serif);font-size:24px;color:var(--color-gold)">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>

            <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="background:var(--color-surface-700);border:1px solid rgba(201,168,76,0.12);padding:32px;margin-bottom:32px">
                    <h3 style="font-family:var(--font-serif);font-size:20px;font-weight:400;color:var(--color-surface-50);margin-bottom:20px;letter-spacing:0.5px">Pembayaran <em style="color:var(--color-gold);font-style:italic">Transfer Bank</em></h3>
                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:24px;padding-bottom:24px;border-bottom:1px solid rgba(201,168,76,0.08)">
                        <div style="background:var(--color-surface-800);padding:16px;border:1px solid rgba(201,168,76,0.08)">
                            <div style="font-size:9px;color:rgba(250,248,244,0.3);letter-spacing:1.5px;text-transform:uppercase;margin-bottom:8px">Bank <span style="color:var(--color-gold)">BCA</span></div>
                            <div style="font-family:var(--font-serif);font-size:18px;color:var(--color-surface-50);letter-spacing:2px">123 456 7890</div>
                            <div style="font-size:11px;color:rgba(250,248,244,0.4);margin-top:4px">a.n. IbraLoka Wear</div>
                        </div>
                        <div style="background:var(--color-surface-800);padding:16px;border:1px solid rgba(201,168,76,0.08)">
                            <div style="font-size:9px;color:rgba(250,248,244,0.3);letter-spacing:1.5px;text-transform:uppercase;margin-bottom:8px">Bank <span style="color:var(--color-gold)">Mandiri</span></div>
                            <div style="font-family:var(--font-serif);font-size:18px;color:var(--color-surface-50);letter-spacing:2px">987 654 3210</div>
                            <div style="font-size:11px;color:rgba(250,248,244,0.4);margin-top:4px">a.n. IbraLoka Wear</div>
                        </div>
                    </div>
                    <div>
                        <label for="payment_proof" style="display:block;margin-bottom:8px;color:rgba(250,248,244,0.5);font-size:10px;letter-spacing:2px;text-transform:uppercase;font-weight:600">Upload Bukti Transfer</label>
                        <div style="position:relative">
                            <input type="file" name="payment_proof" id="payment_proof" accept="image/*,.pdf" required style="width:100%;padding:14px;background:var(--color-surface-800);border:1px solid rgba(201,168,76,0.12);color:var(--color-surface-50);font-size:13px;font-family:'Montserrat',sans-serif;cursor:pointer">
                        </div>
                        <p style="margin-top:6px;font-size:10px;color:rgba(250,248,244,0.25);letter-spacing:0.5px">Format: JPG, PNG, atau PDF. Maksimal 2MB.</p>
                        @error('payment_proof') <p style="margin-top:6px;font-size:11px;color:#ef4444;letter-spacing:0.5px">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div style="background:var(--color-surface-700);border:1px solid rgba(201,168,76,0.12);padding:32px">
                    <h3 style="font-family:var(--font-serif);font-size:20px;font-weight:400;color:var(--color-surface-50);margin-bottom:24px;letter-spacing:0.5px">Informasi <em style="color:var(--color-gold);font-style:italic">Pengiriman</em></h3>

                    <div style="margin-bottom:20px">
                        <label for="shipping_address" style="display:block;margin-bottom:8px;color:rgba(250,248,244,0.5);font-size:10px;letter-spacing:2px;text-transform:uppercase;font-weight:600">Alamat Pengiriman</label>
                        <textarea name="shipping_address" id="shipping_address" rows="3" required style="width:100%;padding:14px;background:var(--color-surface-800);border:1px solid rgba(201,168,76,0.12);color:var(--color-surface-50);font-size:13px;font-family:'Montserrat',sans-serif;transition:border-color .25s" onfocus="this.style.borderColor='rgba(201,168,76,0.4)'" onblur="this.style.borderColor='rgba(201,168,76,0.12)'">{{ old('shipping_address') }}</textarea>
                        @error('shipping_address') <p style="margin-top:6px;font-size:11px;color:#ef4444;letter-spacing:0.5px">{{ $message }}</p> @enderror
                    </div>

                    <div style="margin-bottom:20px">
                        <label for="phone" style="display:block;margin-bottom:8px;color:rgba(250,248,244,0.5);font-size:10px;letter-spacing:2px;text-transform:uppercase;font-weight:600">No. Telepon</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required style="width:100%;padding:14px;background:var(--color-surface-800);border:1px solid rgba(201,168,76,0.12);color:var(--color-surface-50);font-size:13px;font-family:'Montserrat',sans-serif;transition:border-color .25s" onfocus="this.style.borderColor='rgba(201,168,76,0.4)'" onblur="this.style.borderColor='rgba(201,168,76,0.12)'">
                        @error('phone') <p style="margin-top:6px;font-size:11px;color:#ef4444;letter-spacing:0.5px">{{ $message }}</p> @enderror
                    </div>

                    <div style="margin-bottom:28px">
                        <label for="notes" style="display:block;margin-bottom:8px;color:rgba(250,248,244,0.5);font-size:10px;letter-spacing:2px;text-transform:uppercase;font-weight:600">Catatan <span style="color:rgba(250,248,244,0.2)">(opsional)</span></label>
                        <textarea name="notes" id="notes" rows="2" style="width:100%;padding:14px;background:var(--color-surface-800);border:1px solid rgba(201,168,76,0.12);color:var(--color-surface-50);font-size:13px;font-family:'Montserrat',sans-serif;transition:border-color .25s" onfocus="this.style.borderColor='rgba(201,168,76,0.4)'" onblur="this.style.borderColor='rgba(201,168,76,0.12)'">{{ old('notes') }}</textarea>
                        @error('notes') <p style="margin-top:6px;font-size:11px;color:#ef4444;letter-spacing:0.5px">{{ $message }}</p> @enderror
                    </div>

                    <div style="display:flex;gap:12px;justify-content:space-between;border-top:1px solid rgba(201,168,76,0.08);padding-top:24px">
                        <a href="{{ route('cart') }}" class="btn-ghost" style="text-decoration:none;padding:14px 32px;font-size:11px">Kembali</a>
                        <button type="submit" class="btn-gold" style="border:none;padding:14px 36px;font-size:11px;letter-spacing:3px;cursor:pointer;font-family:'Montserrat',sans-serif">Buat Pesanan</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <style>
    @media (max-width:768px) {
        section { padding: 120px 16px 60px !important; }
        section > div > div[style*="padding:32px"] { padding: 20px !important; }
        textarea, input[type="text"] { font-size: 16px !important; }
    }
    </style>
</x-layouts.public>
