<!-- File: popup.php -->
    <div id="popupModal" class="absolute inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg relative w-80 text-center">
            <button id="closeModal" class="absolute top-2 right-2 text-blue-500 text-xl font-bold">&times;</button>
            <img src="<?= base_url('assets/images/popup/popup-sorry.svg') ?>" alt="Sorry" class="mx-auto h-28">
            <p class="mt-4 text-blue-500 font-2xl text-center">Maaf, Anda Bukan Peternak</p>
        </div>
    </div>
