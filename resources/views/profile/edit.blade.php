@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-surface-50 leading-tight">Profile</h2>
@endsection

@section('content')
    <div class="py-8">
        <div class="max-w-3xl mx-auto space-y-8">

            {{-- Profile Information --}}
            <div class="card-surface overflow-hidden rounded-xl border border-surface-700/50">
                <div class="p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            {{-- Update Password --}}
            <div class="card-surface overflow-hidden rounded-xl border border-surface-700/50">
                <div class="p-8">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            {{-- Delete Account --}}
            <div class="card-surface overflow-hidden rounded-xl border border-red-900/30">
                <div class="p-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
@endsection
