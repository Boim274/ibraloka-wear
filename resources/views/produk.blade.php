<x-layouts.public>
    @section('title', 'Produk - IbraLoka Wear')

    <section style="padding: 140px 80px 80px; background: var(--color-surface);">
        <div style="max-width: 600px; margin-bottom: 60px;">
            <span class="section-tag">Koleksi Kami</span>
            <h1 class="section-title">Semua <em>Produk</em></h1>
            <div class="section-divider"></div>
        </div>

        @if ($products->isEmpty())
            <div style="text-align: center; padding: 60px 20px;">
                <p style="font-family: 'Montserrat', sans-serif; color: #999; font-size: 1.1rem;">Belum ada produk tersedia.</p>
                <a href="{{ route('home') }}" class="btn-primary" style="margin-top: 20px; display: inline-block;">Kembali</a>
            </div>
        @else
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
                @foreach ($products as $product)
                    <div class="product-card fade-up" style="background: var(--color-surface-700); border: 1px solid rgba(201, 168, 76, 0.15); border-radius: 0;">
                        <div style="position: relative; overflow: hidden; aspect-ratio: 1;">
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @if ($product->category)
                                <span style="position: absolute; top: 12px; left: 12px; background: #C9A84C; color: #000; padding: 4px 12px; font-size: 10px; letter-spacing: 1.5px; text-transform: uppercase; font-weight: 600;">{{ $product->category }}</span>
                            @endif
                        </div>
                        <div style="padding: 20px;">
                            <h3 style="font-family: var(--font-serif); font-size: 1.2rem; color: var(--color-surface-50); margin-bottom: 8px;">{{ $product->name }}</h3>
                            <p style="font-family: 'Montserrat', sans-serif; font-size: 1.3rem; font-weight: 700; color: #C9A84C; margin-bottom: 16px;">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            @auth
                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-gold" style="width: 100%; padding: 10px; font-size: 11px; border: none; cursor: pointer;">Tambah ke Keranjang</button>
                                </form>
                            @else
                                <button onclick="openModal('signin')" class="btn-gold" style="width: 100%; padding: 10px; font-size: 11px; border: none; cursor: pointer;">Login untuk Memesan</button>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>

            <div style="margin-top: 40px;">
                {{ $products->links() }}
            </div>
        @endif
    </section>
</x-layouts.public>
