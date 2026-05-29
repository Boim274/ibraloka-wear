<x-layouts.public>
    {{-- Hero --}}
    <div class="relative pt-28">
        <div class="absolute inset-0 overflow-hidden">
            @if($article->image)
            <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover opacity-30">
            @endif
            <div class="absolute inset-0" style="background:linear-gradient(180deg,var(--color-surface) 0%,var(--color-surface-700) 40%,var(--color-surface) 100%)"></div>
        </div>
        <div class="relative z-10 max-w-4xl mx-auto section-padding pb-12">
            <a href="{{ route('artikel', $article->category) }}" class="inline-flex items-center gap-1.5 text-xs text-surface-400 hover:text-gold-400 transition-colors mb-6 uppercase tracking-wider font-medium">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Kembali ke {{ $category }}
            </a>
            <span class="inline-block text-[10px] font-semibold uppercase tracking-wider px-3 py-1 rounded-full mb-5" style="background:rgba(201,168,76,0.12);color:var(--color-gold)">{{ $category }}</span>
            <h1 class="text-3xl md:text-5xl font-bold text-surface-50 leading-tight">{{ $article->title }}</h1>
            <div class="flex flex-wrap items-center gap-4 mt-5 text-sm text-surface-500">
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    {{ $article->published_at ? $article->published_at->format('d F Y') : 'Tidak ada tanggal' }}
                </span>
                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    5 menit membaca
                </span>
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="py-8 md:py-12" style="background:var(--color-surface)">
        <div class="max-w-3xl mx-auto section-padding">
            @if($article->image)
            <div class="rounded-xl overflow-hidden mb-10">
                <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" class="w-full object-cover">
            </div>
            @endif

            <article class="article-content">
                @if($article->content)
                    {!! $article->content !!}
                @else
                    <p class="text-surface-400 leading-relaxed text-lg">{{ $article->excerpt }}</p>
                @endif
            </article>

            {{-- Share --}}
            <div class="mt-12 pt-8" style="border-top:1px solid rgba(201,168,76,0.1)">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <span class="text-xs font-semibold uppercase tracking-wider text-surface-400">Bagikan Artikel</span>
                    <div class="flex gap-2">
                        <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . route('artikel.show', [$article->category, $article->slug])) }}" target="_blank" class="w-9 h-9 rounded-full flex items-center justify-center transition-all hover:scale-110" style="background:rgba(37,211,102,0.12);color:#25D366" title="WhatsApp">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(route('artikel.show', [$article->category, $article->slug])) }}" target="_blank" class="w-9 h-9 rounded-full flex items-center justify-center transition-all hover:scale-110" style="background:rgba(29,161,242,0.12);color:#1DA1F2" title="Twitter">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <button onclick="copyUrl()" class="w-9 h-9 rounded-full flex items-center justify-center transition-all hover:scale-110" style="background:rgba(201,168,76,0.12);color:var(--color-gold)" title="Salin Link">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Related Articles --}}
            @if($related->count() > 0)
            <div class="mt-12 pt-8" style="border-top:1px solid rgba(201,168,76,0.1)">
                <h3 class="text-lg font-semibold text-surface-50 mb-6">Artikel Terkait</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($related as $rel)
                    <a href="{{ route('artikel.show', [$rel->category, $rel->slug]) }}" class="group rounded-xl overflow-hidden transition-all duration-300 hover:-translate-y-0.5" style="background:var(--color-surface-600);border:1px solid rgba(201,168,76,0.06)">
                        <div class="aspect-[16/9] overflow-hidden">
                            @if($rel->image)
                            <img src="{{ asset('images/' . $rel->image) }}" alt="{{ $rel->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                            <div class="w-full h-full flex items-center justify-center" style="background:var(--color-surface-700)">
                                <svg class="w-8 h-8 text-surface-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-gold-400">{{ $rel->category }}</span>
                            <h4 class="text-surface-50 text-sm font-semibold mt-1 leading-snug group-hover:text-gold-400 transition-colors line-clamp-2">{{ $rel->title }}</h4>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Back --}}
            <div class="mt-10 text-center">
                <a href="{{ route('artikel', $article->category) }}" class="btn-outline-gold text-sm inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Artikel Lainnya di {{ $category }}
                </a>
            </div>
        </div>
    </div>

    <script>
    function copyUrl() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            const btn = event.currentTarget;
            const original = btn.innerHTML;
            btn.innerHTML = '<svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>';
            setTimeout(() => btn.innerHTML = original, 2000);
        });
    }
    </script>
</x-layouts.public>
