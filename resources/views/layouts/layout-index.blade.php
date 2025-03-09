@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')

    <div class="justify-between px-4 flex py-2">
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

    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data ini akan dihapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                }
            });
        }
    </script>
@endsection
