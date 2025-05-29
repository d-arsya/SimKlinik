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
