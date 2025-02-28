@extends('layouts.layout-create-edit-masterdata');

<!-- Header -->
@section('title', 'Edit Pengguna')

<!-- Container -->
@section('form')
    <form action="{{ route('user.update',1) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Username Field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 my-4">
            <label for="name" class="text-sm font-medium leading-6 text-gray-700">Username</label>
            <input type="text" id="name" name="name"
                class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Role Choice -->
        <div class="grid items-start w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="role" class="text-sm font-medium leading-6 text-gray-700">Role</label>
            <select id="role" name="role" class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm w-48"
                required>
                <option class="text-sm font-medium leading-6 text-gray-700" value="">-</option>
                <option class="text-sm font-medium leading-6 text-gray-700" value="owner">Owner</option>
                <option class="text-sm font-medium leading-6 text-gray-700" value="superadmin">Superadmin</option>
                <option class="text-sm font-medium leading-6 text-gray-700" value="admin">Admin</option>
                <option class="text-sm font-medium leading-6 text-gray-700" value="dokter">Dokter</option>
            </select>
        </div>

        <!-- Email Field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="email" class="text-sm font-medium leading-6 text-gray-700">Email</label>
            <input type="email" id="email" name="email"
                class="py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <!-- Password Field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="password" class="text-sm font-medium leading-6 text-gray-700">Password</label>
            <div class="relative w-full">
                <input type="password" id="password" name="password"
                    class="w-full py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required
                    oninput="validatePassword()">
                <!-- eyeicon -->
                <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
                    onclick="togglePasswordVisibility('password', 'eyeIcon1')">
                    <svg id="eyeIcon1" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-9.988-2.53A8.966 8.966 0 003 12c1.05 2.72 4.22 5 9 5 4.78 0 7.95-2.28 9-5a8.965 8.965 0 00-2.012-2.53" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Confirm Password Field -->
        <div class="grid items-center w-full grid-cols-[1fr_3fr] gap-4 mb-4">
            <label for="confirm_password" class="text-sm font-medium leading-6 text-gray-700">Konfirmasi
                Password</label>
            <div class="relative w-full">
                <input type="password" id="confirm_password" name="confirm_password"
                    class="w-full py-3 pl-3 pr-10 border border-gray-300 rounded-md shadow-sm" required
                    oninput="validatePassword()">
                <!-- eyeicon -->
                <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer"
                    onclick="togglePasswordVisibility('confirm_password', 'eyeIcon2')">
                    <svg id="eyeIcon2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-9.988-2.53A8.966 8.966 0 003 12c1.05 2.72 4.22 5 9 5 4.78 0 7.95-2.28 9-5a8.965 8.965 0 00-2.012-2.53" />
                    </svg>
                </span>
                <!-- Error Message -->
                <p id="error-message" class="hidden mt-1 text-red-500 text-xs">Password tidak cocok.</p>
            </div>
        </div>
        <!-- Submit Button -->
        <x-icons.submit/>
    </form>
@endsection

<script>
    // Password visibility
    function togglePasswordVisibility(fieldId, iconId) {
        const field = document.getElementById(fieldId);
        const icon = document.getElementById(iconId).querySelector('path');

        if (field.type === "password") {
            field.type = "text";
            icon.setAttribute("d",
                "M15 12a3 3 0 11-6 0 3 3 0 016 0zm-9.988-2.53A8.966 8.966 0 003 12c1.05 2.72 4.22 5 9 5 4.78 0 7.95-2.28 9-5a8.965 8.965 0 00-2.012-2.53"
            );
        } else {
            field.type = "password";
            icon.setAttribute("d",
                "M3 3l18 18M4.22 4.22A9.956 9.956 0 003 12c1.05 2.72 4.22 5 9 5a9.96 9.96 0 005.78-1.78M9.88 9.88A3 3 0 0012 15a3 3 0 002.12-.88M12 3c4.78 0 7.95 2.28 9 5a8.966 8.966 0 01-2.012 2.53"
            );
        }
    }

    // Validate password
    function validatePassword() {
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm_password');
        const errorMessage = document.getElementById('error-message');

        if (confirmPassword.value && password.value !== confirmPassword.value) {
            errorMessage.classList.remove("hidden");
            confirmPassword.classList.add("border-red-500");
        } else {
            errorMessage.classList.add("hidden");
            confirmPassword.classList.remove("border-red-500");
        }
    }
</script>
