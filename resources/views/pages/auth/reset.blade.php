@extends('layouts.guest')
@section('title', 'SimKlinik')
@section('container')
    <form class="space-y-6" action="{{ route('user.password') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <label for="email" class="block text-sm font-medium leading-6">Email</label>
            <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" placeholder="email@email.com"
                    required
                    class="block w-full rounded-md border-0 py-1.5 ps-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="password" class="block text-sm font-medium leading-6">Password Baru</label>
            <div class="mt-2">
                <input oninput="validatePassword()" id="password" name="password" type="password" autocomplete="password"
                    placeholder="kata sandi" required
                    class="block w-full rounded-md border-0 py-1.5 ps-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
            </div>
        </div>
        <div>
            <label for="confirm_password" class="block text-sm font-medium leading-6">Konfirmasi Password</label>
            <div class="mt-2">
                <input oninput="validatePassword()" id="confirm_password" name="password_confirmation" type="password"
                    autocomplete="confirm_password" placeholder="kata sandi" required
                    class="block w-full rounded-md border-0 py-1.5 ps-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
            </div>
            <p id="error-message" class="hidden mt-1 text-red-500 text-xs">Password tidak cocok.</p>
        </div>

        <div>
            <button type="submit"
                class="bg-[#1B84FF] flex w-full h-[40px] items-center justify-center rounded-md text-[13px] leading-6 text-white shadow-sm">
                Kirim Request
            </button>
        </div>
    </form>
    <x-script-password></x-script-password>
@endsection
