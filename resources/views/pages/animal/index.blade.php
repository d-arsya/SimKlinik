@extends('layouts.layout-index')
@section('title', 'Tabel Jenis Hewan')

@section('buttons')
    <a href="{{ route('animal.create') }}"
        class="font-bold text-md px-3 py-2 rounded-md text-white bg-primary flex items-center justify-center text-center h-9">
        Tambah Jenis Hewan</a>
    <a href=""
        class="font-bold text-md px-3 py-2 rounded-md text-primary bg-primary-filter flex items-center justify-center text-center h-9">
        Tambah Bulk</a>
@endsection
@section('table')
    <thead class="border-y border-gray-200 bg-[#FCFCFC]">
        <tr>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">No.</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Kode Jenis Hewan</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Nama Jenis Hewan</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Pulsus</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Suhu</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Frekuensi Napas</th>
            <th scope="col" class="px-6 py-3 font-semibold border-r border-gray-100 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody class="font-medium">
        @foreach ($animals as $index => $item)
            <tr>
                <td class="px-6 py-3 border-b border-r border-gray-200 text-center">{{ $index + 1 }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->code }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->name }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->pulse }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->temperature }}°C</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->breath }} rpm</td>
                <td class="flex justify-center px-6 py-3 space-x-2 text-center border-b border-gray-200">
                    <a href="{{ route('animal.edit', $item->id) }}">
                        <x-icons.edit />
                    </a>
                    <form id="delete-form-{{ $item->id }}" action="{{ route('animal.destroy', $item->id) }}"
                        method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete({{ $item->id }})"
                            class="text-red-500 cursor-pointer">
                            <x-icons.delete />
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endsection

    @section('pagination')
        <div class="flex items-center justify-between mx-4 my-2 text-sm text-gray-700">
            <!-- Rows Per Page Selector -->
            <select id="rowsPerPage" onchange="changeRowsPerPage()"
                class="p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500     ">
                <option {{ request('unit') == 10 ? 'selected' : '' }} value="10">10</option>
                <option {{ request('unit') == 25 ? 'selected' : '' }} value="25">25</option>
                <option {{ request('unit') == 50 ? 'selected' : '' }} value="50">50</option>
            </select>
            {{ $animals->appends(request()->query())->links() }}
        </div>
    @endsection
