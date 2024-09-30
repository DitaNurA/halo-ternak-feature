<!-- Ternak Sakit -->
<div class="mb-6 px-3 py-2 grid grid-cols-[1fr__2fr] items-center gap-8 rounded-md border-[1px] border-success">
    <div class="p-2">
        <img src="/assets/images/layanan/ternak-sakit.svg" alt="Ternak Sakit" class="w-full">
    </div>

    <div>
        <h1 class="text-base font-medium">Ternak Sakit</h1>
        <p class="text-xs">Layanan ini mencakup diagnosa, pengobatan, dan pemulihan untuk ternak yang mengalami masalah kesehatan.</p>
        <?php if ( !isset($hide_button) ) { ?>
        <button class="popup-btn mt-2 button px-4 py-1.5 rounded-md" data-target="popupLayanan-1">
            <a href="/peternak/order/ternak-sakit">Pesan Sekarang</a>
        </button>
        <?php } ?>
    </div>

    <!-- Popup -->
    <?= view('components/modal/layanan', ['popupClass' => 'popupLayanan-1']); ?>
    <!-- End Popup -->
</div>
<!-- End Ternak Sakit -->