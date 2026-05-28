@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">
        {{ __('Pesan') }}
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

            <div class="card-surface overflow-hidden">
                <div class="p-6">
                    <table class="w-full text-sm text-left">
                        <thead>
                            <tr class="bg-surface-800 text-gold-400">
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Subject</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($messages as $index => $message)
                                <tr class="border-b border-surface-700 hover:bg-surface-800/50 {{ !$message->is_read ? 'bg-gold-500/5' : '' }}">
                                    <td class="px-4 py-3">{{ $messages->firstItem() + $index }}</td>
                                    <td class="px-4 py-3">{{ $message->name }}</td>
                                    <td class="px-4 py-3">{{ $message->email }}</td>
                                    <td class="px-4 py-3">{{ $message->subject }}</td>
                                    <td class="px-4 py-3">
                                        @if ($message->is_read)
                                            <span class="px-2 py-1 text-xs font-medium text-surface-400 bg-surface-700 rounded-full">Read</span>
                                        @else
                                            <span class="px-2 py-1 text-xs font-medium text-gold-400 bg-gold-500/10 rounded-full">Unread</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3">{{ $message->created_at->format('d M Y H:i') }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-1.5">
                                            <a href="{{ route('admin.messages.show', $message) }}" class="p-2 rounded-lg bg-surface-800 text-gold-400 hover:bg-gold-500/10 hover:text-gold-300 border border-surface-600 hover:border-gold-500/30 transition-all" title="Lihat Detail">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            </a>
                                            <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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
                                    <td colspan="7" class="px-4 py-8 text-center text-surface-400">Belum ada pesan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6">
                {{ $messages->links() }}
            </div>
        </div>
    </div>
@endsection
