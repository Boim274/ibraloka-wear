@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">
        {{ __('Detail Produk') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="card-surface overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row gap-8">
                        @if ($product->image)
                            <div class="md:w-1/2">
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full rounded-lg">
                            </div>
                        @endif
                        <div class="{{ $product->image ? 'md:w-1/2' : 'w-full' }}">
                            <h3 class="text-2xl font-bold text-gold-400">{{ $product->name }}</h3>
                            <div class="flex items-center gap-3 mt-2">
                                <span class="px-3 py-1 text-xs font-medium text-gold-400 bg-gold-500/10 rounded-full">{{ ucfirst($product->category) }}</span>
                                @if ($product->is_featured)
                                    <span class="px-3 py-1 text-xs font-medium text-gold-400 bg-gold-500/10 rounded-full">Featured</span>
                                @endif
                            </div>
                            <p class="mt-4 text-2xl font-bold text-surface-50">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                            <div class="mt-4 text-surface-300">
                                {!! nl2br(e($product->description)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center gap-4">
                <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-surface-700 text-surface-200 rounded-lg hover:bg-surface-600 transition-colors">Kembali</a>
                <a href="{{ route('admin.products.edit', $product) }}" class="px-4 py-2 bg-gold-500 text-surface-900 font-medium rounded-lg hover:bg-gold-400 transition-colors">Edit</a>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-500 transition-colors">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
