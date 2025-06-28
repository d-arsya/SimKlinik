@extends('layouts.layout-index')

<!-- Header -->
@section('title', 'Tabel Daftar Pasien')
@section('desc')
    <p class="text-cadet font-medium me-[14px]">Jumlah Pasien: <span class="text-[#252F4A]">{{ $patient }}</span></p>
@endsection

@section('search')

@endsection

@section('sortir')
    <x-icons.filter />
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
            class="p-2 text-sm text-gray-400 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
            <option {{ request('unit') == 10 ? 'selected' : '' }} value="10">10</option>
            <option {{ request('unit') == 25 ? 'selected' : '' }} value="25">25</option>
            <option {{ request('unit') == 50 ? 'selected' : '' }} value="50">50</option>
        </select>
        {{ $patients->appends(request()->query())->links() }}
    </div>
@endsection

@section('scripts')
@endsection
