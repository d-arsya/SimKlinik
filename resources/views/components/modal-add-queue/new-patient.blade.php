<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('modal', {
            open: false,
            step: 1,
            prevStep: 1,
            activeTab: 'lama'
        });
    });
</script>

<div id="modal-add-queue" x-data="{
    openModal: false,
    activeTab: 'lama',
    step: 1,
    prevStep: 1,
    ownerId: null,
    init() {
        window.addEventListener('input-new-patient', (event) => {
            localStorage.setItem('new-owner-id',event.detail.ownerId)
            console.log('Owner ID dari Alpine:',localStorage.getItem('new-owner-id'));
            this.changeStep(2);
        });
        window.addEventListener('input-examination', (event) => {
            localStorage.setItem('new-patient-id',event.detail.patientId)
            console.log('Patient ID dari Alpine:',localStorage.getItem('new-patient-id'));
            this.changeStep(3);
        });
    },
    toggleModal(status) {
        this.openModal = status;
        document.body.classList.toggle('overflow-hidden', status);
    },
    changeTab(tab) {
        this.activeTab = tab;
    },
    changeStep(newStep) {
        this.prevStep = this.step;
        this.step = newStep;
    }
}">
    <button @click="toggleModal(true); step = 1"
        class="px-3 py-2 rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-all duration-300">
        Pasien Baru
    </button>

    <!-- BACKDROP MODAL -->
    <div x-show="openModal" x-transition.opacity.duration.300ms
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-[100]">

        <!-- MODAL CONTENT -->
        <div x-show="openModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="relative bg-white shadow-lg w-1/2 rounded-xl max-h-[90vh] overflow-y-auto transition-all"
            :class="prevStep < step ? 'scale-105' : 'scale-95'">

            <!-- STICKY HEADER -->
            <div class="sticky top-0 bg-white z-10 border-b shadow-sm flex justify-between items-center p-4">
                <h2 class="text-lg font-semibold">
                    <span x-show="step === 1">Tambah Antrian - Pasien Baru</span>
                    <span x-show="step === 2">Tambah Pasien Baru</span>
                    <span x-show="step === 3">Konfirmasi</span>
                    <span x-show="step === 4">Input Pemeriksaan Awal</span>
                    <span x-show="step === 5">Pemeriksaan Awal</span>
                </h2>
                <button @click="toggleModal(false)"
                    class="text-gray-500 hover:text-gray-700 transition-all duration-200">✖</button>
            </div>

            <!-- TAB NAVIGATION -->
            <div class="sticky top-[60px] bg-white z-10 border-b flex justify-center p-2" x-show="step === 1">
                <button @click="changeTab('lama')" class="px-4 py-2 transition-transform duration-300"
                    :class="activeTab === 'lama' ? 'border-b-2 border-blue-500 text-blue-600 font-semibold' :
                        'text-gray-600'">
                    Owner Lama
                </button>
                <button @click="changeTab('baru')" class="px-4 py-2 transition-transform duration-300"
                    :class="activeTab === 'baru' ? 'border-b-2 border-blue-500 text-blue-600 font-semibold' :
                        'text-gray-600'">
                    Owner Baru
                </button>
            </div>

            <!-- CONTENT TAB -->
            <div class="p-4">
                <!-- Step 1: Owner Baru / Lama -->
                <div x-show="step === 1" x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 -translate-x-5"
                    x-transition:enter-end="opacity-100 translate-x-0">
                    <div x-show="activeTab === 'lama'">
                        <x-modal-add-queue.table-old-owner />
                    </div>
                    <div x-show="activeTab === 'baru'">
                        <x-modal-add-queue.form-new-owner-new />
                    </div>
                </div>

                <!-- Step 2: Input New Patient -->
                <div x-show="step === 2" x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 -translate-y-5 scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100">
                    <x-modal-add-queue.form-new-patient />
                </div>

                <!-- Step 3: Konfirmasi -->
                <div x-show="step === 3" x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-5 scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100">
                    <p class="text-lg text-center font-semibold">Pasien akan masuk ke antrian pemeriksaan awal.
                        Lanjutkan?</p>
                    <div class="flex justify-center mt-4 gap-4">
                        <button @click="changeStep(1)" class="px-4 py-2 bg-gray-300 rounded-md">Batal</button>
                        <button @click="changeStep(4)" class="px-4 py-2 bg-blue-600 text-white rounded-md">OK</button>
                    </div>
                </div>

                <!-- Step 4: Input Data Pasien Baru -->
                <div x-show="step === 4" x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 translate-y-5 scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100">
                    <x-modal-add-queue.form-precheckup />
                </div>

                <!-- Step 5: Preview Pemeriksaan Awal -->
                <div x-show="step === 5" x-transition:enter="transition ease-out duration-100 transform"
                    x-transition:enter-start="opacity-0 translate-y-5 scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100">
                    <x-modal-add-queue.preview-precheckup />
                </div>
            </div>
        </div>
    </div>
</div>
