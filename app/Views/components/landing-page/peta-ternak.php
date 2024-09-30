<div class="p-4">
    <h1 class="text-2xl font-medium text-center">Peta Ternak</h1>
    <div class="w-full flex-justify">
        <div class="mt-2 w-16 h-0.5 bg-success"></div>
    </div>

    <p class="mt-3 text-base text-center">Peta peternakan di seluruh kecamatan di Kabupaten Tuban</p>

    <div class="popup-btn mt-2 w-full flex-justify" data-target="detail-peta">
        <img src="/assets/images/landing-page-home/peta-ternak/maps.svg" alt="Peta Peternakan" class="w-full">
    </div>

    <?= view('components/modal/detail-peta', ['popupClass' => 'detail-peta']); ?>
</div>