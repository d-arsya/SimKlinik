<div class="bg-red-500 top-10 right-10 fixed w-max p-2 rounded-lg">
    <h1 class="text-center mb-2 text-white font-semibold">Change Role</h1>
    <div class="flex gap-2">
        <a href="login/owner?url={{ request()->url() }}"
            class="rounded-md bg-primary py-1 px-2 text-xs {{ auth()->user()->role == 'owner' ? 'text-primary bg-white' : 'hover:bg-white hover:text-primary text-white' }}">Owner</a>
        <a href="login/doctor?url={{ request()->url() }}"
            class="rounded-md bg-primary py-1 px-2 text-xs {{ auth()->user()->role == 'doctor' ? 'text-primary bg-white' : 'hover:bg-white hover:text-primary text-white' }}">Doctor</a>
        <a href="login/admin?url={{ request()->url() }}"
            class="rounded-md bg-primary py-1 px-2 text-xs {{ auth()->user()->role == 'admin' ? 'text-primary bg-white' : 'hover:bg-white hover:text-primary text-white' }}">Admin</a>
        <a href="login/super?url={{ request()->url() }}"
            class="rounded-md bg-primary py-1 px-2 text-xs {{ auth()->user()->role == 'super' ? 'text-primary bg-white' : 'hover:bg-white hover:text-primary text-white' }}">Super</a>

    </div>
</div>
