<div class="flex justify-between">
    <h3 class="text-lg font-semibold flex justify-center">Cari Pasien Lama</h3>
    <x-icons.search />
</div>

<!-- Table of Contents -->
<div class="overflow-x-auto mt-4">
    <table class="min-w-full text-sm text-[#99A1B7]" id="dataTable">
        <thead class="border border-gray-200 bg-[#FCFCFC]">
            <tr>
                <th scope="col" class="px-6 py-3 border border-gray-200">No.</th>
                <th scope="col" class="px-6 py-3 border border-gray-200">No. RM</th>
                <th scope="col" class="px-6 py-3 border border-gray-200">Nama</th>
                <th scope="col" class="px-6 py-3 border border-gray-200">Owner</th>
                <th scope="col" class="px-6 py-3 border border-gray-200">Umur</th>
                <th scope="col" class="px-6 py-3 border border-gray-200">No. Telp</th>
                <th scope="col" class="px-6 py-3 text-center border border-gray-200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-6 py-3 border border-gray-200">1</td>
                <td class="px-6 py-3 border border-gray-200">RM-001</td>
                <td class="px-6 py-3 border border-gray-200">
                    <div>
                        <p class="font-semibold">Dogy</p>
                        <p>Anjing</p>
                    </div>
                </td>
                <td class="px-6 py-3 border border-gray-200">Joko</td>
                <td class="px-6 py-3 border border-gray-200">2 Tahun</td>
                <td class="px-6 py-3 border border-gray-200">089787657123</td>
                <td class="px-6 py-3 border border-gray-200">
                    <button @click="openModal = true; step = 3">
                        <x-icons.add />
                    </button>
                </td>

            </tr>
        </tbody>
    </table>
</div>
