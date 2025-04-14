@extends('layouts.layout-index')

<!-- Header -->
@section('title', 'Tabel Rawat Inap Pasien')
@section('desc')
    <p class="text-cadet font-medium me-[14px]">Jumlah Pasien: <span class="text-[#252F4A]">49,053</span></p>
    <p class="text-cadet font-medium">Jumlah Dokter: <span class="text-[#252F4A]">724</span></p>
@endsection

<!-- Table -->
@section('table')
    <thead class="border-y border-gray-200 bg-[#FCFCFC]">
        <tr>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">No. </th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Tanggal</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">No. RM</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Pasien</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Owner Pasien</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">Umur</th>
            <th scope="col" class="px-6 py-3 border-r border-gray-200">No. Telp</th>
            @if (auth()->user()->role == 'doctor')
                <th scope="col" class="px-6 py-3 text-center border-r border-gray-100">Aksi</th>
            @endif
        </tr>
    </thead>
    <tbody class="font-medium">
        <tr>
            <td class="px-6 py-3 border-b border-r border-gray-200">1</td>
            <td class="px-6 py-3 border-b border-r border-gray-200">09/01/24</td>
            <td class="px-6 py-3 border-b border-r border-gray-200">RM-2</td>
            <td class="px-6 py-3 border-b border-r border-gray-200">
                <div>
                    <p class="font-semibold">Kimo</p>
                    <p>Kucing</p>
                </div>
            </td>
            <td class="px-6 py-3 border-b border-r border-gray-200">Hendra</td>
            <td class="px-6 py-3 border-b border-r border-gray-200">2</td>
            <td class="px-6 py-3 border-b border-r border-gray-200">085532127698</td>
            k@if (auth()->user()->role == 'doctor')
            <td class="px-6 py-3 border-b border-gray-200">
                <div class="flex justify-center items-center gap-2 h-10">
                        <div class="h-10 mt-2">
                            @include('components.modal-inpatient', [
                                'title' => 'Rawat Inap',
                            ])
                        </div>
                        <button onclick="confirmSelesaiRawatInap(event)"
                            class="font-bold text-md py-4 px-3 mt-2 rounded-md text-white bg-primary flex items-center justify-center h-9">
                            Selesai Rawat Inap
                        </button>
                    @endif
                </div>
            </td>
        </tr>
    </tbody>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmSelesaiRawatInap(event) {
        event.preventDefault(); // Mencegah aksi default jika tombol dalam <a href>

        Swal.fire({
            title: "Konfirmasi",
            text: "Yakin pasien ini sudah selesai rawat inap?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Selesai!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Berhasil!",
                    text: "Pasien telah selesai rawat inap.",
                    icon: "success",
                    timer: 2000,
                    showConfirmButton: false
                });

                setTimeout(() => {
                    window.location.href = "{{ route('inpatient.index') }}";
                }, 2000);
            }
        });
    }
</script>
