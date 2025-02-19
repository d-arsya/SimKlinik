@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <!-- Profile -->
    <div class="flex justify-between mb-7">
        <div class="flex items-center space-x-5">
            <img class="w-[100px] h-[100px]" src="img/img-detail-hewan.png" alt="detail-hewan">
            <div class="space-y-1">
                <div class="font-semibold text-lg">Guguk</div>
                <div class="flex items-center gap-2 font-medium text-txtgray text-base">
                    <svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.1"
                            d="M13.9605 3.5404C14.0018 3.44736 14.0124 3.34362 13.9908 3.24416C13.9692 3.1447 13.9166 3.05467 13.8405 2.98707L12.0605 1.18707C11.8611 0.983366 11.6089 0.839276 11.3322 0.770974C11.0554 0.702672 10.7651 0.712863 10.4939 0.800402C8.61387 1.46707 3.89387 1.22707 3.16053 0.627069C3.13017 0.604216 3.09643 0.586223 3.06053 0.573735C2.96631 0.532985 2.86172 0.522644 2.76134 0.544154C2.66096 0.565664 2.56979 0.617954 2.50053 0.693735L0.633866 2.46707C0.431456 2.66731 0.28825 2.91955 0.220024 3.19598C0.151799 3.47241 0.161202 3.76231 0.247199 4.03374C0.551992 5.13819 0.691287 6.28174 0.660533 7.42707C0.660533 9.9804 0.187199 11.2071 0.0938659 11.3337C0.0710129 11.3641 0.0530203 11.3978 0.0405327 11.4337C-0.000217892 11.528 -0.0105592 11.6326 0.0109509 11.7329C0.0324611 11.8333 0.0847512 11.9245 0.160533 11.9937L1.95387 13.7937C2.15265 13.9962 2.40373 14.1396 2.67915 14.2078C2.95457 14.2761 3.24352 14.2666 3.51387 14.1804C5.39387 13.5137 10.1139 13.7537 10.8472 14.3537C10.9365 14.4292 11.0503 14.4695 11.1672 14.4671C11.236 14.4671 11.3041 14.4529 11.3672 14.4253C11.4303 14.3978 11.4871 14.3575 11.5339 14.3071C11.5465 14.2903 11.5576 14.2724 11.5672 14.2537L13.3472 12.4937C13.5509 12.2943 13.695 12.0421 13.7633 11.7654C13.8316 11.4886 13.8214 11.1983 13.7339 10.9271C13.0672 9.04707 13.3072 4.32707 13.9072 3.59374C13.9268 3.57784 13.9446 3.55997 13.9605 3.5404ZM9.1272 9.61374C7.71767 9.46704 6.29673 9.46704 4.8872 9.61374C4.96461 8.88298 5.00244 8.14858 5.00053 7.41374C4.99987 6.72349 4.96427 6.03372 4.89387 5.34707C5.5932 5.43002 6.29637 5.47675 7.00053 5.48707C7.71096 5.48815 8.42091 5.45032 9.1272 5.37374C8.97816 6.78314 8.97816 8.20433 9.1272 9.61374Z"
                            fill="#99A1B7" />
                        <path
                            d="M13.9605 3.5404C14.0018 3.44736 14.0124 3.34362 13.9908 3.24416C13.9692 3.1447 13.9166 3.05467 13.8405 2.98707V2.98707L12.0605 1.18707C11.8611 0.983366 11.6089 0.839276 11.3322 0.770974C11.0554 0.702672 10.7651 0.712863 10.4939 0.800402C8.61386 1.46707 3.89387 1.22707 3.16053 0.627069C3.13016 0.604216 3.09643 0.586223 3.06053 0.573735V0.573735C2.96631 0.532985 2.86172 0.522644 2.76134 0.544154C2.66096 0.565664 2.56979 0.617954 2.50053 0.693735L0.633866 2.46707C0.431456 2.66731 0.288249 2.91955 0.220024 3.19598C0.151798 3.47241 0.161202 3.76231 0.247199 4.03374C0.551992 5.13819 0.691286 6.28174 0.660532 7.42707C0.660532 9.9804 0.187199 11.2071 0.0938656 11.3337C0.0710126 11.3641 0.0530199 11.3978 0.0405322 11.4337C0.0405322 11.4337 0.0405322 11.4337 0.0405322 11.4337C-0.000218302 11.528 -0.010559 11.6326 0.0109511 11.7329C0.0324612 11.8333 0.0847506 11.9245 0.160532 11.9937V11.9937L1.95387 13.7937C2.15265 13.9962 2.40373 14.1396 2.67915 14.2078C2.95456 14.2761 3.24352 14.2666 3.51387 14.1804C5.39387 13.5137 10.1139 13.7537 10.8472 14.3537C10.9365 14.4292 11.0503 14.4695 11.1672 14.4671C11.236 14.4671 11.3041 14.4529 11.3672 14.4253C11.4303 14.3978 11.4871 14.3575 11.5339 14.3071C11.5465 14.2903 11.5576 14.2724 11.5672 14.2537L13.3472 12.4937C13.5509 12.2943 13.695 12.0421 13.7633 11.7654C13.8316 11.4886 13.8214 11.1983 13.7339 10.9271C13.0672 9.04707 13.3072 4.32707 13.9072 3.59374C13.9268 3.57784 13.9446 3.55997 13.9605 3.5404V3.5404ZM10.8005 1.7004C10.8937 1.67217 10.9928 1.67031 11.087 1.69503C11.1811 1.71974 11.2666 1.77006 11.3339 1.8404L12.7605 3.28707L12.6872 3.3404L12.4339 3.48707L12.2405 3.58707L12.0805 3.65374C11.2969 3.97992 10.4746 4.20398 9.63386 4.3204H9.5872C8.72964 4.43213 7.86528 4.48336 7.00053 4.47374C6.25168 4.47381 5.50355 4.42706 4.76053 4.33374C4.76053 4.29374 4.76053 4.25374 4.76053 4.21374C4.7072 3.90707 4.6472 3.61374 4.5672 3.3204C4.5672 3.2004 4.51387 3.08707 4.48053 2.97374C4.4472 2.8604 4.38053 2.73374 4.33387 2.6204C4.2872 2.50707 4.23387 2.3204 4.17387 2.15374C4.11387 1.98707 4.1072 1.98707 4.0672 1.9004C6.30293 2.27749 8.59112 2.20953 10.8005 1.7004V1.7004ZM9.1272 9.61374C7.71767 9.46704 6.29673 9.46704 4.8872 9.61374C4.96461 8.88298 5.00244 8.14858 5.00053 7.41374C4.99987 6.72349 4.96427 6.03372 4.89387 5.34707C5.5932 5.43002 6.29637 5.47675 7.00053 5.48707C7.71096 5.48815 8.42091 5.45032 9.1272 5.37374C8.97816 6.78314 8.97816 8.20433 9.1272 9.61374V9.61374ZM1.33387 3.17374L2.8072 1.7204L2.8472 1.7804C2.91387 1.8804 2.98053 1.99374 3.04053 2.10707C3.05568 2.14174 3.07351 2.17517 3.09387 2.20707C3.25934 2.55048 3.39538 2.90732 3.50053 3.27374C3.50053 3.3204 3.50053 3.37374 3.50053 3.4204C3.5472 3.57374 3.58053 3.72707 3.62053 3.89374C3.66053 4.0604 3.62053 4.0404 3.6672 4.11374L3.7472 4.5604L3.82053 4.8204C3.94014 5.67289 3.99806 6.5329 3.99387 7.39374C4.00042 8.18226 3.95811 8.97044 3.8672 9.75374C3.4472 9.82707 3.04053 9.91374 2.65387 10.0204H2.62053C2.4272 10.0737 2.2472 10.1337 2.0672 10.1937H1.98053C1.79387 10.2604 1.61387 10.3337 1.4472 10.4071H1.40053C1.58842 9.42509 1.67776 8.4268 1.6672 7.42707C1.69717 6.17955 1.53986 4.93459 1.20053 3.73374C1.17141 3.63692 1.16841 3.53414 1.19182 3.43579C1.21524 3.33744 1.26424 3.24704 1.33387 3.17374V3.17374ZM3.20053 13.2737C3.10726 13.3005 3.0085 13.3016 2.91465 13.2769C2.8208 13.2523 2.73532 13.2028 2.6672 13.1337L1.23387 11.6871L1.32053 11.6337L1.4872 11.5337L1.6672 11.4871L1.8872 11.3871L2.02053 11.3271L2.29387 11.2271H2.3872C2.54053 11.1737 2.70053 11.1204 2.87387 11.0737L3.2072 10.9804H3.33387L3.75387 10.8204H3.81387L4.3872 10.7204C6.00258 10.4896 7.64158 10.4762 9.26053 10.6804C9.36364 11.2821 9.51297 11.875 9.7072 12.4537C9.70433 12.4803 9.70433 12.5071 9.7072 12.5337C9.75912 12.6901 9.8192 12.8437 9.8872 12.9937L9.9272 13.1004C7.69533 12.7161 5.40965 12.775 3.20053 13.2737V13.2737ZM12.6405 11.8204L11.2005 13.2537L11.1405 13.1604C11.1405 13.1137 11.0805 13.0671 11.0539 13.0137L10.9539 12.8137C10.9267 12.764 10.9022 12.7128 10.8805 12.6604C10.8405 12.5737 10.8005 12.4804 10.7672 12.3871L10.7205 12.2671C10.4786 11.5813 10.3045 10.8735 10.2005 10.1537V10.1537C9.96745 8.53419 9.95176 6.89077 10.1539 5.26707C10.7675 5.16579 11.3718 5.01416 11.9605 4.81374H12.0005C12.1939 4.74707 12.3939 4.67374 12.5739 4.59374C12.1983 6.83908 12.2708 9.13654 12.7872 11.3537C12.8035 11.4376 12.7986 11.5242 12.773 11.6057C12.7474 11.6872 12.7019 11.761 12.6405 11.8204Z"
                            fill="#99A1B7" />
                    </svg>
                    Nomor Rekam Medis : 1
                </div>
            </div>
        </div>
    </div>

    <!-- About -->
    <div class="mb-7 border-2 rounded-xl">
        <div class="flex justify-between px-[30px] border-b-2">
            <h2 class="text-lg py-3 font-medium">About</h2>
            <a href="{{ route('patient.edit', 1) }}" color="blue" class="self-center px-4 h-[30px]">Edit</a>
        </div>
        <div class="p-[30px] flex justify-start items-center">
            <div class="flex gap-7 text-sm">
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
                    <div>Guguk</div>
                    <div>5</div>
                    <div>Perempuan</div>
                    <div>Pomeranian</div>
                    <div>Pomeranian</div>
                    <div>Coklat</div>
                    <div class="text-klinikBlue underline"><a href="#">Andi</a></div>
                    <div>Rabies</div>
                </div>
            </div>
        </div>
    </div>

    <!-- History Pemeriksaan -->
    <div class="border-y py-3 space-y-5 mb-7">
        <div class="font-semibold text-base">History Pemeriksaan</div>
        <div class="font-medium text-lg py-6 ps-3 bg-bgRawat">8 Januari 2024</div>
        <div class="flex text-sm space-x-4 gap-7">
            <div class="text-txtgray space-y-4">
                <div>Berat Badan:</div>
                <div>Pulpus</div>
                <div>Frekuensi napas:</div>
                <div>Suhu:</div>
            </div>
            <div class="space-y-4">
                <div>10 kg</div>
                <div>70 bpm</div>
                <div>20 kali per menit</div>
                <div>40 derajat celcius</div>
            </div>
        </div>
        <div class="space-y-4">
            <div class="font-semibold text-base">Anamnesa</div>
            <div class="text-base">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a
                type specimen book. It has survived not only five centuries, but also the
                leap into electronic typesetting, remaining essentially unchanged.
            </div>
        </div>
    </div>

    <!-- Obat -->
    <div class="mb-7">
        <div class="flex justify-between items-center py-3">
            <div class="font-semibold text-base my-3">Obat</div>
            <a href="{{ route('patient.diagnose.edit', ['patient' => 1, 'diagnose' => 1, 'type' => 'drug']) }}"
                class="font-medium rounded-lg text-sm px-3 py-3 focus:outline-none bg-primary">Tambah
                Obat</a>
        </div>
        <table class="w-fit text-left rtl:text-right">
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
                    <th scope="col" class="items-center px-6 py-3 text-center border-r border-gray-100"
                        style="font-size: 0.81rem">
                        <div class="flex items-center">
                            Jenis Obat
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="items-center px-6 py-3 text-center border-r border-gray-100"
                        style="font-size: 0.81rem">
                        <div class="flex items-center">
                            Nama Obat
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                    <th scope="col" class="items-center px-6 py-3 text-center border-r border-gray-100"
                        style="font-size: 0.81rem">Jumlah Obat</th>
                    <th scope="col" class="items-center px-6 py-3 border-r border-gray-100" style="font-size: 0.81rem">
                        Catatan</th>
            </thead>
            <tbody class="bg-white font-semibold text-sm">
                <tr class=" border-b">
                    <td class="px-6 py-4 border-r text-txtgray text-center">
                        1
                    </td>
                    <td class="px-6 py-4 border-r">
                        Paracetamol
                    </td>
                    <td class="px-6 py-4 border-r">
                        Paracetamol A
                    </td>
                    <td class="px-6 py-4 border-r text-txtgray text-center">
                        1
                    </td>
                    <td class="px-6 py-4 border-r font-normal">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text
                        ever since the 1500s.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Diagnosis -->
    <div class="mb-7">
        <div class="flex justify-between items-center py-3">
            <div class="font-semibold text-base my-3">Diagnosis</div>
            <a href="{{ route('patient.diagnose.edit', ['patient' => 1, 'diagnose' => 1, 'type' => 'diagnose']) }}"
                class="font-medium rounded-lg text-sm px-3 py-3 focus:outline-none bg-primary">Tambah
                Diagnosis</a>
        </div>
        <table class="w-fit text-left rtl:text-right">
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
                    <th scope="col" class="items-center px-6 py-3 text-center border-r border-gray-100"
                        style="font-size: 0.81rem">
                        <div class="flex items-center">
                            Diagnosa
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white font-semibold text-sm">
                <tr class=" border-b">
                    <td class="px-6 py-4 border-r text-txtgray text-center">
                        1
                    </td>
                    <td class="px-6 py-4 border-r">
                        DBD
                    </td>
                </tr>
                <tr class=" border-b">
                    <td class="px-6 py-4 border-r text-txtgray text-center">
                        2
                    </td>
                    <td class="px-6 py-4 border-r">
                        Keracunan
                    </td>
                </tr>
                <tr class=" border-b">
                    <td class="px-6 py-4 border-r text-txtgray text-center">
                        3
                    </td>
                    <td class="px-6 py-4 border-r">
                        Masuk Angin
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Servis -->
    <div>
        <div class="flex justify-between items-center py-3">
            <div class="font-semibold text-base my-3">Layanan</div>
            <a href="{{ route('patient.diagnose.edit', ['patient' => 1, 'diagnose' => 1, 'type' => 'service']) }}"
                class="font-medium rounded-lg text-sm px-3 py-3 focus:outline-none bg-primary">Tambah
                Layanan</a>
        </div>
        <table class="w-fit text-left rtl:text-right">
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
                    <th scope="col" class="items-center px-6 py-3 text-center border-r border-gray-100"
                        style="font-size: 0.81rem">
                        <div class="flex items-center">
                            Jenis Servis
                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                </svg></a>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white font-semibold text-sm">
                <tr class=" border-b">
                    <td class="px-6 py-4 border-r text-txtgray text-center">
                        1
                    </td>
                    <td class="px-6 py-4 border-r">
                        Rawat Inap
                    </td>
                </tr>
                <tr class=" border-b">
                    <td class="px-6 py-4 border-r text-txtgray text-center">
                        2
                    </td>
                    <td class="px-6 py-4 border-r">
                        Rawat Inap
                    </td>
                </tr>
                <tr class=" border-b">
                    <td class="px-6 py-4 border-r text-txtgray text-center">
                        3
                    </td>
                    <td class="px-6 py-4 border-r">
                        Rawat Inap
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <a href="" class="font-medium rounded-lg text-sm px-3 py-3 focus:outline-none bg-primary float-end">Selesai
        Rawat
        Inap</a>
    </div>
@endsection
@section('scripts')
