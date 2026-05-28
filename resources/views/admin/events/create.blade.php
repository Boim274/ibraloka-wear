@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">
        {{ __('Buat Event Baru') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="card-surface overflow-hidden">
                <div class="p-6">
                    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-surface-200 mb-1">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                            @error('title')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-surface-200 mb-1">Description</label>
                            <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">{{ old('description') }}</textarea>
                            @error('description')
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

                        <div class="mb-4">
                            <label for="event_date" class="block text-sm font-medium text-surface-200 mb-1">Event Date</label>
                            <input type="date" name="event_date" id="event_date" value="{{ old('event_date') }}" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                            @error('event_date')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="location" class="block text-sm font-medium text-surface-200 mb-1">Location</label>
                            <input type="text" name="location" id="location" value="{{ old('location') }}" class="w-full px-4 py-2 bg-surface-800 border border-surface-600 rounded-lg text-surface-50 focus:border-gold-500 focus:ring-gold-500">
                            @error('location')
                                <p class="mt-1 text-sm text-gold-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="rounded bg-surface-800 border-surface-600 text-gold-500 focus:ring-gold-500">
                                <span class="text-sm text-surface-200">Terbitkan</span>
                            </label>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="px-4 py-2 bg-gold-500 text-surface-900 font-medium rounded-lg hover:bg-gold-400 transition-colors">Simpan</button>
                            <a href="{{ route('admin.events.index') }}" class="px-4 py-2 bg-surface-700 text-surface-200 rounded-lg hover:bg-surface-600 transition-colors">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
