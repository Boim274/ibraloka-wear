@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-surface-300']) }}>
    {{ $value ?? $slot }}
</label>
