@extends('layouts.layout-create-edit-masterdata');

<!-- Header -->
@section('title', 'Edit Layanan')

<!-- Container -->
@section('form')
    <form action="{{ route('service.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Service Name -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama Layanan</label>
            <input name="name" type="text" value="{{ $service->name }}"  class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
                required>
        </div>

        <!-- Price Field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Harga Layanan</label>
            <input type="number" name="price" value="{{ $service->price }}"
                class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Submit button -->
        <x-icons.submit/>

    </form>
@endsection
@section('scripts')
