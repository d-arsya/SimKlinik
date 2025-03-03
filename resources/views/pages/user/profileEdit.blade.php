@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <div class="text-left">
        <h1 class="text-lg font-medium">Profil Saya</h1>
        <div class="text-[#4B5675] text-[15px]">{{ $user->name }}</div>
    </div>
    <div class="mt-6 border-2 rounded-xl">
        <div class="px-6 border-b-2">
            <h2 class="text-lg py-3 font-medium">About</h2>
        </div>
        <form id="submitForm" class="p-6" action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid items-center w-full grid-cols-7 gap-4 mb-4">
                <label class="flex items-center font-medium text-xs text-cadet" for="name">Nama</label
                    class="flex items-center font-medium text-xs text-cadet">
                <input type="text" name="name" value="{{ $user->name }}"
                    class="col-span-6 mt-2 block w-full px-4 py-2 border rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                <label class="flex items-center font-medium text-xs text-cadet" for="specialization">Spesialis</label
                    class="flex items-center font-medium text-xs text-cadet">
                <input type="text" name="specialization" value="{{ $user->specialization ?? '-' }}"
                    class="col-span-6 mt-2 block w-full px-4 py-2 border rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                <label class="flex items-center font-medium text-xs text-cadet" for="email">Email</label
                    class="flex items-center font-medium text-xs text-cadet">
                <div class="text-sm text-txtblack col-span-6">{{ $user->email }}</div>
                <label class="flex items-center font-medium text-xs text-cadet" for="role">Role</label
                    class="flex items-center font-medium text-xs text-cadet">
                <div class="text-sm text-txtblack col-span-6">{{ ucfirst($user->role) }}</div>

                <div class="col-span-7 mt-2 flex space-x-2 justify-end">
                    <a href="{{ route('profile') }}"
                        class="flex items-center justify-center py-2 px-8 text-white text-xs rounded-lg group bg-danger">
                        Batal</a>
                    <button
                        class="flex items-center justify-center py-2 px-8 text-white text-xs rounded-lg group bg-primary">
                        Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
