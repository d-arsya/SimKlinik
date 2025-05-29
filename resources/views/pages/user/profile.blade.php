@extends('layouts.main')
@section('title', 'SimKlinik')

@section('container')
    <div class="text-left">
        <h1 class="text-lg font-medium">Profil Saya</h1>
        <p class="text-cadet text-[15px]">{{ $user->name }}</p>
    </div>

    <div class="mt-[30px] border-2 rounded-xl">
        <div class="flex justify-between px-[30px] border-b-2">
            <h2 class="text-lg py-3 font-medium">About</h2>
            <a href="{{ route('profile.edit') }}"
                class="text-white px-4 h-[30px] self-center rounded-md inline-flex items-center transition-all duration-200 ease-in-out transform  py-2 mb-2 justify-center text-xs group bg-primary">
                Edit
            </a>
        </div>
        <div class="p-[30px] flex justify-between items-center">
            <div class="grid grid-cols-2 gap-2">
                <p class="text-sm text-txtgray">Nama:</p>
                <p class="text-sm text-txtblack">{{ $user->name }}</p>

                <p class="text-sm text-txtgray">Spesialis:</p>
                <p class="text-sm text-txtblack">{{ $user->specialization ?? '-' }}</p>

                <p class="text-sm text-txtgray">Email:</p>
                <p class="text-sm text-txtblack">{{ $user->email }}</p>

                <p class="text-sm text-txtgray">Role:</p>
                <p class="text-sm text-txtblack">{{ ucfirst($user->role) }}</p>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
