@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="border-2 rounded-xl p-4 bg-white shadow-md">
        <div class="sticky top-0 bg-white z-10 pt-4 ">
            <h2 class="text-lg font-semibold text-center">
                INPUT PEMERIKSAAN PASIEN DOGY
            </h2>
            <div class="flex flex-wrap gap-2 md:flex-row justify-center items-center my-2">
                <span class="px-4 py-2 bg-green-500 text-white rounded-full text-sm">Berat Badan: 10 kg</span>
                <span class="px-4 py-2 bg-green-500 text-white rounded-full text-sm">Pulsa: 70 bpm</span>
                <span class="px-4 py-2 bg-green-500 text-white rounded-full text-sm">Frekuensi napas: 20 rpm</span>
                <span class="px-4 py-2 bg-red-500 text-white rounded-full text-sm">Suhu: 40 °C</span>
            </div>
        </div>

        <form method="post" id="checkup">
            <div class="overflow-auto max-h-[70vh] p-4">
                <form action="" method="">
                    @csrf
                    <div class="grid gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium">Anamnesa</label>
                            <textarea style="overflow-y: auto !important;"
                                class="w-full p-2 border rounded-lg bg-gray-100 h-24 overflow-y-auto resize-none mt-2"
                                placeholder="Ketik anamnesa..."></textarea>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-medium">Gejala</label>
                            <textarea style="overflow-y: auto !important;"
                                class="w-full p-2 border rounded-lg bg-gray-100 h-16 overflow-y-auto resize-none mt-2"
                                placeholder="Ketik gejala..."></textarea>
                        </div>
                    </div>

                    <hr class="border-gray-200 my-4">

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-medium">Diagnosa</label>
                            <div class="flex gap-2 mt-2">
                                <select class="w-full border rounded-lg bg-gray-100 h-10 text-gray-400 text-sm">
                                    <option value="" class="text-[#000]" disabled selected>Pilih Diagnosa</option>
                                    @foreach ($diagnose as $item)
                                        <option value="{{ $item->id }}" class="text-[#000]">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <button type="button" onclick="addDiagnosa()">
                                    <x-icons.add />
                                </button>
                            </div>
                            <div id="diagnosa-container"></div>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium">Layanan</label>
                            <div class="flex gap-2 mt-2">
                                <select class="w-full border rounded-lg bg-gray-100 h-10 text-gray-400 text-sm">
                                    <option value="" class="text-[#000]" disabled selected>Pilih Layanan</option>
                                    @foreach ($service as $item)
                                        <option value="{{ $item->id }}" class="text-[#000]">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <button type="button" onclick="addLayanan()">
                                    <x-icons.add />
                                </button>
                            </div>
                            <div id="layanan-container"></div>
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
                                    <select class="w-full border rounded-lg bg-gray-100 h-10 text-gray-700 text-sm mt-2">
                                        <option value="">-</option>
                                        <option value="test">Test</option>
                                    </select>
                                </div>

                                <!-- Nama Obat -->
                                <div>
                                    <label class="block text-gray-700 font-medium">Nama Obat</label>
                                    <select class="w-full border rounded-lg bg-gray-100 h-10 text-gray-700 text-sm mt-2">
                                        <option value="">-</option>
                                        <option value="test">Test</option>
                                    </select>
                                </div>

                                <!-- Jumlah & Tambah -->
                                <div>
                                    <label class="block text-gray-700 font-medium">Jumlah</label>
                                    <div class="flex">
                                        <input
                                            class="w-full border rounded-lg bg-gray-100 h-10 text-gray-700 text-sm mt-2 p-2 max-w-[80%]"></input>
                                        <button type="button" onclick="addObat()">
                                            <x-icons.add></x-icons.add>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id="obat-container"></div>
                        </div>

                        <!-- Kolom Kanan (Alternatif Obat) -->
                        <div class="w-full">
                            <label class="block text-gray-700 font-medium">Alternatif</label>
                            <textarea class="w-full p-2 border rounded-lg bg-gray-100 h-24 mt-2 overflow-y-auto resize-none"
                                placeholder="Ketik obat alternatif ..."></textarea>
                        </div>
                    </div>

                    <hr class="border-gray-200 my-4">

                    <div class="flex justify-end gap-4">
                        <button type="button" id="btn-inpatient">
                            <x-icons.add-to-inpatient />
                        </button>
                        <button type="button" id="btn-submit">
                            <x-icons.submit />
                        </button>
                    </div>
                </form>
            </div>
    </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function addDiagnosa() {
            let container = document.getElementById('diagnosa-container');
            let newRow = document.createElement('div');

            newRow.classList.add('row-diagnosa', 'flex', 'gap-2', 'mt-2');

            newRow.innerHTML = `
        <select class="w-full border rounded-lg bg-gray-100 h-10 text-gray-400 text-sm">
            <option value="" class="text-[#000]" disabled selected>Pilih Layanan</option>
            @foreach ($diagnose as $item)
                <option value="{{ $item->id }}" class="text-[#000]">{{ $item->name }}</option>
            @endforeach
        </select>
        <button type="button" onclick="removeDiagnosa(this)">
            <x-icons.redcancel />
        </button>
    `;

            container.appendChild(newRow);
        }

        function removeDiagnosa(btn) {
            btn.closest('.row-diagnosa').remove();
        }

        function addLayanan() {
            let container = document.getElementById('layanan-container');
            let newSelect = document.createElement('div');
            newSelect.innerHTML = `
            <div class="flex gap-2 mt-2">
                <select class="w-full border rounded-lg bg-gray-100 h-10 text-gray-400 text-sm">
                    <option value="" class="text-[#000]" disabled selected>Pilih Layanan</option>
                    @foreach ($service as $item)
                        <option value="{{ $item->id }}" class="text-[#000]">{{ $item->name }}</option>
                    @endforeach
                </select>
                <button type="button" onclick="removeElement(this)">
                    <x-icons.redcancel/>
                </button>
            </div>
        `;
            container.appendChild(newSelect);
        }

        function removeElement(btn) {
            btn.parentElement.parentElement.remove();
        }

        function addObat() {
            let container = document.getElementById('obat-container');
            let newRow = document.createElement('div');

            newRow.classList.add('row-obat', 'flex');

            newRow.innerHTML = `
            <div class="grid grid-cols-3 gap-2 w-[580px]">
                    <div>
                        <div class="flex gap-2 mt-2">
                            <select class="w-full border rounded-lg bg-gray-100 h-10">
                                <option value="">-</option>
                                <option value="test">Test</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="flex gap-2 mt-2">
                            <select class="w-full border rounded-lg bg-gray-100 h-10">
                                <option value="">-</option>
                                <option value="test">Test</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="flex gap-3 mt-2">
                            <input type="number" class="w-24 border rounded-lg bg-gray-100 h-10">
                            <button type="button" onclick="removeObat(this)" class="ml-2">
                                <x-icons.redcancel />
                            </button>
                        </div>
                    </div>
                </div>
        `;

            container.appendChild(newRow);
        }

        function removeObat(btn) {
            btn.closest('.row-obat').remove();
        }

        document.addEventListener("DOMContentLoaded", function() {


            let btnInpatient = document.getElementById("btn-inpatient");
            let btnSubmit = document.getElementById("btn-submit");

            // Tombol Rawat Inap (Langsung Redirect setelah OK)
            if (btnInpatient) {
                btnInpatient.addEventListener("click", function() {
                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Pasien akan ditambahkan ke rawat inap.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, tambahkan!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect ke halaman inpatient.index langsung tanpa notifikasi tambahan
                            window.location.href = "/inpatient";
                        }
                    });
                });
            } else {
                console.error("Tombol 'Rawat Inap' tidak ditemukan!");
            }

            // Tombol Submit (Tetap Pakai Notifikasi)
            if (btnSubmit) {
                btnSubmit.addEventListener("click", function() {
                    Swal.fire({
                        title: "Yakin ingin submit?",
                        text: "Silakan masukkan catatan tambahan (Opsional)",
                        input: "textarea",
                        inputPlaceholder: "Masukkan catatan tambahan...",
                        showCancelButton: true,
                        confirmButtonText: "Submit",
                        cancelButtonText: "Batal",
                        preConfirm: (note) => {
                            return note || "Tidak ada catatan tambahan"; // Jika kosong, default
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Data telah dikirim dengan catatan: " + result.value,
                                icon: "success"
                            }).then(() => {
                                // Redirect ke halaman queue.index setelah OK ditekan
                                window.location.href = "/queue";
                            });
                        }
                    });
                });
            } else {
                console.error("Tombol 'Submit' tidak ditemukan!");
            }
        });

        function loadDiagnoses() {
            const diagnoseSelect = document.getElementById("diagnose")
            if (!diagnoseSelect) return;

            diagnoseSelect.innerHTML =
                '<option value="" class="text-[#000]" disabled selected >Pilih Layanan</option>'

            fetch(`api/diang`)

        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("textarea").forEach(textarea => {
                textarea.style.minHeight = textarea.clientHeight +
                    "px"; // Tetapkan min-height sesuai ukuran awal

                textarea.addEventListener("input", function() {
                    this.style.height = this.style
                        .minHeight; // Pastikan tidak lebih kecil dari ukuran awal
                    this.style.height = this.scrollHeight + "px"; // Sesuaikan tinggi dengan konten
                });
            });
        });
    </script>

@endsection
