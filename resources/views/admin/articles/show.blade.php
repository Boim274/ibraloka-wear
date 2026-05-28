@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">
        {{ __('Detail Artikel') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="card-surface overflow-hidden">
                <div class="p-6">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gold-400">{{ $article->title }}</h3>
                        <div class="flex items-center gap-3 mt-2">
                            <span class="px-3 py-1 text-xs font-medium text-gold-400 bg-gold-500/10 rounded-full">{{ ucfirst($article->category) }}</span>
                            @if ($article->is_published)
                                <span class="px-3 py-1 text-xs font-medium text-green-400 bg-green-500/10 rounded-full">Terbit</span>
                            @else
                                <span class="px-3 py-1 text-xs font-medium text-surface-400 bg-surface-700 rounded-full">Draf</span>
                            @endif
                            @if ($article->published_at)
                                <span class="text-sm text-surface-400">{{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}</span>
                            @endif
                        </div>
                    </div>

                    @if ($article->image)
                        <div class="mb-6">
                            <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="w-full max-w-2xl rounded-lg">
                        </div>
                    @endif

                    @if ($article->excerpt)
                        <div class="mb-4 p-4 bg-surface-800/50 rounded-lg text-surface-300 italic">
                            {{ $article->excerpt }}
                        </div>
                    @endif

                    <div class="prose prose-invert text-surface-200 max-w-none">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center gap-4">
                <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 bg-surface-700 text-surface-200 rounded-lg hover:bg-surface-600 transition-colors">Kembali</a>
                <a href="{{ route('admin.articles.edit', $article) }}" class="px-4 py-2 bg-gold-500 text-surface-900 font-medium rounded-lg hover:bg-gold-400 transition-colors">Edit</a>
                <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-500 transition-colors">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
