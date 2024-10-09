<?= $this->section('show_jadwal'); ?>
<div class="mt-4 grid grid-cols-1 gap-4 ">
    <!-- Ternak Sakit Section -->
    <div class="rounded-xl p-2 m-2 flex items-center border border-green-500">
        <img src="<?= base_url('assets/images/layanan/ternak-sakit.svg'); ?>" alt="Ternak Sakit Icon"
            class="w-12 h-12 mr-3">
        <div>
            <h3 class="text-blue-600 font-semibold">Ternak Sakit</h3>
            <p class="text-sm text-blue-500">Layanan ini mencakup diagnosa, pengobatan, dan pemulihan untuk ternak
                yang
                mengalami masalah kesehatan.</p>
        </div>
    </div>

    <!-- Profil Peternak Section -->
    <div class="bg-white p-2 rounded-xl m-2 border border-blue-500">
        <h3 class="text-blue-600 text-lg font-medium">Profil Peternak</h3>
        <div class="h-[2px]  bg-green-500 mb-2 max-w-[60%]"></div>
        <div class="flex items-center mb-2">
            <img src="<?= base_url('assets/images/icon-peternak.png'); ?>" alt="Peternak Avatar"
                class="w-24 h-24 rounded-full mr-2 ">
            <div>
                <p class="text-blue-700 mb-2 font-semibold ml-4">Peternak:</p>
                <p class="text-blue-500 border border-blue-500 rounded-lg ml-4 mb-2 w-full">Upin</p>
                <p class="text-blue-700 mb-2 font-semibold ml-4">Nama Hewan Ternak:</p>
                <p class="text-blue-500 border border-blue-500 rounded-lg ml-4 mb-2 w-full">Sapi</p>
                <p class="text-blue-700 mb-2 font-semibold ml-4">Alamat Kandang:</p>
                <p class="text-blue-500 border border-blue-500 rounded-lg ml-4 mb-2 w-full">Palang</p>
            </div>
        </div>
    </div>
    <!--Date and Time Section-->
    <div id="date-time-container" class="flex justify-between items-center rounded-lg p-2 mb-4">
        <!-- Icon Edit -->
        <button id="edit-button" class="text-blue-600 flex space-x-2">
            <span class="bg-blue-500 text-white px-6 py-1 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7V3m8 4V3m-9 8h10m-7 4h4M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>02-10-2004</span>
            <span class="bg-blue-500 text-white px-6 py-1 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8v4l3 3m6-1a9 9 0 11-9-9 9 9 0 019 9z" />
                </svg>09:00 WIB</span>
            <span class="ml-4"></span>
            <span class="bg-blue-500 text-white px-4 py-1 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </span>
        </button>

        <!-- Date and Time Input (Hidden by default) -->
        <div id="form-container" class="hidden flex justify-between items-center rounded-lg p-2 space-x-2">
            <input type="date"
                class="text-blue-500 bg-white border border-blue-500 px-6 py-1 rounded-lg flex items-center"
                value="2024-10-02">
            <input type="time"
                class="text-blue-500 bg-white border border-blue-500 px-6 py-1 rounded-lg flex items-center"
                value="09:00">
            <button id="save-button"
                class="text-blue-500 bg-white border border-blue-500 px-4 py-1 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </button>
        </div>
    </div>

    <script>
    const editButton = document.getElementById('edit-button');
    const formContainer = document.getElementById('form-container');
    const dateContainer = document.getElementById('date-time-container');

    editButton.addEventListener('click', () => {
        formContainer.classList.remove('hidden');
        editButton.classList.add('hidden');
    });

    document.getElementById('save-button').addEventListener('click', () => {
        formContainer.classList.add('hidden');
        editButton.classList.remove('hidden');
    });
    </script>


    <!-- Kondisi Hewan -->
    <div class="mb-4">
        <img src="<?= base_url('assets/images/hewan.jpeg'); ?>" alt="Foto Ternak"
            class="w-full h-32 object-cover rounded-lg mb-2">
        <textarea class="w-full h-20 p-2 border border-blue-50 rounded-lg"
            placeholder="Tuliskan Kondisi dan gejala hewan ternak anda disini"></textarea>
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-between">
        <button class="bg-gray-400 text-white py-2 px-4 rounded-lg">Tolak</button>
        <button class="bg-green-500 text-white py-2 px-4 rounded-lg flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="white" width="16" height="16">
                <path
                    d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
            </svg>
            Chat Peternak
        </button>
        <button class="bg-blue-500 text-white py-2 px-4 rounded-lg">Terima</button>
    </div>
    <?= $this->endSection(); ?>