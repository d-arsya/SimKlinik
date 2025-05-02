<div class="space-y-3">

    <!-- Name Patient -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama</label>
        <input type="type" name="" value="Dogy"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" disabled>
    </div>

    <!-- Gender Patient -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Gender</label>
        <input type="text" name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
            disabled>
    </div>

    <!-- Age Patient -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Umur</label>
        <input type="number" name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
            disabled>
    </div>

    <!-- Animal -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4 ">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Jenis Hewan</label>
        <input type="text" name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
            disabled>
    </div>

    <!-- type of Animal -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4 ">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Ras</label>
        <input type="text" name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
            disabled>
    </div>

    <!-- Color -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4 ">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Warna</label>
        <input type="text" name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
            disabled>
    </div>

    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    <!-- Weight -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Berat Badan</label>
        <input type="number" name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
            disabled>
    </div>

    <!-- Pulse -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Pulsus</label>
        <input type="number" name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
            disabled>
    </div>

    <!-- Temperature -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Suhu</label>
        <input type="number" name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
            disabled>
    </div>

    <!-- Breathe -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4 ">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Frekuensi Napas</label>
        <input type="number" name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
            disabled>
    </div>

    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    <!-- Service Type -->
    <div class="grid items-start w-full grid-cols-[1fr_3fr] gap-4 mb-4">
        <label class="text-sm font-medium leading-6 text-gray-700">Layanan</label>
        <select name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" disabled>
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
        <input type="checkbox" value="" class="sr-only peer" checked>
        <div
            class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600">
        </div>
    </div>

    <!-- Vaccination Type -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Jenis Vaksin</label>
        <input type="text" name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
            disabled>
    </div>

    <!-- Submit Button -->
    <div class="flex justify-end mt-6">
        <button @click="openModal = false; document.body.style.overflow = 'auto'"
            class="bg-blue-600 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-700">
            Submit
        </button>
    </div>

</div>
