<h3 class="text-lg font-semibold mb-4">Formulir Owner Baru</h3>
 <div class="flex justify-between">
        <h3 class="text-lg font-semibold flex justify-center">Form Owner Lama</h3>
        <x-icons.search />
    </div>

<form class="space-y-3" id="ownerForm">
    <!-- Nama -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" name="name" class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300"
            placeholder="Ketikan nama owner pasien..." required>
    </div>

    <div class="grid grid-cols-2 gap-3">
        <!-- Gender -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Gender</label>
            <select name="gender" class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300" required>
                <option value="" disabled selected>Pilih Gender</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Laki-Laki">Laki-laki</option>
            </select>
        </div>

        <!-- Nomor Telepon -->
        <div>
            <label class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
            <input type="text" name="phone" class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300"
                placeholder="cth: 08xxxx" required>
        </div>
    </div>

    <!-- Provinsi -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Provinsi</label>
        <select name="province_id" id="province" class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300" required>
            <option value="" disabled selected>Pilih Provinsi</option>
        </select>
    </div>

    <!-- Kota & Kecamatan -->
    <div class="grid grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700">Kota</label>
            <select name="city_id" id="city" class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300" required>
                <option value="" disabled selected>Pilih Kota</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Kecamatan</label>
            <select name="district_id" id="district" class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300" required>
                <option value="" disabled selected>Pilih Kecamatan</option>
            </select>
        </div>
    </div>

    <!-- Desa -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Desa</label>
        <select name="village_id" id="village" class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300" required>
            <option value="" disabled selected>Pilih Desa</option>
        </select>
    </div>

    <!-- Alamat -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <input type="text" name="address" class="w-full border rounded-md p-2 focus:ring focus:ring-blue-300"
            placeholder="Alamat Domisili" required>
    </div>

    <div class="flex justify-end mt-6">
        <button type="submit"
            class="bg-blue-600 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-700">
            Submit
        </button>
    </div>
</form>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Load API saat halaman pertama kali dimuat
    loadProvinces();

    // Tambahkan event listener untuk tombol pasien baru & pasien lama
    document.getElementById("pasienBaruButton")?.addEventListener("click", function () {
        console.log("Pasien Baru diklik, memuat ulang provinsi...");
        loadProvinces();
    });

    document.getElementById("pasienLamaButton")?.addEventListener("click", function () {
        console.log("Pasien Lama diklik, memuat ulang provinsi...");
        loadProvinces();
    });
});

// Fungsi untuk memuat provinsi dari API
function loadProvinces() {
    const provinceSelect = document.getElementById("province");
    if (!provinceSelect) return;

    provinceSelect.innerHTML = '<option value="" disabled selected>Pilih Provinsi</option>';

    fetch('/api/province')
        .then(response => response.json())
        .then(data => {
            console.log("Data Provinces:", data);
            if (data.success && Array.isArray(data.data)) {
                data.data.forEach(province => {
                    let option = new Option(province, province);
                    provinceSelect.appendChild(option);
                });
            } else {
                console.error("Gagal mendapatkan data provinsi");
            }
        })
        .catch(error => console.error("Error API:", error));
}

// Event listener untuk memuat kota saat provinsi dipilih
document.getElementById("province").addEventListener("change", function () {
    const citySelect = document.getElementById("city");
    citySelect.innerHTML = '<option value="" disabled selected>Pilih Kota</option>';

    fetch(`/api/city/${this.value}`)
        .then(response => response.json())
        .then(data => {
            data.data.forEach(city => {
                let option = new Option(city, city);
                citySelect.appendChild(option);
            });
        });
});

// Event listener untuk memuat kecamatan saat kota dipilih
document.getElementById("city").addEventListener("change", function () {
    const districtSelect = document.getElementById("district");
    districtSelect.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';

    fetch(`/api/district/${this.value}`)
        .then(response => response.json())
        .then(data => {
            data.data.forEach(district => {
                let option = new Option(district, district);
                districtSelect.appendChild(option);
            });
        });
});

// Event listener untuk memuat desa saat kecamatan dipilih
document.getElementById("district").addEventListener("change", function () {
    const villageSelect = document.getElementById("village");
    villageSelect.innerHTML = '<option value="" disabled selected>Pilih Desa</option>';

    fetch(`/api/village/${this.value}`)
        .then(response => response.json())
        .then(data => {
            data.data.forEach(village => {
                let option = new Option(village, village);
                villageSelect.appendChild(option);
            });
        });
});

// Event listener untuk submit form
document.getElementById("ownerForm").addEventListener("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch('/api/owner', {
        method: 'POST',
        body: JSON.stringify(Object.fromEntries(formData)),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Data berhasil disimpan!");
            location.reload();
        } else {
            alert("Gagal menyimpan data: " + data.message);
        }
    })
    .catch(error => console.error("Error:", error));
});
</script>
