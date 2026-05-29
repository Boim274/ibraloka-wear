<x-layouts.public>
@section('title', 'IbraLoka Wear - Local Luxury Fashion')

<!-- HERO -->
<section id="home" style="height:100vh;display:flex;align-items:center;justify-content:center;text-align:center;position:relative;overflow:hidden;background:#0A0A0A">
  <div class="hero-bg" style="position:absolute;inset:0;overflow:hidden">
    <img src="{{ asset('images/hero-bg.jpg') }}" alt="IbraLoka Wear Hero" style="width:100%;height:100%;object-fit:cover;opacity:0.55">
    <div style="position:absolute;inset:0;background:linear-gradient(135deg,rgba(10,10,10,0.6) 0%,rgba(26,18,8,0.4) 50%,rgba(10,10,10,0.7) 100%)"></div>
    <div class="hero-lines" style="position:absolute;inset:0">
      <svg viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice" style="width:100%;height:100%;opacity:0.06">
        <line x1="0" y1="900" x2="720" y2="0" stroke="#C9A84C" stroke-width="0.5"/>
        <line x1="1440" y1="900" x2="720" y2="0" stroke="#C9A84C" stroke-width="0.5"/>
        <line x1="0" y1="600" x2="1440" y2="300" stroke="#C9A84C" stroke-width="0.3"/>
        <circle cx="720" cy="450" r="300" fill="none" stroke="#C9A84C" stroke-width="0.3"/>
        <circle cx="720" cy="450" r="200" fill="none" stroke="#C9A84C" stroke-width="0.2"/>
        <circle cx="720" cy="450" r="400" fill="none" stroke="#C9A84C" stroke-width="0.15"/>
      </svg>
    </div>
  </div>
  <div class="hero-content" style="position:relative;z-index:2;max-width:800px;padding:0 20px">
    <span class="section-tag" style="margin-bottom:24px;text-align:center">Est. 2022 · Jakarta, Indonesia</span>
    <h1 class="hero-title" style="font-family:var(--font-serif);font-size:clamp(56px,8vw,100px);font-weight:300;line-height:1;color:var(--color-surface-50);margin-bottom:10px">Ibra<span style="color:var(--color-gold);font-style:italic">Loka</span><br>Wear</h1>
    <p class="hero-subtitle" style="font-family:var(--font-serif);font-size:clamp(16px,2.5vw,24px);font-weight:300;color:rgba(250,248,244,0.6);margin-bottom:40px;letter-spacing:3px;text-transform:uppercase">Luxury Local Fashion · Crafted with Soul</p>
    <div class="hero-btns" style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap">
      <a href="#produk" class="btn-gold" style="padding:12px 28px;font-size:11px">Lihat Koleksi</a>
      <a href="#about" class="btn-ghost" style="padding:12px 28px;font-size:11px">Tentang Kami.</a>
    </div>
  </div>
  <div class="hero-badge" style="position:absolute;bottom:40px;left:50%;transform:translateX(-50%);display:flex;flex-direction:column;align-items:center;gap:8px;color:rgba(250,248,244,0.4);font-size:10px;letter-spacing:2px;text-transform:uppercase;animation:bounce 2s infinite">
    Scroll
    <div style="width:1px;height:40px;background:linear-gradient(to bottom,var(--color-gold),transparent)"></div>
  </div>
</section>

