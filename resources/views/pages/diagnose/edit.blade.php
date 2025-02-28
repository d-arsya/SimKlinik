@extends('layouts.layout-create-edit-masterdata');

<!-- Header -->
@section('title', 'Edit Diagnosa')

<!-- Container -->
@section('form')
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Diagnose field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama Diagnosa</label>
            <input type="text" id="" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Animal Type -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label class="text-sm font-medium leading-6 text-gray-700">Nama Jenis Hewan</label>
            <div class="flex flex-wrap gap-3">
                <label class="flex items-center space-x-2 text-sm text-gray-600">
                    <input type="checkbox" name="jenis_hewan[]" value="Anjing"
                        class="w-4 h-4 text-primary border-gray-300 rounded ">
                    <span>Anjing</span>
                </label>
                <label class="flex items-center space-x-2 text-sm text-gray-600">
                    <input type="checkbox" name="jenis_hewan[]" value="Kucing"
                        class="w-4 h-4 text-primary border-gray-300 rounded ">
                    <span>Kucing</span>
                </label>
                <label class="flex items-center space-x-2 text-sm text-gray-600">
                    <input type="checkbox" name="jenis_hewan[]" value="Kelinci"
                        class="w-4 h-4 text-primary border-gray-300 rounded ">
                    <span>Kelinci</span>
                </label>
                <label class="flex items-center space-x-2 text-sm text-gray-600">
                    <input type="checkbox" name="jenis_hewan[]" value="Burung"
                        class="w-4 h-4 text-primary border-gray-300 rounded ">
                    <span>Burung</span>
                </label>
            </div>
        </div>
        <style>
            input[type="checkbox"]:checked+span {
                color: #036CA1;
                font-weight: 600;
            }
        </style>

        <!-- Submit button -->
        <x-icons.submit />
        </div>
    </form>

@endsection
@section('scripts')
