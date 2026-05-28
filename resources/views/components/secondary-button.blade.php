<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-surface-700 border border-surface-600/50 rounded-md font-semibold text-xs text-surface-300 uppercase tracking-widest hover:bg-surface-600 hover:text-gold-400 focus:outline-none focus:ring-2 focus:ring-gold-500 focus:ring-offset-2 focus:ring-offset-surface transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
