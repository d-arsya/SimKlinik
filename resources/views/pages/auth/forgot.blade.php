@extends('layouts.guest')
@section('title', 'SimKlinik')
@section('container')
    <form class="space-y-6" action="#" method="POST">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium leading-6">Email</label>
            <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" placeholder="email@email.com" required
                    class="block w-full rounded-md border-0 py-1.5 ps-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6">
            </div>
        </div>

        <div>
            <button type="submit"
                class="bg-[#1B84FF] flex w-full h-[40px] items-center justify-center rounded-md text-[13px] leading-6 text-white shadow-sm">
                Kirim Request
            </button>
        </div>
    </form>
@endsection
@section('scripts')
