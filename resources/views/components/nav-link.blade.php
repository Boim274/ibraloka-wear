@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-gold-500 text-sm font-medium leading-5 text-gold-400 focus:outline-none focus:border-gold-400 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-surface-400 hover:text-gold-400 hover:border-gold-500/50 focus:outline-none focus:text-gold-400 focus:border-gold-500/50 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