<!-- ABOUT -->
<section id="about" style="background:var(--color-surface-700);padding:100px 80px">
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center">
    <div class="fade-up">
      <span class="section-tag">Tentang Kami</span>
      <h2 class="section-title">Lahir dari <em>Jiwa</em><br>Lokal</h2>
      <div class="section-divider"></div>
      <p style="color:rgba(250,248,244,0.7);margin-bottom:20px;line-height:1.9;font-weight:300">IbraLoka Wear adalah brand fashion lokal Indonesia yang berdiri sejak tahun 2022 di Jakarta. Kami lahir dari kecintaan mendalam terhadap seni berpakaian yang menggabungkan estetika modern dengan jiwa budaya lokal yang kaya.</p>
      <p style="color:rgba(250,248,244,0.7);margin-bottom:20px;line-height:1.9;font-weight:300">Nama "IbraLoka" berasal dari dua kata: <em style="color:var(--color-gold)">Ibra</em> — yang berarti kebebasan berekspresi — dan <em style="color:var(--color-gold)">Loka</em> — bahasa Sansekerta untuk dunia atau tempat. Bersama, kami menciptakan dunia mode yang bebas, berani, dan autentik.</p>
      <p style="color:rgba(250,248,244,0.7);margin-bottom:20px;line-height:1.9;font-weight:300">Setiap koleksi kami dirancang dengan memperhatikan detail, menggunakan bahan premium lokal pilihan, dan diproduksi secara etis oleh pengrajin Indonesia terampil. Kami percaya bahwa fashion lokal mampu bersaing dan bahkan melampaui standar internasional.</p>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-top:40px">
        <div class="stat-box"><span class="stat-num">3+</span><span class="stat-label">Tahun Berdiri</span></div>
        <div class="stat-box"><span class="stat-num">12K+</span><span class="stat-label">Pelanggan</span></div>
        <div class="stat-box"><span class="stat-num">6</span><span class="stat-label">Koleksi Rilis</span></div>
        <div class="stat-box"><span class="stat-num">20+</span><span class="stat-label">Mitra Lokal</span></div>
      </div>
    </div>
    <div class="fade-up" style="position:relative">
      <div style="width:100%;aspect-ratio:3/4;border:1px solid rgba(201,168,76,0.2);position:relative;overflow:hidden">
        <img src="{{ asset('images/about.jpg') }}" alt="IbraLoka Wear Studio" style="width:100%;height:100%;object-fit:cover;opacity:0.85">
        <div class="corner tl"></div>
        <div class="corner tr"></div>
        <div class="corner bl"></div>
        <div class="corner br"></div>
        <div style="position:absolute;bottom:20px;left:20px;right:20px;text-align:center;z-index:1">
          <p style="font-family:var(--font-serif);font-size:13px;color:var(--color-gold);letter-spacing:3px;text-transform:uppercase">IbraLoka Wear</p>
          <p style="font-size:10px;color:rgba(250,248,244,0.5);letter-spacing:2px;margin-top:4px;text-transform:uppercase">Since 2022</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PROFILE -->
<section id="profile" style="background:var(--color-surface);padding:100px 80px">
  <span class="section-tag">Profil Perusahaan</span>
  <h2 class="section-title">Keunggulan &<br><em>Pengalaman</em></h2>
  <div class="section-divider"></div>
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:80px;margin-top:60px">
    <div class="fade-up">
      <p style="color:rgba(250,248,244,0.7);margin-bottom:20px;font-weight:300;line-height:1.9">IbraLoka Wear telah membangun reputasi sebagai salah satu brand streetwear-luxury lokal yang paling dihormati di Indonesia. Dengan tim kreatif berpengalaman dan dedikasi penuh terhadap kualitas, kami terus mendorong batas kreativitas dalam dunia fashion lokal.</p>
      <p style="color:rgba(250,248,244,0.7);margin-bottom:20px;font-weight:300;line-height:1.9">Perusahaan kami bergerak di bidang produksi dan distribusi pakaian premium, aksesoris fashion, dan koleksi limited edition. Setiap produk melewati proses quality control ketat yang memastikan setiap pelanggan mendapatkan yang terbaik.</p>
      <p style="color:rgba(250,248,244,0.7);margin-bottom:20px;font-weight:300;line-height:1.9">Kami juga aktif berkolaborasi dengan seniman, desainer, dan komunitas kreatif lokal untuk menciptakan karya yang tidak hanya indah secara estetika, tetapi juga bermakna secara budaya.</p>
    </div>
    <div class="fade-up" style="display:flex;flex-direction:column;gap:16px">
      <div class="p-highlight">
        <h4>Penghargaan</h4>
        <p style="font-size:12px;color:rgba(250,248,244,0.55);font-weight:300;margin:0">Best Local Fashion Brand 2023 — Jakarta Fashion Week. Top 10 Indonesian Brand to Watch 2024 oleh Vogue Indonesia.</p>
      </div>
      <div class="p-highlight">
        <h4>Kolaborasi</h4>
        <p style="font-size:12px;color:rgba(250,248,244,0.55);font-weight:300;margin:0">Aktif berkolaborasi dengan 20+ seniman lokal, 5 universitas desain terkemuka, dan berbagai komunitas kreatif Jakarta.</p>
      </div>
      <div class="p-highlight">
        <h4>Komitmen</h4>
        <p style="font-size:12px;color:rgba(250,248,244,0.55);font-weight:300;margin:0">100% bahan baku dari supplier lokal. Program recycling kemasan. Target carbon neutral pada 2027.</p>
      </div>
      <div class="p-highlight">
        <h4>Distribusi</h4>
        <p style="font-size:12px;color:rgba(250,248,244,0.55);font-weight:300;margin:0">Tersedia di 15 kota besar Indonesia, e-commerce resmi, dan 8 flagship store di Jakarta & Bali.</p>
      </div>
    </div>
  </div>
