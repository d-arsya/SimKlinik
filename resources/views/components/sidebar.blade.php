<aside id="logo-sidebar"
    class="fixed w-2/12 top-0 left-0 z-40 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-5 py-4 overflow-y-auto bg-primary">
        <a href="#" class="flex items-center mb-5">
            <img src="{{ asset('img/logo.png') }}" class="h-[90px]" alt="Drh. Hendrik TS Logo" />
            <span class="self-center text-{17.51px} font-semibold text-white whitespace-nowrap ms-1">Praktek Mandiri
                <br>Drh. Hendrik TS</span>
        </a>
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }} group">
                    <x-icons.home
                        class="{{ request()->routeIs('dashboard') ? 'text-primary' : 'text-white group-hover:text-white' }}" />
                    <span class="flex-1 ms-3 whitespace-nowrap">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->role != 'owner')
                <li>
                    <a href="{{ route('queue.index') }}"
                        class="flex items-center p-2 rounded-lg {{ request()->routeIs('queue*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }} group">
                        <x-icons.queue
                            class="{{ request()->routeIs('queue*') ? 'text-primary' : 'text-white group-hover:text-white' }}" />

                        <span class="flex-1 ms-3 whitespace-nowrap">Antrian</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('patient.index') }}"
                        class="flex items-center p-2 rounded-lg {{ request()->routeIs('patient*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }} group">
                        <x-icons.patient
                            class="{{ request()->routeIs('patient*') ? 'text-primary' : 'text-white group-hover:text-white' }}" />
                        <span class="flex-1 ms-3 whitespace-nowrap">Pasien</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('invoice.index') }}"
                        class="flex items-center p-2 rounded-lg {{ request()->routeIs('invoice*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }} group">
                        <x-icons.invoice
                            class="{{ request()->routeIs('invoice*') ? 'text-primary' : 'text-white group-hover:text-white' }}" />

                        <span class="flex-1 ms-3 whitespace-nowrap">Invoice</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('inpatient.index') }}"
                        class="flex items-center p-2 rounded-lg {{ request()->routeIs('inpatient*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }} group">
                        <x-icons.inpatient
                            class="{{ request()->routeIs('inpatient*') ? 'text-primary' : 'text-white group-hover:text-white' }}" />

                        <span class="flex-1 ms-3 whitespace-nowrap">Rawat Inap</span>
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('profile') }}"
                    class="flex items-center p-2 rounded-lg {{ request()->routeIs('profile*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }} group">
                    <x-icons.profile
                        class="{{ request()->routeIs('profile*') ? 'text-primary' : 'text-white group-hover:text-white' }}" />

                    <span class="flex-1 ms-3 whitespace-nowrap">Profil</span>
                </a>
            </li>
            @if (auth()->user()->role == 'admin')
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 rounded-lg hover:text-white hover:bg-white-hover text-white group"
                        aria-controls="dropdown-masterdata" data-collapse-toggle="dropdown-masterdata">
                        <svg width="24" height="25" class="" viewBox="0 0 24 25" aria-hidden="true"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21 7.5C21 9.71 16.97 11.5 12 11.5C7.03 11.5 3 9.71 3 7.5C3 5.29 7.03 3.5 12 3.5C16.97 3.5 21 5.29 21 7.5Z"
                                fill="currentColor" />
                            <path
                                d="M21 7.5C21 9.71 16.97 11.5 12 11.5C7.03 11.5 3 9.71 3 7.5M21 7.5C21 5.29 16.97 3.5 12 3.5C7.03 3.5 3 5.29 3 7.5M21 7.5V12.5M3 7.5V12.5M3 12.5C3 14.71 7.03 16.5 12 16.5M3 12.5V17.5C3 19.71 7.03 21.5 12 21.5M18 15.5V18.5M18 18.5V21.5M18 18.5H21M18 18.5H15"
                                stroke="#F8F8F8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="flex-1 text-left ms-3 whitespace-nowrap">Manajemen Data</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-masterdata"
                        class="{{ request()->routeIs(['diagnose*', 'type*', 'animal*', 'color*', 'service*', 'user*']) ? 'block' : 'hidden' }} py-2 space-y-2">
                        <li>
                            <a href="{{ route('diagnose.index') }}"
                                class="flex items-center  p-2 transition duration-75 rounded-lg pl-11 group {{ request()->routeIs('diagnose*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }}">
                                <x-icons.circle />
                                Diagnosa</a>
                        </li>
                        <li>
                            <a href="{{ route('type.index') }}"
                                class="flex items-center  p-2 transition duration-75 rounded-lg pl-11 group {{ request()->routeIs('type*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }}">
                                <x-icons.circle />
                                Ras</a>
                        </li>
                        <li>
                            <a href="{{ route('color.index') }}"
                                class="flex items-center  p-2 transition duration-75 rounded-lg pl-11 group {{ request()->routeIs('color*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }}">
                                <x-icons.circle />
                                Warna</a>
                        </li>
                        <li>
                            <a href="{{ route('service.index') }}"
                                class="flex items-center  p-2 transition duration-75 rounded-lg pl-11 group {{ request()->routeIs('service*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }}">
                                <x-icons.circle />
                                Layanan</a>
                        </li>
                        <li>
                            <a href="{{ route('animal.index') }}"
                                class="flex items-center  p-2 transition duration-75 rounded-lg pl-11 group {{ request()->routeIs('animal*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }}">
                                <x-icons.circle />
                                Hewan</a>
                        </li>
                        <li>
                            <a href="{{ route('user.index') }}"
                                class="flex items-center  p-2 transition duration-75 rounded-lg pl-11 group {{ request()->routeIs('user*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }}">
                                <x-icons.circle />
                                User</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</aside>
