
<div x-data="{ owners: [] }" x-init="fetch('/api/owner')
    .then(res => res.json())
    .then(data => owners = data.data)">

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
                <template x-for="(owner, index) in owners" :key="owner.id">
                    <tr>
                        <td class="px-6 py-3 border border-gray-200" x-text="index + 1"></td>
                        <td class="px-6 py-3 border border-gray-200" x-text="owner.name"></td>
                        <td class="px-6 py-3 border border-gray-200" x-text="owner.phone"></td>
                        <td class="px-6 py-3 border border-gray-200" x-text="owner.address"></td>
                        <td class="px-6 py-3 border border-gray-200">
                            <button @click="openModal = true; step = 2">
                                <x-icons.add />
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('fetchOwners', () => ({
        owners: [],
        async fetchOwners() {
            try {
                const response = await axios.get('/api/owner');
                console.log("Data dari API:", response.data); // Debugging

                // Pastikan response.data.data ada dan berbentuk array
                this.owners = Array.isArray(response.data.data) ? response.data.data : [];
            } catch (error) {
                console.error('Gagal mengambil data owner:', error);
            }
        }
    }));
});
</script>