</section>

<!-- VISI MISI -->
<section id="visi" style="background:var(--color-surface-700);padding:100px 80px">
  <span class="section-tag">Nilai Kami</span>
  <h2 class="section-title">Visi & <em>Misi</em></h2>
  <div class="section-divider"></div>
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:40px;margin-top:60px">
    <div class="visi-card fade-up">
      <div class="visi-card-num">V</div>
      <h3>Visi</h3>
      <p style="color:rgba(250,248,244,0.7);font-weight:300;margin-bottom:20px;line-height:1.9">Menjadi brand fashion lokal Indonesia yang paling diakui secara global — simbol kreativitas, kualitas, dan kebanggaan budaya bangsa pada tahun 2030.</p>
    </div>
    <div class="visi-card fade-up">
      <div class="visi-card-num">M</div>
      <h3>Misi</h3>
      <ul>
        <li>Memproduksi pakaian premium berkualitas tinggi dengan bahan lokal pilihan</li>
        <li>Mendukung dan mengangkat pengrajin serta desainer lokal Indonesia</li>
        <li>Menciptakan ekosistem fashion yang berkelanjutan dan ramah lingkungan</li>
        <li>Menjadi platform ekspresi budaya lokal yang relevan bagi generasi muda</li>
        <li>Menghadirkan pengalaman berbelanja fashion yang personal dan bermakna</li>
      </ul>
    </div>
  </div>
</section>

<!-- PRODUK -->
<section id="produk" style="background:var(--color-surface);padding:100px 80px">
  <div style="max-width:600px;margin-bottom:60px">
    <span class="section-tag">Koleksi Kami</span>
    <h2 class="section-title">Produk &<br><em>Layanan</em></h2>
    <div class="section-divider"></div>
    <p style="color:rgba(250,248,244,0.6);font-weight:300">Koleksi unggulan kami dirancang untuk menemani setiap momen hidupmu — dari pagi yang kasual hingga malam yang penuh keanggunan.</p>
  </div>
  <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:2px">
    @forelse($featuredProducts as $product)
    <div class="product-card fade-up">
      <div class="product-img-placeholder" style="position:relative;overflow:hidden">
        @if($product->image)
          <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="width:100%;height:100%;object-fit:cover;opacity:0.6">
        @endif
        <div class="product-name">{{ $product->name }}</div>
        <div class="product-overlay">
          <h4>{{ $product->name }}</h4>
          <p>{{ Str::limit($product->description, 100) }}</p>
          <div style="font-family:var(--font-serif);font-size:24px;color:var(--color-surface-50);margin-top:16px"><span style="font-size:13px;color:var(--color-gold)">Harga</span> Rp {{ number_format($product->price, 0, ',', '.') }}</div>
        </div>
      </div>
    </div>
    @empty
    <div style="grid-column:1/-1;text-align:center;padding:60px 0;color:var(--color-surface-300)">
      <p>Belum ada produk unggulan. Admin bisa menambahkan produk dan mencentang "Featured" di panel admin.</p>
    </div>
    @endforelse
  </div>
  <div style="text-align:center;margin-top:40px">
    <a href="{{ route('produk') }}" class="btn-gold" style="padding:12px 32px;font-size:11px">Lihat Semua Produk</a>
  </div>
</section>

