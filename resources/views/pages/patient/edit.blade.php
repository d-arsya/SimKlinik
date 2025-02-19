@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <div class="flex items-center space-x-5">
        <img class="w-[100px] h-[100px]" src="img/img-detail-hewan.png" alt="detail-hewan">
        <div class="space-y-1">
            <div class="font-semibold text-lg">Guguk</div>
        </div>
    </div>
    <h2 class="text-lg py-3 font-medium">About</h2>
    <form id="submitForm" action="{{ route('owner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="gap-[10px]">
            <!-- Name Field -->
            <div class="flex items-center mb-5 space-x-8">
                <label for="nama_owner">Nama</label>
                <input type="text" name="nama_owner" placeholder="Ketikkan nama owner pasien..."
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Age Field -->
            <div class="flex items-center mb-5 space-x-8">
                <label for="umur">Umur</label>
                <input type="text" name="umur" placeholder="Ketikkan nama owner pasien..."
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Gender Field -->
            <div class="flex items-center mb-5 space-x-8">
                <label for="gender">Gender</label>
                <input type="text" name="gender" placeholder="cth : Perempuan"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Jenis Hewan -->
            <div class="flex items-center mb-5 space-x-8">
                <label for="jenis">Jenis Hewan</label>
                <input type="text" name="jenis" placeholder="cth : Perempuan"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="flex items-center mb-5 space-x-8">
                <label for="ras">Ras Hewan</label>
                <input type="text" name="ras" placeholder="cth : Perempuan"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="flex items-center mb-5 space-x-8">
                <label for="Warna">Warna</label>
                <input type="text" name="Warna" placeholder="cth : Perempuan"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="flex items-center mb-5 space-x-8">
                <label for="owner">Owner</label>
                <input type="text" name="owner" placeholder="cth : Perempuan"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="flex items-center mb-5 space-x-8">
                <label for="vaksinasi">Vaksinasi</label>
                <input type="text" name="vaksinasi" placeholder="cth : Perempuan"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="flex space-x-3 place-self-end">
                <button type="button" color="red" class="w-[137px]">
                    Batal</button>
                <button type="button" color="blue" class="w-[137px]">
                    Submit</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
