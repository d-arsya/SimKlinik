@extends('layouts.layout-create-edit-masterdata');
@section('title', 'Tambah Jenis Hewan')
@section('form')
    <form action="{{ route('animal.store') }}" method="POST">
        @csrf
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama Jenis Hewan</label>
            <input type="text" name="name" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Pulsus</label>
            <input type="number" name="pulse" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
                required>
        </div>
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Suhu</label>
            <input type="number" name="temperature" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
                required>
        </div>
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Frekuensi Napas</label>
            <input type="number" name="breath" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm"
                required>
        </div>
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label class="text-sm font-medium leading-6 text-gray-700">
                Nama Tambahkan Diagnosa
            </label>
            <div class="grid grid-cols-4 gap-2">
                @foreach ($diagnoses as $item)
                    <label class="flex items-center space-x-2 text-sm text-gray-600">
                        <input type="checkbox" name="diagnose_name[]" value="{{ $item->name }}"
                            class="w-4 h-4 text-primary border-gray-300 rounded">
                        <span>{{ $item->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit">
                <x-icons.submit />
            </button>
        </div>
    </form>

@endsection
@section('scripts')
