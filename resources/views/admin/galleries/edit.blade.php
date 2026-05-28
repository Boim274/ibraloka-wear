@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">
        {{ __('Edit Galeri') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card-surface overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-surface-200 mb-1">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $gallery->title) }}" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                            @error('title')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-surface-200 mb-1">Description</label>
                            <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">{{ old('description', $gallery->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-surface-200 mb-1">Category</label>
                            <input type="text" name="category" id="category" value="{{ old('category', $gallery->category) }}" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                            @error('category')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-surface-200 mb-1">Image</label>
                            @if ($gallery->image)
                                <div class="mb-2">
                                    <img src="{{ Storage::url($gallery->image) }}" alt="{{ $gallery->title }}" class="w-32 h-32 object-cover rounded-lg">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                            @error('image')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $gallery->is_featured) ? 'checked' : '' }} class="rounded bg-surface-800 border-surface-600 text-gold-500 focus:ring-gold-500">
                                <span class="text-sm text-surface-200">Featured</span>
                            </label>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="px-4 py-2 bg-gold-500 text-surface-900 font-medium rounded-lg hover:bg-gold-400 transition-colors">Update</button>
                            <a href="{{ route('admin.galleries.index') }}" class="px-4 py-2 bg-surface-700 text-surface-200 rounded-lg hover:bg-surface-600 transition-colors">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
