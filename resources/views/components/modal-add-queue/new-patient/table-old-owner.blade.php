<div x-data="modalFetchOwners" x-init="fetchOwners()" x-cloak>
    <div class="flex justify-between">
        <h3 class="text-lg font-semibold flex justify-center">Cari Owner Lama</h3>
        <div class="relative w-full max-w-xs mx-2">
            <input
                type="text"
                id="modalOwnerSearch"
                x-model="searchQuery"
                class="w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                placeholder="Cari owner..."
            >
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <x-icons.search />
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full text-sm text-[#99A1B7]" id="table-old-owner-new-patient">
            <thead class="border border-gray-200 bg-[#FCFCFC]">
                <tr>
                    <th class="px-6 py-3 border border-gray-200">No.</th>
                    <th class="px-6 py-3 border border-gray-200">Nama Owner</th>
                    <th class="px-6 py-3 border border-gray-200">No. Telp</th>
                    <th class="px-6 py-3 border border-gray-200">Alamat</th>
                    <th class="px-6 py-3 border border-gray-200 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <template x-if="filteredOwners.length === 0">
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Tidak ada hasil ditemukan</td>
                    </tr>
                </template>
                <template x-for="(owner, index) in filteredOwners" :key="owner.id">
                    <tr>
                        <td class="px-6 py-3 border border-gray-200" x-text="index + 1"></td>
                        <td class="px-6 py-3 border border-gray-200" x-text="owner.name"></td>
                        <td class="px-6 py-3 border border-gray-200" x-text="owner.phone"></td>
                        <td class="px-6 py-3 border border-gray-200" x-text="owner.address"></td>
                        <td class="px-6 py-3 border border-gray-200 text-center">
                            <button
                                @click="window.dispatchEvent(new CustomEvent('input-new-patient', { detail: { ownerId: owner.id } }))"
                                class="text-blue-600 hover:text-blue-800">
                                <x-icons.add />
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</div>

<!-- Tambahkan ke global layout sekali -->
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('modalFetchOwners', () => ({
            owners: [],
            searchQuery: '',
            async fetchOwners() {
                try {
                    const response = await axios.get('/api/owner');
                    this.owners = Array.isArray(response.data.data) ? response.data.data : [];
                } catch (error) {
                    console.error('Gagal mengambil data owner:', error);
                }
            },
            get filteredOwners() {
                if (!this.searchQuery) return this.owners;
                const query = this.searchQuery.toLowerCase();
                return this.owners.filter(o =>
                    (o.name || '').toLowerCase().includes(query) ||
                    (o.phone || '').toLowerCase().includes(query) ||
                    (o.address || '').toLowerCase().includes(query)
                );
            }
        }));
    });
</script>
