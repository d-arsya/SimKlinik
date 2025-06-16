@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <div class="flex justify-between mb-7">
        <div class="flex items-center space-x-5">
            <div class="space-y-1">
                <div class="font-semibold text-lg">{{ $owner->name }}</div>
            </div>
        </div>
    </div>
    <div class="mb-7 border-2 rounded-xl">
        <div class="flex justify-between px-[30px] border-b-2">
            <h2 class="text-lg py-3 font-medium">About</h2>
            <a href="{{ route('owner.edit', $owner->id) }}" color="blue" class="self-center px-4 h-[30px]">Edit</a>
        </div>
        <div class="p-[30px] justify-center items-start">
            <div class="flex gap-7 text-sm">
                <div class="space-y-4 text-txtgray">
                    <div>Nama:</div>
                    <div>Gender:</div>
                    <div>Nomor Telepon:</div>
                    <div>Alamat:</div>
                </div>
                <div class="space-y-4 text-txtblack">
                    <div>{{ $owner->name }}</div>
                    <div>{{ $owner->gender }}</div>
                    <div>{{ $owner->phone }}</div>
                    <div>{{ $owner->address }}</div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="flex justify-between">
            <div class="font-semibold text-base my-3">Histori Pemeriksaan</div>
            <a href="#" color="blue" class="me-7">Tambah Pasien</a>
        </div>
        <table>
            <thead class="text-xs text-gray-700 bg-gray-50">
                <tr>
                    <th scope="col" class="px-5 py-3 border">
                        <div class="flex items-center">
                            Tanggal
                        </div>
                    </th>
                    <th scope="col" class="px-5 py-3 border">
                        <div class="flex items-center">
                            Nama Pasien
                        </div>
                    </th>
                    <th scope="col" class="px-5 py-3 border">
                        <div class="flex items-center">
                            Diagnosa
                        </div>
                    </th>
                    <th scope="col" class="px-5 py-3 border">
                        <div class="flex items-center">
                            Aksi
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checkups as $item)
                    <tr>
                        <td class="px-5 py-3 border">{{ $item->created_at }}</td>
                        <td class="px-5 py-3 border">{{ $item->patient->name }}</td>
                        <td class="px-5 py-3 border">
                            @foreach ($item->diagnosesData() as $diagnose)
                                {{ $diagnose['name'] }} -
                            @endforeach
                        </td>
                        <td class="px-5 py-3 border flex justify-center items-center gap-x-2">
                            @if ($item->invoice)
                                @if ($item->invoice->paid)
                                    <a href="{{ route('invoice.show', $item->invoice->id) }}" color="blue"
                                        class="inline-flex items-center w-[34.78px] h-8 px-2 py-2 mb-2 text-sm font-medium text-white transition-all duration-200 ease-in-out transform bg-[#036CA1] rounded-lg shadow-lg focus:outline-none hover:bg-[#036CA1]-700 hover:scale-105 hover:shadow-xl dark:focus:ring-blue-900">
                                        <x-icons.invoice />
                                    </a>
                                @else
                                    <a href="{{ route('invoice.edit', $item->invoice->id) }}" color="blue"
                                        class="inline-flex items-center w-[34.78px] h-8 px-2 py-2 mb-2 text-sm font-medium text-white transition-all duration-200 ease-in-out transform bg-[#036CA1] rounded-lg shadow-lg focus:outline-none hover:bg-[#036CA1]-700 hover:scale-105 hover:shadow-xl dark:focus:ring-blue-900">
                                        <x-icons.invoice />
                                    </a>
                                @endif
                            @endif
                            <a href="{{ route('patient.diagnose.show', ['patient' => $item->patient->id, 'diagnose' => $item->id]) }}"
                                color="blue"
                                class="inline-flex items-center w-[34.78px] h-8 px-2 py-2 mb-2 text-sm font-medium text-white transition-all duration-200 ease-in-out transform bg-[#036CA1] rounded-lg shadow-lg focus:outline-none hover:bg-[#036CA1]-700 hover:scale-105 hover:shadow-xl">
                                <x-icons.detail-icon />
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $checkups->links() }}
    </div>
@endsection
@section('scripts')
