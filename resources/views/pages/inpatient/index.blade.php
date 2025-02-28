@extends('layouts.layout-index')

<!-- Header -->
@section('title', 'Tabel Rawat Inap Pasien')
@section('desc')
    <p class="text-cadet font-medium me-[14px]">Jumlah Pasien: <span class="text-[#252F4A]">49,053</span></p>
    <p class="text-cadet font-medium">Jumlah Dokter: <span class="text-[#252F4A]">724</span></p>
@endsection

<!-- Table -->
@section('table')
    <thead class="border-y border-gray-200 bg-[#FCFCFC]">
        <tr>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">No. </th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Tanggal</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">No. RM</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Pasien</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Owner Pasien</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Umur</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">No. Telp</th>
            <th scope="col" class="px-6 py-3 text-center border-r border-gray-100">Aksi</th>
        </tr>
    </thead>
    <tbody class="font-medium">
        <tr>
            <td class="px-6 py-3 border-b border-r border-gray-200">1</td>
            <td class="px-6 py-3 border-b border-r border-gray-200 ">09/01/24</td>
            <td class="px-6 py-3 border-b border-r border-gray-200 ">RM-2</td>
            <td class="px-6 py-3 border-b border-r border-gray-200 ">
                <div>
                    <p class="font-semibold">Kimo</a>
                    <p>Kucing</p>
                </div>
            </td>
            <td class="px-6 py-3 border-b border-r border-gray-200">Hendra</td>
            <td class="px-6 py-3 border-b border-r border-gray-200">2</td>
            <td class="px-6 py-3 border-b border-r border-gray-200">085532127698</td>
            <td class="px-6 py-3 border-b border-gray-200">
                <div class="flex justify-center items-center gap-2 h-10">
                    <div class="flex items-center justify-center ">
                        <x-icons.detail-icon />
                    </div>
                    @if (auth()->user()->role == 'doctor')
                        <a href=""
                            class="font-bold text-md py-2 px-3 rounded-md text-white bg-primary flex items-center justify-center h-9">
                            Selesai Rawat Inap
                        </a>
                    @endif
                </div>
            </td>
    </tbody>
@endsection

@section('pagination')
    <div class="flex items-center justify-between mx-4 my-2 text-sm text-gray-700">
        <!-- Rows Per Page Selector -->
        <select id="rowsPerPage" onchange="changeRowsPerPage()"
            class="p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="10" selected>10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
        {{-- paginate --}}
        {{-- <div class="flex flex-row">

            <span class="m-2">
                {{ ($users->currentPage() - 1) * $users->perPage() + 1 }} -
                {{ min($users->currentPage() * $users->perPage(), $users->total()) }}
                dari {{ $users->total() }}
            </span>

            <div class="flex items-center">
                <!-- Tombol Sebelumnya -->
                <button
                    class="px-2 py-1 mx-1 text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-100 disabled:text-gray-300 disabled:cursor-not-allowed"
                    @if ($users->onFirstPage()) disabled @endif
                    onclick="window.location='{{ $users->previousPageUrl() }}'">
                    &lt;
                </button>

                <!-- Nomor Halaman -->
                @foreach (range(1, $users->lastPage()) as $page)
                    @if ($page == $users->currentPage())
                        <button class="px-3 py-1 mx-1 text-white bg-blue-600 border border-blue-600 rounded">
                            {{ $page }}
                        </button>
                    @else
                        <button
                            class="px-3 py-1 mx-1 text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-100"
                            onclick="window.location='{{ $users->url($page) }}'">
                            {{ $page }}
                        </button>
                    @endif
                @endforeach

                <!-- Tombol Berikutnya -->
                <button
                    class="px-2 py-1 mx-1 text-gray-500 bg-white border border-gray-300 rounded hover:bg-gray-100 disabled:text-gray-300 disabled:cursor-not-allowed"
                    @if (!$users->hasMorePages()) disabled @endif
                    onclick="window.location='{{ $users->nextPageUrl() }}'">
                    &gt;
                </button>
            </div>
        </div> --}}
    </div>
@endsection
