<div x-data="{ patients: [] }" x-init="fetch('/api/patient')
    .then(res => res.json())
    .then(data => patients = data.data)">

    <div class="flex justify-between">
        <h3 class="text-lg font-semibold flex justify-center">Cari Pasien Lama</h3>
        <x-icons.search />
    </div>

    <!-- Table of Contents -->
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full text-sm text-[#99A1B7]" id="dataTable">
            <thead class="border border-gray-200 bg-[#FCFCFC]">
                <tr>
                    <th scope="col" class="px-6 py-3 border border-gray-200">No. RM</th>
                    <th scope="col" class="px-6 py-3 border border-gray-200">Nama</th>
                    <th scope="col" class="px-6 py-3 border border-gray-200">Owner</th>
                    <th scope="col" class="px-6 py-3 border border-gray-200">Umur</th>
                    <th scope="col" class="px-6 py-3 border border-gray-200">Gender</th>
                    <th scope="col" class="px-6 py-3 border border-gray-200">No. Telp</th>
                    <th scope="col" class="px-6 py-3 text-center border border-gray-200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="(patient, index) in patients" :key="patient.id">
                    <tr>
                        <td class="px-6 py-3 border border-gray-200" x-text="patient.id"></td>
                        <td class="px-6 py-3 border border-gray-200">
                            <div>
                                <p class="font-semibold" x-text="patient.name"></p>
                                <p x-text="patient.animal ? patient.animal.name : 'Tidak Ada'"></p>
                            </div>
                        </td>
                        <td class="px-6 py-3 border border-gray-200"
                            x-text="patient.owner ? patient.owner.name : 'Tidak Ada'"></td>
                        <td class="px-6 py-3 border border-gray-200" x-text="patient.birth"></td>
                        <td class="px-6 py-3 border border-gray-200" x-text="patient.gender"></td>
                        <td class="px-6 py-3 border border-gray-200"
                            x-text="patient.owner ? patient.owner.phone : 'Tidak Ada'"></td>
                        <td class="px-6 py-3 border border-gray-200">
                            <button @click="openModal = true; step = 3">
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
        Alpine.data('fetchPatients', () => ({
            patients: [],
            async fetchPatients() {
                try {
                    const response = await axios.get('/api/patient');
                    console.log("Data dari API:", response.data); // Debugging

                    // Pastikan response.data.data ada dan berbentuk array
                    this.patients = Array.isArray(response.data.data) ? response.data.data : [];
                } catch (error) {
                    console.error('Gagal mengambil data Patient:', error);
                }
            }
        }));
    });
</script>
