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

        <!-- Search & Filter -->
        <div class="relative w-full overflow-x-auto border-none sm:rounded-lg">
            <div class="flex items-center justify-between my-2 mx-4">
                <div class="relative w-full max-w-xs mx-2">
                    <input type="text" id="tableSearch"
                        class="w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                        placeholder="Cari pasien...">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-icons.search />
                    </div>
                </div>
                @yield('sortir')
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

        function changeRowsPerPage() {
            const unit = document.getElementById('rowsPerPage').value;

            const url = new URL(window.location.href);
            const params = url.searchParams;

            // Set or update only 'unit' param, keep 'page' as is
            params.set('unit', unit);

            window.location.href = `${url.pathname}?${params.toString()}`;
        }
        document.getElementById('tableSearch').addEventListener('input', function() {
            const keyword = this.value.toLowerCase();
            const rows = document.querySelectorAll('#dataTable tbody tr');

            rows.forEach(row => {
                const rowText = row.innerText.toLowerCase();
                if (rowText.includes(keyword)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
