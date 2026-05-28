@section('title', config('app.name', 'IbraLoka Wear') . ' - Daftar')

<x-guest-layout>
    <h2 style="font-family:var(--font-serif);font-size:32px;font-weight:300;color:var(--color-surface-50);margin-bottom:8px;text-align:center">Bergabung <em style="color:var(--color-gold);font-style:italic">Sekarang</em></h2>
    <p style="font-size:12px;color:rgba(250,248,244,0.4);margin-bottom:32px;font-weight:300;text-align:center">Daftar untuk menjadi bagian dari keluarga IbraLoka Wear</p>

    <form method="POST" action="{{ route('register') }}" style="display:flex;flex-direction:column;gap:16px">
        @csrf

        <div>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="modal-input" placeholder="Nama Lengkap">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="modal-input" placeholder="Email">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <input id="password" type="password" name="password" required autocomplete="new-password" class="modal-input" placeholder="Password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="modal-input" placeholder="Konfirmasi Password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button type="submit" class="btn-gold" style="border:none;padding:16px;font-size:11px;letter-spacing:3px;cursor:pointer;margin-top:8px;width:100%">
            {{ __('Register') }}
        </button>

        <div style="text-align:center;font-size:11px;color:rgba(250,248,244,0.3);margin-top:14px">
            Sudah punya akun?
            <a href="{{ route('login') }}" style="color:var(--color-gold);text-decoration:none">Masuk</a>
        </div>
    </form>
</x-guest-layout>
