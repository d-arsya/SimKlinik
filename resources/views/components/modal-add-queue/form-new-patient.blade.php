<form class="space-y-3">

    <!-- Name Patient -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama</label>
        <input type="type" name="" value="Dogy"
            class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" >
    </div>

    <!-- Gender Patient -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Gender</label>
        <select name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm">
            <option class="text-sm font-medium leading-6 text-gray-700" value=""  >-</option>
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
        <input type="number" name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
            >
    </div>

    <!-- Animal -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4 ">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Jenis Hewan</label>
        <select name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"  >
            <option class="text-sm font-medium leading-6 text-gray-700" value="">-</option>
            <option class="text-sm font-medium leading-6 text-gray-700" value="">
                test
            </option>
        </select>
    </div>

    <!-- type of Animal -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4 ">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Ras</label>
        <select name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"  >
            <option class="text-sm font-medium leading-6 text-gray-700" value="">-</option>
            <option class="text-sm font-medium leading-6 text-gray-700" value="">
                test
            </option>
        </select>
    </div>

    <!-- Color -->
    <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4 ">
        <label for="" class="text-sm font-medium leading-6 text-gray-700">Warna</label>
        <select name="" class="py-2 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"  >
            <option class="text-sm font-medium leading-6 text-gray-700" value="">-</option>
            <option class="text-sm font-medium leading-6 text-gray-700" value="">
                test
            </option>
        </select>
    </div>

    <div class="flex justify-end mt-6">
        <button @click="openModal = true; step = 3" type="button"
            class="bg-blue-600 text-white px-6 py-2 rounded-md shadow-md hover:bg-blue-700">
            Submit
        </button>
    </div>

</form>
