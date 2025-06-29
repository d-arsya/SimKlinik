<div x-data="modalFetchPatients" x-init="fetchPatients()" x-cloak>
    <div class="flex justify-between">
        <h3 class="text-lg font-semibold flex justify-center">Cari Pasien Lama</h3>
        <div class="relative w-full max-w-xs mx-2">
            <input
                type="text"
                id="modalTableSearch"
                x-model="searchQuery"
                class="w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                placeholder="Cari pasien..."
            >
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <x-icons.search />
            </div>
        </div>
    </div>

    <!-- Table of Contents -->
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full text-sm text-[#99A1B7]" id="table-old-patient">
            <thead class="border border-gray-200 bg-[#FCFCFC]">
                <tr>
                    <th class="px-6 py-3 border border-gray-200">No. RM</th>
                    <th class="px-6 py-3 border border-gray-200">Nama</th>
                    <th class="px-6 py-3 border border-gray-200">Owner</th>
                    <th class="px-6 py-3 border border-gray-200">Umur</th>
                    <th class="px-6 py-3 border border-gray-200">Gender</th>
                    <th class="px-6 py-3 border border-gray-200">No. Telp</th>
                    <th class="px-6 py-3 text-center border border-gray-200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <template x-if="filteredPatients.length === 0">
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">Tidak ada hasil ditemukan</td>
                    </tr>
                </template>
                <template x-for="(patient, index) in filteredPatients" :key="patient.id">
                    <tr>
                        <td class="px-6 py-3 border border-gray-200" x-text="patient.id"></td>
                        <td class="px-6 py-3 border border-gray-200">
                            <div>
                                <p class="font-semibold" x-text="patient.name"></p>
                                <p x-text="patient.animal ? patient.animal.name : 'Tidak Ada'"></p>
                            </div>
                        </td>
                        <td class="px-6 py-3 border border-gray-200" x-text="patient.owner ? patient.owner.name : 'Tidak Ada'"></td>
                        <td class="px-6 py-3 border border-gray-200" x-text="patient.birth"></td>
                        <td class="px-6 py-3 border border-gray-200" x-text="patient.gender"></td>
                        <td class="px-6 py-3 border border-gray-200" x-text="patient.owner ? patient.owner.phone : 'Tidak Ada'"></td>
                        <td class="px-6 py-3 border border-gray-200">
                            <button
                                @click="window.dispatchEvent(new CustomEvent('input-precheckup-old-patient', { detail: { patientId: patient.id } }))"
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

<!-- Tambahkan x-cloak support di layout atau style global -->
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('modalFetchPatients', () => ({
            patients: [],
            searchQuery: '',
            async fetchPatients() {
                try {
                    const response = await axios.get('/api/patient');
                    this.patients = Array.isArray(response.data.data) ? response.data.data : [];
                } catch (error) {
                    console.error('Gagal mengambil data Patient:', error);
                }
            },
            get filteredPatients() {
                if (!this.searchQuery) return this.patients;

                const query = this.searchQuery.toLowerCase();
                return this.patients.filter(p =>
                    (p.name || '').toLowerCase().includes(query) ||
                    (p.owner?.name || '').toLowerCase().includes(query) ||
                    (p.animal?.name || '').toLowerCase().includes(query) ||
                    (p.owner?.phone || '').includes(query) ||
                    String(p.id).includes(query)
                );
            }
        }));
    });
</script>
