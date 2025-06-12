<form id="precheckupForm" class="space-y-3" method="post">
    @csrf
    <!-- Berat Badan -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="weight" class="text-sm font-medium leading-6 text-gray-700">Berat Badan</label>
        <input type="number" id="weight" name="weight"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" min="0">
    </div>

    <!-- Pulse -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="pulse" class="text-sm font-medium leading-6 text-gray-700">Pulsus</label>
        <input type="number" id="pulse" name="pulse"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" min="0">
    </div>

    <!-- Temperature -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="temperature" class="text-sm font-medium leading-6 text-gray-700">temperature</label>
        <input type="number" id="temperature" name="temperature"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" min="0">
    </div>

    <!-- Breathe -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="breath" class="text-sm font-medium leading-6 text-gray-700">Frekuensi Napas</label>
        <input type="number" id="breath" name="breath"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" min="0">
    </div>

    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    <!-- Service Type -->
    <div class="grid items-start w-full grid-cols-[1fr_3fr] gap-4 mb-4">
        <label class="text-sm font-medium leading-6 text-gray-700">Layanan</label>
        <select name="service_id" id="services" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm">
            <option class="text-sm font-medium leading-6 text-gray-700" value="" disabled selected>Pilih Jenis
                Layanan</option>
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
        <input type="text" name="vaccine" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm">
    </div>

    <!-- Submit Button -->
    <div class="flex justify-end mt-6">
        <button class="bg-blue-600 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-700">
            Submit
        </button>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        loadServices();
    });

    function loadServices() {
        const serviceSelectCoba = document.getElementById("services")
        if (!serviceSelectCoba) return;

        serviceSelectCoba.innerHTML =
            '<option class="text-sm font-medium leading-6 text-gray-700" value="" disabled selected>Pilih Jenis Layanan</option>'
        fetch(`api/service`)
            .then(response => {
                if (!response.ok) throw new Error("HTTP error " + response.status);
                return response.json();
            })
            .then(data => {
                data.data.forEach(service => {
                    let option = new Option(service.name, service.id)
                    serviceSelectCoba.appendChild(option)
                    console.log(service)
                })
                console.log(data)
            })
            .catch(error => {
                console.error("Fetch error:", error);
            });
    }

    // Event listener untuk submit form
    document.getElementById("precheckupForm").addEventListener("submit", function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        // Tambahkan patient_id dari localStorage
        formData.append('patient_id', localStorage.getItem('old-patient-id'));

        fetch(`/api/checkup/`, {
                method: 'POST',
                body: JSON.stringify(Object.fromEntries(formData)),
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    let inputData = {};
                    this.querySelectorAll("input, select").forEach(input => {
                        if (input.type === "checkbox") {
                            inputData[input.name] = input.checked;
                        } else {
                            inputData[input.name] = input.value;
                        }
                    });
                    window.dispatchEvent(new CustomEvent('preview-precheckup', {
                        detail: {
                            precheckupId: data.data.id,
                            formData: inputData
                        }
                    }));
                } else {
                    alert("Gagal menyimpan data: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });
</script>
