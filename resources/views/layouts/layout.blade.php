@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')

    <div class="justify-between px-4 flex flex-col py-4">
        <div>
            <h2 class="text-xl font-semibold">Tabel Daftar Invoice</h2>
        </div>
        <div class="flex">
            <p class="text-cadet font-medium me-[14px]">Jumlah Pasien: <span class="text-[#252F4A]">49,053</span></p>
            <p class="text-cadet font-medium">Jumlah Dokter: <span class="text-[#252F4A]">724</span></p>
        </div>
    </div>

    <!-- Container -->
    <div class="flex m-2 border-2 rounded-xl">
        <div class="relative w-full overflow-x-auto border-none sm:rounded-lg">
            <div class="flex items-center justify-between my-2 mx-4">

                <!-- Search -->
                <div class="relative w-full max-w-xs">
                    <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Cari..."
                        class="w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500   dark:placeholder-gray-400   ">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <x-icons.search />
                    </div>
                </div>

                <!-- Filter -->
                <div class="relative inline-block">
                    <!-- Filter Button Clicked -->
                    <button id="filterButton" onclick="toggleDropdown()"
                        class="flex items-center px-3 py-2 text-blue-600 border border-blue-200 rounded-lg bg-blue-50 hover:bg-blue-100">
                        <x-icons.filter />
                        <span id="filterText" style="font-size: 12px; font-weight: 600;">Filters</span>
                    </button>
                    <!-- Filter option -->
                    <div id="dropdown"
                        class="absolute right-0 z-10 hidden w-48 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg">
                        <ul id="dropdownOptions" class="py-2 text-sm text-gray-700">
                            <li><button onclick="selectOption('Today')"
                                    class="block w-full px-4 py-2 text-left hover:bg-gray-100">Today</button></li>
                            <li><button onclick="selectOption('Yesterday')"
                                    class="block w-full px-4 py-2 text-left hover:bg-gray-100">Yesterday</button></li>
                            <li><button onclick="selectOption('7 Hari yang Lalu')"
                                    class="block w-full px-4 py-2 text-left hover:bg-gray-100">7 Hari yang Lalu</button>
                            </li>
                            <li><button onclick="selectOption('Bulan Lalu')"
                                    class="block w-full px-4 py-2 text-left hover:bg-gray-100">Bulan Lalu</button></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-[#99A1B7]" id="dataTable">
                    <thead class="border-y border-gray-200 bg-[#FCFCFC]">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-r border-gray-200">ID</th>
                            <th scope="col" class="px-6 py-3 border-r border-gray-200">Tanggal</th>
                            <th scope="col" class="px-6 py-3 border-r border-gray-200">No. RM</th>
                            <th scope="col" class="px-6 py-3 border-r border-gray-200">Pasien</th>
                            <th scope="col" class="px-6 py-3 border-r border-gray-200">Owner Pasien</th>
                            <th scope="col" class="px-6 py-3 border-r border-gray-200">No. Telp</th>
                            <th scope="col" class="px-6 py-3 border-r border-gray-200">Total</th>
                            <th scope="col" class="px-6 py-3 border-r border-gray-200">Status</th>
                            <th scope="col" class="px-6 py-3 ">Invoice</th>
                        </tr>
                    </thead>
                    <tbody class="font-medium">
                        <tr>
                            <td class="px-6 py-3 border-b border-r border-gray-200">INV-2667</td>
                            <td class="px-6 py-3 border-b border-r border-gray-200 ">10/01/24</td>
                            <td class="px-6 py-3 border-b border-r border-gray-200 ">2</td>
                            <td class="px-6 py-3 border-b border-r border-gray-200 ">
                                <div>
                                    <p class="font-semibold">Kimo</a>
                                    <p>Kucing</p>
                                </div>
                            </td>
                            <td class="px-6 py-3 border-b border-r border-gray-200">Hendra</td>
                            <td class="px-6 py-3 border-b border-r border-gray-200">085532127698</td>
                            <td class="px-6 py-3 border-b border-r border-gray-200">
                                Rp {{ number_format(18000, 2, ',', '.') }}
                            </td>
                            <td class="px-6 py-3 border-b border-r border-gray-200">
                                <div class="flex items-center">
                                    <x-icons.nopaidd class="w-5 h-5" />
                                </div>
                            </td>
                            <td class="px-6 py-3 border-b border-gray-200    ">
                                <div class="flex justify-center items-center">
                                    <x-icons.invoice2 class="w-5 h-5" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 border-b border-r border-gray-200">INV-2667</td>
                            <td class="px-6 py-3 border-b border-r border-gray-200 ">10/01/24</td>
                            <td class="px-6 py-3 border-b border-r border-gray-200 ">2</td>
                            <td class="px-6 py-3 border-b border-r border-gray-200 ">
                                <div>
                                    <p class="font-semibold">Kimo</a>
                                    <p>Kucing</p>
                                </div>
                            </td>
                            <td class="px-6 py-3 border-b border-r border-gray-200">Hendra</td>
                            <td class="px-6 py-3 border-b border-r border-gray-200">085532127698</td>
                            <td class="px-6 py-3 border-b border-r border-gray-200">
                                Rp {{ number_format(18000, 2, ',', '.') }}
                            </td>
                            <td class="px-6 py-3 border-b border-r border-gray-200">
                                <div class="flex items-center">
                                    <x-icons.paid class="w-5 h-5" />
                                </div>
                            </td>
                            <td class="px-6 py-3 border-b border-gray-200    ">
                                <div class="flex justify-center items-center">
                                    <x-icons.invoice2 class="w-5 h-5" />
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    @endsection
    @section('scripts')
