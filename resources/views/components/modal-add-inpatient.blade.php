<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex flex-wrap gap-2 md:flex-row justify-center items-center my-2">
    <span class="px-4 py-2 bg-green-500 text-white rounded-full text-sm">Berat Badan: 10 kg</span>
    <span class="px-4 py-2 bg-green-500 text-white rounded-full text-sm">Pulsa: 70 bpm</span>
    <span class="px-4 py-2 bg-green-500 text-white rounded-full text-sm">Frekuensi napas: 20 rpm</span>
    <span class="px-4 py-2 bg-red-500 text-white rounded-full text-sm">Suhu: 40 °C</span>
</div>

<form action="" method="">
    @csrf
    <div class="grid gap-4">
        <div>
            <label class="block text-gray-700 font-medium">Anamnesa</label>
            <textarea class="w-full p-2 border rounded-lg bg-gray-100 h-24">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus, numquam!</textarea>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Gejala</label>
            <textarea class="w-full p-2 border rounded-lg bg-gray-100 h-16">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Excepturi ea obcaecati dolor corrupti iste?</textarea>
        </div>
    </div>

    <hr class="border-gray-200 my-4">

    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <div class="flex justify-between items-center">
                <label class="block text-gray-700 font-medium">Diagnosa</label>
                <button onclick="addDiagnosa()" type="button"
                    class="font-bold text-[#F4F4F4] bg-primary flex justify-center px-2 rounded-md text-[11px] h-7 items-center">Tambah
                    Diagnosa<b class="text-[18px] pl-2">+</b></button>
            </div>
            <table class="min-w-full text-sm text-[#99A1B7] mt-2" id="dataTable">
                <thead class="border border-gray-200 bg-[#FCFCFC]">
                    <tr>
                        <th scope="col" class="px-6 py-2 border border-gray-200">No.</th>
                        <th scope="col" class="px-6 py-2 border border-gray-200">Diagnosa</th>
                        <th scope="col" class="px-6 py-2 border border-gray-200">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-6 py-2 border border-gray-200 text-center">1</td>
                        <td class="px-6 py-2 border border-gray-200">Diare</td>
                        <td class="px-6 py-2 border border-gray-200">02/10/2025</td>
                    </tr>
                </tbody>
            </table>
            <div id="diagnosa-container"></div>
        </div>
        <div>
            <div class="flex justify-between items-center">
                <label class="block text-gray-700 font-medium">Layanan</label>
                <button onclick="addLayanan()" type="button"
                    class="font-bold text-[#F4F4F4] bg-primary flex justify-center px-2 rounded-md text-[11px] h-7 items-center">Tambah
                    Layanan<b class="text-[18px] pl-2">+</b></button>
            </div>
            <table class="min-w-full text-sm text-[#99A1B7] mt-2" id="dataTable">
                <thead class="border border-gray-200 bg-[#FCFCFC]">
                    <tr>
                        <th scope="col" class="px-6 py-2 border border-gray-200">No.</th>
                        <th scope="col" class="px-6 py-2 border border-gray-200">Layanan</th>
                        <th scope="col" class="px-6 py-2 border border-gray-200">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-6 py-2 border border-gray-200 text-center">1</td>
                        <td class="px-6 py-2 border border-gray-200">Suntik</td>
                        <td class="px-6 py-2 border border-gray-200">02/10/2025</td>
                    </tr>
                </tbody>
            </table>
            <div id="layanan-container"></div>
        </div>
    </div>

    <hr class="border-gray-200 my-4">

    <!-- Add Obat -->
    <div class="grid my-4">
        <div class="flex flex-col">
            <div class="flex justify-between items-center">
                <label class="block text-gray-700 font-medium">Obat Pasien</label>
                <button onclick="addObat()" type="button"
                    class="font-bold text-[#F4F4F4] bg-primary flex justify-center px-2 rounded-md text-[11px] h-7 items-center">Tambah
                    Obat<b class="text-[18px] pl-2">+</b></button>
            </div>
            <table class="min-w-full text-sm text-[#99A1B7] mt-2" id="dataTable">
                <thead class="border border-gray-200 bg-[#FCFCFC]">
                    <tr>
                        <th scope="col" class="px-6 py-2 border border-gray-200">No.</th>
                        <th scope="col" class="px-6 py-2 border border-gray-200">Jenis Obat</th>
                        <th scope="col" class="px-6 py-2 border border-gray-200">Nama Obat</th>
                        <th scope="col" class="px-6 py-2 border border-gray-200">Jumlah</th>
                        <th scope="col" class="px-6 py-2 border border-gray-200">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-6 py-2 border border-gray-200 text-center">1</td>
                        <td class="px-6 py-2 border border-gray-200">Cair</td>
                        <td class="px-6 py-2 border border-gray-200">Suntik</td>
                        <td class="px-6 py-2 border border-gray-200">2 lt</td>
                        <td class="px-6 py-2 border border-gray-200">02/10/2025</td>
                    </tr>
                </tbody>
            </table>
            <div id="obat-container"></div>
        </div>
    </div>

    <hr class="border-gray-200 my-4">

    <div>
        <label class="block text-gray-700 font-medium">Catatan</label>
        <textarea class="w-full p-2 border rounded-lg bg-gray-100 h-16" placeholder="Ketik catatan disini..."></textarea>
    </div>


</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    function addDiagnosa() {
        let container = document.getElementById('diagnosa-container');
        let newSelect = document.createElement('div');
        newSelect.innerHTML = `
            <div class="flex gap-4 mt-2 justify-center">
                <select class="w-full border rounded-lg bg-gray-100 h-10">
                    <option value="">Pilih Diagnosa</option>
                    <option value="test">Test</option>
                </select>
                <button type="button" onclick="removeElement(this)">
                    <x-icons.redcancel/>
                    </button>
            </div>
        `;
        container.appendChild(newSelect);
    }

    function addLayanan() {
        let container = document.getElementById('layanan-container');
        let newSelect = document.createElement('div');
        newSelect.innerHTML = `
            <div class="flex gap-2 mt-2">
                <select class="w-full border rounded-lg bg-gray-100 h-10">
                    <option value="">Pilih Layanan</option>
                    <option value="test">Test</option>
                </select>
                 <button type="button" onclick="removeElement(this)">
                    <x-icons.redcancel/>
                    </button>
            </div>
        `;
        container.appendChild(newSelect);
    }

    function addObat() {
        let container = document.getElementById('obat-container');
        let newRow = document.createElement('div');

        newRow.classList.add('row-obat', 'flex');

        newRow.innerHTML = `
            <div class="grid grid-cols-3 gap-2 w-full">
                    <div>
                        <div class="flex gap-2 mt-2">
                            <select class="w-full border rounded-lg bg-gray-100 h-10">
                                <option value="">-- Nama Obat --</option>
                                <option value="test">Test</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="flex gap-2 mt-2">
                            <select class="w-full border rounded-lg bg-gray-100 h-10">
                                <option value="">-- Jenis Obat --</option>
                                <option value="test">Test</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="flex gap-3 mt-2">
                            <input type="number" class="w-24 border rounded-lg bg-gray-100 h-10 p-2" placeholder="Jumlah">
                            <button type="button" onclick="removeObat(this)" class="ml-2">
                                <x-icons.redcancel />
                            </button>
                        </div>
                    </div>
                </div>
        `;

        container.appendChild(newRow);
    }

    function removeObat(btn) {
        btn.closest('.row-obat').remove();
    }

    function removeElement(btn) {
        btn.parentElement.parentElement.remove();
    }
</script>
