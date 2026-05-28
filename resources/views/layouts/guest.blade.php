<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'IbraLoka Wear'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-surface text-surface-50">
    <div class="min-h-screen flex items-center justify-center" style="background:linear-gradient(135deg,#0A0A0A 0%,#1A1208 50%,#0A0A0A 100%)">
        <div style="background:var(--color-surface-700);border:1px solid rgba(201,168,76,0.25);width:100%;max-width:440px;padding:50px;position:relative;margin:20px">
            <div style="position:absolute;top:0;left:50%;transform:translateX(-50%);width:60px;height:2px;background:var(--color-gold)"></div>
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3 no-underline">
                    <div style="width:42px;height:42px;border:1.5px solid var(--color-gold);display:flex;align-items:center;justify-content:center;transform:rotate(45deg);margin:0 auto">
                        <span style="transform:rotate(-45deg);font-family:var(--font-serif);font-size:18px;color:var(--color-gold);font-weight:600">IL</span>
                    </div>
                </a>
                <div class="nav-brand" style="font-size:24px;margin-top:12px">Ibra<span>Loka</span> Wear</div>
            </div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>
