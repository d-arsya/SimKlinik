@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <div class="text-left">
        <h1 class="text-lg font-medium">Profil Saya</h1>
        <div class="text-[#4B5675] text-[15px]">Resepsionis</div>
    </div>
    <div class="mt-6 border-2 rounded-xl">
        <div class="px-6 border-b-2">
            <h2 class="text-lg py-3 font-medium">About</h2>
        </div>
        <form id="submitForm" class="p-6" action="{{ route('user.update', 1) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="grid items-center w-full grid-cols-7 gap-4 mb-4">
                <label class="flex items-center font-medium text-xs text-cadet" for="nama">Nama</label
                    class="flex items-center font-medium text-xs text-cadet">
                <input type="text" name="nama" placeholder="Sandi"
                    class="col-span-6 mt-2 block w-full px-4 py-2 border rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>

                <label class="flex items-center font-medium text-xs text-cadet" for="umur">Umur</label
                    class="flex items-center font-medium text-xs text-cadet">
                <input type="text" name="umur" placeholder="50"
                    class="col-span-6 mt-2 block w-full px-4 py-2 border rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                <label class="flex items-center font-medium text-xs text-cadet" for="gender">Gender</label
                    class="flex items-center font-medium text-xs text-cadet">
                <select id="gender" name="gender"
                    class="col-span-6 py-2 pl-3 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="superadmin">Perempuan</option>
                </select>

                <label class="flex items-center font-medium text-xs text-cadet" for="spesialis">Spesialis</label
                    class="flex items-center font-medium text-xs text-cadet">
                <input type="text" name="spesialis" placeholder="Dokter Anjing"
                    class="col-span-6 mt-2 block w-full px-4 py-2 border rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                <label class="flex items-center font-medium text-xs text-cadet" for="email">Email</label
                    class="flex items-center font-medium text-xs text-cadet">
                <div class="text-sm text-txtblack col-span-6">sandi@gmail.com</div>
                <label class="flex items-center font-medium text-xs text-cadet" for="role">Role</label
                    class="flex items-center font-medium text-xs text-cadet">
                <div class="text-sm text-txtblack col-span-6">Dokter</div>

                <div class="col-span-7 mt-2 flex space-x-2 justify-end">
                    <button
                        class="flex items-center justify-center py-2 px-8 text-white text-xs rounded-lg group bg-danger">
                        Batal</button>
                    <button
                        class="flex items-center justify-center py-2 px-8 text-white text-xs rounded-lg group bg-primary">
                        Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
