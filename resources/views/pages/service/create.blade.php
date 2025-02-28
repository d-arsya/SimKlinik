@extends('layouts.layout-create-edit-masterdata');

<!-- Header -->
@section('title', 'Tambah Warna')

<!-- Container -->
@section('form')
    <form action="{{ route('service.store') }}" method="POST">
        @csrf
            <!-- Service Name -->
            <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
                <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama Layanan</label>
                <input type="text" id="" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
                    required>
            </div>

            <!-- Price Field -->
            <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
                <label for="" class="text-sm font-medium leading-6 text-gray-700">Harga Layanan</label>
                <input type="number" id="" name=""
                    class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Submit button -->
           <x-icons.submit/>
    </form>

@endsection
@section('scripts')
