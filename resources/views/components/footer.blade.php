<footer style="background:var(--color-surface-700);border-top:1px solid rgba(201,168,76,0.2);padding:60px 80px 30px">
  <div style="display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:60px;margin-bottom:50px">
    <div>
      <a href="{{ route('home') }}" class="nav-brand" style="font-size:28px;margin-bottom:16px;display:block">Ibra<span>Loka</span> Wear</a>
      <p style="font-size:12px;color:rgba(250,248,244,0.4);line-height:1.9;font-weight:300;max-width:260px">Brand fashion lokal Indonesia yang mengangkat estetika luxury dan jiwa budaya Nusantara. Dibuat dengan cinta, untuk Indonesia.</p>
      <div style="display:flex;gap:12px;margin-top:24px">
        <a href="#" class="social-link">ig</a>
        <a href="#" class="social-link">tt</a>
        <a href="#" class="social-link">yt</a>
        <a href="#" class="social-link">in</a>
      </div>
    </div>
    <div class="footer-col">
      <h5>Navigasi</h5>
      <a href="{{ route('home') }}#home" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">Home</a>
      <a href="{{ route('home') }}#about" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">Tentang Kami</a>
      <a href="{{ route('home') }}#visi" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">Visi & Misi</a>
      <a href="{{ route('home') }}#produk" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">Produk</a>
      <a href="{{ route('home') }}#galeri" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">Galeri</a>
    </div>
    <div class="footer-col">
      <h5>Layanan</h5>
      <a href="{{ route('artikel') }}" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">Artikel</a>
      <a href="{{ route('home') }}#event" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">Event</a>
      <a href="{{ route('home') }}#klien" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">Klien</a>
      <a href="{{ route('home') }}#kontak" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">Kontak</a>
      @auth
        <a href="{{ route('dashboard') }}" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">Dashboard</a>
      @else
        <a href="{{ route('login') }}" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">Login</a>
      @endauth
    </div>
    <div class="footer-col">
      <h5>Kontak</h5>
      <a href="#" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">hello@ibralokawear.com</a>
      <a href="#" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">+62 21 7884 5500</a>
      <a href="#" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">Kemang, Jakarta Selatan</a>
      <a href="#" style="display:block;font-size:12px;color:rgba(250,248,244,0.4);text-decoration:none;margin-bottom:10px;transition:color .2s;font-weight:300">www.ibralokawear.com</a>
    </div>
  </div>
  <div style="border-top:1px solid rgba(255,255,255,0.06);padding-top:24px;display:flex;align-items:center;justify-content:space-between">
    <p style="font-size:11px;color:rgba(250,248,244,0.3);font-weight:300">© {{ date('Y') }} IbraLoka Wear. All rights reserved.</p>
    <div style="font-size:11px;color:rgba(201,168,76,0.6);letter-spacing:1px">Design by : Ibrahim</div>
  </div>
</footer>

<style>
.footer-col a:hover { color: var(--color-gold) !important; }
@media (max-width: 768px) {
  footer { padding: 40px 20px 20px !important; }
  footer > div:first-child { grid-template-columns: 1fr !important; gap: 30px !important; }
  footer > div:last-child { flex-direction: column !important; gap: 8px !important; text-align: center !important; }
}
</style>
