@extends('layouts.layout-index')

<!-- Header -->
@section('title', 'Tabel Daftar Pasien')
@section('desc')
    <p class="text-cadet font-medium me-[14px]">Jumlah Pasien: <span class="text-[#252F4A]">49,053</span></p>
    <p class="text-cadet font-medium">Jumlah Dokter: <span class="text-[#252F4A]">724</span></p>
@endsection

@section('search')

@endsection

<!-- Table -->
@section('table')
        <thead class="border-y border-gray-200 bg-[#FCFCFC]">
            <tr>
                <th scope="col" class="px-6 py-3 border-r border-gray-200">No. </th>
                <th scope="col" class="px-6 py-3 border-r border-gray-200">No. RM</th>
                <th scope="col" class="px-6 py-3 border-r border-gray-200">Nama</th>
                <th scope="col" class="px-6 py-3 border-r border-gray-200">Owner</th>
                <th scope="col" class="px-6 py-3 border-r border-gray-200">Umur</th>
                <th scope="col" class="px-6 py-3 border-r border-gray-200">No. Telp</th>
                <th scope="col" class="px-6 py-3 text-center border-r border-gray-100">Aksi</th>
            </tr>
        </thead>
        <tbody class="font-medium">
            @foreach ($patients as $item)
                <tr>
                    <td class="px-6 py-3 border-b border-r border-gray-200">{{ $loop->iteration }}</td>
                    <td class="px-6 py-3 border-b border-r border-gray-200 ">{{ $item->record }}</td>
                    <td class="px-6 py-3 border-b border-r border-gray-200 ">
                        <div>
                            <p class="font-semibold">{{ $item->name }}</a>
                            <p>{{ $item->animal->name }}</p>
                        </div>
                    </td>
                    <td class="px-6 py-3 border-b border-r border-gray-200">
                        <a href="{{ route('owner.show', $item->owner->id) }}">
                            {{ $item->owner->name }}
                        </a>
                    </td>
                    <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->calcAge() }}</td>
                    <td class="px-6 py-3 border-b border-r border-gray-200">{{ $item->owner->phone }}</td>
                    <td class="px-6 py-3 border-b border-gray-200">
                        <div class="flex justify-center items-center gap-2 h-10">
                            <a href="{{ route('patient.show', $item->id) }}">
                                <x-icons.view />
                            </a>
                        </div>
                    </td>
                </tr>
        </tbody>
        @endforeach
    </table>
@endsection

@section('pagination')
    <div class="flex items-center justify-between mx-4 my-2 text-sm text-gray-700">
        <!-- Rows Per Page Selector -->
        <select id="rowsPerPage" onchange="changeRowsPerPage()"
            class="p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 ">
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
@endsection
