<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SimKlinik')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/flowbite.js'])
</head>

<body>
    <div class="flex h-screen">
        <div>
            <x-sidebar></x-sidebar>
        </div>
        <div class="w-10/12 ml-auto px-10">
            <x-header></x-header>
            <main class="pb-[60px]">
                @yield('container')
            </main>
            <x-dev-login></x-dev-login>
        </div>
    </div>
    @yield('scripts')
</body>

</html>
