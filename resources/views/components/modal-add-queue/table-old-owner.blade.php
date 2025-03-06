<div class="flex justify-between">
    <h3 class="text-lg font-semibold flex justify-center">Cari Owner Lama</h3>
    <x-icons.search />
</div>

<!-- Table of Contents -->
<div class="overflow-x-auto mt-4">
    <table class="min-w-full text-sm text-[#99A1B7]" id="dataTable">
        <thead class="border border-gray-200 bg-[#FCFCFC]">
            <tr>
                <th scope="col" class="px-6 py-3 border border-gray-200">No.</th>
                <th scope="col" class="px-6 py-3 border border-gray-200">Nama Owner</th>
                <th scope="col" class="px-6 py-3 border border-gray-200">No. Telp</th>
                <th scope="col" class="px-6 py-3 text-center border border-gray-200">Alamat</th>
                <th scope="col" class="px-6 py-3 text-center border border-gray-200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-6 py-3 border border-gray-200">1</td>
                <td class="px-6 py-3 border border-gray-200">Joko Budianto</td>
                <td class="px-6 py-3 border border-gray-200">085898765437</td>
                <td class="px-6 py-3 border border-gray-200">Sinduadi, Mlati, Sleman, D.I Yogyakarta</td>
                <td class="px-6 py-3 border border-gray-200">
                    <button @click="openModal = true; step = 2">
                        <x-icons.add />
                    </button>
                </td>

            </tr>
        </tbody>
    </table>
</div>
