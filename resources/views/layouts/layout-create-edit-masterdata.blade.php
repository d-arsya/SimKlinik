@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')

<div class="grid grid-cols-2 px-6 py-3 m-4 border-2 rounded-xl">
    <div class="flex items-center"><b>@yield('title')</b></div>
    <div class="flex justify-end items-center cursor-pointer" onclick="history.back()">
        <x-icons.cancel />
    </div>
</div>

<div class="grid grid-cols-1 gap-4 px-6 py-3 m-4 border-2 rounded-xl">
    @yield('form')
</div>
@endsection
