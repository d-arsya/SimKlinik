@extends('layouts.layout-create-edit-masterdata');

<!-- Header -->
@section('title', 'Edit Ras Hewan')

<!-- Container -->
@section('form')
    <form action="{{ route('type.update', $type->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Diagnose field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label for="" class="text-sm font-medium leading-6 text-gray-700">Nama Ras Hewan</label>
            <input type="text" name="name" value="{{ $type->name }}"
                class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Animal Choice -->
        <div class="grid items-start w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label class="text-sm font-medium leading-6 text-gray-700">Jenis Hewan</label>
            <select name="animal_id" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm w-48" required>
                <option class="text-sm font-medium leading-6 text-gray-700"
                    value="{{ $type->animal->id }} selected disabled">{{ $type->animal->name }}
                </option>
                @foreach ($animals as $index => $item)
                    @if ($item->id != $type->animal_id)
                        <option class="text-sm font-medium leading-6 text-gray-700" value="{{ $item->id }}">
                            {{ $item->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <!-- Submit button -->
        <x-icons.submit />
        </div>

    </form>
@endsection
@section('scripts')
