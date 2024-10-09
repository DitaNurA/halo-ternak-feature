<?= $this->section('h_order2'); ?>
<div class="mt-4 grid grid-cols-1 gap-4 ">
    <!-- Ternak Sakit Section -->
    <div class="rounded-xl p-2 m-2 flex items-center border border-green-500">
        <img src="<?= base_url('assets/images/layanan/ternak-kawin.svg'); ?>" alt="Ternak Kawin Icon"
            class="w-14 h-14 mr-3">
        <div>
            <h3 class="text-blue-600 font-semibold">Ternak Kawin</h3>
            <p class="text-sm text-blue-500">Layanan ini membantu dalam proses reproduksi ternak. Termasuk di dalamnya adalah inseminasi buatan
                atau bantuan kawin secara alami.
            </p>
        </div>
    </div>

    <!-- Profil Peternak Section -->
    <div class="bg-white p-2 rounded-xl m-2 border border-blue-500">
        <h3 class="text-blue-600 text-lg font-medium">Profil Peternak</h3>
        <div class="h-[2px] bg-green-500 mb-2 max-w-[60%]"></div>
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
    <div id="date-time-container" class="rounded-lg p-2">
        <button id="edit-button" class="text-blue-600 flex space-x-4">
            <span class="text-blue-500 bg-white border border-blue-600 px-3 py-1 rounded-lg flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 7V3m8 4V3m-9 8h10m-7 4h4M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>02-10-2004</span>
            <span class="text-blue-500 bg-white border border-blue-600 px-3 py-1 rounded-lg flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8v4l3 3m6-1a9 9 0 11-9-9 9 9 0 019 9z" />
                </svg>09:00 WIB</span>
                <span class="text-blue-500 bg-white border border-blue-600 px-3 py-1 rounded-lg flex items-center space-x-2 ml-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8v4l3 3m6-1a9 9 0 11-9-9 9 9 0 019 9z" />
                </svg>12:00 WIB</span>
        </button>
    </div>

    <!-- Kondisi Hewan -->
    <div class="condition-choice m-2">
        <div class="flex space-x-2 justify-center">
            <label class="inline-flex items-center border border-blue-500 text-blue-500 hover:bg-blue-50 bg-white rounded-lg px-6 py-1 flex-1">
                <input type="radio" class="form-radio text-white mr-4" name="condition" value="kawin">
                <span class="text-medium">Kawin</span>
            </label>
            <label class="inline-flex items-center border border-blue-500 text-blue-500 hover:bg-blue-50 bg-white rounded-lg px-6 py-1 flex-1">
                <input type="radio" class="form-radio text-white mr-4" name="condition" value="tidak_kawin">
                <span class="text-medium">Tidak Kawin</span>
            </label>
        </div>
    </div>
    <div class="border-2 border-dashed border-blue-400 rounded-lg p-6 flex flex-col items-center justify-center m-2">
    <svg class="w-12 h-12 text-blue-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
    <input id="upload" type="file" class="hidden"/>
    <label for="upload" class="text-center text-blue-400 cursor-pointer">
        Upload Gambar Kondisi Hewan Ternak <br> <span class="text-sm text-gray-400">(Optional)</span>
    </label>
</div>

    <div class="condition-description m-2">
        <label for="condition" class="block text-sm font-medium text-blue-600">Penjelasan Kondisi Ternak</label>
        <textarea id="condition" name="condition" rows="4"
            class="mt-1 block w-full text-sm text-blue-900 border border-blue-300 rounded-lg focus:outline-none focus:border-indigo-600"></textarea>
    </div>

    <div class="action-buttons mt-6 flex justify-center">
        <button type="button" 
        onclick="window.location.href='<?= base_url('/order_done') ?>'"
            class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Selesai
        </button>
    </div>
</div>
<?= $this->endSection(); ?>