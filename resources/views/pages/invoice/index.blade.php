@extends('layouts.layout-index')

<!-- Header -->
@section('title', 'Tabel Ivoice Pasien')
@section('desc')
    <p class="text-cadet font-medium me-[14px]">Jumlah Pasien: <span class="text-[#252F4A]">{{ $patient }}</span></p>
@endsection

<!-- Table -->
@section('table')
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
        @foreach ($invoices as $item)
            <tr>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->code }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200 ">
                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/y') }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200 ">{{ $item->checkup->patient->record }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200 ">
                    <div>
                        <p class="font-semibold">{{ $item->checkup->patient->name }}</a>
                        <p>{{ $item->checkup->patient->animal->name }}</p>
                    </div>
                </td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->checkup->patient->owner->name }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->checkup->patient->owner->phone }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">
                    Rp {{ $item->total() }}
                </td>
                <td class="px-6 py-3 border-b border-r border-gray-200">
                    <div class="flex items-center">
                        @if ($item->paid)
                            <x-icons.paid class="w-5 h-5" />
                        @else
                            <x-icons.nopaidd class="w-5 h-5" />
                        @endif
                    </div>
                </td>
                <td class="px-6 py-3 border-b border-gray-200    ">
                    @if ($item->paid)
                        <a href="{{ route('invoice.show', $item->id) }}" class="flex justify-center items-center">
                            <x-icons.invoice2 class="w-5 h-5" />
                        </a>
                    @else
                        <a href="{{ route('invoice.edit', $item->id) }}" class="flex justify-center items-center">
                            <x-icons.invoice2 class="w-5 h-5" />
                        </a>
                    @endif
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
        {{ $invoices->appends(request()->query())->links() }}
    </div>
@endsection
