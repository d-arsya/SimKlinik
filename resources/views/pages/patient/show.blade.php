@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <div class="flex justify-between mb-7">
        <div class="flex items-center space-x-5">
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
                    <div class="text-klinikBlue underline"><a
                            href="{{ route('owner.show', $patient->owner->id) }}">{{ $patient->owner->name }}</a></div>
                    <div>{{ $patient->vaccine }}</div>
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
                        </div>
                    </th>
                    <th scope="col" class="flex items-center px-6 py-3 text-center border-r border-gray-100"
                        style="font-size: 0.81rem">
                        <div class="flex items-center">
                            Tanggal
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
                @foreach ($patient->checkups as $number => $item)
                    <tr class=" border-b bg-bgRawat">
                        <td class="px-6 py-4 border-r text-txtgray">
                            {{ $number + 1 }}
                        </td>
                        <td class="px-6 py-4 border-r">
                            {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
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
