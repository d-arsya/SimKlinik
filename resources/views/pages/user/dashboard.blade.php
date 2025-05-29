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

    <!-- rectangle -->
    <div class="grid grid-cols-[356.28px_1fr] gap-[30px]">

        <!-- Header -->
        <div class="col-span-2 flex justify-between">
            <div>
                <h2 class="text-xl font-medium">Dashboard</h2>
                <p class="text-[#4B5675]">Pemeriksaan Dokter Hewan</p>
            </div>
            <a href="{{ route('profile') }}"
                class="bg-white text-[#4B5675] h-8 px-4 text-xs border border-1 border-[#DBDFE9] hover:bg-[#DBDFE9] place-self-center content-center rounded-md">View
                Profile</a>
        </div>

        <div class="gap-6 flex-col ">
            <!-- Summary -->
            <div>
                <div class="min-h-[270px] shadow rounded-xl">
                    <div class="rounded-xl bg-primary h-[180px]">
                        <h3 class="ps-[32px] pt-8 text-m font-medium text-white">Summary</h3>
                        <div class="flex gap-4 pt-10 justify-center">
                            <!-- num of examp / Jml Pemeriksan -->
                            <div
                                class=" bg-[#DFFFEA] shadow border border-[#F1F1F4] rounded-lg p-4 max-w-[128.92px] max-h-[117.2px] min-w-40">
                                <x-icons.stethoscope />
                                <h3 class="mt-2 text-2xl font-medium text-[#17C653]">{{ $pemeriksaan }}</h3>
                                <p class="mt-2 text-[10.16px] text-[#17C653]">Pemeriksan</p>
                            </div>
                            <!-- inpatient / Rawat Inap) -->
                            <div
                                class=" bg-[#E9F3FF] shadow border border-[#F1F1F4] rounded-lg p-4 max-w-[128.92px] max-h-[117.2px] min-w-40">
                                <x-icons.bed />
                                <h3 class="mt-2 text-2xl font-medium text-[#1B84FF]">{{ $inap }}</h3>
                                <p class="mt-1 text-[10.16px] text-[#1B84FF]">Rawat Inap</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Welcome Description -->
        <div>
            <div class="flex flex-col shadow h-full border rounded-xl justify-center p-10 bg-center bg-origin-content"
                style="background-image: url('{{ asset('img/bg-dashboard.png') }}'); background-size: cover; z-index: -1;">
                <img class="w-9 h-9 rounded-full border" src="img/dashboard-img.png" alt="Foto Dashboard">
                <h2 class="text-[22px] mt-[14px] font-semibold">Selamat Datang, {{ $user->name }}!</h2>
                <h4 class="text-base">Sebagai {{ $user->role }}</h4>
                <div class="max-w-[400px]">
                    <div class="text-sm mt-[14px] text-[#4B5675]">Pantau Kesehatan hewan, kelola jadwal perawatan, dan akses
                        rekam medis dengan mudah di sistem manajemen klinik hewan Anda.
                    </div>
                </div>
            </div>
        </div>
        <!-- Medicine donut chart -->
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
                            @foreach ($drugTopSell as $item)
                                <div class="flex items-center mb-2">
                                    <div class="w-4 h-4 bg-blue-500 rounded mr-2"></div>
                                    <span class="text-gray-600 spangrafik">{{ $item['name'] }}</span>
                                    <span class="ml-auto spangrafik">{{ $item['quantity'] }} pcs</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Customer Visit Graphics -->
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
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    </div>
@endsection
@section('scripts')