<!-- GALERI -->
<section id="galeri" style="background:var(--color-surface-700);padding:100px 80px">
  <span class="section-tag">Galeri Foto</span>
  <h2 class="section-title">Kegiatan &<br><em>Koleksi</em></h2>
  <div class="section-divider"></div>
  @if ($galleries->isEmpty())
    <div style="text-align:center;padding:60px 20px;color:rgba(250,248,244,0.3);font-size:13px;letter-spacing:1px">Belum ada galeri.</div>
  @else
  <div style="display:grid;grid-template-columns:repeat(4,1fr);grid-auto-rows:200px;gap:4px;margin-top:50px">
    @foreach ($galleries as $g)
      @php
        $span = '';
        if ($loop->index === 0) $span = 'grid-column:span 2';
        elseif ($loop->index === 1) $span = 'grid-row:span 2';
        elseif ($loop->index === 4) $span = 'grid-column:span 2';
      @endphp
      <div class="g-item fade-up" style="{{ $span }}">
        <div class="g-img">
          <img src="{{ asset('images/' . $g->image) }}" alt="{{ $g->title ?? 'Galeri' }}" style="width:100%;height:100%;object-fit:cover;opacity:0.7">
          <div class="g-overlay"></div>
          <div class="g-label">{{ $g->title ?? 'Galeri' }}</div>
        </div>
      </div>
    @endforeach
  </div>
  @endif
</section>

<!-- KLIEN -->
<section id="klien" style="background:var(--color-surface);padding:100px 80px">
  <div style="max-width:500px;margin-bottom:60px">
    <span class="section-tag">Dipercaya Oleh</span>
    <h2 class="section-title">Klien &<br><em>Mitra Kami</em></h2>
    <div class="section-divider"></div>
    <p style="color:rgba(250,248,244,0.6);font-weight:300">Lebih dari 50 brand, retailer, dan institusi terkemuka telah mempercayakan kebutuhan fashion mereka kepada IbraLoka Wear.</p>
  </div>
  <div style="overflow:hidden;margin-bottom:4px">
    <div class="clients-track" style="display:flex;gap:4px;animation:marquee 20s linear infinite;width:fit-content">
      <div class="client-pill"><div class="client-pill-logo">S</div><span style="font-size:12px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.6)">StyleCo Jakarta</span></div>
      <div class="client-pill"><div class="client-pill-logo">M</div><span>Moda Indonesia</span></div>
      <div class="client-pill"><div class="client-pill-logo">U</div><span>Urban Thread</span></div>
      <div class="client-pill"><div class="client-pill-logo">N</div><span>Nusantara Style</span></div>
      <div class="client-pill"><div class="client-pill-logo">B</div><span>Batik Modern Co</span></div>
      <div class="client-pill"><div class="client-pill-logo">L</div><span>LookBook Studio</span></div>
      <div class="client-pill"><div class="client-pill-logo">K</div><span>Kreatif House</span></div>
      <div class="client-pill"><div class="client-pill-logo">S</div><span>StyleCo Jakarta</span></div>
      <div class="client-pill"><div class="client-pill-logo">M</div><span>Moda Indonesia</span></div>
      <div class="client-pill"><div class="client-pill-logo">U</div><span>Urban Thread</span></div>
      <div class="client-pill"><div class="client-pill-logo">N</div><span>Nusantara Style</span></div>
      <div class="client-pill"><div class="client-pill-logo">B</div><span>Batik Modern Co</span></div>
      <div class="client-pill"><div class="client-pill-logo">L</div><span>LookBook Studio</span></div>
      <div class="client-pill"><div class="client-pill-logo">K</div><span>Kreatif House</span></div>
    </div>
  </div>
  <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:2px;margin-top:40px">
    <div class="client-logo-box" style="background:var(--color-surface-600);border:1px solid rgba(201,168,76,0.1);padding:30px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;transition:border-color .3s">
      <div style="font-family:var(--font-serif);font-size:32px;color:rgba(201,168,76,0.4)">SC</div>
      <div style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.4)">StyleCo Jakarta</div>
    </div>
    <div class="client-logo-box" style="background:var(--color-surface-600);border:1px solid rgba(201,168,76,0.1);padding:30px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;transition:border-color .3s">
      <div style="font-family:var(--font-serif);font-size:32px;color:rgba(201,168,76,0.4)">MI</div>
      <div style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.4)">Moda Indonesia</div>
    </div>
    <div class="client-logo-box" style="background:var(--color-surface-600);border:1px solid rgba(201,168,76,0.1);padding:30px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;transition:border-color .3s">
      <div style="font-family:var(--font-serif);font-size:32px;color:rgba(201,168,76,0.4)">UT</div>
      <div style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.4)">Urban Thread</div>
    </div>
    <div class="client-logo-box" style="background:var(--color-surface-600);border:1px solid rgba(201,168,76,0.1);padding:30px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;transition:border-color .3s">
      <div style="font-family:var(--font-serif);font-size:32px;color:rgba(201,168,76,0.4)">NS</div>
      <div style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.4)">Nusantara Style</div>
    </div>
    <div class="client-logo-box" style="background:var(--color-surface-600);border:1px solid rgba(201,168,76,0.1);padding:30px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;transition:border-color .3s">
      <div style="font-family:var(--font-serif);font-size:32px;color:rgba(201,168,76,0.4)">BM</div>
      <div style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.4)">Batik Modern Co</div>
    </div>
    <div class="client-logo-box" style="background:var(--color-surface-600);border:1px solid rgba(201,168,76,0.1);padding:30px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;transition:border-color .3s">
      <div style="font-family:var(--font-serif);font-size:32px;color:rgba(201,168,76,0.4)">LB</div>
      <div style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.4)">LookBook Studio</div>
    </div>
    <div class="client-logo-box" style="background:var(--color-surface-600);border:1px solid rgba(201,168,76,0.1);padding:30px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;transition:border-color .3s">
      <div style="font-family:var(--font-serif);font-size:32px;color:rgba(201,168,76,0.4)">KH</div>
      <div style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.4)">Kreatif House</div>
    </div>
    <div class="client-logo-box" style="background:var(--color-surface-600);border:1px solid rgba(201,168,76,0.1);padding:30px;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;transition:border-color .3s">
      <div style="font-family:var(--font-serif);font-size:32px;color:rgba(201,168,76,0.4)">FS</div>
      <div style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.4)">Fashion Spot ID</div>
    </div>
  </div>
