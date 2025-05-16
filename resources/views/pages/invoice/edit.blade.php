@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <div class="flex justify-between mb-[20px]">
        <h3 class="text-sm text-cadet font-semibold">{{ $invoice->code }}</h3>
    </div>
    <div class="flex justify-between mb-[20px]">
        <div class="space-y-[40px]">
            <div class="flex justify-start space-x-[87px] mt-7">
                <div>
                    <p class="text-[11px] text-cadet">Kepada:</p>
                    <div class="text-lg font-semibold text-primary">{{ $checkup->patient->owner->name }}</div>
                    <div class="text-[11px] font-semibold text-cadet">{{ $checkup->patient->owner->phone }}</div>
                </div>
                <div>
                    <p class="text-[11px] text-cadet">Pasien:</p>
                    <div class="text-lg font-semibold text-primary">{{ $checkup->patient->name }}</div>
                    <div class="text-[11px] font-semibold text-cadet">{{ $checkup->patient->animal->name }}</div>
                    <div class="text-[11px] font-semibold text-cadet">No. RM : {{ $checkup->patient->record }}</div>
                </div>
            </div>

            <div class="relative overflow-x-auto">
                <p class="text-[11px] font-medium text-cadet ps-6">List Pembayaran</p>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs bg-white border-b text-cadet">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga Total
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b font-semibold text-sm text-[#252F4A]"">
                            <td class="px-6 py-4 text-center" colspan="4">Layanan</td>
                        </tr>
                        @foreach ($checkup->servicesData() as $item)
                            <tr class="bg-white border-b font-semibold text-sm text-[#252F4A]">
                                <th scope="row" class="px-6 py-4">
                                    {{ $item['name'] }}
                                </th>
                                <td class="px-6 py-4">
                                    Rp {{ $item['price'] }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item['days'] }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp {{ $item['days'] * $item['price'] }}
                                </td>
                            </tr>
                        @endforeach
                        <tr class="bg-white border-b font-semibold text-sm text-[#252F4A]"">
                            <td class="px-6 py-4 text-center" colspan="4">Obat</td>
                        </tr>
                        @foreach ($checkup->drugsData() as $item)
                            <tr class="bg-white border-b font-semibold text-sm text-[#252F4A]">
                                <th scope="row" class="px-6 py-4">
                                    {{ $item->name }}
                                </th>
                                <td class="px-6 py-4">
                                    Rp {{ $item->price }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->amount }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp {{ $item->price * $item->amount }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div>
                <p class="text-cadet text-[11px]">Catatan Dokter:</p>
                <div class="font-semibold text-xs text-cadet">Gratis pemeriksaan dan potongan 20%</div>
            </div>
        </div>

        <!-- form -->
        <div class="ms-[18px]">

            <!-- Metode Pembayaran -->
            <div class="bg-primary space-y-8 text-white px-7 py-6 rounded-lg w-[452px]">
                <div>
                    <h2 class="text-lg font-semibold mb-4">
                        Metode Pembayaran
                    </h2>
                    <div class="space-y-2">
                        <label class="flex items-center border border-white p-4 rounded-lg cursor-pointer h-[45px]">
                            <input value="credit" class="form-radio text-white hover:text-[#252F4A] hover:bg-[#252F4A]"
                                name="method" type="radio" />
                            <span class="ml-4 flex items-center">
                                <svg width="30" height="22" class="me-3" viewBox="0 0 30 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M27.173 21.8168H3.58673C2.08084 21.8168 0.865234 20.6012 0.865234 19.0953V2.7663C0.865234 1.2604 2.08084 0.0447998 3.58673 0.0447998H27.173C28.6789 0.0447998 29.8945 1.2604 29.8945 2.7663V19.0953C29.8945 20.6012 28.6789 21.8168 27.173 21.8168ZM3.58673 1.85913C3.07872 1.85913 2.67957 2.25828 2.67957 2.7663V19.0953C2.67957 19.6033 3.07872 20.0024 3.58673 20.0024H27.173C27.681 20.0024 28.0802 19.6033 28.0802 19.0953V2.7663C28.0802 2.25828 27.681 1.85913 27.173 1.85913H3.58673Z"
                                        fill="currentColor" />
                                    <path
                                        d="M24.7965 8.08249H23.4358C23.0185 8.08249 22.71 8.2095 22.5104 8.62679L19.8978 14.5778H21.7484C21.7484 14.5778 22.075 13.7795 22.1294 13.5981H24.3974C24.4699 13.8158 24.6151 14.5597 24.6151 14.5597H26.2661L24.7965 8.10064V8.08249ZM22.6375 12.2555C22.8007 11.8744 23.345 10.4411 23.345 10.4411C23.345 10.4774 23.5083 10.0601 23.5628 9.84239L23.6898 10.423L24.1071 12.3099H22.6375V12.2736V12.2555ZM20.0248 12.4369C20.0248 13.7795 18.8092 14.6685 16.9405 14.6685C16.1421 14.6685 15.3801 14.5052 14.9628 14.3238L15.2168 12.8542L15.4346 12.9449C16.0151 13.1989 16.3962 13.2896 17.0856 13.2896C17.5936 13.2896 18.1379 13.09 18.1379 12.6546C18.1379 12.3643 17.9202 12.1829 17.2126 11.8563C16.5413 11.5297 15.6523 11.0217 15.6523 10.1145C15.6523 8.84451 16.886 7.97363 18.6459 7.97363C19.3172 7.97363 19.8797 8.10064 20.2425 8.26393L19.9885 9.66096L19.8615 9.53396C19.5349 9.40695 19.1358 9.27995 18.5189 9.27995C17.8476 9.31624 17.5392 9.60653 17.5392 9.86054C17.5392 10.1508 17.9202 10.3685 18.5189 10.6588C19.5349 11.1306 20.0067 11.6749 20.0067 12.4369H20.0248ZM4.49414 8.13692L4.53043 8.00992H7.27007C7.65108 8.00992 7.94137 8.13692 8.03209 8.55422L8.63082 11.4209C8.03209 9.89682 6.61691 8.64494 4.49414 8.13692Z"
                                        fill="currentColor" />
                                    <path
                                        d="M12.4762 8.08212L9.70031 14.5411H7.81341L6.2168 9.13444C7.35983 9.86017 8.32142 11.0213 8.66614 11.8015L8.86572 12.4728L10.5893 8.04584H12.4762V8.08212ZM13.2201 8.04584H14.9619L13.8551 14.5411H12.1134L13.2201 8.04584Z"
                                        fill="currentColor" />
                                </svg>
                                Kartu Kredit
                            </span>
                        </label>
                        <label class="flex items-center border border-white p-4 rounded-lg cursor-pointer h-[45px]">
                            <input value="cash" class="form-radio text-white hover:text-[#252F4A] hover:bg-[#252F4A]"
                                name="method" type="radio" />
                            <span class="ml-4 flex items-center">
                                <svg width="30" height="20" class="me-3" viewBox="0 0 30 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.5 0.416138H29.8848V20.006H0.5V0.416138ZM15.1924 5.3136C16.4913 5.3136 17.737 5.82958 18.6554 6.74803C19.5739 7.66648 20.0898 8.91217 20.0898 10.2111C20.0898 11.5099 19.5739 12.7556 18.6554 13.6741C17.737 14.5925 16.4913 15.1085 15.1924 15.1085C13.8935 15.1085 12.6478 14.5925 11.7294 13.6741C10.8109 12.7556 10.2949 11.5099 10.2949 10.2111C10.2949 8.91217 10.8109 7.66648 11.7294 6.74803C12.6478 5.82958 13.8935 5.3136 15.1924 5.3136ZM7.02995 3.68111C7.02995 4.54704 6.68596 5.37749 6.07366 5.9898C5.46136 6.6021 4.6309 6.94609 3.76497 6.94609V13.476C4.6309 13.476 5.46136 13.82 6.07366 14.4323C6.68596 15.0446 7.02995 15.8751 7.02995 16.741H23.3548C23.3548 15.8751 23.6988 15.0446 24.3111 14.4323C24.9234 13.82 25.7539 13.476 26.6198 13.476V6.94609C25.7539 6.94609 24.9234 6.6021 24.3111 5.9898C23.6988 5.37749 23.3548 4.54704 23.3548 3.68111H7.02995Z"
                                        fill="currentColor" />
                                </svg>
                                Cash
                            </span>
                        </label>
                        <label class="flex items-center border border-white p-4 rounded-lg cursor-pointer h-[45px]">
                            <input value="transfer" class="form-radio text-white hover:text-[#252F4A] hover:bg-[#252F4A]"
                                name="method" type="radio" />
                            <span class="ml-4 flex items-center">
                                <svg width="26" height="22" class="me-3" viewBox="0 0 26 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21.6198 0.627625C22.3109 0.627625 22.9737 0.902163 23.4624 1.39084C23.951 1.87953 24.2256 2.54232 24.2256 3.23342V4.53632H16.4082C14.6805 4.53632 13.0235 5.22266 11.8018 6.44436C10.5801 7.66607 9.89372 9.32305 9.89372 11.0508C9.89372 12.7786 10.5801 14.4355 11.8018 15.6572C13.0235 16.8789 14.6805 17.5653 16.4082 17.5653H24.2256V18.8682C24.2256 19.5593 23.951 20.2221 23.4624 20.7108C22.9737 21.1994 22.3109 21.474 21.6198 21.474H3.37923C2.68813 21.474 2.02534 21.1994 1.53666 20.7108C1.04798 20.2221 0.773438 19.5593 0.773438 18.8682V3.23342C0.773438 2.54232 1.04798 1.87953 1.53666 1.39084C2.02534 0.902163 2.68813 0.627625 3.37923 0.627625H21.6198ZM22.9227 7.14211C23.6138 7.14211 24.2766 7.41665 24.7653 7.90533C25.2539 8.39401 25.5285 9.0568 25.5285 9.7479V12.3537C25.5285 13.0448 25.2539 13.7076 24.7653 14.1963C24.2766 14.685 23.6138 14.9595 22.9227 14.9595H16.4082C15.3716 14.9595 14.3774 14.5477 13.6443 13.8147C12.9113 13.0816 12.4995 12.0875 12.4995 11.0508C12.4995 10.0142 12.9113 9.01996 13.6443 8.28694C14.3774 7.55392 15.3716 7.14211 16.4082 7.14211H22.9227ZM16.4082 9.7479C16.0627 9.7479 15.7313 9.88517 15.4869 10.1295C15.2426 10.3739 15.1053 10.7053 15.1053 11.0508C15.1053 11.3964 15.2426 11.7277 15.4869 11.9721C15.7313 12.2164 16.0627 12.3537 16.4082 12.3537C16.7538 12.3537 17.0851 12.2164 17.3295 11.9721C17.5738 11.7277 17.7111 11.3964 17.7111 11.0508C17.7111 10.7053 17.5738 10.3739 17.3295 10.1295C17.0851 9.88517 16.7538 9.7479 16.4082 9.7479Z"
                                        fill="currentColor" />
                                </svg>
                                E-wallet
                            </span>
                        </label>
                        <input name="notes" value="{{ $invoice->notes }}"
                            class="w-full mt-4 h-[30px] p-2 rounded-lg bg-white text-cadet text-[8px] placeholder-gray-400"
                            placeholder="-- Tulis Keterangan Pembayaran --" type="text" />
                    </div>
                </div>

                <!-- Pilihan Diskon -->
                <div>
                    <h2 class="text-lg font-semibold mb-2">
                        Pilihan Diskon
                    </h2>
                    <div class="flex justify-between items-baseline">
                        <label>
                            <div>
                                <input class="form-radio text-black" name="discount" type="checkbox" />
                                <span class="ml-2 text-[12.43px]">
                                    Potongan Harga (Persen)
                                </span>
                            </div>
                            <input
                                class="w-full p-2 rounded-lg text-[8px] h-[20px] bg-white text-cadet placeholder-gray-400"
                                placeholder="cth : 30" type="text" />
                        </label>
                        <label>
                            <input class="form-radio text-black" name="discount" type="checkbox" />
                            <span class="ml-2 text-[12.43px]">
                                Gratis biaya pemeriksaan
                            </span>
                        </label>
                    </div>
                </div>

                <!-- Ringkasan -->
                <div>
                    <h2 class="text-lg font-semibold mb-3">
                        Ringkasan
                    </h2>
                    <div class="flex justify-between font-semibold">
                        <span>
                            Subtotal
                        </span>
                        <span>
                            Rp {{ $invoice->total() }}
                        </span>
                    </div>
                    <div class="flex justify-between font-semibold">
                        <span>
                            Diskon
                        </span>
                        <span>
                            {{ $invoice->discount ?? 0 }}%
                        </span>
                    </div>
                    <hr class="my-4 border-white" />
                    <div class="flex justify-between items-center">
                        <span class="font-semibold text-[13px]">
                            Total Harga
                        </span>
                        <span class="text-2xl font-bold">
                            Rp {{ ($invoice->total() * (100 - $invoice->discount)) / 100 }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="place-self-end">
        <a href="{{ route('invoice.show', 1) }}" class="bg-primary py-2 px-4 text-whites rounded-md">Cetak Invoice</a>
    </div>
@endsection
@section('scripts')
