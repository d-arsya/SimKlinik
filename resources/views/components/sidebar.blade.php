<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 h-screen bg-primary transition-transform -translate-x-full sm:translate-x-0 w-[75%] sm:w-2/12"
    aria-label="Sidebar">
    <div class="h-full px-4 py-4 sm:px-5 overflow-y-auto">
        <!-- Logo dan Nama Klinik -->
        <a href="#" class="flex md:flex-col lg:flex-row items-center mb-5 gap-2">
            <img src="{{ asset('img/logo.png') }}" class="h-12 sm:h-[60px]" alt="Logo" />
            <span class="text-center text-sm sm:text-base font-semibold text-white leading-tight">
                Praktek Mandiri<br />Drh. Hendrik TS
            </span>
        </a>

        <!-- Menu Sidebar -->
        <ul class="space-y-2 font-medium text-sm sm:text-base">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 rounded-lg transition-all {{ request()->routeIs('dashboard') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }}">
                    <x-icons.home
                        class="shrink-0 {{ request()->routeIs('dashboard') ? 'text-primary' : 'text-white' }}" />
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            @if (auth()->user()->role != 'owner')
                <li>
                    <a href="{{ route('queue.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all {{ request()->routeIs('queue*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }}">
                        <x-icons.queue
                            class="shrink-0 {{ request()->routeIs('queue*') ? 'text-primary' : 'text-white' }}" />
                        <span class="ms-3">Antrian</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('patient.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all {{ request()->routeIs(['patient*', 'owner*']) ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }}">
                        <x-icons.patient
                            class="shrink-0 {{ request()->routeIs(['patient*', 'owner*']) ? 'text-primary' : 'text-white' }}" />
                        <span class="ms-3">Pasien</span>
                    </a>
                </li>

                @if (in_array(auth()->user()->role, ['super', 'admin']))
                    <li>
                        <a href="{{ route('invoice.index') }}"
                            class="flex items-center p-2 rounded-lg transition-all {{ request()->routeIs('invoice*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }}">
                            <x-icons.invoice
                                class="shrink-0 {{ request()->routeIs('invoice*') ? 'text-primary' : 'text-white' }}" />
                            <span class="ms-3">Invoice</span>
                        </a>
                    </li>
                @endif

                <li>
                    <a href="{{ route('inpatient.index') }}"
                        class="flex items-center p-2 rounded-lg transition-all {{ request()->routeIs('inpatient*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }}">
                        <x-icons.inpatient
                            class="shrink-0 {{ request()->routeIs('inpatient*') ? 'text-primary' : 'text-white' }}" />
                        <span class="ms-3">Rawat Inap</span>
                    </a>
                </li>
            @endif

            <li>
                <a href="{{ route('profile') }}"
                    class="flex items-center p-2 rounded-lg transition-all {{ request()->routeIs('profile*') ? 'bg-white text-primary' : 'hover:text-white hover:bg-white-hover text-white' }}">
                    <x-icons.profile
                        class="shrink-0 {{ request()->routeIs('profile*') ? 'text-primary' : 'text-white' }}" />
                    <span class="ms-3">Profil</span>
                </a>
            </li>

            @if (auth()->user()->role == 'super')
                <li x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center w-full p-2 rounded-lg text-white hover:bg-white-hover transition-all">
                        <x-icons.masterdata />
                        <span class="ms-3 flex-1 text-left">Manajemen Data</span>
                        <svg class="w-3 h-3 transform transition-transform duration-300" :class="{ 'rotate-180': open }"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1l4 4 4-4" />
                        </svg>
                    </button>

                    <ul x-show="open" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform -translate-y-2"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 transform translate-y-0"
                        x-transition:leave-end="opacity-0 transform -translate-y-2"
                        class="overflow-hidden mt-2 space-y-1 text-white text-sm ml-8 origin-top"
                        style="display: none;">

                        <li>
                            <a href="{{ route('diagnose.index') }}"
                                class="flex items-center gap-2 px-2 py-1 rounded hover:bg-white-hover transition-all {{ request()->routeIs('diagnose*') ? 'text-primary bg-white' : '' }}">
                                <x-icons.circle class="w-1.5 h-1.5" />
                                Diagnosa
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('type.index') }}"
                                class="flex items-center gap-2 px-2 py-1 rounded hover:bg-white-hover transition-all {{ request()->routeIs('type*') ? 'text-primary bg-white' : '' }}">
                                <x-icons.circle class="w-1.5 h-1.5" />
                                Ras
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('color.index') }}"
                                class="flex items-center gap-2 px-2 py-1 rounded hover:bg-white-hover transition-all {{ request()->routeIs('color*') ? 'text-primary bg-white' : '' }}">
                                <x-icons.circle class="w-1.5 h-1.5" />
                                Warna
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('service.index') }}"
                                class="flex items-center gap-2 px-2 py-1 rounded hover:bg-white-hover transition-all {{ request()->routeIs('service*') ? 'text-primary bg-white' : '' }}">
                                <x-icons.circle class="w-1.5 h-1.5" />
                                Layanan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('animal.index') }}"
                                class="flex items-center gap-2 px-2 py-1 rounded hover:bg-white-hover transition-all {{ request()->routeIs('animal*') ? 'text-primary bg-white' : '' }}">
                                <x-icons.circle class="w-1.5 h-1.5" />
                                Hewan
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('user.index') }}"
                                class="flex items-center gap-2 px-2 py-1 rounded hover:bg-white-hover transition-all {{ request()->routeIs('user*') ? 'text-primary bg-white' : '' }}">
                                <x-icons.circle class="w-1.5 h-1.5" />
                                User
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</aside>
