<div class="modal-overlay" id="authModal"
  x-data="authModal()"
  x-init="init()"
  x-show="open"
  x-cloak
  @keydown.escape.window="open=false; bodyUnlock()"
  x-transition.opacity.duration.300ms
>
  <div class="modal" @click.outside="open=false; bodyUnlock()">
    <button class="modal-close" @click="open=false; bodyUnlock()">✕</button>

    <h2 class="modal-title">Selamat <em>Datang</em></h2>
    <p class="modal-subtitle">Masuk atau daftar untuk akses eksklusif member IbraLoka Wear</p>

    <div class="modal-tabs">
      <button class="modal-tab" :class="{ active: tab === 'signin' }" @click="tab='signin'; errors={}">Sign In</button>
      <button class="modal-tab" :class="{ active: tab === 'signup' }" @click="tab='signup'; errors={}">Sign Up</button>
    </div>

    <div x-show="tab==='signin'" x-cloak class="modal-form">
      <template x-if="errors.login">
        <div class="modal-error" x-text="errors.login"></div>
      </template>
      <input class="modal-input" type="email" x-model="login.email" placeholder="Email">
      <input class="modal-input" type="password" x-model="login.password" placeholder="Password">
      <div class="modal-options">
        <label class="modal-checkbox">
          <input type="checkbox" x-model="login.remember"> Ingat saya
        </label>
        <a href="{{ route('password.request') }}" class="modal-link">Lupa password?</a>
      </div>
      <button class="btn-gold modal-submit" @click="submitLogin" :disabled="loading">
        <span x-show="!loading">Masuk</span>
        <span x-show="loading">Memproses...</span>
      </button>
      <div class="modal-divider">atau</div>
      <div class="modal-footer-text">Belum punya akun? <a href="#" @click.prevent="tab='signup'; errors={}" class="modal-link">Daftar sekarang</a></div>
    </div>

    <div x-show="tab==='signup'" x-cloak class="modal-form">
      <template x-if="errors.register">
        <div class="modal-error" x-text="errors.register"></div>
      </template>
      <input class="modal-input" type="text" x-model="register.name" placeholder="Nama Lengkap">
      <input class="modal-input" type="email" x-model="register.email" placeholder="Email">
      <input class="modal-input" type="text" x-model="register.phone" placeholder="Nomor Telepon (opsional)">
      <input class="modal-input" type="password" x-model="register.password" placeholder="Password">
      <input class="modal-input" type="password" x-model="register.password_confirmation" placeholder="Konfirmasi Password">
      <button class="btn-gold modal-submit" @click="submitRegister" :disabled="loading">
        <span x-show="!loading">Daftar Sekarang</span>
        <span x-show="loading">Memproses...</span>
      </button>
      <div class="modal-footer-text">Sudah punya akun? <a href="#" @click.prevent="tab='signin'; errors={}" class="modal-link">Sign In</a></div>
    </div>
  </div>
</div>

@push('scripts')
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
</script>
@endpush
