@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">
        {{ __('Buat Artikel Baru') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card-surface overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-surface-200 mb-1">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                            @error('title')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-surface-200 mb-1">Category</label>
                            <select name="category" id="category" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                                <option value="fashion" {{ old('category') == 'fashion' ? 'selected' : '' }}>Fashion</option>
                                <option value="budaya" {{ old('category') == 'budaya' ? 'selected' : '' }}>Budaya</option>
                                <option value="travel" {{ old('category') == 'travel' ? 'selected' : '' }}>Travel</option>
                                <option value="kuliner" {{ old('category') == 'kuliner' ? 'selected' : '' }}>Kuliner</option>
                                <option value="tips" {{ old('category') == 'tips' ? 'selected' : '' }}>Tips</option>
                            </select>
                            @error('category')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="excerpt" class="block text-sm font-medium text-surface-200 mb-1">Excerpt</label>
                            <textarea name="excerpt" id="excerpt" rows="3" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">{{ old('excerpt') }}</textarea>
                            @error('excerpt')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-surface-200 mb-1">Content</label>
                            <textarea name="content" id="content" rows="10" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-surface-200 mb-1">Image</label>
                            <input type="file" name="image" id="image" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                            @error('image')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4 flex items-center gap-4">
                            <div>
                                <label class="flex items-center gap-2">
                                    <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="rounded bg-surface-800 border-surface-600 text-gold-500 focus:ring-gold-500">
                                    <span class="text-sm text-surface-200">Terbitkan</span>
                                </label>
                            </div>
                            <div>
                                <label for="published_at" class="block text-sm font-medium text-surface-200 mb-1">Published At</label>
                                <input type="date" name="published_at" id="published_at" value="{{ old('published_at') }}" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="px-4 py-2 bg-gold-500 text-surface-900 font-medium rounded-lg hover:bg-gold-400 transition-colors">Simpan</button>
                            <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 bg-surface-700 text-surface-200 rounded-lg hover:bg-surface-600 transition-colors">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
