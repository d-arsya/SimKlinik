@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="border-2 rounded-xl p-4 bg-white shadow-md">
        @php
            // Ambil rata-rata dari tabel animals
            $avgPulse = $patient->animal->pulse;
            $avgTemp = $patient->animal->temperature;
            $avgBreath = $patient->animal->breath;
        @endphp

        <div class="sticky top-0 bg-white z-10 pt-4 ">
            <h2 class="text-lg font-semibold text-center">
                Pemeriksaan Pasien {{ $patient->name }}
            </h2>
            <div class="flex flex-wrap gap-2 md:flex-row justify-center items-center my-2">

                <span class="px-4 py-2 text-primary rounded-full text-sm border border-primary">
                    Berat Badan: {{ $checkup->weight }} kg
                </span>

                {{-- Pulse --}}
                @php
                    $pulse = $checkup->pulse;
                    $tolerance5 = 20;
                    $tolerance10 = 60;

                    if ($pulse >= $avgPulse - $tolerance5 && $pulse <= $avgPulse + $tolerance5) {
                        $pulseColor = 'bg-green-500'; // Normal (±5)
                    } elseif ($pulse >= $avgPulse - $tolerance10 && $pulse <= $avgPulse + $tolerance10) {
                        $pulseColor = 'bg-orange-500'; // Warning (±10)
                    } else {
                        $pulseColor = 'bg-red-500'; // Abnormal (> ±10)
                    }
                @endphp
                <span class="px-4 py-2 {{ $pulseColor }} text-white rounded-full text-sm">
                    Pulsa: {{ $pulse }}
                </span>

                {{-- Suhu --}}
                @php
                    $temp = $checkup->temperature;
                    $tolerance5 = 5;
                    $tolerance10 = 15;

                    if ($temp >= $avgTemp - $tolerance5 && $temp <= $avgTemp + $tolerance5) {
                        $tempColor = 'bg-green-500'; // Normal (±5)
                    } elseif ($temp >= $avgTemp - $tolerance10 && $temp <= $avgTemp + $tolerance10) {
                        $tempColor = 'bg-orange-500'; // Warning (±10)
                    } else {
                        $tempColor = 'bg-red-500'; // Abnormal (> ±10)
                    }
                @endphp
                <span class="px-4 py-2 {{ $tempColor }} text-white rounded-full text-sm">
                    Suhu: {{ $temp }} °C
                </span>

                {{-- Frekuensi napas --}}
                @php
                    $breath = $checkup->breath;
                    $tolerance5 = 20;
                    $tolerance10 = 60;

                    if ($breath >= $avgBreath - $tolerance5 && $breath <= $avgBreath + $tolerance5) {
                        $breathColor = 'bg-green-500'; // Normal (±5)
                    } elseif ($breath >= $avgBreath - $tolerance10 && $breath <= $avgBreath + $tolerance10) {
                        $breathColor = 'bg-orange-500'; // Warning (±10)
                    } else {
                        $breathColor = 'bg-red-500'; // Abnormal (> ±10)
                    }
                @endphp
                <span class="px-4 py-2 {{ $breathColor }} text-white rounded-full text-sm">
                    Frekuensi napas: {{ $breath }} rpm
                </span>

            </div>
        </div>

        <form method="post" id="checkup"
            action="{{ route('patient.diagnose.update', [$checkup->patient->id, $checkup->id]) }}">
            @method('PUT')
            <div class="overflow-auto max-h-[70vh] p-4">
                <form action="" method="">
                    @csrf
                    <div class="grid gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium">Anamnesa</label>
                            <textarea name="anamnesis" style="overflow-y: auto !important;"
                                class="w-full p-2 border rounded-lg bg-gray-100 h-24 overflow-y-auto resize-none mt-2 text-gray-400"
                                placeholder="Ketik anamnesa...">{{ $checkup->anamnesis }}</textarea>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium">Gejala</label>
                            <textarea name="symptom" style="overflow-y: auto !important;"
                                class="w-full p-2 border rounded-lg bg-gray-100 h-16 overflow-y-auto resize-none mt-2 text-gray-400"
                                placeholder="Ketik gejala...">{{ $checkup->symptom }}</textarea>
                        </div>
                    </div>

                    <hr class="border-gray-200 my-4">

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium">Diagnosa</label>
                            <div class="flex gap-2 mt-2">
                                <select id="diagnoses-option"
                                    class="w-full border rounded-lg bg-gray-100 h-10 text-gray-400 text-sm">
                                    <option value="" class="text-[#000]" disabled selected>Pilih Diagnosa</option>
                                    @foreach ($diagnose as $item)
                                        <option value="{{ $item->id }}-{{ $item->name }}" class="text-[#000]">
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <button type="button" onclick="addDiagnosa()">
                                    <x-icons.add />
                                </button>
                            </div>
                            <div id="diagnose-container">
                                @foreach ($diagnoses as $item)
                                    <div class="flex gap-2">
                                        <h1 data-id="{{ $item->id }}"
                                            class="w-full border rounded-lg bg-gray-100 h-10 text-gray-400 text-sm">
                                            {{ $item->name }}
                                        </h1>
                                        <button type="button" class="" onclick="removeDiagnosa(this)">
                                            <x-icons.redcancel />
                                        </button>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-cols-2 mt-2">
                                <label class="block text-gray-700 font-medium">Layanan</label>
                                <label class="block text-gray-700 font-medium">Jumlah</label>

                            </div>
                            <div class="flex gap-2 mt-2">
                                <select id="services-option"
                                    class="w-full border rounded-lg bg-gray-100 h-10 text-gray-400 text-sm">
                                    <option value="" class="text-[#000]" disabled selected>Pilih Layanan</option>
                                    @foreach ($service as $item)
                                        <option value="{{ $item->id }}-{{ $item->name }}" class="text-[#000]">
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <input id="services-day"
                                    class="w-full border rounded-lg bg-gray-100 h-10 text-gray-700 text-sm p-2 max-w-[80%]"></input>
                                <button type="button" onclick="addService()">
                                    <x-icons.add />
                                </button>
                            </div>
                            <div id="service-container">
                                @foreach ($services as $item)
                                    <div class="flex gap-2">
                                        <h1 data-id="{{ $item['id'] }}"
                                            class="w-full border rounded-lg bg-gray-100 h-10 text-gray-400 text-sm">
                                            {{ $item['name'] }} (x{{ $item['days'] }})
                                        </h1>
                                        <button type="button" class="" onclick="removeService(this)">
                                            <x-icons.redcancel />
                                        </button>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-200 my-4">

                    <!-- Add Obat -->
                    <div class="grid grid-cols-1 lg:grid-cols-[1fr_1fr] gap-4">
                        <!-- Kolom Kiri -->
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 w-full">
                                <!-- Jenis Obat -->
                                <div>
                                    <label class="block text-gray-700 font-medium">Jenis Obat</label>
                                    <select id="drug-category"
                                        class="w-full border rounded-lg bg-gray-100 h-10 text-gray-700 text-sm mt-2">
                                        <option value="">Jenis Obat</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Nama Obat -->
                                <div>
                                    <label class="block text-gray-700 font-medium">Nama Obat</label>
                                    <select id="drug-option"
                                        class="w-full border rounded-lg bg-gray-100 h-10 text-gray-700 text-sm mt-2">
                                    </select>
                                </div>

                                <!-- Jumlah & Tambah -->
                                <div>
                                    <label class="block text-gray-700 font-medium">Jumlah</label>
                                    <div class="flex">
                                        <input id="drug-quantity"
                                            class="w-full border rounded-lg bg-gray-100 h-10 text-gray-700 text-sm mt-2 p-2 max-w-[80%]"></input>
                                        <button type="button" onclick="addDrug()">
                                            <x-icons.add></x-icons.add>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id="obat-container">
                                @foreach ($drugs as $item)
                                    <div class="flex gap-2">
                                        <h1 data-id="{{ $item->id }}"
                                            class="w-full border rounded-lg bg-gray-100 h-10 text-gray-400 text-sm">
                                            {{ $item->name }} ({{ $item->amount }} pcs)
                                        </h1>
                                        <button type="button" class="" onclick="removeDrug(this)">
                                            <x-icons.redcancel />
                                        </button>

                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Kolom Kanan (Alternatif Obat) -->
                        <div class="w-full">
                            <label class="block text-gray-700 font-medium">Alternatif</label>
                            <textarea name="alternativeDrugs" class="w-full p-2 border rounded-lg bg-gray-100 h-24 mt-2 overflow-y-auto resize-none"
                                placeholder="Ketik obat alternatif ...">{{ $checkup->alternativeDrugs }}</textarea>
                        </div>
                    </div>

                    <hr class="border-gray-200 my-4">

                    <div class="flex justify-end gap-4">
                        <button name="inpatient" value="true" type="submit" id="btn-inpatient">
                            <x-icons.add-to-inpatient />
                        </button>
                        <button name="inpatient" value="false" type="submit" id="btn-submit">
                            <x-icons.submit />
                        </button>
                    </div>
                </form>
            </div>
    </div>
    </form>
    <script>
        let drugCategory = document.getElementById('drug-category');
        const drugContainer = document.getElementById('drug-option');
        drugCategory.addEventListener('change', function(e) {
            const category = e.target.value;
            fetch('/api/drugs/category/' + category)
                .then(e => e.json())
                .then(e => {
                    drugContainer.innerHTML = ""
                    e.forEach(element => {
                        drugContainer.innerHTML +=
                            `<option value="${element.id}-${element.name}">${element.name} (Stok ${element.quantity})</option>`
                    });
                })
        })

        function addDrug() {
            let newRow = document.createElement('div');
            let value = document.getElementById('drug-option').value.split('-')
            let amount = document.getElementById('drug-quantity').value

            newRow.classList.add('flex', 'gap-2');

            newRow.innerHTML = `<h1 data-id="${value[0]}" class="w-full border rounded-lg bg-gray-100 h-10 text-gray-400 text-sm">${value[1]} (${amount})</h1>
            <button type="button" class="" onclick="removeDrug(this)">
                <x-icons.redcancel />
            </button>`;

            fetch('/api/checkup/{{ $checkup->id }}/drug/' + value[0] + '/' + value)
                .then(e => e.json())
                .then(e => {
                    document.getElementById('obat-container').appendChild(newRow);
                    document.getElementById('drug-option').value = null;
                    document.getElementById('drug-quantity').value = null;
                })
        }

        function removeDrug(btn) {
            const container = btn.parentElement
            const h1 = container.querySelector('h1');
            let id = h1.dataset.id
            fetch('/api/checkup/{{ $checkup->id }}/drug/' + id + '/2')
                .then(e => e.json())
                .then(e => container.remove())

        }

        function addDiagnosa() {
            let newRow = document.createElement('div');
            let value = document.getElementById('diagnoses-option').value.split('-')

            newRow.classList.add('flex', 'gap-2');

            newRow.innerHTML = `<h1 data-id="${value[0]}" class="w-full border rounded-lg bg-gray-100 h-10 text-gray-400 text-sm">${value[1]}</h1>
            <button type="button" class="" onclick="removeDiagnosa(this)">
                <x-icons.redcancel />
            </button>`;

            fetch('/api/checkup/{{ $checkup->id }}/diagnose/' + value[0])
                .then(e => e.json())
                .then(e => {

                    document.getElementById('diagnose-container').appendChild(newRow);
                    document.getElementById('diagnoses-option').value = null;
                })
        }

        function removeDiagnosa(btn) {
            const container = btn.parentElement
            const h1 = container.querySelector('h1');
            let id = h1.dataset.id
            fetch('/api/checkup/{{ $checkup->id }}/diagnose/' + id)
                .then(e => e.json())
                .then(e => container.remove())

        }

        function addService() {
            let newRow = document.createElement('div');
            let value = document.getElementById('services-option').value.split('-')
            let days = document.getElementById('services-day').value

            newRow.classList.add('flex', 'gap-2');

            newRow.innerHTML = `<h1 data-id="${value[0]}" class="row-service w-full border rounded-lg bg-gray-100 h-10 text-gray-400 text-sm">${value[1]} (x${days})</h1>
            <button type="button" class="" onclick="removeService(this)">
                <x-icons.redcancel />
            </button>`;

            fetch('/api/checkup/{{ $checkup->id }}/service/' + value[0] + '/' + days)
                .then(e => e.json())
                .then(e => {

                    document.getElementById('service-container').appendChild(newRow);
                    document.getElementById('services-option').value = null;
                    document.getElementById('services-day').value = 1;
                })
        }

        function removeService(btn) {
            const container = btn.parentElement
            const h1 = container.querySelector('h1');
            let id = h1.dataset.id
            fetch('/api/checkup/{{ $checkup->id }}/service/' + id + '/0')
                .then(e => e.json())
                .then(e => container.remove())

        }
    </script>

@endsection
