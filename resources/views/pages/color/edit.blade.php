@extends('layouts.layout-create-edit-masterdata');
@section('title', 'Edit Warna')
@section('form')
    <form action="{{ route('color.update', $color->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama Warna Hewan</label>
            <input type="text" name="name" value="{{ $color->name }}"
                class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
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
