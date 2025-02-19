@extends('layouts.main')
@section('title', 'SimKlinik')
@section('container')
    <style>
        .donut {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: conic-gradient(#3b82f6 0deg 72deg,
                    /* blue-500 */
                    #f97316 72deg 144deg,
                    /* orange-500 */
                    #22c55e 144deg 216deg,
                    /* green-500 */
                    #a855f7 216deg 288deg,
                    /* purple-500 */
                    #eab308 288deg 360deg
                    /* yellow-500 */
                );
            position: relative;
        }

        .donut-hole {
            position: absolute;
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .spangrafik {
            font-size: 10px;
        }
    </style>
    <div class="grid grid-cols-[356.28px_1fr] gap-[30px]">

        <!-- Header -->
        <div class="col-span-2 flex justify-between">
            <div>
                <h2 class="text-xl font-medium">Dashboard</h2>
                <p class="text-[#4B5675]">Central Hub for Personal Customization</p>
            </div>
            <a href="{{ route('profile') }}"
                class="bg-white text-[#4B5675] h-8 px-4 text-xs border border-1 border-[#DBDFE9] hover:bg-[#DBDFE9] place-self-center content-center rounded-md">View
                Profile</a>
        </div>

        <!-- Summary -->
        <div>
            <div class="min-h-[368px] shadow rounded-xl">
                <div class="items-center justify-center rounded-xl bg-primary h-[170px]">
                    <h3 class="ps-[37.5px] pt-8 text-sm font-medium text-white">Summary</h3>
                    <div class="relative z-10 top-[30px] grid grid-cols-2 gap-6 px-9">
                        <div
                            class=" bg-[#FFF8DD] shadow border border-[#F1F1F4] rounded-lg p-4 max-w-[128.92px] max-h-[117.2px]">
                            <svg width="23" height="26" viewBox="0 0 23 26" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.415 11.4172C12.9048 11.4172 14.1555 12.4267 14.5088 13.7916C14.9529 15.5029 14.8929 17.3784 16.8454 18.3522C18.5785 18.942 19.2341 19.6831 19.2341 21.6702C19.2341 23.2561 17.8772 24.9419 16.1276 25.1523C14.1714 25.4461 12.6487 25.062 11.4145 24.3585C10.1803 25.062 8.65708 25.4466 6.70351 25.1523C4.95289 24.9419 3.59649 23.2502 3.59649 21.6702C3.59649 19.7256 4.29621 18.9027 6.02611 18.3389C8.15501 17.2514 7.86917 15.3451 8.34415 13.7076C8.53941 13.0451 8.94426 12.4637 9.49794 12.0508C10.0516 11.6378 10.7243 11.4155 11.415 11.4172ZM21.168 10.2356C20.6404 9.77713 18.4871 11.5671 17.8097 12.4522C17.3979 12.9245 17.1419 13.5738 17.1419 14.2899C17.1419 15.7303 18.1726 16.8981 19.4408 16.8981C20.4056 16.8981 21.2312 16.2271 21.5729 15.2728C22.2364 13.5568 22.2731 11.1952 21.168 10.2356ZM1.66099 10.2356C0.557486 11.1952 0.593082 13.5568 1.25773 15.2728C1.59936 16.2271 2.42446 16.8981 3.38876 16.8981C4.65802 16.8981 5.68767 15.7303 5.68767 14.2899C5.68767 13.5738 5.43212 12.9245 5.02036 12.4522C4.34243 11.5671 2.18962 9.77713 1.66099 10.2356ZM14.2495 0.827994C19.6092 1.73757 19.233 10.7643 14.9418 10.0369C13.7039 9.82654 12.7847 8.69913 12.645 7.3523C12.5031 5.98262 12.1838 0.478402 14.2495 0.827994ZM8.58057 0.827994C10.6468 0.477871 10.3269 5.98209 10.1851 7.35177C10.0454 8.69913 9.12728 9.82601 7.88936 10.0364C3.59702 10.7648 3.2214 1.73757 8.58057 0.827994Z"
                                    fill="#F6C000" />
                            </svg>
                            <h3 class="mt-2 text-2xl font-medium text-[#F6C047] ">101</h3>
                            <p class="mt-1 text-[10.16px] text-[#F6C047]">Pasien</p>
                        </div>

                        <div
                            class=" bg-[#E9F3FF] shadow border border-[#F1F1F4] rounded-lg p-4 max-w-[128.92px] max-h-[117.2px]">
                            <svg width="32" height="23" viewBox="0 0 32 23" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M10.0621 1.68634C9.78869 1.41255 9.46399 1.19532 9.10657 1.04706C8.74915 0.898796 8.36602 0.822411 7.97907 0.822266C7.59213 0.822121 7.20894 0.898218 6.85141 1.04621C6.49388 1.1942 6.16901 1.41119 5.89537 1.68477L5.34532 2.23482C4.81348 2.08312 4.25065 2.07713 3.71569 2.21746C3.18074 2.3578 2.69333 2.63931 2.30444 3.03254C1.72024 3.62268 1.39254 4.41953 1.39254 5.24992C1.39254 6.08031 1.72024 6.87716 2.30444 7.46729L2.95528 8.12282V16.4493H0.611328V18.0119H2.21303C1.82501 18.3921 1.55901 18.8793 1.44896 19.4112C1.33891 19.9432 1.38979 20.4959 1.59511 20.9988C1.80043 21.5017 2.15089 21.9321 2.6018 22.2351C3.05271 22.538 3.58363 22.6998 4.12686 22.6998C4.67009 22.6998 5.20101 22.538 5.65192 22.2351C6.10283 21.9321 6.45329 21.5017 6.65861 20.9988C6.86394 20.4959 6.91481 19.9432 6.80476 19.4112C6.69471 18.8793 6.42872 18.3921 6.0407 18.0119H26.4346C26.0466 18.3921 25.7806 18.8793 25.6705 19.4112C25.5605 19.9432 25.6114 20.4959 25.8167 20.9988C26.022 21.5017 26.3725 21.9321 26.8234 22.2351C27.2743 22.538 27.8052 22.6998 28.3484 22.6998C28.8917 22.6998 29.4226 22.538 29.8735 22.2351C30.3244 21.9321 30.6749 21.5017 30.8802 20.9988C31.0855 20.4959 31.1364 19.9432 31.0264 19.4112C30.9163 18.8793 30.6503 18.3921 30.2623 18.0119H31.864V16.4493H28.7387V14.0171C29.4098 13.8494 30.0053 13.4617 30.4302 12.9159C30.8551 12.37 31.0848 11.6976 31.0827 11.0059C31.0827 9.2948 29.7068 7.90639 28.009 7.90639H11.6357C11.604 7.90679 11.5726 7.90076 11.5433 7.88868C11.5141 7.87659 11.4875 7.8587 11.4654 7.83608L11.1794 7.54699L11.4677 7.26025C11.7415 6.98676 11.9586 6.66201 12.1068 6.30457C12.255 5.94712 12.3313 5.56398 12.3314 5.17703C12.3315 4.79008 12.2553 4.40691 12.1072 4.04941C11.9592 3.69191 11.7421 3.36708 11.4685 3.09349L10.0621 1.68634ZM10.0778 6.43908L10.3629 6.15468C10.4915 6.02625 10.5934 5.87376 10.663 5.70591C10.7325 5.53807 10.7683 5.35816 10.7683 5.17648C10.7683 4.99479 10.7325 4.81488 10.663 4.64704C10.5934 4.47919 10.4915 4.3267 10.3629 4.19827L8.95657 2.7919C8.82824 2.66328 8.67583 2.56121 8.50804 2.49152C8.34025 2.42183 8.16037 2.38588 7.97868 2.38574C7.797 2.38559 7.61706 2.42125 7.44916 2.49067C7.28126 2.5601 7.12868 2.66192 7.00015 2.79034L6.72669 3.0638L10.0778 6.43908ZM27.1761 16.4493H4.51791V9.69561L8.63935 13.8452C8.80499 14.0116 9.02845 14.1054 9.26206 14.1054H27.1761V16.4493Z"
                                    fill="#1B84FF" />
                            </svg>
                            <h3 class="mt-2 text-2xl font-medium text-[#1B84FF]">10</h3>
                            <p class="mt-1 text-[10.16px] text-[#1B84FF]">Rawat Inap</p>
                        </div>

                        <div
                            class=" bg-[#FFEEF3] shadow border border-[#F1F1F4] rounded-lg p-4 max-w-[128.92px] max-h-[117.2px]">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.541016 20.5317C0.541016 22.5794 2.1069 24.1453 4.1546 24.1453H21.018C23.0657 24.1453 24.6316 22.5794 24.6316 20.5317V10.8955H0.541016V20.5317ZM21.018 2.46375H18.609V1.25922C18.609 0.536499 18.1271 0.0546875 17.4044 0.0546875C16.6817 0.0546875 16.1999 0.536499 16.1999 1.25922V2.46375H8.97272V1.25922C8.97272 0.536499 8.49091 0.0546875 7.76819 0.0546875C7.04547 0.0546875 6.56366 0.536499 6.56366 1.25922V2.46375H4.1546C2.1069 2.46375 0.541016 4.02963 0.541016 6.07733V8.48639H24.6316V6.07733C24.6316 4.02963 23.0657 2.46375 21.018 2.46375Z"
                                    fill="#F8285A" />
                            </svg>
                            <h3 class="mt-2 text-2xl font-medium text-[#F8285A]">608</h3>
                            <p class="mt-1 text-[10.16px] text-[#F8285A]">Kunjungan Baru</p>
                        </div>

                        <div
                            class=" bg-[#DFFFEA] shadow border border-[#F1F1F4] rounded-lg p-4 max-w-[128.92px] max-h-[117.2px]">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.1097 20.8481C10.2931 20.8481 8.74571 20.2089 7.46739 18.9306C6.18907 17.6523 5.54991 16.1048 5.54991 14.2883V13.708C4.10339 13.4725 2.90076 12.7953 1.94202 11.6765C0.983276 10.5576 0.503906 9.24159 0.503906 7.72847V1.67326H3.53151V0.664062H5.54991V4.70086H3.53151V3.69166H2.52231V7.72847C2.52231 8.83858 2.91758 9.78892 3.70812 10.5795C4.49866 11.37 5.44899 11.7653 6.55911 11.7653C7.66923 11.7653 8.61956 11.37 9.4101 10.5795C10.2006 9.78892 10.5959 8.83858 10.5959 7.72847V3.69166H9.58671V4.70086H7.56831V0.664062H9.58671V1.67326H12.6143V7.72847C12.6143 9.24227 12.1349 10.5586 11.1762 11.6775C10.2175 12.7963 9.01483 13.4732 7.56831 13.708V14.2883C7.56831 15.5498 8.01 16.6222 8.89339 17.5056C9.77678 18.389 10.8489 18.8303 12.1097 18.8297C13.3705 18.829 14.443 18.3876 15.327 17.5056C16.2111 16.6236 16.6525 15.5511 16.6511 14.2883V12.5979C16.0624 12.396 15.579 12.0344 15.2009 11.513C14.8228 10.9915 14.6334 10.4028 14.6327 9.74687C14.6327 8.90587 14.9271 8.19101 15.5158 7.60231C16.1045 7.01361 16.8193 6.71926 17.6603 6.71926C18.5013 6.71926 19.2162 7.01361 19.8049 7.60231C20.3936 8.19101 20.6879 8.90587 20.6879 9.74687C20.6879 10.4028 20.4989 10.9915 20.1207 11.513C19.7426 12.0344 19.2589 12.396 18.6695 12.5979V14.2883C18.6695 16.1048 18.0304 17.6523 16.752 18.9306C15.4737 20.2089 13.9263 20.8481 12.1097 20.8481Z"
                                    fill="#17C653" />
                            </svg>
                            <h3 class="mt-2 text-2xl font-medium text-[#17C653]">200</h3>
                            <p class="mt-2 text-[10.16px] text-[#17C653]">Tenaga Medis</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div>
            <div class="flex flex-col shadow h-full border rounded-xl justify-center p-10 bg-center bg-origin-content"
                style="background-image: url('{{ asset('img/bg-dashboard.png') }}'); background-size: cover; z-index: -1;">
                <img class="w-9 h-9 rounded-full border" src="img/dashboard-img.png" alt="Foto Dashboard">
                <h2 class="text-[22px] mt-[14px] font-semibold">Selamat Datang, Gurdi!</h2>
                <h4 class="text-base">Sebagai Super Admin</h4>
                <div class="max-w-[400px]">
                    <div class="text-sm mt-[14px] text-[#4B5675]">Pantau Kesehatan hewan, kelola jadwal perawatan, dan akses
                        rekam medis
                        dengan mudah di sistem manajemen klinik hewan Anda.
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="border bg-white shadow-md rounded-lg p-8">
                <!-- Header -->
                <div class="card-header pb-5 flex justify-between items-center">
                    <!-- Title -->
                    <div class="flex flex-col pb-3">
                        <h3 class="text-xl font-bold text-gray-900">Sales This Month</h3>
                    </div>
                    <!-- Toolbar -->
                    <div class="relative">
                        <button class="btn bg-transparent text-gray-500 hover:text-primary">
                            <i class="ki-duotone ki-dots-square text-xl"></i>
                        </button>
                        <!-- Menu -->
                        <div
                            class="menu absolute right-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg w-48 hidden">
                            <div class="px-3 py-4 text-gray-900 font-bold text-sm">Quick Actions</div>
                            <div class="border-t border-gray-200 mb-3 opacity-75"></div>
                            <div class="menu-item px-3 py-2 hover:bg-gray-100">
                                <a href="#" class="text-sm">New Ticket</a>
                            </div>
                            <div class="menu-item px-3 py-2 hover:bg-gray-100">
                                <a href="#" class="text-sm">New Customer</a>
                            </div>
                            <div class="menu-item px-3 py-2 hover:bg-gray-100" x-data="{ open: false }"
                                @mouseenter="open = true" @mouseleave="open = false">
                                <a href="#" class="flex justify-between text-sm">New Group <span
                                        class="menu-arrow"></span></a>
                                <!-- Sub-menu -->
                                <div
                                    class="menu-sub absolute right-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg w-44 hidden">
                                    <div class="menu-item px-3 py-2 hover:bg-gray-100">
                                        <a href="#" class="text-sm">Admin Group</a>
                                    </div>
                                    <div class="menu-item px-3 py-2 hover:bg-gray-100">
                                        <a href="#" class="text-sm">Staff Group</a>
                                    </div>
                                    <div class="menu-item px-3 py-2 hover:bg-gray-100">
                                        <a href="#" class="text-sm">Member Group</a>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item px-3 py-2 hover:bg-gray-100">
                                <a href="#" class="text-sm">New Contact</a>
                            </div>
                            <div class="border-t border-gray-200 mt-3 opacity-75"></div>
                            <div class="px-3 py-3">
                                <a href="#" class="btn btn-primary w-full text-sm py-2">Generate Reports</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Title -->
                <div class="card-title flex flex-col pb-4">
                    <div class="flex items-center">
                        <span class="text-lg font-semibold text-gray-500 mr-1">$</span>
                        <span class="text-2xl font-bold text-gray-900 mr-2">69,700</span>
                        <span class="badge bg-green-100 text-green-600 text-sm px-2 py-1 rounded-full flex items-center">
                            <i class="ki-duotone ki-arrow-up text-success mr-1"></i> 2.2%
                        </span>
                    </div>
                    <span class="text-gray-500 pt-1 font-semibold text-sm">Expected Earnings</span>
                </div>

                <hr style="border: 0; border-top: 1px solid #ccc; margin-bottom:20px;">

                <!-- Card Body -->
                <div class="card-body flex items-center">
                    <div class="flex flex-col w-full">
                        <div class="flex items-center text-sm font-semibold mb-3">
                            <div class="w-2 h-2 bg-red-500 rounded-full mr-3"></div>
                            <div class="text-gray-500 flex-grow">Shoes</div>
                            <div class="text-gray-700 font-bold">$7,660</div>
                        </div>
                        <div class="flex items-center text-sm font-semibold mb-3">
                            <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                            <div class="text-gray-500 flex-grow">Gaming</div>
                            <div class="text-gray-700 font-bold">$2,820</div>
                        </div>
                        <div class="flex items-center text-sm font-semibold">
                            <div class="w-2 h-2 bg-gray-300 rounded-full mr-3"></div>
                            <div class="text-gray-500 flex-grow">Others</div>
                            <div class="text-gray-700 font-bold">$45,257</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div>
            <div class="border bg-white shadow-md rounded-lg p-8">
                <!-- Header -->
                <div class="flex flex-col justify-between items-start ">


                    <div class="flex w-full  pb-4 justify-between">
                        <div class="flex items-center">
                            <h2 class="text-l font-semibold text-gray-900">
                                Grafik Tingkat Kunjungan Pelanggan
                            </h2>

                        </div>

                        <div class="relative">
                            <select
                                class="appearance-none bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 pr-8 text-xs text-gray-600">
                                <option>12 months</option>
                            </select>
                            <div class="absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                </svg>
                            </div>
                        </div>
                    </div>
                    <hr class="w-full h-1 bg-gray pb-5">
                    <div>
                        <div class="flex items-start mt-2">
                            <span class="text-3xl font-bold text-gray-900">295</span>
                            <span class="ml-2 px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded">
                                +2.7%
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">Hewan Dirawat</p>
                    </div>
                </div>

                <!-- Graph -->
                <div class="h-64 mt-4">
                    <canvas id="visitorChart"></canvas>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const ctx = document.getElementById('visitorChart').getContext('2d');

                // Data untuk grafik
                const data = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Kunjungan',
                        data: [25, 25, 25, 32, 38, 40, 40, 40, 35, 28, 23, 23],
                        fill: true,
                        borderColor: '#FF4D75',
                        borderWidth: 2,
                        tension: 0.4,
                        backgroundColor: (context) => {
                            const chart = context.chart;
                            const {
                                ctx,
                                chartArea
                            } = chart;
                            if (!chartArea) return null;

                            const gradient = ctx.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                            gradient.addColorStop(0, 'rgba(255, 77, 117, 0.1)');
                            gradient.addColorStop(1, 'rgba(255, 77, 117, 0)');
                            return gradient;
                        },
                        pointRadius: 0,
                        pointHoverRadius: 6,
                        pointHoverBackgroundColor: '#FF4D75',
                        pointHoverBorderColor: 'white',
                        pointHoverBorderWidth: 2
                    }]
                };

                // Konfigurasi grafik
                const config = {
                    type: 'line',
                    data: data,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    font: {
                                        size: 12,
                                        family: "'Inter', sans-serif"
                                    },
                                    color: '#9CA3AF'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                max: 50, // Change this value to adjust the top of the graph
                                ticks: {
                                    stepSize: 10, // You might want to adjust this too
                                    font: {
                                        size: 12,
                                        family: "'Inter', sans-serif"
                                    },
                                    color: '#9CA3AF'
                                },
                                grid: {
                                    color: '#F3F4F6'
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'white',
                                titleColor: '#6B7280',
                                bodyColor: '#111827',
                                titleFont: {
                                    size: 12,
                                    family: "'Inter', sans-serif"
                                },
                                bodyFont: {
                                    size: 14,
                                    family: "'Inter', sans-serif",
                                    weight: 'bold'
                                },
                                padding: 12,
                                borderColor: '#E5E7EB',
                                borderWidth: 1,
                                displayColors: false,
                                callbacks: {
                                    title: function(context) {
                                        return context[0].label + ' 23, 2024';
                                    },
                                    label: function(context) {
                                        return context.parsed.y + '% +24%';
                                    }
                                }
                            }
                        },
                        interaction: {
                            intersect: false,
                            mode: 'index'
                        }
                    }
                };

                // Membuat grafik
                new Chart(ctx, config);
            </script>

        </div>
        <div>
            <div class="border bg-white shadow-md rounded-lg  px-5 py-4">
                <div class="px-2 py-5 ">
                    <h2 class="text-lg font-semibold mb-6">Obat yang sering dibeli</h2>

                    <div class="flex gap-5 flex-row items-center ">
                        <!-- Donut Chart -->
                        <div class="donut felx items-center">
                            <div class="donut-hole"></div>
                        </div>

                        <!-- Legend -->
                        <div class="w-40">
                            <!-- ERP -->
                            <div class="flex items-center mb-2">
                                <div class="w-4 h-4 bg-blue-500 rounded mr-2"></div>
                                <span class="text-gray-600 spangrafik">ERP</span>
                                <span class="ml-auto spangrafik">85 pcs</span>
                            </div>

                            <!-- HRM -->
                            <div class="flex items-center mb-2">
                                <div class="w-4 h-4 bg-orange-500 rounded mr-2"></div>
                                <span class="text-gray-600 spangrafik">HRM</span>
                                <span class="ml-auto spangrafik">85 pcs</span>
                            </div>

                            <!-- DMS -->
                            <div class="flex items-center mb-2">
                                <div class="w-4 h-4 bg-green-500 rounded mr-2"></div>
                                <span class="text-gray-600 spangrafik">DMS</span>
                                <span class="ml-auto spangrafik">85 pcs</span>
                            </div>

                            <!-- CRM -->
                            <div class="flex items-center mb-2">
                                <div class="w-4 h-4 bg-purple-500 rounded mr-2"></div>
                                <span class="text-gray-600 spangrafik">CRM</span>
                                <span class="ml-auto spangrafik">85 pcs</span>
                            </div>

                            <!-- DAM -->
                            <div class="flex items-center mb-2">
                                <div class="w-4 h-4 bg-yellow-500 rounded mr-2"></div>
                                <span class="text-gray-600 spangrafik">DAM</span>
                                <span class="ml-auto spangrafik">85 pcs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="border shadow-md sm:rounded-lg w-full">
                <!-- Search bar tanpa tombol -->
                <div class="flex justify-between py-2 p-[27.5px] border-b">
                    <div class="flex items-center">
                        <h2 class="font-semibold text-base">Transaksi Unit</h2>
                    </div>
                    <form class="min-w-[180px] rounded-sm">
                        <label for="search" class="text-sm font-medium text-gray-900 sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.1"
                                        d="M13.6999 7.43294C13.6999 10.6546 11.0882 13.2663 7.86654 13.2663C4.64488 13.2663 2.0332 10.6546 2.0332 7.43294C2.0332 4.21128 4.64488 1.59961 7.86654 1.59961C11.0882 1.59961 13.6999 4.21128 13.6999 7.43294Z"
                                        fill="#99A1B7" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12.5054 11.2039C13.3645 10.1658 13.8809 8.83365 13.8809 7.38086C13.8809 4.06715 11.1946 1.38086 7.88086 1.38086C4.56715 1.38086 1.88086 4.06715 1.88086 7.38086C1.88086 10.6946 4.56715 13.3809 7.88086 13.3809C9.33367 13.3809 10.6659 12.8645 11.704 12.0053L14.1468 14.4482C14.3681 14.6695 14.7269 14.6695 14.9482 14.4482C15.1695 14.2269 15.1695 13.8681 14.9482 13.6468L12.5054 11.2039ZM7.88086 12.2688C5.1813 12.2688 2.99288 10.0804 2.99288 7.38086C2.99288 4.6813 5.1813 2.49288 7.88086 2.49288C10.5804 2.49288 12.7688 4.6813 12.7688 7.38086C12.7688 10.0804 10.5804 12.2688 7.88086 12.2688Z"
                                        fill="#99A1B7" />
                                </svg>
                            </div>
                            <input type="search" id="search"
                                class="block w-full p-2 ps-10 text-sm text-[#99A1B9] border border-gray-300 rounded-lg bg-gray-50"
                                placeholder="Cari..." required />
                        </div>
                    </form>
                </div>

                <div class="place-items-center">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 mx-10">
                        <thead class="text-xs text-gray-700 bg-gray-50">
                            <tr>
                                <th scope="col" class="px-3 py-3 border">
                                    <div class="flex items-center">
                                        No. RM
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-3 border">
                                    <div class="flex items-center">
                                        Pasien
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-3 border">
                                    <div class="flex items-center">
                                        Last Transaction
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>
                                <th scope="col" class="px-3 py-3 border">
                                    <div class="flex items-center">
                                        Owner
                                        <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                            </svg></a>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white">
                                <td scope="row"
                                    class="px-6 py-4 border text-gray-900 whitespace-nowrap dark:text-white">
                                    <div>
                                        <div class="font-semibold">1</div>
                                        <div class="text-xs text-txtgray">Anjing</div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 border">
                                    <div>
                                        <p class= "text-black ">Guguk</p>
                                    </div>
                                </td>
                                <td class="px-5 py-4 border">
                                    21 Oct, 2024
                                </td>
                                <td class="px-5 py-4 border">
                                    <img class="w-9 h-9 rounded-full border border-1 border-greenProfile"
                                        src="img/profile.png" alt="Foto Profil">
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td scope="row"
                                    class="px-6 py-4 border text-gray-900 whitespace-nowrap dark:text-white">
                                    <div>
                                        <div class="font-semibold">1</div>
                                        <div class="text-xs text-txtgray">Anjing</div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 border">
                                    <div>
                                        <p class= "text-black ">Guguk</p>
                                    </div>
                                </td>
                                <td class="px-5 py-4 border">
                                    21 Oct, 2024
                                </td>
                                <td class="px-5 py-4 border">
                                    <img class="w-9 h-9 rounded-full border border-1 border-greenProfile"
                                        src="img/profile.png" alt="Foto Profil">
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td scope="row"
                                    class="px-6 py-4 border text-gray-900 whitespace-nowrap dark:text-white">
                                    <div>
                                        <div class="font-semibold">1</div>
                                        <div class="text-xs text-txtgray">Anjing</div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 border">
                                    <div>
                                        <p class= "text-black ">Guguk</p>
                                    </div>
                                </td>
                                <td class="px-5 py-4 border">
                                    21 Oct, 2024
                                </td>
                                <td class="px-5 py-4 border">
                                    <img class="w-9 h-9 rounded-full border border-1 border-greenProfile"
                                        src="img/profile.png" alt="Foto Profil">
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td scope="row"
                                    class="px-6 py-4 border text-gray-900 whitespace-nowrap dark:text-white">
                                    <div>
                                        <div class="font-semibold">1</div>
                                        <div class="text-xs text-txtgray">Anjing</div>
                                    </div>
                                </td>
                                <td class="px-5 py-4 border">
                                    <div>
                                        <p class= "text-black ">Guguk</p>
                                    </div>
                                </td>
                                <td class="px-5 py-4 border">
                                    21 Oct, 2024
                                </td>
                                <td class="px-5 py-4 border">
                                    <img class="w-9 h-9 rounded-full border border-1 border-greenProfile"
                                        src="img/profile.png" alt="Foto Profil">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <nav aria-label="Page navigation example" class="place-self-end my-4 me-5">
                    <div class="flex justify-between items-center"><span
                            class="font-semibold text-[13px] text-[#78829D]">1-10 of 52</span>
                        <ul class="flex items-center -space-x-px h-8 text-sm">
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Previous</span>
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 1 1 5l4 4" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white  hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark: dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white  hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark: dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page"
                                    class="z-10 flex items-center justify-center px-3 h-8 leading-tight text-blue-600  bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark: dark:bg-gray-700 dark:text-white">3</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white  hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark: dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white  hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark: dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white  rounded-e-md hover:bg-gray-100 hover:text-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only">Next</span>
                                    <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                </nav>
            </div>


        </div>


    </div>




    </div>
@endsection
@section('scripts')
