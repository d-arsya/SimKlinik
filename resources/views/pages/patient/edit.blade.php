@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <div class="flex items-center space-x-5">
        <div class="space-y-1">
            <div class="font-semibold text-lg">{{ $patient->name }}</div>
        </div>
    </div>
    <h2 class="text-lg py-3 font-medium">About</h2>
    <form id="submitForm" action="{{ route('patient.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="gap-[10px]">
            <!-- Name Field -->
            <div class="flex items-center mb-5 space-x-8">
                <label for="name">Nama</label>
                <input type="text" name="name" value="{{ $patient->name }}"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Age Field -->
            <div class="flex items-center mb-5 space-x-8">
                <label for="birth">Lahir</label>
                <input type="date" name="birth" value="{{ $patient->birth }}"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Gender Field -->
            <div class="flex items-center mb-5 space-x-8">
                <label for="gender">Gender</label>
                <select name="gender"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Jantan" {{ $patient->gender == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                    <option value="Betina" {{ $patient->gender == 'Betina' ? 'selected' : '' }}>Betina</option>
                </select>
            </div>

            <!-- Jenis Hewan -->
            <div class="flex items-center mb-5 space-x-8">
                <label for="animal_id">Hewan</label>
                <select id="animal_id" name="animal_id"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($animal as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $patient->animal_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-5 space-x-8">
                <label for="type_id">Ras</label>
                <select id="type_id" name="type_id"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($patient->animal->types as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $patient->type_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-5 space-x-8">
                <label for="color_id">Warna</label>
                <select name="color_id"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($color as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $patient->color_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-5 space-x-8">
                <label for="owner_id">Owner</label>
                <select name="owner_id"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($owner as $item)
                        <option value="{{ $item->id }}" {{ $item->id == $patient->owner_id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-5 space-x-8">
                <label for="vaccine">Vaksinasi</label>
                <input type="text" name="vaccine" value="{{ $patient->vaccine }}"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex space-x-3 place-self-end">
                <button type="submit" color="blue" class="bg-primary p-2 text-white rounded-md">
                    Submit</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        const typeSelector = document.querySelector("#type_id")
        const animalSelector = document.querySelector("#animal_id")
        animalSelector.addEventListener('change', function(e) {
            fetch(`/api/animal/${e.target.value}/type`)
                .then(res => res.json())
                .then(res => {
                    typeSelector.innerHTML = "";
                    res.data.forEach(function(type) {
                        typeSelector.innerHTML += `<option value="${type.id}">${type.name}</option>`;
                    })
                })
        })
    </script>
@endsection