</section>

<!-- ARTIKEL -->
<section id="artikel" style="background:var(--color-surface-700);padding:100px 80px">
  <span class="section-tag">Wawasan & Inspirasi</span>
  <h2 class="section-title">Artikel <em>Terkini</em></h2>
  <div class="section-divider"></div>
  <div style="display:grid;grid-template-columns:2fr 1fr;gap:40px;margin-top:50px">
    <div style="display:flex;flex-direction:column;gap:2px">
      @forelse($articles as $article)
      <a href="{{ route('artikel.show', ['kategori' => $article->category, 'slug' => $article->slug]) }}" class="artikel-card fade-up" style="text-decoration:none">
        <div style="flex-shrink:0;width:80px;height:60px;overflow:hidden;border:1px solid rgba(201,168,76,0.15)">
          <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" style="width:100%;height:100%;object-fit:cover;opacity:0.7">
        </div>
        <div>
          <span class="art-cat">{{ $article->category }}</span>
          <div class="art-title">{{ $article->title }}</div>
          <p class="art-desc">{{ $article->excerpt }}</p>
        </div>
      </a>
      @empty
      <div style="text-align:center;padding:40px;color:rgba(250,248,244,0.4)">Belum ada artikel</div>
      @endforelse
    </div>
    <div style="display:flex;flex-direction:column;gap:16px">
      <div class="sidebar-card fade-up">
        <h4>Kategori</h4>
        @forelse($categories as $category)
        <span class="sidebar-tag">{{ ucfirst(str_replace('-', ' ', $category)) }}</span>
        @empty
        <span style="color:rgba(250,248,244,0.4);font-size:12px">Belum ada kategori</span>
        @endforelse
      </div>
      <div class="sidebar-card fade-up">
        <h4>Artikel Populer</h4>
        <div style="display:flex;flex-direction:column;gap:12px">
          @forelse($popularArticles as $popular)
          <a href="{{ route('artikel.show', ['kategori' => $popular->category, 'slug' => $popular->slug]) }}" style="display:flex;gap:8px;align-items:flex-start;text-decoration:none">
            <div style="width:4px;height:4px;border-radius:50%;background:var(--color-gold);margin-top:6px;flex-shrink:0"></div>
            <div>
              <span style="font-size:10px;letter-spacing:1px;color:var(--color-gold);text-transform:uppercase">{{ $popular->category }}</span>
              <div style="font-size:13px;color:var(--color-surface-50);margin-top:2px;font-weight:300;line-height:1.5">{{ $popular->title }}</div>
            </div>
          </a>
          @empty
          <span style="color:rgba(250,248,244,0.4);font-size:12px">Belum ada artikel</span>
          @endforelse
        </div>
      </div>
    </div>
  </div>
</section>

