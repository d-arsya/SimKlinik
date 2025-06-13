@extends('layouts.layout-index')

<!-- Header -->
@section('title', 'Tabel Rawat Inap Pasien')
@section('desc')
    <p class="text-cadet font-medium me-[14px]">Jumlah Rawat Inap: <span class="text-[#252F4A]">{{ $patient }}</span></p>
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
            @if (auth()->user()->role == 'doctor')
                <th scope="col" class="px-6 py-3 text-center border-r border-gray-100">Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody class="font-medium">
        @foreach ($inpatient as $key => $item)
            <tr>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $key }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">
                    {{ \Carbon\Carbon::parse($item->created_at)->isoFormat('D MMMM') }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->patient->record }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">
                    <div>
                        <p class="font-semibold">{{ $item->patient->name }}</p>
                        <p>{{ $item->patient->animal->name }}</p>
                    </div>z
                </td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->patient->owner->name }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->patient->calcAge() }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->patient->owner->phone }}</td>
                @if (in_array(auth()->user()->role, ['doctor', 'admin']))
                    <td class="px-6 py-3 border-b border-gray-200">
                        <div class="flex justify-center items-center gap-2 h-10">
                            <a
                                href="{{ route('patient.diagnose.show', ['patient' => $item->patient->id, 'diagnose' => $item->id]) }}">
                                <x-icons.detail-button />
                            </a>
                            <form action="{{ route('inpatient.update', $item->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="selesai" value="1">
                                <button
                                    class="font-bold text-md py-4 px-3 mt-2 rounded-md text-white bg-primary flex items-center justify-center h-9">
                                    Selesai Rawat Inap
                                </button>
                            </form>
                @endif
                </div>
                </td>
            </tr>
        @endforeach
    </tbody>
@endsection

@section('pagination')
    <div class="flex items-center justify-between mx-4 my-2 text-sm text-gray-700">
        <!-- Rows Per Page Selector -->
        <select id="rowsPerPage" onchange="changeRowsPerPage()"
            class="p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option {{ request('unit') == 10 ? 'selected' : '' }} value="10">10</option>
            <option {{ request('unit') == 25 ? 'selected' : '' }} value="25">25</option>
            <option {{ request('unit') == 50 ? 'selected' : '' }} value="50">50</option>
        </select>
        {{ $inpatient->appends(request()->query())->links() }}
    </div>
@endsection
