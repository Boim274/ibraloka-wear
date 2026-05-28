@section('title', config('app.name', 'IbraLoka Wear') . ' - Masuk')

<x-guest-layout>
    <x-auth-session-status class="mb-4 text-gold-400 text-sm font-medium" :status="session('status')" />

    <h2 style="font-family:var(--font-serif);font-size:32px;font-weight:300;color:var(--color-surface-50);margin-bottom:8px;text-align:center">Selamat <em style="color:var(--color-gold);font-style:italic">Datang</em></h2>
    <p style="font-size:12px;color:rgba(250,248,244,0.4);margin-bottom:32px;font-weight:300;text-align:center">Masuk ke akun IbraLoka Wear Anda</p>

    <form method="POST" action="{{ route('login') }}" style="display:flex;flex-direction:column;gap:16px">
        @csrf

        <div>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="modal-input" placeholder="Email">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="modal-input" placeholder="Password">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center gap-2" style="font-size:12px;color:rgba(250,248,244,0.4)">
                <input id="remember_me" type="checkbox" name="remember" style="accent-color:var(--color-gold)">
                {{ __('Remember me') }}
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="font-size:11px;color:var(--color-gold);text-decoration:none">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <button type="submit" class="btn-gold" style="border:none;padding:16px;font-size:11px;letter-spacing:3px;cursor:pointer;margin-top:8px;width:100%">
            {{ __('Log in') }}
        </button>

        <div style="text-align:center;font-size:11px;color:rgba(250,248,244,0.3);margin-top:14px">
            Belum punya akun?
            <a href="{{ route('register') }}" style="color:var(--color-gold);text-decoration:none">Daftar sekarang</a>
        </div>
    </form>
</x-guest-layout>
