@extends('layouts.guest')
@section('title', 'SimKlinik')
@section('container')
    <form class="space-y-6" action="{{ route('login') }}" method="post">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium leading-6">Email atau username</label>
            <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" placeholder="email@email.com" required
                    class="block w-full rounded-md border-0 py-1.5 ps-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium leading-6">Password</label>
            <div class="relative">
                <input id="password" name="password" type="password" autocomplete="current-password" placeholder="User@123"
                    required oninput="validatePassword()"
                    class="block w-full rounded-md border-0 py-1.5 ps-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
                <span class="absolute inset-y-0 right-0 flex items-center px-3 cursor-pointer"
                    onclick="togglePasswordVisibility('password', 'eyeIcon')">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm3.988-2.53A8.966 8.966 0 0121 12c-1.05 2.72-4.22 5-9 5-4.78 0-7.95-2.28-9-5a8.965 8.965 0 012.012-2.53" />
                    </svg>
                </span>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <a class="text-sm text-klinikBlue hover:underline rounded-md focus:outline-none" href="{{ route('forgot') }}">
                Forgot password?
            </a>
        </div>

        <div>
            <button type="submit"
                class="bg-[#1B84FF] flex w-full h-[40px] items-center justify-center rounded-md text-[13px] leading-6 text-white shadow-sm">
                Masuk
                <svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="ml-[5px]">
                    <path
                        d="M10.3512 1.31874V4.27383H1.14055C0.970669 4.27383 0.807742 4.34131 0.687614 4.46144C0.567487 4.58157 0.5 4.74449 0.5 4.91438C0.5 5.08427 0.567487 5.24719 0.687614 5.36732C0.807742 5.48745 0.970669 5.55493 1.14055 5.55493H10.3512V8.50148C10.3503 8.58207 10.3736 8.66108 10.4182 8.72823C10.4628 8.79537 10.5265 8.84755 10.6012 8.87796C10.6758 8.90836 10.7579 8.9156 10.8367 8.89872C10.9155 8.88184 10.9874 8.84164 11.043 8.78333L15.3801 5.19622C15.4181 5.15887 15.4482 5.11433 15.4688 5.06521C15.4894 5.01609 15.5 4.96337 15.5 4.91011C15.5 4.85685 15.4894 4.80413 15.4688 4.75501C15.4482 4.70589 15.4181 4.66135 15.3801 4.624L11.043 1.03689C10.9874 0.978585 10.9155 0.938376 10.8367 0.921498C10.7579 0.904621 10.6758 0.911856 10.6012 0.942265C10.5265 0.972674 10.4628 1.02485 10.4182 1.09199C10.3736 1.15914 10.3503 1.23815 10.3512 1.31874Z"
                        fill="white" />
                </svg>
            </button>
        </div>
    </form>


@endsection
@section('scripts')
    <x-script-password></x-script-password>
@endsection
