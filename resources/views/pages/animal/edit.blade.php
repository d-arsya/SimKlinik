@extends('layouts.layout-create-edit-masterdata');

<!-- Header -->
@section('title', 'Edit Jenis Hewan')

<!-- Container -->
@section('form')
    <form action="{{ route('animal.update', $animal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- animal Name -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama Jenis Hewan</label>
            <input type="text" name="name" value="{{ $animal->name }}" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Pulsus Field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Pulsus</label>
            <input type="number" name="pulse" value="{{ $animal->pulse }}"
                class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Suhu Field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Suhu</label>
            <input type="number" name="temperature" value="{{ $animal->temperature }}"
                class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Frekuensi Napas Field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Frekuensi Napas</label>
            <input type="number" name="breath" value="{{ $animal->breath }}"
                class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <x-icons.submit/>
    </form>
    </div>
@endsection
@section('scripts')
