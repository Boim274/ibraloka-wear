<x-layouts.public>
    {{-- Hero Header --}}
    <div class="relative pt-28 pb-16 md:pb-20 overflow-hidden" style="background:linear-gradient(180deg,var(--color-surface-700) 0%,var(--color-surface) 100%)">
        <div class="absolute inset-0 opacity-[0.03]" style="background-image:radial-gradient(circle at 30% 50%,#C9A84C 1px,transparent 1px);background-size:40px 40px"></div>
        <div class="absolute top-0 left-0 right-0 h-px" style="background:linear-gradient(90deg,transparent,rgba(201,168,76,0.3),transparent)"></div>
        <div class="max-w-7xl mx-auto section-padding text-center relative z-10">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-gold-500/20 bg-gold-500/5 text-gold-400 text-xs font-medium tracking-wider uppercase mb-5">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                Wawasan & Inspirasi
            </div>
            <h1 class="text-4xl md:text-6xl font-bold text-surface-50 leading-tight">
                @if($category)
                    {{ ucfirst(str_replace('-', ' ', $category)) }}
                @else
                    Jelajahi <em style="color:var(--color-gold);font-style:italic">Artikel</em>
                @endif
            </h1>
            @if(!$category)
            <p class="text-surface-100 mt-4 max-w-2xl mx-auto text-sm md:text-base leading-relaxed">
                Temukan wawasan, inspirasi gaya, dan cerita di balik koleksi IbraLoka Wear
            </p>
            @endif
        </div>
    </div>

    {{-- Category Filter --}}
    <div class="sticky top-[70px] z-40 py-4" style="background:var(--color-surface);border-bottom:1px solid rgba(201,168,76,0.06)">
        <div class="max-w-7xl mx-auto section-padding">
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('artikel') }}" class="px-4 py-2 rounded-lg text-xs font-semibold uppercase tracking-wider transition-all duration-300 {{ !$kategori ? 'text-black' : 'text-surface-200 hover:text-gold-400' }}" style="background:{{ !$kategori ? 'var(--color-gold)' : 'var(--color-surface-600)' }}">
                    Semua
                </a>
                @foreach($categories as $cat)
                <a href="{{ route('artikel', $cat) }}" class="px-4 py-2 rounded-lg text-xs font-semibold uppercase tracking-wider transition-all duration-300 {{ $kategori == $cat ? 'text-black' : 'text-surface-200 hover:text-gold-400' }}" style="background:{{ $kategori == $cat ? 'var(--color-gold)' : 'var(--color-surface-600)' }}">
                    {{ ucfirst(str_replace('-', ' ', $cat)) }}
                </a>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Articles Grid --}}
    <div class="py-12 md:py-16" style="background:var(--color-surface)">
        <div class="max-w-7xl mx-auto section-padding">
                @if($featured || $articles->count() > 0)
                @if($featured)
                <a href="{{ route('artikel.show', [$featured->category, $featured->slug]) }}" class="group block mb-12 rounded-2xl overflow-hidden relative" style="border:1px solid rgba(201,168,76,0.1);background:var(--color-surface-600)">
                    <div class="md:flex">
                        <div class="md:w-3/5 overflow-hidden relative min-h-[280px]">
                            @if($featured->image)
                            <img src="{{ asset('images/' . $featured->image) }}" alt="{{ $featured->title }}" class="w-full h-full absolute inset-0 object-cover transition-transform duration-700 group-hover:scale-105">
                            @else
                            <div class="w-full h-full absolute inset-0 flex items-center justify-center" style="background:linear-gradient(135deg,var(--color-surface-700),var(--color-surface-800))">
                                <svg class="w-16 h-16 text-surface-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            @endif
                            <div class="absolute inset-0" style="background:linear-gradient(90deg,var(--color-surface-600) 0%,transparent 50%)"></div>
                        </div>
                        <div class="md:w-2/5 p-8 md:p-10 flex flex-col justify-center">
                            <span class="inline-block text-[10px] font-semibold uppercase tracking-wider px-3 py-1 rounded-full mb-4" style="background:rgba(201,168,76,0.12);color:var(--color-gold);width:fit-content">{{ $featured->category }}</span>
                            <h2 class="text-2xl md:text-3xl font-bold text-surface-50 leading-tight group-hover:text-gold-400 transition-colors">{{ $featured->title }}</h2>
                            <p class="text-surface-200 text-sm mt-3 leading-relaxed line-clamp-3">{{ $featured->excerpt }}</p>
                            <div class="flex items-center gap-3 mt-5 text-xs text-surface-300">
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    {{ $featured->published_at ? $featured->published_at->format('d M Y') : 'Tidak ada tanggal' }}
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    5 min read
                                </span>
                            </div>
                            <span class="inline-flex items-center gap-2 text-gold-400 text-xs font-semibold uppercase tracking-wider mt-6 group-hover:gap-3 transition-all">
                                Baca Artikel
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </span>
                        </div>
                    </div>
                </a>
                @endif

                {{-- Article Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($articles as $article)
                    <a href="{{ route('artikel.show', [$article->category, $article->slug]) }}" class="group block rounded-xl overflow-hidden transition-all duration-300 hover:-translate-y-1" style="background:var(--color-surface-600);border:1px solid rgba(201,168,76,0.06);">
                        <div class="aspect-[16/10] overflow-hidden relative">
                            @if($article->image)
                            <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                            <div class="w-full h-full flex items-center justify-center" style="background:linear-gradient(135deg,var(--color-surface-700),var(--color-surface-800))">
                                <svg class="w-10 h-10 text-surface-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            @endif
                            <span class="absolute top-3 left-3 text-[10px] font-semibold uppercase tracking-wider px-2.5 py-1 rounded-full" style="background:rgba(201,168,76,0.9);color:#000">
                                {{ $article->category }}
                            </span>
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-3 text-[11px] text-surface-300 mb-2">
                                <span>{{ $article->published_at ? $article->published_at->format('d M Y') : '' }}</span>
                                <span>·</span>
                                <span>5 min</span>
                            </div>
                            <h3 class="text-surface-50 font-semibold leading-snug group-hover:text-gold-400 transition-colors line-clamp-2">{{ $article->title }}</h3>
                            <p class="text-surface-200 text-sm mt-2 leading-relaxed line-clamp-2">{{ $article->excerpt }}</p>
                            <span class="inline-flex items-center gap-1 text-gold-400 text-xs font-medium mt-4 group-hover:gap-2 transition-all">
                                Baca Selengkapnya
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </span>
                        </div>
                    </a>
                    @endforeach
                </div>

                {{-- Pagination --}}
                @if($articles->hasPages())
                <div class="mt-12">
                    <div class="flex items-center justify-center gap-2">
                        @if ($articles->onFirstPage())
<span class="px-4 py-2 rounded-lg text-xs font-semibold uppercase tracking-wider" style="background:var(--color-surface-600);color:var(--color-surface-300);opacity:0.5">Sebelumnya</span>
                        @else
                            <a href="{{ $articles->previousPageUrl() }}" class="px-4 py-2 rounded-lg text-xs font-semibold uppercase tracking-wider transition-all hover:text-gold-400" style="background:var(--color-surface-600);color:var(--color-surface-200)">Sebelumnya</a>
                        @endif

                        @foreach ($articles->getUrlRange(1, $articles->lastPage()) as $page => $url)
                            <a href="{{ $url }}" class="w-10 h-10 rounded-lg flex items-center justify-center text-xs font-semibold transition-all {{ $page == $articles->currentPage() ? 'text-black' : 'text-surface-200 hover:text-gold-400' }}" style="background:{{ $page == $articles->currentPage() ? 'var(--color-gold)' : 'var(--color-surface-600)' }}">{{ $page }}</a>
                        @endforeach

                        @if ($articles->hasMorePages())
                            <a href="{{ $articles->nextPageUrl() }}" class="px-4 py-2 rounded-lg text-xs font-semibold uppercase tracking-wider transition-all hover:text-gold-400" style="background:var(--color-surface-600);color:var(--color-surface-200)">Selanjutnya</a>
                        @else
                            <span class="px-4 py-2 rounded-lg text-xs font-semibold uppercase tracking-wider" style="background:var(--color-surface-600);color:var(--color-surface-300);opacity:0.5">Selanjutnya</span>
                        @endif
                    </div>
                </div>
                @endif
            @else
                <div class="text-center py-20">
                    <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6" style="background:var(--color-surface-600);border:1px solid rgba(201,168,76,0.1)">
                        <svg class="w-8 h-8 text-surface-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-surface-100 mb-2">Belum Ada Artikel</h3>
                    <p class="text-surface-200 text-sm">Artikel dalam kategori ini akan segera hadir. Nantikan update terbaru dari IbraLoka Wear.</p>
                    <a href="{{ route('artikel') }}" class="inline-flex items-center gap-2 text-gold-400 text-sm font-medium mt-6 hover:gap-3 transition-all">
                        Lihat Semua Artikel
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-layouts.public>
