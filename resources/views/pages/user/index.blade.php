@extends('layouts.layout-index')

<!-- Header -->
@section('title', 'Tabel Daftar Pengguna')

@section('buttons')
    <a href="{{ route('user.create') }}"
        class="font-bold text-md px-3 py-2 rounded-md text-white bg-primary flex items-center justify-center text-center h-9">
        Tambah Pengguna</a>
    <a href="#"
        class="font-bold text-md px-3 py-2 rounded-md text-primary bg-primary-filter flex items-center justify-center text-center h-9">
        Tambah Bulk</a>
@endsection

<!-- Table -->
@section('table')
    <thead class="border-y border-gray-200 bg-[#FCFCFC]">
        <tr>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">No.</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Username</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Nama</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Role</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Email</th>
            <th scope="col" class="px-6 py-3 font-semibold border-r border-gray-100 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody class="font-medium">
        <tr>
            @foreach ($users as $index => $item)
                <td class="px-6 py-3 border-b border-r border-gray-200 text-center">{{ $index +1 }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->code }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->name }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->role }}</td>
                <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->email }}</td>
                <td class="flex justify-center px-6 py-3 space-x-2 text-center border-b border-gray-200">
                    <a href="{{ route('user.edit', $item->id) }}">
                        <x-icons.edit />
                    </a>
                    <form id="delete-form-{{ $item->id }}" action="{{ route('user.destroy', $item->id) }}"
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

    @section('scripts')
