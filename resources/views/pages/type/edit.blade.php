@extends('layouts.layout-create-edit-masterdata');

<!-- Header -->
@section('title', 'Edit Ras Hewan')

<!-- Container -->
@section('form')
    <form action="{{ route('type.update', 1) }}" method="POST">
        @csrf
        <!-- Diagnose field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama Ras Hewan</label>
            <input type="text" id="" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Animal Choice -->
        <div class="grid items-start w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="role" class="text-sm font-medium leading-6 text-gray-700">Jenis Hewan</label>
            <select id="role" name="role" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm w-48"
                required>
                <option class="text-sm font-medium leading-6 text-gray-700" value="">-</option>
                <option class="text-sm font-medium leading-6 text-gray-700" value="">Anjing</option>
                <option class="text-sm font-medium leading-6 text-gray-700" value="">Kucing</option>
                <option class="text-sm font-medium leading-6 text-gray-700" value="">Sapi</option>
                <option class="text-sm font-medium leading-6 text-gray-700" value="">Bebek</option>
            </select>
        </div>

        <!-- Submit button -->
        <x-icons.submit />
        </div>

    </form>
@endsection
@section('scripts')
