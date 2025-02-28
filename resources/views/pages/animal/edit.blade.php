@extends('layouts.layout-create-edit-masterdata');

<!-- Header -->
@section('title', 'Edit Jenis Hewan')

<!-- Container -->
@section('form')
    <form action="{{ route('user.update', 1) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- animal Name -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama Jenis Hewan</label>
            <input type="text" id="" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Pulsus Field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Pulsus</label>
            <input type="number" id="" name=""
                class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Suhu Field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Suhu</label>
            <input type="number" id="" name=""
                class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Frekuensi Napas Field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Frekuensi Napas</label>
            <input type="number" id="" name=""
                class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <x-icons.submit/>
    </form>
    </div>
@endsection
@section('scripts')
