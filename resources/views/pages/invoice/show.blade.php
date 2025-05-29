@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <div class="flex justify-between px-8">
        <div>
        </div>
        <div class="space-x-7">
            <button>
                <svg width="27" height="33" viewBox="0 0 27 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.375 32.5H26.625V28.75H0.375V32.5ZM26.625 11.875H19.125V0.625H7.875V11.875H0.375L13.5 25L26.625 11.875Z"
                        fill="black" />
                </svg>
            </button>
            <button>
                <svg width="39" height="35" viewBox="0 0 39 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M30.75 8.125H8.25V0.625H30.75V8.125ZM30.75 18.4375C31.2812 18.4375 31.7269 18.2575 32.0869 17.8975C32.4469 17.5375 32.6262 17.0925 32.625 16.5625C32.6238 16.0325 32.4438 15.5875 32.085 15.2275C31.7262 14.8675 31.2812 14.6875 30.75 14.6875C30.2188 14.6875 29.7738 14.8675 29.415 15.2275C29.0562 15.5875 28.8762 16.0325 28.875 16.5625C28.8738 17.0925 29.0538 17.5381 29.415 17.8994C29.7763 18.2606 30.2213 18.44 30.75 18.4375ZM27 30.625V23.125H12V30.625H27ZM30.75 34.375H8.25V26.875H0.75V15.625C0.75 14.0312 1.29688 12.6956 2.39062 11.6181C3.48438 10.5406 4.8125 10.0013 6.375 10H32.625C34.2188 10 35.555 10.5394 36.6338 11.6181C37.7125 12.6969 38.2513 14.0325 38.25 15.625V26.875H30.75V34.375Z"
                        fill="black" />
                </svg>
            </button>
        </div>
    </div>

    <div class="flex flex-col p-4 m-6 border-2 border-gray-400 ">
        <div class="flex flex-col text-center text-[#036CA1] pt-4">
            <p class="font-extrabold ">Praktik Mandiri Drh. Hendrik TS</p>
            <div class="p-2">
                <p>
                    No. Reg : <br>
                    Perumahan Pakuwon Asri, Jl. Sadewa No.3, Karangtengah Lor, Karangtengah, <br>
                    Kec. Kaliwungu, Kabupaten Kendal, Jawa Tengah 51372 <br>
                </p>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="mt-2 overflow-hidden bg-white rounded-lg shadow-md w-96">
                <div class="grid grid-cols-2 divide-x divide-[#036CA1] bg-[#EBEBEB] text-center text-[#036CA1] px-2 "
                    style="font-size: 0.85rem">
                    <!-- Kolom Kiri -->
                    <div class="font-bold">
                        <p class="p-2 border-b border-gray-400">Invoice Kepada</p>
                        <p class="p-2 border-b border-gray-400">No. Invoice</p>
                        <p class="p-2 border-b border-gray-400">Tanggal Invoice</p>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="">
                        <p class="p-2 border-b border-gray-400">{{ $checkup->patient->owner->name }}</p>
                        <p class="p-2 border-b border-gray-400">{{ $invoice->code }}</p>
                        <p class="p-2 border-b border-gray-400">
                            {{ \Carbon\Carbon::parse($invoice->created_at)->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative px-32 overflow-x-auto text-[#036CA1] py-4">
            <table class="w-full text-sm text-left rtl:text-right">
                <thead class="text-xs border-b border-[#036CA1]">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-s-lg">
                            Item
                        </th>
                        <th scope="col" class="px-6 py-3 text-right rounded-e-lg">
                            Harga
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checkup->servicesData() as $item)
                        <tr class="bg-white border-b border-gray-300 dark:bg-gray-800">
                            <th class="px-6 py-4 font-normal">
                                {{ $item['name'] }}
                            </th>
                            <td class="px-6 py-4 font-normal text-right">
                                Rp {{ $item['price'] * $item['days'] }}
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($checkup->drugsData() as $item)
                        <tr class="bg-white border-b border-gray-300 dark:bg-gray-800">
                            <th class="px-6 py-4 font-normal">
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-4 font-normal text-right">
                                Rp {{ $item->price * $item->amount }}
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>

        <div class="flex ">
            <div class="mt-2 ml-auto mr-32 w-96">
                <div class="grid grid-cols-2 text-center text-[#036CA1] px-2" style="font-size: 0.85rem">
                    <!-- Kolom Kiri -->
                    <div class="text-left">
                        <p class="p-2 border-t border-gray-300">Sub-Total</p>
                        <p class="p-2 border-b border-gray-300">Diskon</p>
                        <p class="p-2 border-b border-gray-300">Gratis Pelayanan</p>
                        <p class="p-2 font-bold border-b border-gray-300">Total</p>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="text-right">
                        <p class="p-2 border-t border-gray-300">Rp {{ $invoice->total() }}</p>
                        <p class="p-2 border-b border-gray-300">{{ $invoice->discount ?? 0 }}%</p>
                        <p class="p-2 border-b border-gray-300">{{ $invoice->free ? 'Ya' : 'Tidak' }}</p>
                        <p class="p-2 font-bold border-b border-gray-300">Rp
                            {{ $invoice->realTotal() }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col text-[#036CA1] mt-4 px-36 font-medium" style="font-size: 0.85rem">
            <p>Transaksi :</p>
            <p>- {{ \Carbon\Carbon::parse($invoice->paid)->isoFormat('d MMMM Y, hh:mm') }}</p>
            <p class="px-2">Pembayaran Rp {{ $invoice->realTotal() }} (Bank Trasfer)</p>
        </div>

    </div>
@endsection
@section('scripts')
