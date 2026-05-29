@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">
        {{ __('Detail Event') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="card-surface overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row gap-8">
                        @if ($event->image)
                            <div class="md:w-1/2">
                                <img src="{{ asset('images/' . $event->image) }}" alt="{{ $event->title }}" class="w-full rounded-lg">
                            </div>
                        @endif
                        <div class="{{ $event->image ? 'md:w-1/2' : 'w-full' }}">
                            <h3 class="text-2xl font-bold text-gold-400">{{ $event->title }}</h3>
                            <div class="flex items-center gap-3 mt-2">
                                @if ($event->is_published)
                                    <span class="px-3 py-1 text-xs font-medium text-green-400 bg-green-500/10 rounded-full">Terbit</span>
                                @else
                                    <span class="px-3 py-1 text-xs font-medium text-surface-400 bg-surface-700 rounded-full">Draf</span>
                                @endif
                            </div>
                            <div class="mt-4 space-y-2 text-surface-300">
                                <p><span class="font-medium text-surface-200">Tanggal:</span> {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</p>
                                <p><span class="font-medium text-surface-200">Lokasi:</span> {{ $event->location }}</p>
                            </div>
                            <div class="mt-4 text-surface-300">
                                {!! nl2br(e($event->description)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center gap-4">
                <a href="{{ route('admin.events.index') }}" class="px-4 py-2 bg-surface-700 text-surface-200 rounded-lg hover:bg-surface-600 transition-colors">Kembali</a>
                <a href="{{ route('admin.events.edit', $event) }}" class="px-4 py-2 bg-gold-500 text-surface-900 font-medium rounded-lg hover:bg-gold-400 transition-colors">Edit</a>
                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-500 transition-colors">Hapus</button>
                </form>
            </div>
        </div>
    </div>
@endsection
