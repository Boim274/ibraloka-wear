@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">
        {{ __('Detail Pesan') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="card-surface overflow-hidden">
                <div class="p-6">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gold-400">{{ $message->subject }}</h3>
                        <div class="mt-2">
                            @if ($message->is_read)
                                <span class="px-3 py-1 text-xs font-medium text-surface-400 bg-surface-700 rounded-full">Sudah dibaca</span>
                            @else
                                <span class="px-3 py-1 text-xs font-medium text-gold-400 bg-gold-500/10 rounded-full">Belum dibaca</span>
                            @endif
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 p-4 bg-surface-800/50 rounded-lg">
                        <div>
                            <p class="text-sm text-surface-400">Nama</p>
                            <p class="text-surface-200">{{ $message->name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-surface-400">Email</p>
                            <p class="text-surface-200">{{ $message->email }}</p>
                        </div>
                        @if ($message->phone)
                            <div>
                                <p class="text-sm text-surface-400">Telepon</p>
                                <p class="text-surface-200">{{ $message->phone }}</p>
                            </div>
                        @endif
                        <div>
                            <p class="text-sm text-surface-400">Diterima</p>
                            <p class="text-surface-200">{{ $message->created_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-medium text-surface-200 mb-2">Pesan</h4>
                        <div class="p-4 bg-surface-800/30 rounded-lg text-surface-300">
                            {!! nl2br(e($message->message)) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center gap-4">
                <a href="{{ route('admin.messages.index') }}" class="px-4 py-2 bg-surface-700 text-surface-200 rounded-lg hover:bg-surface-600 transition-colors">Kembali</a>
                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-500 transition-colors">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
