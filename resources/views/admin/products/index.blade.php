@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">
        {{ __('Produk') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-900/50 border border-green-700 rounded-lg text-green-300">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-6">
                <div></div>
                <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-gold-500 text-surface-900 font-medium rounded-lg hover:bg-gold-400 transition-colors">
                    + Buat Produk
                </a>
            </div>

            <div class="card-surface overflow-hidden">
                <div class="p-6">
                    <table class="w-full text-sm text-left">
                        <thead>
                            <tr class="bg-surface-800 text-gold-400">
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Image</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Category</th>
                                <th class="px-4 py-3">Price</th>
                                <th class="px-4 py-3">Featured</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $index => $product)
                                <tr class="border-b border-surface-700 hover:bg-surface-800/50">
                                    <td class="px-4 py-3">{{ $products->firstItem() + $index }}</td>
                                    <td class="px-4 py-3">
                                        @if ($product->image)
                                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-14 h-14 object-cover rounded-lg">
                                        @else
                                            <span class="text-surface-500 text-xs">-</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">{{ $product->name }}</td>
                                    <td class="px-4 py-3">{{ ucfirst($product->category) }}</td>
                                    <td class="px-4 py-3">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td class="px-4 py-3">
                                        @if ($product->is_featured)
                                            <span class="px-2 py-1 text-xs font-medium text-gold-400 bg-gold-500/10 rounded-full">Featured</span>
                                        @else
                                            <span class="px-2 py-1 text-xs font-medium text-surface-400 bg-surface-700 rounded-full">No</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-1.5">
                                            <a href="{{ route('admin.products.show', $product) }}" class="p-2 rounded-lg bg-surface-800 text-gold-400 hover:bg-gold-500/10 hover:text-gold-300 border border-surface-600 hover:border-gold-500/30 transition-all" title="Lihat Detail">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            </a>
                                            <a href="{{ route('admin.products.edit', $product) }}" class="p-2 rounded-lg bg-surface-800 text-blue-400 hover:bg-blue-500/10 hover:text-blue-300 border border-surface-600 hover:border-blue-500/30 transition-all" title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 rounded-lg bg-surface-800 text-red-400 hover:bg-red-500/10 hover:text-red-300 border border-surface-600 hover:border-red-500/30 transition-all cursor-pointer" title="Hapus">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-8 text-center text-surface-400">Belum ada produk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
