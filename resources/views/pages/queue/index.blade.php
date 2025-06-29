@extends('layouts.layout-index')

<!-- Header -->
@section('title', 'Tabel Antrian Pasien')
@section('desc')
    <p class="text-cadet font-medium me-[14px]">Jumlah Antrian: <span class="text-[#252F4A]">{{ $antrian }}</span></p>
@endsection

<!-- tambah antrean -->
@section('buttons')
    @if (auth()->user()->role === 'admin')
        <!-- Tombol Modal HANYA untuk admin dan superadmin -->
        @include('components.modal-add-queue.old-patient.old-patient', [
            'buttonText' => 'Pasien Lama',
            'title' => 'Pemilik Hewan Peliharaan Baru',
        ])
        @include('components.modal-add-queue.new-patient.new-patient', [
            'buttonText' => 'Pasien Baru',
            'title' => 'Pemilik Hewan Peliharaan Baru',
        ])
    @endif
@endsection

@section('search')
    <div class="relative w-full max-w-xs mx-2">
        <input type="text" id="tableSearch"
            class="w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
            placeholder="Cari pasien...">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <x-icons.search />
        </div>
    </div>
@endsection

<!-- Table -->
@section('table')
    <table class="min-w-full text-sm text-[#99A1B7]" id="dataTable">
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
            @foreach ($queues->sortBy('created_at') as $item)
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
                                <a href="{{ route('patient.diagnose.edit', [$item->patient->id, $item->id]) }}">
                                    <x-icons.stethoscope2 />
                                </a>
                            @else
                                @if ($item->status == 'diperiksa')
                                    @if ($item->invoice->paid)
                                        <a href="{{ route('invoice.show', [$item->invoice->id]) }}">
                                            <x-icons.invoice2 />
                                        </a>
                                    @else
                                        <a href="{{ route('invoice.edit', [$item->invoice->id]) }}">
                                            <x-icons.invoice2 />
                                        </a>
                                    @endif
                                    <a href="{{ route('patient.diagnose.show', [$item->patient->id, $item->id]) }}"
                                        color="blue"
                                        class="inline-flex items-center w-[34.78px] h-8 px-2 py-2 mb-2 text-sm font-medium text-white bg-[#036CA1] rounded-lg shadow-lg">
                                        <x-icons.detail-icon />
                                    </a>
                                @endif
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('pagination')
    <div class="flex items-center justify-between mx-4 my-2 text-sm text-gray-700">
        <!-- Rows Per Page Selector -->
        <select id="rowsPerPage" onchange="changeRowsPerPage()"
            class="p-2 text-sm text-gray-400 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
            <option {{ request('unit') == 10 ? 'selected' : '' }} value="10">10</option>
            <option {{ request('unit') == 25 ? 'selected' : '' }} value="25">25</option>
            <option {{ request('unit') == 50 ? 'selected' : '' }} value="50">50</option>
        </select>
        {{ $queues->appends(request()->query())->links() }}
    </div>
@endsection
