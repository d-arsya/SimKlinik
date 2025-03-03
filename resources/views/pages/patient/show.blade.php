@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <div class="flex justify-between mb-7">
        <div class="flex items-center space-x-5">
            <img class="w-[100px] h-[100px]" src="img/img-detail-hewan.png" alt="detail-hewan">
            <div class="space-y-1">
                <div class="font-semibold text-lg">{{ $patient->name }}</div>
                <div class="flex items-center gap-2 font-medium text-txtgray text-base">
                    <x-icons.record></x-icons.record>
                    Nomor Rekam Medis : {{ $patient->record }}
                </div>
            </div>
        </div>
    </div>
    <div class="mb-7 border-2 rounded-xl">
        <div class="flex justify-between px-[30px] border-b-2">
            <h2 class="text-lg py-3 font-medium">About</h2>
            <a href="{{ route('patient.edit', $patient->id) }}" class="self-center px-4 h-[30px]">Edit</a>
        </div>
        <div class="p-[30px] flex justify-start items-center">
            <div class="grid grid-cols-2 gap-7 text-sm">
                <div class="space-y-4 text-txtgray">
                    <div>Nama:</div>
                    <div>Umur:</div>
                    <div>Gender:</div>
                    <div>Jenis Hewan:</div>
                    <div>Ras Hewan:</div>
                    <div>Warna:</div>
                    <div>Owner:</div>
                    <div>Vaksinasi:</div>
                </div>
                <div class="space-y-4 text-txtblack">
                    <div>{{ $patient->name }}</div>
                    <div>{{ $patient->calcAge() }}</div>
                    <div>{{ $patient->gender }}</div>
                    <div>{{ $patient->animal->name }}</div>
                    <div>{{ $patient->type->name }}</div>
                    <div>{{ $patient->color->name }}</div>
                    <div class="text-klinikBlue underline"><a href="#">{{ $patient->owner->name }}</a></div>
                    <div>{{ $patient->vaccine->name }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- History Pemeriksaan -->
    <div>
        <div class="font-semibold text-base my-3">Histori Pemeriksaan</div>
        <table>
            <thead class="text-gray-500 bg-gray-100 border-b border-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center border-r border-gray-100" style="font-size: 0.81rem">
                        <div class="flex items-center">
                            No.
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="flex items-center px-6 py-3 text-center border-r border-gray-100"
                        style="font-size: 0.81rem">
                        <div class="flex items-center">
                            Tanggal
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-100" style="font-size: 0.81rem">Anamnesa</th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-100" style="font-size: 0.81rem">Obat</th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-100" style="font-size: 0.81rem">Diagnosa</th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-100" style="font-size: 0.81rem">Invoice</th>
                    <th scope="col" class="px-6 py-3 border-r border-gray-100" style="font-size: 0.81rem">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white font-semibold text-sm">
                @foreach ($patient->checkups as $item)
                    <tr class=" border-b bg-bgRawat">
                        <td class="px-6 py-4 border-r text-txtgray">
                            1
                        </td>
                        <td class="px-6 py-4 border-r">
                            {{ \Carbon\Carbon::parse($item->created_at)->format('d/M/Y') }}
                        </td>
                        <td class="px-6 py-4 border-r ">
                            {{ $item->anamnesis }}
                        </td>
                        <td class="px-6 py-4 border-r">
                            @foreach ($item->drugsData() as $drug)
                                {{ $drug->name }} -
                            @endforeach
                        </td>
                        <td class="px-6 py-4 border-r">
                            @foreach ($item->diagnosesData() as $diagnose)
                                {{ $diagnose['name'] }} -
                            @endforeach
                        </td>
                        <td class="px-6 py-4 border-r">
                            <a href="{{ route('invoice.show', $item->invoice->id) }}" color="blue"
                                class="inline-flex items-center w-[34.78px] h-8 px-2 py-2 mb-2 text-sm font-medium text-white transition-all duration-200 ease-in-out transform bg-[#036CA1] rounded-lg shadow-lg focus:outline-none hover:bg-[#036CA1]-700 hover:scale-105 hover:shadow-xl dark:focus:ring-blue-900">
                                <x-icons.invoice />
                            </a>
                        </td>
                        <td class="px-6 py-4 border-r">
                            <a href="{{ route('patient.diagnose.show', ['patient' => $patient->id, 'diagnose' => $item->id]) }}"
                                color="blue"
                                class="inline-flex items-center w-[34.78px] h-8 px-2 py-2 mb-2 text-sm font-medium text-white transition-all duration-200 ease-in-out transform bg-[#036CA1] rounded-lg shadow-lg focus:outline-none hover:bg-[#036CA1]-700 hover:scale-105 hover:shadow-xl">
                                <x-icons.detail-icon />
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
