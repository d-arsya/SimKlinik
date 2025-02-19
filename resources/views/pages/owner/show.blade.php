@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <div class="flex justify-between mb-7">
        <div class="flex items-center space-x-5">
            <img class="w-[100px] h-[100px]" src="img/detail-owner-img.png" alt="detail-owner">
            <div class="space-y-1">
                <div class="font-semibold text-lg">Andi</div>
            </div>
        </div>
    </div>
    <div class="mb-7 border-2 rounded-xl">
        <div class="flex justify-between px-[30px] border-b-2">
            <h2 class="text-lg py-3 font-medium">About</h2>
            <a href="{{ route('owner.edit', 1) }}" color="blue" class="self-center px-4 h-[30px]">Edit</a>
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
                    <div>Andi</div>
                    <div>Laki-laki</div>
                    <div>081212292928</div>
                    <div>Kaliurang St No.Km 15.5, Kledokan, Umbulmartani, Ngemplak, Sleman Regency, Special Region of
                        Yogyakarta 55582</div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="flex justify-between">
            <div class="font-semibold text-base my-3">Histori Pemeriksaan</div>
            <a href="#" color="blue" class="me-7">Tambah Pasien</a>
        </div>
        <x-table>
            <thead class="text-xs text-gray-700 bg-gray-50">
                <tr>
                    <th scope="col" class="px-5 py-3 border-b">
                        <div class="flex items-center">
                            No.
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-5 py-3 border">
                        <div class="flex items-center">
                            Nama Pasien
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-5 py-3 border">
                        <div class="flex items-center">
                            Umur
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-5 py-3 border">
                        <div class="flex items-center">
                            Ras Pasien
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="px-5 py-3 border">
                        <div class="flex items-center">
                            Aksi
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white">
                    <td class="px-5 py-4 border-y">
                        1
                    </td>
                    <td class="px-5 py-4 border">
                        <div>
                            <a href="#" class="text-klinikBlue underline font-bold">Guguk</a>
                            <p class="text-[#4B5675]">Anjing</p>
                        </div>
                    </td>
                    <td class="px-5 py-4 border">
                        2 Tahun
                    </td>
                    <td class="px-5 py-4 border">
                        Pomeranian
                    </td>
                    <td class="px-5 py-4 border">
                        <button data-modal-target="pemeriksaan-baru" data-modal-toggle="pemeriksaan-baru" type="button"
                            color="blue">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.1096 6.03197L9.84193 6.05556L9.81834 -0.212069C9.81715 -0.332897 9.76838 -0.448386 9.68262 -0.533506C9.59686 -0.618627 9.481 -0.666519 9.36017 -0.6668L6.39938 -0.655656C6.27833 -0.655182 6.16242 -0.60665 6.07715 -0.520731C5.99187 -0.434811 5.94421 -0.318541 5.94465 -0.197488L5.96824 6.07014L-0.299388 6.09373C-0.42044 6.0942 -0.536348 6.14274 -0.621623 6.22865C-0.706897 6.31457 -0.754556 6.43084 -0.754119 6.5519L-0.742975 9.51269C-0.742501 9.63374 -0.693968 9.74965 -0.608049 9.83492C-0.52213 9.9202 -0.40586 9.96785 -0.284808 9.96742L5.98282 9.94383L6.00641 16.2115C6.00688 16.3325 6.05542 16.4484 6.14134 16.5337C6.22726 16.619 6.34352 16.6666 6.46458 16.6662L9.42537 16.655C9.54642 16.6546 9.66233 16.606 9.7476 16.5201C9.83288 16.4342 9.88054 16.3179 9.8801 16.1969L9.85651 9.92925L16.1241 9.90566C16.2452 9.90518 16.3611 9.85665 16.4464 9.77073C16.5316 9.68481 16.5793 9.56854 16.5789 9.44749L16.5677 6.4867C16.5672 6.36565 16.5187 6.24974 16.4328 6.16447C16.3469 6.07919 16.2306 6.03153 16.1096 6.03197Z"
                                    fill="#F8F8F8" />
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="bg-white">
                    <td class="px-5 py-4 border-y">
                        2
                    </td>
                    <td class="px-5 py-4 border">
                        <div>
                            <a href="#" class="text-klinikBlue underline font-bold">Blacky</a>
                            <p class="text-[#4B5675]">Anjing</p>
                        </div>
                    </td>
                    <td class="px-5 py-4 border">
                        2 Tahun
                    </td>
                    <td class="px-5 py-4 border">
                        Pomeranian
                    </td>
                    <td class="px-5 py-4 border">
                        <button type="button" color="blue">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.1096 6.03197L9.84193 6.05556L9.81834 -0.212069C9.81715 -0.332897 9.76838 -0.448386 9.68262 -0.533506C9.59686 -0.618627 9.481 -0.666519 9.36017 -0.6668L6.39938 -0.655656C6.27833 -0.655182 6.16242 -0.60665 6.07715 -0.520731C5.99187 -0.434811 5.94421 -0.318541 5.94465 -0.197488L5.96824 6.07014L-0.299388 6.09373C-0.42044 6.0942 -0.536348 6.14274 -0.621623 6.22865C-0.706897 6.31457 -0.754556 6.43084 -0.754119 6.5519L-0.742975 9.51269C-0.742501 9.63374 -0.693968 9.74965 -0.608049 9.83492C-0.52213 9.9202 -0.40586 9.96785 -0.284808 9.96742L5.98282 9.94383L6.00641 16.2115C6.00688 16.3325 6.05542 16.4484 6.14134 16.5337C6.22726 16.619 6.34352 16.6666 6.46458 16.6662L9.42537 16.655C9.54642 16.6546 9.66233 16.606 9.7476 16.5201C9.83288 16.4342 9.88054 16.3179 9.8801 16.1969L9.85651 9.92925L16.1241 9.90566C16.2452 9.90518 16.3611 9.85665 16.4464 9.77073C16.5316 9.68481 16.5793 9.56854 16.5789 9.44749L16.5677 6.4867C16.5672 6.36565 16.5187 6.24974 16.4328 6.16447C16.3469 6.07919 16.2306 6.03153 16.1096 6.03197Z"
                                    fill="#F8F8F8" />
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="bg-white">
                    <td class="px-5 py-4 border-y">
                        3
                    </td>
                    <td class="px-5 py-4 border">
                        <div>
                            <a href="#" class="text-klinikBlue underline font-bold">Anjingan</a>
                            <p class="text-[#4B5675]">Anjing</p>
                        </div>
                    </td>
                    <td class="px-5 py-4 border">
                        2 Tahun
                    </td>
                    <td class="px-5 py-4 border">
                        Pomeranian
                    </td>
                    <td class="px-5 py-4 border">
                        <button>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.1096 6.03197L9.84193 6.05556L9.81834 -0.212069C9.81715 -0.332897 9.76838 -0.448386 9.68262 -0.533506C9.59686 -0.618627 9.481 -0.666519 9.36017 -0.6668L6.39938 -0.655656C6.27833 -0.655182 6.16242 -0.60665 6.07715 -0.520731C5.99187 -0.434811 5.94421 -0.318541 5.94465 -0.197488L5.96824 6.07014L-0.299388 6.09373C-0.42044 6.0942 -0.536348 6.14274 -0.621623 6.22865C-0.706897 6.31457 -0.754556 6.43084 -0.754119 6.5519L-0.742975 9.51269C-0.742501 9.63374 -0.693968 9.74965 -0.608049 9.83492C-0.52213 9.9202 -0.40586 9.96785 -0.284808 9.96742L5.98282 9.94383L6.00641 16.2115C6.00688 16.3325 6.05542 16.4484 6.14134 16.5337C6.22726 16.619 6.34352 16.6666 6.46458 16.6662L9.42537 16.655C9.54642 16.6546 9.66233 16.606 9.7476 16.5201C9.83288 16.4342 9.88054 16.3179 9.8801 16.1969L9.85651 9.92925L16.1241 9.90566C16.2452 9.90518 16.3611 9.85665 16.4464 9.77073C16.5316 9.68481 16.5793 9.56854 16.5789 9.44749L16.5677 6.4867C16.5672 6.36565 16.5187 6.24974 16.4328 6.16447C16.3469 6.07919 16.2306 6.03153 16.1096 6.03197Z"
                                    fill="#F8F8F8" />
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="bg-white">
                    <td class="px-5 py-4 border-y">
                        4
                    </td>
                    <td class="px-5 py-4 border">
                        <div>
                            <a href="#" class="text-klinikBlue underline font-bold">Afganjing</a>
                            <p class="text-[#4B5675]">Anjing</p>
                        </div>
                    </td>
                    <td class="px-5 py-4 border">
                        2 Tahun
                    </td>
                    <td class="px-5 py-4 border">
                        Pomeranian
                    </td>
                    <td class="px-5 py-4 border">
                        <button>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.1096 6.03197L9.84193 6.05556L9.81834 -0.212069C9.81715 -0.332897 9.76838 -0.448386 9.68262 -0.533506C9.59686 -0.618627 9.481 -0.666519 9.36017 -0.6668L6.39938 -0.655656C6.27833 -0.655182 6.16242 -0.60665 6.07715 -0.520731C5.99187 -0.434811 5.94421 -0.318541 5.94465 -0.197488L5.96824 6.07014L-0.299388 6.09373C-0.42044 6.0942 -0.536348 6.14274 -0.621623 6.22865C-0.706897 6.31457 -0.754556 6.43084 -0.754119 6.5519L-0.742975 9.51269C-0.742501 9.63374 -0.693968 9.74965 -0.608049 9.83492C-0.52213 9.9202 -0.40586 9.96785 -0.284808 9.96742L5.98282 9.94383L6.00641 16.2115C6.00688 16.3325 6.05542 16.4484 6.14134 16.5337C6.22726 16.619 6.34352 16.6666 6.46458 16.6662L9.42537 16.655C9.54642 16.6546 9.66233 16.606 9.7476 16.5201C9.83288 16.4342 9.88054 16.3179 9.8801 16.1969L9.85651 9.92925L16.1241 9.90566C16.2452 9.90518 16.3611 9.85665 16.4464 9.77073C16.5316 9.68481 16.5793 9.56854 16.5789 9.44749L16.5677 6.4867C16.5672 6.36565 16.5187 6.24974 16.4328 6.16447C16.3469 6.07919 16.2306 6.03153 16.1096 6.03197Z"
                                    fill="#F8F8F8" />
                            </svg>
                        </button>
                    </td>
                </tr>
                <tr class="bg-white">
                    <td class="px-5 py-4 border-y">
                        5
                    </td>
                    <td class="px-5 py-4 border">
                        <div>
                            <a href="#" class="text-klinikBlue underline font-bold">Livi</a>
                            <p class="text-[#4B5675]">Kucing</p>
                        </div>
                    </td>
                    <td class="px-5 py-4 border">
                        2 Tahun
                    </td>
                    <td class="px-5 py-4 border">
                        Pomeranian
                    </td>
                    <td class="px-5 py-4 border">
                        <button>
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.1096 6.03197L9.84193 6.05556L9.81834 -0.212069C9.81715 -0.332897 9.76838 -0.448386 9.68262 -0.533506C9.59686 -0.618627 9.481 -0.666519 9.36017 -0.6668L6.39938 -0.655656C6.27833 -0.655182 6.16242 -0.60665 6.07715 -0.520731C5.99187 -0.434811 5.94421 -0.318541 5.94465 -0.197488L5.96824 6.07014L-0.299388 6.09373C-0.42044 6.0942 -0.536348 6.14274 -0.621623 6.22865C-0.706897 6.31457 -0.754556 6.43084 -0.754119 6.5519L-0.742975 9.51269C-0.742501 9.63374 -0.693968 9.74965 -0.608049 9.83492C-0.52213 9.9202 -0.40586 9.96785 -0.284808 9.96742L5.98282 9.94383L6.00641 16.2115C6.00688 16.3325 6.05542 16.4484 6.14134 16.5337C6.22726 16.619 6.34352 16.6666 6.46458 16.6662L9.42537 16.655C9.54642 16.6546 9.66233 16.606 9.7476 16.5201C9.83288 16.4342 9.88054 16.3179 9.8801 16.1969L9.85651 9.92925L16.1241 9.90566C16.2452 9.90518 16.3611 9.85665 16.4464 9.77073C16.5316 9.68481 16.5793 9.56854 16.5789 9.44749L16.5677 6.4867C16.5672 6.36565 16.5187 6.24974 16.4328 6.16447C16.3469 6.07919 16.2306 6.03153 16.1096 6.03197Z"
                                    fill="#F8F8F8" />
                            </svg>
                        </button>
                    </td>
                </tr>
            </tbody>
        </x-table>
    </div>
@endsection
@section('scripts')
