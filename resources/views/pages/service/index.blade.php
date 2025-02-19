@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <div class="flex items-center justify-between">
        <div class="py-5">
            <h2 class="text-xl font-semibold">Tabel Jenis Layanan</h2>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('service.create') }}"
                class="font-bold text-md py-2 px-3  rounded-md text-white bg-primary">Tambah
                Layanan</a>

            <button class="font-bold text-md py-2 px-3 rounded-md text-primary bg-primary-filter">Tambah Bulk</button>
        </div>
    </div>
    <x-table id="dataTable">
        <thead class="text-cadet text-sm font-semibold bg-gray-50 border-b border-[#F1F1F4]">
            <tr>
                <th scope="col" class="px-5 py-3 border-b">
                    <div class="flex items-center">
                        No
                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-5 py-3 border">
                    <div class="flex items-center">
                        Kode
                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-5 py-3 border">
                    <div class="flex items-center">
                        Nama
                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-5 py-3 border">
                    <div class="flex items-center">
                        Harga
                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                            </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-5 py-3 border">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            <tr>
                <td class="px-5 py-4 border-y">
                    1
                </td>
                <td class="px-5 py-4 border">
                    08/01/24
                </td>
                <td scope="row" class="px-6 py-4 border font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                    1
                </td>
                <td class="px-5 py-4 border">
                </td>
                <td class="px-5 py-4 border flex content-center justify-center gap-x-2  ">
                    <a href="{{ route('service.edit', 1) }}" class="bg-warning p-2 rounded-md">
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.4553 15.1338L16.6186 8.97044C15.5817 8.53729 14.64 7.90477 13.8469 7.10877C13.0505 6.31548 12.4177 5.37348 11.9844 4.33627L5.82109 10.4996C5.34026 10.9804 5.09942 11.2213 4.89276 11.4863C4.64892 11.7992 4.43964 12.1375 4.26859 12.4954C4.12442 12.7988 4.01692 13.1221 3.80192 13.7671L2.66692 17.1696C2.61468 17.3254 2.60693 17.4927 2.64454 17.6526C2.68215 17.8126 2.76363 17.9589 2.87982 18.075C2.996 18.1912 3.14229 18.2727 3.30225 18.3103C3.4622 18.3479 3.62947 18.3402 3.78526 18.2879L7.18776 17.1529C7.83359 16.9379 8.15609 16.8304 8.45942 16.6863C8.81887 16.5152 9.15526 16.3071 9.46859 16.0621C9.73359 15.8554 9.97442 15.6146 10.4553 15.1338ZM18.3286 7.26044C18.9431 6.64591 19.2884 5.81243 19.2884 4.94335C19.2884 4.07428 18.9431 3.2408 18.3286 2.62627C17.7141 2.01174 16.8806 1.6665 16.0115 1.6665C15.1424 1.6665 14.309 2.01174 13.6944 2.62627L12.9553 3.36544L12.9869 3.45794C13.3511 4.50025 13.9472 5.44626 14.7303 6.2246C15.5319 7.03112 16.511 7.63897 17.5894 7.99961L18.3286 7.26044Z"
                                fill="#F8F8F8" />
                        </svg>
                    </a>

                    <form action="{{ route('service.destroy', 1) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin mau dihapus?')" class="bg-danger p-2 rounded-md">
                            <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.73926 0V1H0.739258V3H1.73926V16C1.73926 16.5304 1.94997 17.0391 2.32504 17.4142C2.70012 17.7893 3.20882 18 3.73926 18H13.7393C14.2697 18 14.7784 17.7893 15.1535 17.4142C15.5285 17.0391 15.7393 16.5304 15.7393 16V3H16.7393V1H11.7393V0H5.73926ZM5.73926 5H7.73926V14H5.73926V5ZM9.73926 5H11.7393V14H9.73926V5Z"
                                    fill="#F8F8F8" />
                            </svg>
                        </button>

                    </form>
                </td>
            </tr>
        </tbody>
    </x-table>
@endsection
@section('scripts')
