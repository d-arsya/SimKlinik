@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')

    <div class="justify-between px-4 flex py-4">
        <div>
            <h2 class="text-xl font-semibold">@yield('title')</h2>
            <div class="flex">
                @yield('desc')
            </div>
        </div>
        <div class="flex">
            <div class="flex gap-2">
                @yield('buttons')
            </div>
        </div>
    </div>

    <div class="flex m-2 border-2 rounded-xl">

        <!-- Searh & Filter -->
        <div class="relative w-full overflow-x-auto border-none sm:rounded-lg">
            <div class="flex items-center justify-between my-2 mx-4">
                <x-icons.search />
                <x-icons.filter />
            </div>
        </div>

        <!-- Table of Contents -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-[#99A1B7]" id="dataTable">
                @yield('table')
            </table>
        </div>

        <!-- Pagination -->
        @yield('pagination')
    </div>


@endsection
