@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <div class="flex flex-col justify-between px-8">
        <h1 class="text-lg font-bold">List Invoice</h1>
        <h1 style="font-size: 0.9rem">Jumlah Pasien : 49,000 Jumlah Dokter : 12</h1>
    </div>

    <!-- Tabel Data -->
    <div class="overflow-x-auto mt-5 bg-white rounded-lg shadow-md">
        <x-table {{-- :table="" --}} id="dataTable">
            <thead class="text-[#99A1B7] text-sm font-semibold bg-gray-50 border-b border-[#F1F1F4]">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center border-r border-gray-100" style="font-size: 0.81rem">ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-center border-r border-gray-100" style="font-size: 0.81rem">
                        Tanggal</th>
                    <th scope="col" class="px-6 py-3 text-center border-r border-gray-100" style="font-size: 0.81rem">No.
                        RM</th>
                    <th scope="col" class="px-6 py-3 text-center border-r border-gray-100" style="font-size: 0.81rem">
                        Pasien</th>
                    <th scope="col" class="px-6 py-3 text-center border-r border-gray-100" style="font-size: 0.81rem">
                        Owner</th>
                    <th scope="col" class="px-6 py-3 text-center border-r border-gray-100" style="font-size: 0.81rem">No
                        Telp</th>
                    <th scope="col" class="px-6 py-3 text-center border-r border-gray-100" style="font-size: 0.81rem">
                        Total</th>
                    <th scope="col" class="px-6 py-3 text-center border-r border-gray-100" style="font-size: 0.81rem">
                        Status</th>
                    <th scope="col" class="px-6 py-3 text-center border-r border-gray-100" style="font-size: 0.81rem">
                        Invoice</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-semibold border-r text-center border-gray-100" style="font-size: 0.8rem">INV-2
                    </td>
                    <td class="px-6 py-4 font-semibold text-center border-r border-gray-100" style="font-size: 0.8rem">
                        11/05/2024</td>
                    <td class="px-6 py-4 font-semibold border-r border-gray-100 " style="font-size: 0.8rem">2</td>
                    <td class="px-6 py-4 border-r border-gray-100" style="font-size: 0.8rem">
                        <a href="{{ route('patient.show', 1) }}" class="font-semibold underline text-[#036CA1]">Molmo</a>
                        <p style="font-size: 0.8em">Anjing</p>
                    </td>
                    <td class="px-6 py-4 text-center border-r border-gray-100 text-[#036CA1] underline"
                        style="font-size: 0.8rem">
                        <a href="{{ route('owner.show', 1) }}">Andi</a>
                    </td>
                    <td class="px-6 py-4 text-center border-r border-gray-100" style="font-size: 0.8rem">
                        085509094343</td>
                    <td class="px-6 py-4 border-r border-gray-100" style="font-size: 0.8rem">Rp
                        50.000,00</td>
                    <td class="px-6 py-4 text-center border-r border-gray-100">
                        <div class="flex items-center w-20 py-2 pl-2 space-x-2 border border-red-200 rounded-full bg-red-50"
                            style="font-size: 0.8rem">
                            <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                            <span class="font-semibold text-red-600">Belum</span>
                        </div>

                    </td>
                    <td class="px-6 py-4 text-center border-r border-gray-100">
                        <a href="{{ route('invoice.edit', 1) }}"
                            class="inline-flex items-center px-2 py-2 mb-2 text-sm font-medium text-white transition-all duration-200 ease-in-out transform bg-[#036CA1] rounded-lg shadow-lg focus:outline-none hover:bg-[#036CA1]-700 hover:scale-105 hover:shadow-xl">
                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.7025 14.3886H3.59136C2.86938 14.3886 2.17698 14.1018 1.66646 13.5912C1.15595 13.0807 0.869141 12.3883 0.869141 11.6663V1.51089C0.869141 0.681005 1.69047 0.15445 2.41303 0.404894C2.51673 0.440672 2.61707 0.493043 2.71403 0.562006L2.85014 0.659228C3.18121 0.894138 3.57727 1.02 3.98321 1.0193C4.38915 1.01861 4.78477 0.891384 5.11503 0.655339C5.57861 0.325417 6.13348 0.148132 6.70247 0.148132C7.27147 0.148132 7.82633 0.325417 8.28992 0.655339C8.62018 0.891384 9.0158 1.01861 9.42174 1.0193C9.82768 1.02 10.2237 0.894138 10.5548 0.659228L10.6909 0.562006C11.4633 0.00978346 12.5358 0.562005 12.5358 1.51089V7.38856H15.258C15.4127 7.38856 15.5611 7.45002 15.6705 7.55942C15.7799 7.66881 15.8414 7.81718 15.8414 7.97189V12.2497C15.8414 12.8169 15.616 13.361 15.2149 13.7621C14.8138 14.1632 14.2697 14.3886 13.7025 14.3886ZM12.7303 8.55523V12.2497C12.7303 12.5075 12.8327 12.7548 13.015 12.9371C13.1973 13.1195 13.4446 13.2219 13.7025 13.2219C13.9603 13.2219 14.2076 13.1195 14.3899 12.9371C14.5723 12.7548 14.6747 12.5075 14.6747 12.2497V8.55523H12.7303ZM9.4247 5.24967C9.4247 5.09496 9.36324 4.94659 9.25384 4.83719C9.14445 4.7278 8.99607 4.66634 8.84136 4.66634H4.1747C4.01999 4.66634 3.87161 4.7278 3.76222 4.83719C3.65282 4.94659 3.59136 5.09496 3.59136 5.24967C3.59136 5.40438 3.65282 5.55275 3.76222 5.66215C3.87161 5.77155 4.01999 5.83301 4.1747 5.83301H8.84136C8.99607 5.83301 9.14445 5.77155 9.25384 5.66215C9.36324 5.55275 9.4247 5.40438 9.4247 5.24967ZM8.64692 7.58301C8.64692 7.4283 8.58546 7.27992 8.47606 7.17053C8.36667 7.06113 8.21829 6.99967 8.06359 6.99967H4.1747C4.01999 6.99967 3.87161 7.06113 3.76222 7.17053C3.65282 7.27992 3.59136 7.4283 3.59136 7.58301C3.59136 7.73771 3.65282 7.88609 3.76222 7.99548C3.87161 8.10488 4.01999 8.16634 4.1747 8.16634H8.06359C8.21829 8.16634 8.36667 8.10488 8.47606 7.99548C8.58546 7.88609 8.64692 7.73771 8.64692 7.58301ZM8.84136 9.333C8.99607 9.333 9.14445 9.39446 9.25384 9.50386C9.36324 9.61326 9.4247 9.76163 9.4247 9.91634C9.4247 10.071 9.36324 10.2194 9.25384 10.3288C9.14445 10.4382 8.99607 10.4997 8.84136 10.4997H4.1747C4.01999 10.4997 3.87161 10.4382 3.76222 10.3288C3.65282 10.2194 3.59136 10.071 3.59136 9.91634C3.59136 9.76163 3.65282 9.61326 3.76222 9.50386C3.87161 9.39446 4.01999 9.333 4.1747 9.333H8.84136Z"
                                    fill="#F8F8F8" />
                            </svg>
                        </a>
                    </td>
                </tr>
                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-semibold border-r text-center border-gray-100" style="font-size: 0.8rem">INV-2
                    </td>
                    <td class="px-6 py-4 font-semibold text-center border-r border-gray-100" style="font-size: 0.8rem">
                        11/05/2024</td>
                    <td class="px-6 py-4 font-semibold border-r border-gray-100 " style="font-size: 0.8rem">2</td>
                    <td class="px-6 py-4 border-r border-gray-100" style="font-size: 0.8rem">
                        <a href="{{ route('patient.show', 1) }}" class="font-semibold underline text-[#036CA1]">Molmo</a>
                        <p style="font-size: 0.8em">Anjing</p>
                    </td>
                    <td class="px-6 py-4 text-center border-r border-gray-100 text-[#036CA1] underline"
                        style="font-size: 0.8rem">
                        <a href="{{ route('owner.show', 1) }}">Andi</a>
                    </td>
                    <td class="px-6 py-4 text-center border-r border-gray-100" style="font-size: 0.8rem">
                        085509094343</td>
                    <td class="px-6 py-4 border-r border-gray-100" style="font-size: 0.8rem">Rp
                        50.000,00</td>
                    <td class="px-6 py-4 text-center border-r border-gray-100">
                        <div class="flex items-center w-20 py-2 pl-2 space-x-2 border border-green-200 rounded-full bg-green-50"
                            style="font-size: 0.8rem">
                            <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                            <span class="font-semibold text-green-600">Lunas</span>
                        </div>

                    </td>
                    <td class="px-6 py-4 text-center border-r border-gray-100">
                        <a href="{{ route('invoice.show', 1) }}"
                            class="inline-flex items-center px-2 py-2 mb-2 text-sm font-medium text-white transition-all duration-200 ease-in-out transform bg-[#036CA1] rounded-lg shadow-lg focus:outline-none hover:bg-[#036CA1]-700 hover:scale-105 hover:shadow-xl">
                            <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.7025 14.3886H3.59136C2.86938 14.3886 2.17698 14.1018 1.66646 13.5912C1.15595 13.0807 0.869141 12.3883 0.869141 11.6663V1.51089C0.869141 0.681005 1.69047 0.15445 2.41303 0.404894C2.51673 0.440672 2.61707 0.493043 2.71403 0.562006L2.85014 0.659228C3.18121 0.894138 3.57727 1.02 3.98321 1.0193C4.38915 1.01861 4.78477 0.891384 5.11503 0.655339C5.57861 0.325417 6.13348 0.148132 6.70247 0.148132C7.27147 0.148132 7.82633 0.325417 8.28992 0.655339C8.62018 0.891384 9.0158 1.01861 9.42174 1.0193C9.82768 1.02 10.2237 0.894138 10.5548 0.659228L10.6909 0.562006C11.4633 0.00978346 12.5358 0.562005 12.5358 1.51089V7.38856H15.258C15.4127 7.38856 15.5611 7.45002 15.6705 7.55942C15.7799 7.66881 15.8414 7.81718 15.8414 7.97189V12.2497C15.8414 12.8169 15.616 13.361 15.2149 13.7621C14.8138 14.1632 14.2697 14.3886 13.7025 14.3886ZM12.7303 8.55523V12.2497C12.7303 12.5075 12.8327 12.7548 13.015 12.9371C13.1973 13.1195 13.4446 13.2219 13.7025 13.2219C13.9603 13.2219 14.2076 13.1195 14.3899 12.9371C14.5723 12.7548 14.6747 12.5075 14.6747 12.2497V8.55523H12.7303ZM9.4247 5.24967C9.4247 5.09496 9.36324 4.94659 9.25384 4.83719C9.14445 4.7278 8.99607 4.66634 8.84136 4.66634H4.1747C4.01999 4.66634 3.87161 4.7278 3.76222 4.83719C3.65282 4.94659 3.59136 5.09496 3.59136 5.24967C3.59136 5.40438 3.65282 5.55275 3.76222 5.66215C3.87161 5.77155 4.01999 5.83301 4.1747 5.83301H8.84136C8.99607 5.83301 9.14445 5.77155 9.25384 5.66215C9.36324 5.55275 9.4247 5.40438 9.4247 5.24967ZM8.64692 7.58301C8.64692 7.4283 8.58546 7.27992 8.47606 7.17053C8.36667 7.06113 8.21829 6.99967 8.06359 6.99967H4.1747C4.01999 6.99967 3.87161 7.06113 3.76222 7.17053C3.65282 7.27992 3.59136 7.4283 3.59136 7.58301C3.59136 7.73771 3.65282 7.88609 3.76222 7.99548C3.87161 8.10488 4.01999 8.16634 4.1747 8.16634H8.06359C8.21829 8.16634 8.36667 8.10488 8.47606 7.99548C8.58546 7.88609 8.64692 7.73771 8.64692 7.58301ZM8.84136 9.333C8.99607 9.333 9.14445 9.39446 9.25384 9.50386C9.36324 9.61326 9.4247 9.76163 9.4247 9.91634C9.4247 10.071 9.36324 10.2194 9.25384 10.3288C9.14445 10.4382 8.99607 10.4997 8.84136 10.4997H4.1747C4.01999 10.4997 3.87161 10.4382 3.76222 10.3288C3.65282 10.2194 3.59136 10.071 3.59136 9.91634C3.59136 9.76163 3.65282 9.61326 3.76222 9.50386C3.87161 9.39446 4.01999 9.333 4.1747 9.333H8.84136Z"
                                    fill="#F8F8F8" />
                            </svg>
                        </a>
                    </td>
                </tr>
            </tbody>
        </x-table>
    </div>
@endsection
@section('scripts')
