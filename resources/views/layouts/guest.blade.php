<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title', 'SimKlinik')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex min-h-screen">
        <div class="w-1/2 flex justify-center items-center">
            <div class="w-[462px] py-10 px-10 rounded-lg border">
                <div class="block font-bold text-center text-lg">@yield('title_name')</div>
                <div class="desc-login text-center">@yield('desc')</div>
                @yield('container')
            </div>
        </div>
        <div class="w-1/2 h-screen my-5 me-5">
            <x-hero></x-hero>
        </div>
    </div>
    <x-toast></x-toast>
    @yield('scripts')
</body>

</html>
