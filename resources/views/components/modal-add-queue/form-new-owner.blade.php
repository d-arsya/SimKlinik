<h3 class="text-lg font-semibold mb-4">Formulir Owner Baru</h3>
<form class="space-y-3">
    <!-- Nama -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300"
            placeholder="Ketikan nama owner pasien..." required>
    </div>

    <div class="grid grid-cols-2 gap-3">

        <!-- Gender -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Gender</label>
            <select class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300" required>
                <option value="" disabled selected>Pilih Gender</option>
                <option>Perempuan</option>
                <option>Laki-laki</option>
            </select>
        </div>

        <!-- Nomor Telepon -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
            <input type="text" class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300"
                placeholder="cth: 08xxxx" required>
        </div>
    </div>

    <!-- Alamat -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <input type="text" class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300"
            placeholder="Alamat Domisili" required>
    </div>

    <!-- Provinsi & Kota -->
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700">Provinsi</label>
            <select class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300" required>
                <option value="" disabled selected>Pilih Provinsi</option>
                <option>Jawa Barat</option>
                <option>Jawa Tengah</option>
                <option>Jawa Timur</option>
                <option>Sumatera Utara</option>
                <option>Bali</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Kota</label>
            <select class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300" required>
                <option value="" disabled selected>Pilih Kota</option>
                <option>Bandung</option>
                <option>Semarang</option>
                <option>Surabaya</option>
                <option>Medan</option>
                <option>Denpasar</option>
            </select>
        </div>
    </div>

    <!-- Negara -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Negara</label>
        <select class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300" required>
            <option value="" disabled selected>Pilih Negara</option>
            <option>Indonesia</option>
            <option>Malaysia</option>
            <option>Singapura</option>
            <option>Thailand</option>
        </select>
    </div>

    <div class="flex justify-end mt-6">
        <button @click="openModal = true; step = 2"
            class="bg-blue-600 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-700">
            Submit
        </button>
    </div>
</form>
