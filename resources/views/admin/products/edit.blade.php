@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">
        {{ __('Edit Produk') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card-surface overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-surface-200 mb-1">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                            @error('name')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-surface-200 mb-1">Description</label>
                            <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-surface-200 mb-1">Price</label>
                            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                            @error('price')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-surface-200 mb-1">Category</label>
                            <select name="category" id="category" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                                <option value="apparel" {{ old('category', $product->category) == 'apparel' ? 'selected' : '' }}>Apparel</option>
                                <option value="accessories" {{ old('category', $product->category) == 'accessories' ? 'selected' : '' }}>Accessories</option>
                                <option value="limited" {{ old('category', $product->category) == 'limited' ? 'selected' : '' }}>Limited</option>
                            </select>
                            @error('category')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-surface-200 mb-1">Image</label>
                            @if ($product->image)
                                <div class="mb-2">
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover rounded-lg">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                            @error('image')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }} class="rounded bg-surface-800 border-surface-600 text-gold-500 focus:ring-gold-500">
                                <span class="text-sm text-surface-200">Featured</span>
                            </label>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="px-4 py-2 bg-gold-500 text-surface-900 font-medium rounded-lg hover:bg-gold-400 transition-colors">Update</button>
                            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-surface-700 text-surface-200 rounded-lg hover:bg-surface-600 transition-colors">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
