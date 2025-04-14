<form class="space-y-3">

    <!-- Berat Badan -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="berat_badan" class="text-sm font-medium leading-6 text-gray-700">Berat Badan</label>
        <input type="number" id="berat_badan" name="berat_badan"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" min="0">
    </div>

    <!-- Pulse -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="pulsus" class="text-sm font-medium leading-6 text-gray-700">Pulsus</label>
        <input type="number" id="pulsus" name="pulsus"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" min="0">
    </div>

    <!-- Temperature -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="suhu" class="text-sm font-medium leading-6 text-gray-700">Suhu</label>
        <input type="number" id="suhu" name="suhu"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" min="0">
    </div>

    <!-- Breathe -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="frekuensi_napas" class="text-sm font-medium leading-6 text-gray-700">Frekuensi Napas</label>
        <input type="number" id="frekuensi_napas" name="frekuensi_napas"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" min="0">
    </div>

    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    <!-- Service Type -->
    <div class="grid items-start w-full grid-cols-[1fr_3fr] gap-4 mb-4">
        <label class="text-sm font-medium leading-6 text-gray-700">Layanan</label>
        <select name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm">
            <option class="text-sm font-medium leading-6 text-gray-700" value="">-</option>
            <option class="text-sm font-medium leading-6 text-gray-700" value="">
                test
            </option>
        </select>
    </div>

    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    <!-- Vaccination -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Sudah Vaksin</label>
        <label class="inline-flex items-center cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <div
                class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600">
            </div>
        </label>
    </div>

    <!-- Vaccination Type -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Jenis Vaksin</label>
        <input type="text" name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm">
    </div>

    <!-- Submit Button -->
    <div class="flex justify-end mt-6">
        <button @click="openModal = true; step = 5" type="button"
            class="bg-blue-600 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-700">
            <td class="px-6 py-3 border border-gray-200">
                Submit
            </td>
        </button>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputs = document.querySelectorAll("input[type='number']");

        inputs.forEach(input => {
            // Mencegah karakter selain angka saat diketik atau ditempelkan
            input.addEventListener("input", function() {
                this.value = this.value.replace(/[^0-9]/g,
                    ""); // Hanya angka 0-9 yang diperbolehkan
            });

            // Mencegah pengguna memasukkan simbol "-", "e", atau "E"
            input.addEventListener("keydown", function(event) {
                if (event.key === "-" || event.key === "e" || event.key === "E") {
                    event.preventDefault(); // Mencegah input simbol minus dan eksponen
                }
            });
        });
    });
</script>
