@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <div class="flex justify-between mb-7">
        <div class="flex items-center space-x-5">
            <div class="space-y-1">
                <div class="font-semibold text-lg">{{ $owner->name }}</div>
            </div>
        </div>
    </div>
    <h2 class="text-lg py-3 font-medium">About</h2>
    <form id="submitForm" action="{{ route('owner.update', $owner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="gap-[10px]">
            <!-- Name Field -->
            <div class="flex items-center mb-5 space-x-8">
                <label for="name">Nama</label>
                <input type="text" name="name" value="{{ $owner->name }}" placeholder="Ketikkan nama owner pasien..."
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Gender Field -->
            <div class="flex items-center mb-5 space-x-8">
                <label for="gender">Gender</label>
                <select type="text" name="gender" placeholder="cth : Perempuan"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Laki-Laki" {{ $owner->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="Perempuan" {{ $owner->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <!-- Phone Number Field -->
            <div class="flex items-center mb-5 space-x-8">
                <label for="phone">Telepon</label>
                <input type="text" value="{{ $owner->phone }}" name="phone" placeholder="cth : 08xxxx"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Address Field -->
            <div class="flex items-center mb-5 space-x-8">
                <label for="address">Alamat</label>
                <textarea name="address" placeholder="Alamat Domisili"
                    class=" mt-2 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ $owner->address }}</textarea>
            </div>

            <div class="flex space-x-3 place-self-end">
                <button type="submit" color="blue" class="bg-primary rounded-md p-2 text-white">
                    Submit</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