<!-- EVENT -->
<section id="event" style="background:var(--color-surface);padding:100px 80px">
  <span class="section-tag">Kegiatan Perusahaan</span>
  <h2 class="section-title">Event &<br><em>Agenda</em></h2>
  <div class="section-divider"></div>
  @if ($events->isEmpty())
    <div style="text-align:center;padding:60px 20px;color:rgba(250,248,244,0.3);font-size:13px;letter-spacing:1px">Belum ada event.</div>
  @else
  <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:24px;margin-top:50px">
    @foreach ($events as $event)
    <div class="event-card fade-up">
      <div style="height:160px;overflow:hidden;margin-bottom:16px;position:relative">
        <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->title }}" style="width:100%;height:100%;object-fit:cover;opacity:0.7">
      </div>
      <div style="display:inline-flex;align-items:center;gap:12px;margin-bottom:20px">
        <div class="edb-box"><div class="ed">{{ $event->event_date->format('d') }}</div><div class="em">{{ $event->event_date->format('M Y') }}</div></div>
      </div>
      <h4>{{ $event->title }}</h4>
      <p>{{ $event->description }}</p>
      <div class="event-meta" style="display:flex;gap:20px">
        <span style="font-size:10px;color:rgba(250,248,244,0.4);letter-spacing:1px">?? {{ $event->location }}</span>
        <span style="font-size:10px;color:rgba(250,248,244,0.4);letter-spacing:1px">?? {{ $event->event_date->format('H.i') }} WIB</span>
      </div>
    </div>
    @endforeach
  </div>
  @endif
</section>

<!-- KONTAK -->
<section id="kontak" style="background:var(--color-surface-700);padding:100px 80px">
  <span class="section-tag">Hubungi Kami</span>
  <h2 class="section-title">Kontak &<br><em>Lokasi</em></h2>
  <div class="section-divider"></div>
  <div style="display:grid;grid-template-columns:1fr 1.2fr;gap:80px;margin-top:60px">
    <div>
      <h3 style="font-family:var(--font-serif);font-size:36px;font-weight:300;color:var(--color-surface-50);margin-bottom:30px">Kami senang<br>mendengar dari <em style="color:var(--color-gold);font-style:italic">Anda</em></h3>
      <div style="display:flex;flex-direction:column;gap:20px">
        <div class="k-item">
          <div class="k-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div class="k-text"><span class="k-label">Alamat</span><span class="k-value">Jl. Kemang Raya No. 88, Jakarta Selatan 12730</span></div>
        </div>
        <div class="k-item">
          <div class="k-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          </div>
          <div class="k-text"><span class="k-label">Telepon</span><span class="k-value">+62 21 2940 1234</span></div>
        </div>
        <div class="k-item">
          <div class="k-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
          </div>
          <div class="k-text"><span class="k-label">WhatsApp</span><span class="k-value">+62 812 3456 7890</span></div>
        </div>
        <div class="k-item">
          <div class="k-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <div class="k-text"><span class="k-label">Email</span><span class="k-value">hello@ibraloka.com</span></div>
        </div>
        <div class="k-item">
          <div class="k-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
          </div>
          <div class="k-text"><span class="k-label">Website</span><span class="k-value">www.ibraloka.com</span></div>
        </div>
        <div class="k-item">
          <div class="k-icon">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div class="k-text"><span class="k-label">Jam Operasional</span><span class="k-value">Senin - Jumat, 09.00 - 18.00 WIB</span></div>
        </div>
      </div>
    </div>
    <div>
      <form method="POST" action="{{ route('kontak.store') }}" class="kontak-form" style="display:flex;flex-direction:column;gap:16px">
        @csrf
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">
          <input name="name" class="modal-input" type="text" placeholder="Nama Lengkap" required>
          <input name="email" class="modal-input" type="email" placeholder="Alamat Email" required>
        </div>
        <input name="phone" class="modal-input" type="text" placeholder="Nomor Telepon">
        <select name="subject" class="modal-input">
          <option value="" disabled selected>Keperluan</option>
          <option>Pembelian Produk</option>
          <option>Kerjasama / Kolaborasi</option>
          <option>Media & Press</option>
          <option>Event & Partnership</option>
          <option>Lainnya</option>
        </select>
        <textarea name="message" class="modal-input" placeholder="Pesan Anda..." required style="height:140px;resize:none"></textarea>
        <button type="submit" class="btn-gold" style="border:none;width:100%;padding:16px;font-size:12px;letter-spacing:3px;cursor:pointer">Kirim Pesan ?</button>
      </form>
    </div>
  </div>
</section>

</x-layouts.public>
