@extends('layouts.layout-create-edit-masterdata');

@section('title', 'Tambah Warna')

@section('form')
    <form action="{{ route('color.store') }}" method="POST">
        @csrf
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama Warna</label>
            <input type="text" name="name" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="flex justify-end ">
            <button type="submit">
                <x-icons.submit/>
            </button>
        </div>
        </div>
    </form>

@endsection
@section('scripts')
