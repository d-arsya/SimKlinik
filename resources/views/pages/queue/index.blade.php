@extends('layouts.layout-index')

<!-- Header -->
@section('title', 'Tabel Antrian Pasien')
@section('desc')
    <p class="text-cadet font-medium me-[14px]">Jumlah Pasien: <span class="text-[#252F4A]">49,053</span></p>
    <p class="text-cadet font-medium">Jumlah Dokter: <span class="text-[#252F4A]">724</span></p>
@endsection

@section('buttons')
    <!-- Tombol Modal -->
    @include('components.modal-add-queue.old-patient', [
        'buttonText' => 'Pasien Lama',
        'title' => 'Pemilik Hewan Peliharaan Baru',
    ])
    @include('components.modal-add-queue.new-patient.new-patient', [
        'buttonText' => 'Pasien Baru',
        'title' => 'Pemilik Hewan Peliharaan Baru',
    ])

@endsection

<!-- Table -->
@section('table')
    <thead class="border-y border-gray-200 bg-[#FCFCFC]">
        <tr>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">No.</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">No. RM</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Pasien</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Owner Pasien</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Umur</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">No. Telp</th>
            @if (auth()->user()->role != 'doctor')
                <th scope="col" class="px-6 py-3 font-semibold border-r border-gray-200">Status</th>
            @endif
            <th scope="col" class="px-6 py-3 font-semibold border-r border-gray-100 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody class="font-medium">
        @foreach ($queues as $item)
            <tr>
                <td class="px-6 py-3 border-b border-r border-gray-200 text-center">{{ $loop->iteration }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->patient->record }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">
                    <div>
                        <p class="font-semibold">{{ $item->patient->name }}</p>
                        <p>{{ $item->patient->animal->name }}</p>
                    </div>
                </td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->patient->owner->name }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->patient->calcAge() }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->patient->owner->phone }}</td>

                @if (auth()->user()->role != 'doctor')
                    <td class="px-6 py-3 border-b border-r border-gray-200 text-center">
                        @if ($item->status == 'diperiksa')
                            <x-icons.checking />
                        @else
                            <x-icons.waiting />
                        @endif
                    </td>
                @endif

                <td class="px-6 py-3 border-b border-gray-200 text-center">
                    <div class="flex justify-center items-center gap-2">
                        @if (auth()->user()->role == 'doctor')
                            <a href="{{ route('queue.edit', 1) }}">
                                <x-icons.stethoscope2 />
                            </a>
                        @endif

                        <x-icons.view />
                    </div>
                </td>
            </tr>
        @endforeach
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

        </div>
    @endsection
