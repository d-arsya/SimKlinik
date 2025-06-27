<div x-data="{ owners: [] }" x-init="fetch('/api/owner')
    .then(res => res.json())
    .then(data => owners = data.data)">

    <div class="flex justify-between">
        <h3 class="text-lg font-semibold flex justify-center">Cari Owner Lama</h3>
        <div class="relative w-full max-w-xs mx-2">
            <input type="text" id="tableSearch"
                class="w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50"
                placeholder="Cari pasien...">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <x-icons.search />
            </div>
        </div>
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

    document.querySelector("input[name='transactionDiscount']").addEventListener('input', () => draw())

    document.addEventListener('DOMContentLoaded', function() {
        x
        const suggestions = document.getElementById('suggestions');
        let timeout = null;
        document.querySelector("#drugInput").addEventListener('input', function() {
            clearTimeout(timeout);
            const query = this.value;
            timeout = setTimeout(() => {
                if (query.length > 0) {
                    fetch(`/drug-repack?query=${query}&source=${currentSource}`)
                        .then(response => response.json())
                        .then(data => {
                            suggestions.innerHTML = '';
                            if (data.length > 0) {
                                suggestions.classList.remove('hidden');
                                data.forEach(item => {
                                    const option = document.createElement('li');
                                    option.textContent =
                                        `${item.name} (${formatRupiah(item.price)})`;
                                    option.classList.add('p-2', 'cursor-pointer',
                                        'hover:bg-gray-100');
                                    option.addEventListener('click', () =>
                                        clickedOption(item));
                                    suggestions.appendChild(option);
                                });
                            } else {
                                suggestions.classList.add('hidden');
                            }
                        });
                } else {
                    suggestions.classList.add('hidden');
                }
            }, 400);
        });

    });
</script>
