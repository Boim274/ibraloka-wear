<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 gold-gradient border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:shadow-lg hover:shadow-gold-500/25 focus:outline-none focus:ring-2 focus:ring-gold-500 focus:ring-offset-2 focus:ring-offset-surface transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
