@extends('layouts.main')

@section('title', 'Hewan Peliharaan Baru')

@section('container')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-4">Hewan Peliharaan Baru</h2>

    <!-- Informasi Pemeriksaan -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="p-3 bg-green-500 text-white font-semibold rounded-lg text-center">
            Berat Badan: <span class="font-bold">10 kg</span>
        </div>
        <div class="p-3 bg-green-500 text-white font-semibold rounded-lg text-center">
            Pulsa: <span class="font-bold">70 bpm</span>
        </div>
        <div class="p-3 bg-green-500 text-white font-semibold rounded-lg text-center">
            Frekuensi Napas: <span class="font-bold">20 kali per menit</span>
        </div>
        <div class="p-3 bg-red-500 text-white font-semibold rounded-lg text-center">
            Suhu: <span class="font-bold">40 derajat celcius</span>
        </div>
    </div>

    <!-- Form Pemeriksaan -->
    <form action="" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700">Anamnesa</label>
            <textarea class="w-full p-2 border rounded-lg" placeholder="Ketikan anamnesa..."></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Gejala</label>
            <textarea class="w-full p-2 border rounded-lg" placeholder="Ketikan gejala..."></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Diagnosa</label>
            <input type="text" class="w-full p-2 border rounded-lg" placeholder="cth: Diare" readonly>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Jenis Servis</label>
            <select class="w-full p-2 border rounded-lg">
                <option>cth: Konsultasi</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Jumlah Hari Pemeriksaan</label>
            <input type="number" class="w-full p-2 border rounded-lg" min="1" value="1">
        </div>

        <!-- Tambah Servis -->
        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg mb-4">Tambah Servis</button>

        <!-- Tabel Obat -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">Jenis Obat</th>
                        <th class="px-4 py-2 border">Nama Obat</th>
                        <th class="px-4 py-2 border">Jumlah Obat</th>
                        <th class="px-4 py-2 border">Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2 border">
                            <select class="w-full p-2 border rounded-lg">
                                <option>-- Pilih Obat --</option>
                            </select>
                        </td>
                        <td class="px-4 py-2 border">
                            <select class="w-full p-2 border rounded-lg">
                                <option>-- Pilih Nama Obat --</option>
                            </select>
                        </td>
                        <td class="px-4 py-2 border text-center">
                            <input type="number" class="w-16 p-2 border rounded-lg" value="1">
                        </td>
                        <td class="px-4 py-2 border">
                            <input type="text" class="w-full p-2 border rounded-lg" placeholder="beri note di sini">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg mt-4">Tambah Obat</button>

        <!-- Tombol Submit -->
        <div class="flex justify-between mt-6">
            <button type="button" class="bg-yellow-500 text-white px-4 py-2 rounded-lg">Tambah ke Rawat Inap</button>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Submit</button>
        </div>
    </form>
</div>
@endsection
