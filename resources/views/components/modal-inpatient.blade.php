<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div x-data="{
        openModal: false,
        step: 1,
        prevStep: 1,
        toggleModal(status) {
            this.openModal = status;
            document.body.classList.toggle('overflow-hidden', status);
        },
        changeStep(newStep) {
            this.prevStep = this.step;
            this.step = newStep;
        }
    }">

    <button @click="toggleModal(true); step = 1">
       <x-icons.detail-button/>
    </button>

    <!-- BACKDROP MODAL -->
    <div x-show="openModal" x-transition.opacity.duration.300ms
 class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-[9999]">
        <!-- MODAL CONTENT -->
        <div x-show="openModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="relative bg-white shadow-lg w-1/2 rounded-xl max-h-[90vh] overflow-y-auto transition-all">

            <!-- HEADER -->
            <div class="sticky top-0 bg-white z-10 border-b shadow-sm flex justify-between items-center p-4">
                <h2 class="text-lg font-semibold">
                    <span x-show="step === 1">Edit Data</span>
                    <span x-show="step === 2">Konfirmasi</span>
                </h2>
                <button @click="toggleModal(false)"
                    class="text-gray-500 hover:text-gray-700 transition-all duration-200">✖</button>
            </div>

            <!-- CONTENT -->
            <div class="p-4">
                <!-- Step 1: Form Edit Data -->
                <div x-show="step === 1"
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 -translate-x-5"
                    x-transition:enter-end="opacity-100 translate-x-0">
                    <x-modal-add-inpatient/>
                    <div class="flex justify-end mt-4">
                        <button @click="changeStep(2)"
                            class="px-4 py-2 bg-primary text-white rounded-md">Lanjut</button>
                    </div>
                </div>

                <!-- Step 2: Konfirmasi -->
                <div x-show="step === 2"
                    x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-5 scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100">
                    <p class="text-lg text-center font-semibold">Simpan penambahan data?</p>
                    <div class="flex justify-center mt-4 gap-4">
                        <button @click="changeStep(1)" class="px-4 py-2 bg-gray-300 rounded-md">Batal</button>
                        <button @click="toggleModal(false)" class="px-4 py-2 bg-primary text-white rounded-md">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
