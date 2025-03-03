@extends('layouts.main')
@section('title', 'SimKlinik')

@section('container')
    <div class="text-left">
        <h1 class="text-lg font-medium">Profil Saya</h1>
        <p class="text-cadet text-[15px]">{{ $user->name }}</p>
    </div>
    <div class="mt-4 bg-warning-filter h-[120px] rounded-xl flex items-center justify-center">
        <svg width="44" height="51" viewBox="0 0 44 51" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M22.0031 21.895C25.0417 21.895 27.5926 23.954 28.3132 26.7378C29.2191 30.2283 29.0967 34.0535 33.0791 36.0399C36.6139 37.2427 37.9512 38.7544 37.9512 42.8072C37.9512 46.0419 35.1835 49.4803 31.6151 49.9095C27.6251 50.5087 24.5194 49.7252 22.0021 48.2905C19.4847 49.7252 16.3779 50.5098 12.3934 49.9095C8.82275 49.4803 6.0562 46.03 6.0562 42.8072C6.0562 38.8411 7.48337 37.1625 11.0117 36.0128C15.3539 33.7945 14.7709 29.9064 15.7397 26.5666C16.1379 25.2153 16.9637 24.0295 18.093 23.1872C19.2223 22.3449 20.5943 21.8915 22.0031 21.895ZM41.8956 19.485C40.8196 18.5498 36.4276 22.2006 35.0459 24.006C34.2061 24.9693 33.6838 26.2935 33.6838 27.7543C33.6838 30.6921 35.786 33.0739 38.3727 33.0739C40.3406 33.0739 42.0246 31.7053 42.7214 29.7591C44.0748 26.2589 44.1496 21.4421 41.8956 19.485ZM2.10848 19.485C-0.142253 21.4421 -0.069649 26.2589 1.28599 29.7591C1.98278 31.7053 3.66568 33.0739 5.6325 33.0739C8.22133 33.0739 10.3214 30.6921 10.3214 27.7543C10.3214 26.2935 9.8002 24.9693 8.96037 24.006C7.57764 22.2006 3.18671 18.5498 2.10848 19.485ZM27.7844 0.29688C38.7162 2.15208 37.949 20.5632 29.1964 19.0797C26.6715 18.6506 24.7968 16.3511 24.5118 13.6041C24.2224 10.8104 23.5712 -0.416159 27.7844 0.29688ZM16.2219 0.29688C20.4362 -0.417242 19.7838 10.8093 19.4945 13.603C19.2095 16.3511 17.337 18.6495 14.8121 19.0786C6.05729 20.5643 5.29115 2.15208 16.2219 0.29688Z"
                fill="#F6C000" />
        </svg>
        <span class="text-[80px] font-bold text-warning ms-5 me-2">200</span>
        <span class="text-[26px] text-warning self-end mb-6">Pasien</span>
    </div>

    <div class="mt-[30px] border-2 rounded-xl">
        <div class="flex justify-between px-[30px] border-b-2">
            <h2 class="text-lg py-3 font-medium">About</h2>
            <a href="{{ route('profile.edit') }}"
                class="text-white px-4 h-[30px] self-center rounded-md inline-flex items-center transition-all duration-200 ease-in-out transform  py-2 mb-2 justify-center text-xs group bg-primary">
                Edit
            </a>
        </div>
        <div class="p-[30px] flex justify-between items-center">
            <div class="grid grid-cols-2 gap-2">
                <p class="text-sm text-txtgray">Nama:</p>
                <p class="text-sm text-txtblack">{{ $user->name }}</p>

                <p class="text-sm text-txtgray">Spesialis:</p>
                <p class="text-sm text-txtblack">{{ $user->specialization ?? '-' }}</p>

                <p class="text-sm text-txtgray">Email:</p>
                <p class="text-sm text-txtblack">{{ $user->email }}</p>

                <p class="text-sm text-txtgray">Role:</p>
                <p class="text-sm text-txtblack">{{ ucfirst($user->role) }}</p>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
