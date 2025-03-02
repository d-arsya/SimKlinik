@extends('layouts.layout-create-edit-masterdata');

<!-- Header -->
@section('title', 'Tambah Diagnosa')

<!-- Container -->
@section('form')
    <form action="{{ route('diagnose.store') }}" method="POST">
        @csrf
        <!-- Diagnose field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama Diagnosa</label>
            <input type="text" name="name" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Animal Type -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label class="text-sm font-medium leading-6 text-gray-700">
                Nama Jenis Hewan
            </label>
            <div class="grid grid-cols-4 gap-2">
                @foreach ($animals as $item)
                    <label class="flex items-center space-x-2 text-sm text-gray-600">
                        <input type="checkbox" name="animal_id[]" value="{{ $item->id }}"
                            class="w-4 h-4 text-primary border-gray-300 rounded">
                        <span>{{ $item->name }}</span>
                    </label>
                @endforeach
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
