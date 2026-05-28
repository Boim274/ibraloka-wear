@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-gold-500 text-start text-base font-medium text-gold-400 bg-surface-700/50 focus:outline-none focus:text-gold-300 focus:bg-surface-700 focus:border-gold-400 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-surface-400 hover:text-gold-400 hover:bg-surface-700/30 hover:border-gold-500/30 focus:outline-none focus:text-gold-400 focus:bg-surface-700/30 focus:border-gold-500/30 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
