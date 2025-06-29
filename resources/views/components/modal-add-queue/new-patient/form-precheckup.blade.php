<form id="form-new-owner-new-patient" class="space-y-3" method="post">
    @csrf
    <!-- Berat Badan -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="weight" class="text-sm font-medium leading-6 text-gray-700">Berat Badan <span class="text-red-500">*</span></label>
        <input type="number" id="weight" name="weight"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" min="0" required>
    </div>

    <!-- Pulse -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="pulse" class="text-sm font-medium leading-6 text-gray-700">Pulsus <span class="text-red-500">*</span></label>
        <input type="number" id="pulse" name="pulse"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" min="0" required>
    </div>

    <!-- Temperature -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="temperature" class="text-sm font-medium leading-6 text-gray-700">temperature <span class="text-red-500">*</span></label>
        <input type="number" id="temperature" name="temperature"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" min="0" required>
    </div>

    <!-- Breathe -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="breath" class="text-sm font-medium leading-6 text-gray-700">Frekuensi Napas <span class="text-red-500">*</span></label>
        <input type="number" id="breath" name="breath"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" min="0" required>
    </div>

    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    <!-- Service Type -->
    <div class="grid items-start w-full grid-cols-[1fr_3fr] gap-4 mb-4">
        <label class="text-sm font-medium leading-6 text-gray-700">Layanan <span class="text-red-500">*</span></label>
        <select name="service_id" id="service" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
            <option class="text-sm font-medium leading-6 text-gray-700" value="" disabled selected>Pilih Jenis
                Layanan</option>
        </select>
    </div>

    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    <!-- Vaccination Type -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="vaccine" class="text-sm font-medium leading-6 text-gray-700">Jenis Vaksin</label>
        <input type="text" name="vaccine" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm">
    </div>

    <!-- Submit Button -->
    <div class="flex justify-end mt-6">
        <button class="bg-primary text-white px-6 py-2 rounded-md shadow-md ">
            Submit
        </button>
    </div>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        loadService();
    });

    function loadService() {
        const serviceSelect = document.getElementById("service");
        if (!serviceSelect) return;

        serviceSelect.innerHTML =
            '<option class="text-sm font-medium leading-6 text-gray-700" value="" disabled selected>Pilih Jenis Layanan</option>';
        fetch(`api/service`)
            .then(response => {
                if (!response.ok) throw new Error("HTTP error " + response.status);
                return response.json();
            })
            .then(data => {
                data.data.forEach(service => {
                    let option = new Option(service.name, service.id);
                    serviceSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error("Fetch error:", error);
            });
    }

    document.getElementById("form-new-owner-new-patient").addEventListener("submit", function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        // Tambahkan patient_id dari localStorage
        formData.append('patient_id', localStorage.getItem('new-patient-id'));

        fetch(`/api/checkup`, {
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
                    // localStorage.setItem('new-checkup-id', data.data.id);
                    // window.dispatchEvent(new CustomEvent('preview-precheckup', {
                    //     detail: {
                    //         precheckupId: data.data.id,
                    //         formData: inputData
                    //     }
                    // }));
                    window.location.reload()
                } else {
                    alert("Gagal menyimpan data: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });
</script>
