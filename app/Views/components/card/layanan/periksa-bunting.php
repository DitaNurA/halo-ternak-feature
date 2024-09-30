<!-- Periksa Bunting -->
<div class="mb-6 px-3 py-2 grid grid-cols-[1fr__2fr] gap-8 rounded-md border-[1px] border-success">
    <div class="p-2">
        <img src="/assets/images/layanan/periksa-bunting.svg" alt="Periksa Bunting" class="w-full">
    </div>

    <div>
        <h1 class="text-base font-medium">Periksa Bunting</h1>
        <p class="text-xs">Layanan ini fokus pada perawatan sapi yang sedang dalam masa kebuntingan. Terdiri dari pemeriksaan rutin, pemantauan kesehatan dan persiapan menjelang kelahiran.</p>
        <?php if ( !isset($hide_button) ) { ?>
        <button class="popup-btn mt-2 button px-4 py-1.5 rounded-md" data-target="popupLayanan-3">
            <a href="/peternak/order/periksa-bunting">Pesan Sekarang</a>
        </button>
        <?php } ?>
    </div>

    <!-- Popup -->
    <?= view('components/modal/layanan', ['popupClass' => 'popupLayanan-3']); ?>
    <!-- End Popup -->
</div>
<!-- End Periksa Bunting -->