<form class="space-y-3" action="{{route('api.patient.store')}}" method="post" id="patientForm">
    @csrf

    <!-- Name Patient -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama</label>
        <input type="type" name="" value="Dogy"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm">
    </div>

    <!-- Gender Patient -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Gender</label>
        <select name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm">
            <option class="text-sm font-medium leading-6 text-gray-700" value="">-</option>
            <option class="text-sm font-medium leading-6 text-gray-700" value="">
                Jantan
            </option>
            <option class="text-sm font-medium leading-6 text-gray-700" value="">
                Betina
            </option>
        </select>
    </div>

    <!-- Age Patient -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Umur</label>
        <input type="number" name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm">
    </div>

    <!-- Animal -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4 ">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Jenis Hewan</label>
        <select name="name" id="animals" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm">
            <option class="text-sm font-medium leading-6 text-gray-700" value="" disabled selected>Pilih Jenis
                Hewan</option>
        </select>
    </div>

    <!-- type of Animal -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4 ">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Ras</label>
        <select name="" id="types" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm">
            <option class="text-sm font-medium leading-6 text-gray-700" value="" disabled selected>Pilih Ras Hewan
            </option>
        </select>
    </div>

    <!-- Color -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4 ">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Warna</label>
        <select name="" id="color" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm">
            <option class="text-sm font-medium leading-6 text-gray-700" value="" disabled selected>Pilih Warna Hewan
            </option>
        </select>
    </div>

    <div class="flex justify-end mt-6">
        <button class="bg-blue-600 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-700">
            Submit
        </button>
    </div>

</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        loadAnimals();
        loadColors();
    });

    function loadAnimals() {
        const animalSelect = document.getElementById("animals");
        if (!animalSelect) return;

        animalSelect.innerHTML =
            '<option class="text-sm font-medium leading-6 text-gray-700" value="" disabled selected>Pilih Jenis Hewan</option>'

        fetch('/api/animal')
            .then(response => response.json())
            .then(data => {
                console.log("Data Animal:", data);
                if (data.success && Array.isArray(data.data)) {
                    data.data.forEach(animal => {
                        let option = new Option(animal.name, animal.id);
                        animalSelect.appendChild(option);
                    });
                } else {
                    console.error("Gagal mendapatkan data animals");
                }
            })
            .catch(error => console.error("Error API:", error));
    }

    document.getElementById("animals").addEventListener("change", function() {
        const typeSelect = document.getElementById("types");
        typeSelect.innerHTML =
            '<option class="text-sm font-medium leading-6 text-gray-700" value="" disabled selected>Pilih Ras Hewan</option>'

        fetch(`/api/animal/${this.value}/type`)
            .then(response => response.json())
            .then(data => {
                data.data.forEach(type => {
                    let option = new Option(type.name, type.id)
                    typeSelect.appendChild(option)
                });
            });
    })

    function loadColors() {
        const colorSelect = document.getElementById("color")
        if (!colorSelect) return;

        colorSelect.innerHTML = '<option class="text-sm font-medium leading-6 text-gray-700" value="" disabled selected>Pilih Warna Hewan</option>'

        fetch('api/color')
            .then(response => response.json())
            .then(data => {
                data.data.forEach(color => {
                    let option = new Option(color.name, color.id)
                    colorSelect.appendChild(option)
                });
            });
    }

    // Event listener untuk submit form
    document.getElementById("patientForm").addEventListener("submit", function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch('/api/patient', {
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
                    console.log("Data masuk");
                } else {
                    alert("Gagal menyimpan data: " + data.message);
                }
            })
            .catch(error => console.error("Error:", error));
    });
</script>
