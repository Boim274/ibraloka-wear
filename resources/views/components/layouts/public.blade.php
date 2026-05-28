<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="IbraLoka Wear - Local Luxury Fashion. Brand fashion lokal Indonesia dengan estetika luxury dan jiwa budaya Nusantara.">
    <title>@yield('title', config('app.name', 'IbraLoka Wear')) - Local Luxury Fashion</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <x-navbar />

    {{ $slot }}

    <x-footer />

    <x-toast />

    <div class="modal-overlay" id="authModal"
      x-data="authModal()"
      x-init="init()"
      x-show="open"
      x-cloak
      @keydown.escape.window="open=false; bodyUnlock()"
      style="position:fixed;inset:0;background:rgba(0,0,0,0.92);z-index:2000;align-items:center;justify-content:center"
      x-transition.opacity.duration.300ms
    >
      <div class="modal" style="background:var(--color-surface-700);border:1px solid rgba(201,168,76,0.25);width:100%;max-width:440px;padding:50px;position:relative" @click.outside="open=false; bodyUnlock()">
        <button class="modal-close" @click="open=false; bodyUnlock()" style="position:absolute;top:16px;right:20px;background:none;border:none;color:rgba(250,248,244,0.4);font-size:20px;cursor:pointer">✕</button>

        <h2 style="font-family:var(--font-serif);font-size:32px;font-weight:300;color:var(--color-surface-50);margin-bottom:8px">Selamat <em style="color:var(--color-gold);font-style:italic">Datang</em></h2>
        <p style="font-size:12px;color:rgba(250,248,244,0.4);margin-bottom:32px;font-weight:300">Masuk atau daftar untuk akses eksklusif member IbraLoka Wear</p>

        <div class="modal-tabs" style="display:flex;margin-bottom:32px">
          <button class="modal-tab" :class="{ active: tab === 'signin' }" @click="tab='signin'; errors={}">Sign In</button>
          <button class="modal-tab" :class="{ active: tab === 'signup' }" @click="tab='signup'; errors={}">Sign Up</button>
        </div>

        <!-- Sign In Form -->
        <div x-show="tab==='signin'" x-cloak style="display:flex;flex-direction:column;gap:14px">
          <template x-if="errors.login">
            <div style="background:rgba(220,38,38,0.1);border:1px solid rgba(220,38,38,0.3);padding:12px 16px;font-size:12px;color:#ef4444;border-radius:4px" x-text="errors.login"></div>
          </template>
          <input class="modal-input" type="email" x-model="login.email" placeholder="Email" style="transition:border-color 0.3s">
          <input class="modal-input" type="password" x-model="login.password" placeholder="Password">
          <div style="display:flex;justify-content:space-between;align-items:center;font-size:11px;margin-top:2px">
            <label style="color:rgba(250,248,244,0.4);display:flex;align-items:center;gap:6px;cursor:pointer">
              <input type="checkbox" x-model="login.remember" style="accent-color:var(--color-gold)"> Ingat saya
            </label>
            <a href="{{ route('password.request') }}" style="color:var(--color-gold)">Lupa password?</a>
          </div>
          <button class="btn-gold" @click="submitLogin" :disabled="loading" style="border:none;padding:16px;font-size:11px;letter-spacing:3px;cursor:pointer;margin-top:8px;width:100%">
            <span x-show="!loading">Masuk</span>
            <span x-show="loading">Memproses...</span>
          </button>
          <div style="text-align:center;font-size:10px;color:rgba(250,248,244,0.2);letter-spacing:1px;margin:10px 0">atau</div>
          <div style="font-size:11px;color:rgba(250,248,244,0.3);text-align:center;margin-top:14px">Belum punya akun? <a href="#" @click.prevent="tab='signup'; errors={}" style="color:var(--color-gold)">Daftar sekarang</a></div>
        </div>

        <!-- Sign Up Form -->
        <div x-show="tab==='signup'" x-cloak style="display:flex;flex-direction:column;gap:12px">
          <template x-if="errors.register">
            <div style="background:rgba(220,38,38,0.1);border:1px solid rgba(220,38,38,0.3);padding:12px 16px;font-size:12px;color:#ef4444;border-radius:4px" x-text="errors.register"></div>
          </template>
          <input class="modal-input" type="text" x-model="register.name" placeholder="Nama Lengkap">
          <input class="modal-input" type="email" x-model="register.email" placeholder="Email">
          <input class="modal-input" type="text" x-model="register.phone" placeholder="Nomor Telepon (opsional)">
          <input class="modal-input" type="password" x-model="register.password" placeholder="Password">
          <input class="modal-input" type="password" x-model="register.password_confirmation" placeholder="Konfirmasi Password">
          <button class="btn-gold" @click="submitRegister" :disabled="loading" style="border:none;padding:16px;font-size:11px;letter-spacing:3px;cursor:pointer;margin-top:8px;width:100%">
            <span x-show="!loading">Daftar Sekarang</span>
            <span x-show="loading">Memproses...</span>
          </button>
          <div style="font-size:11px;color:rgba(250,248,244,0.3);text-align:center;margin-top:14px">Sudah punya akun? <a href="#" @click.prevent="tab='signin'; errors={}" style="color:var(--color-gold)">Sign In</a></div>
        </div>
      </div>
    </div>

    <!-- Scroll to Top -->
    <button id="scrollTopBtn" onclick="scrollToTop()" style="position:fixed;bottom:30px;right:30px;z-index:999;width:48px;height:48px;border-radius:50%;background:var(--color-gold);border:none;color:var(--color-surface);font-size:20px;cursor:pointer;display:none;align-items:center;justify-content:center;box-shadow:0 4px 16px rgba(201,168,76,0.3);transition:all .3s" aria-label="Scroll to top">↑</button>

    @vite('resources/js/app.js')

    <script>
    document.addEventListener('alpine:init',()=>{
      Alpine.data('authModal',()=>({
        open: false,
        tab: 'signin',
        loading: false,
        errors: {},
        login: { email: '', password: '', remember: false },
        register: { name: '', email: '', phone: '', password: '', password_confirmation: '' },
    
        bodyLock(){ document.body.style.overflow='hidden' },
        bodyUnlock(){ document.body.style.overflow='' },
    
        init(){
          window.openModal=(tab='signin')=>{
            this.open=true;
            this.tab=tab;
            this.errors={};
            this.bodyLock();
          };
          window.closeModal=()=>{
            this.open=false;
            this.bodyUnlock();
          };
          window.switchTab=(t)=>{
            this.tab=t;
            this.errors={};
          };
          document.getElementById('authModal').addEventListener('click',function(e){
            if(e.target===this) window.closeModal();
          });
        },
    
        async submitLogin(){
          this.loading=true;
          this.errors={};
          try{
            const r=await fetch('{{ route("login") }}',{
              method:'POST',
              headers:{ 'Content-Type':'application/json', 'Accept':'application/json', 'X-CSRF-TOKEN':'{{ csrf_token() }}' },
              body:JSON.stringify({ email:this.login.email, password:this.login.password, remember:this.login.remember })
            });
            const d=await r.json();
            if(r.ok && d.redirect){ window.location.href=d.redirect; return; }
            if(d.errors) this.errors.login=Object.values(d.errors).flat().join('\n');
            else if(d.message) this.errors.login=d.message;
            else this.errors.login='Email atau password salah.';
          }catch(e){ this.errors.login='Terjadi kesalahan. Silakan coba lagi.'; }
          finally{ this.loading=false; }
        },
    
        async submitRegister(){
          this.loading=true;
          this.errors={};
          try{
            const r=await fetch('{{ route("register") }}',{
              method:'POST',
              headers:{ 'Content-Type':'application/json', 'Accept':'application/json', 'X-CSRF-TOKEN':'{{ csrf_token() }}' },
              body:JSON.stringify(this.register)
            });
            const d=await r.json();
            if(r.ok && d.redirect){ window.location.href=d.redirect; return; }
            if(d.errors) this.errors.register=Object.values(d.errors).flat().join('\n');
            else if(d.message) this.errors.register=d.message;
            else this.errors.register='Gagal mendaftar. Silakan coba lagi.';
          }catch(e){ this.errors.register='Terjadi kesalahan. Silakan coba lagi.'; }
          finally{ this.loading=false; }
        }
      }));
    });

    function scrollToTop(){
      window.scrollTo({top:0,behavior:'smooth'});
    }

    document.addEventListener('DOMContentLoaded',function(){
      const sBtn=document.getElementById('scrollTopBtn');
      window.addEventListener('scroll',()=>{
        sBtn.style.display=window.scrollY>400?'flex':'none';
      });

      const observer=new IntersectionObserver(entries=>{
        entries.forEach(e=>{
          if(e.isIntersecting){e.target.classList.add('visible');observer.unobserve(e.target);}
        });
      },{threshold:0.1});
      document.querySelectorAll('.fade-up').forEach(el=>observer.observe(el));
      var navLinks=document.querySelectorAll('.nav-links > a:not(.dropdown-menu a), .mobile-nav a');
      var sections=document.querySelectorAll('section[id]');
      function updateActiveSection(){
        var cur='';
        sections.forEach(function(s){if(window.scrollY>=s.offsetTop-120)cur=s.id;});
        if(!cur){navLinks.forEach(function(a){a.classList.remove('active');});return;}
        navLinks.forEach(function(a){
          var href=a.getAttribute('href');
          a.classList.toggle('active',href && href.includes('#'+cur));
        });
      }
      if(sections.length){window.addEventListener('scroll',updateActiveSection);updateActiveSection();}
      document.querySelectorAll('a[href^="#"]').forEach(a=>{
        a.addEventListener('click',function(e){
          const t=document.querySelector(this.getAttribute('href'));
          if(t){e.preventDefault();t.scrollIntoView({behavior:'smooth'});}
        });
      });
    });
    </script>
</body>
</html>
