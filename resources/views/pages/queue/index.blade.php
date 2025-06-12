@extends('layouts.layout-index')

<!-- Header -->
@section('title', 'Tabel Antrian Pasien')
@section('desc')
    <p class="text-cadet font-medium me-[14px]">Jumlah Pasien: <span class="text-[#252F4A]">{{ $patient }}</span></p>
@endsection

@section('buttons')
    <!-- Tombol Modal -->
    @include('components.modal-add-queue.old-patient.old-patient', [
        'buttonText' => 'Pasien Lama',
        'title' => 'Pemilik Hewan Peliharaan Baru',
    ])
    @include('components.modal-add-queue.new-patient.new-patient', [
        'buttonText' => 'Pasien Baru',
        'title' => 'Pemilik Hewan Peliharaan Baru',
    ])

@endsection

@section('search')
<div class="relative w-full max-w-xs mx-2">
    <input type="text" id="tableSearch"
        class="w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
        placeholder="Cari pasien...">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <x-icons.search/>
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
<<<<<<< HEAD
                <th scope="col" class="px-6 py-3 font-semibold border-r border-gray-100 text-center">Aksi</th>
=======

                <td class="px-6 py-3 border-b border-gray-200 text-center">
                    <div class="flex justify-center items-center gap-2">
                        @if (auth()->user()->role == 'doctor')
                            <a href="{{ route('patient.diagnose.edit', [$item->patient->id, $item->id]) }}">
                                <x-icons.stethoscope2 />
                            </a>
                        @elseif($item->status == 'diperiksa')
                            <a href="{{ route('patient.diagnose.show', [$item->patient->id, $item->id]) }}">
                                <x-icons.view />
                            </a>
                        @endif

                    </div>
                </td>
>>>>>>> c7bdffc43bb6737a0b56dda566e6dec4263e7299
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
                            @endif

                  <x-icons.view />
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
            class="p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="10" selected>10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>

    </div>
@endsection
@section('scripts')
<script>
    document.getElementById('tableSearch').addEventListener('input', function () {
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

