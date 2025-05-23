@extends('layouts.layout-index')

<!-- Header -->
@section('title', 'Tabel Rawat Inap Pasien')
@section('desc')
    <p class="text-cadet font-medium me-[14px]">Jumlah Pasien: <span class="text-[#252F4A]">49,053</span></p>
    <p class="text-cadet font-medium">Jumlah Dokter: <span class="text-[#252F4A]">724</span></p>
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
                @if (auth()->user()->role == 'doctor')
                    <td class="px-6 py-3 border-b border-gray-200">
                        <div class="flex justify-center items-center gap-2 h-10">
                            <div class="h-10 mt-2">
                                @include('components.modal-inpatient', [
                                    'title' => 'Rawat Inap',
                                ])
                            </div>
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
