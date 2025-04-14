@extends('layouts.layout-create-edit-masterdata');

<!-- Header -->
@section('title', 'Tambah Layanan')

<!-- Container -->
@section('form')
    <form action="{{ route('service.store') }}" method="POST">
        @csrf
        <!-- Service Name -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama Layanan</label>
            <input type="text" name="name" placeholder="Masukkan nama layanan . . ."
                class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Price Field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Harga Layanan</label>
            <input type="number" id="" name="price" placeholder="Masukkan harga pelayanan . . ."
                class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Submit button -->
        <div class="flex justify-end">
            <button type="submit">
                <x-icons.submit />
            </button>
        </div>
    </form>

@endsection
@section('scripts')
