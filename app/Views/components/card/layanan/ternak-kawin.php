<!-- Ternak Kawin -->
<div class="mb-6 px-3 py-2 grid grid-cols-[2fr__1fr] gap-8 rounded-md border-[1px] border-success">
    <div>
        <h1 class="text-base text-right font-medium">Ternak Kawin</h1>
        <p class="text-xs text-right">Layanan ini membantu dalam proses reproduksi ternak. Termasuk di dalamnya adalah inseminasi buatan atau bantuan kawin secara alami.</p>
        <?php if ( !isset($hide_button) ) { ?>
        <div class="w-full flex justify-end mt-2">
            <button class="popup-btn button px-4 py-1.5 rounded-md" data-target="popupLayanan-2">
                <a href="/peternak/order/ternak-kawin">Pesan Sekarang</a>
            </button>
        </div>
        <?php } ?>
    </div>

    <div class="p-2">
        <img src="/assets/images/layanan/ternak-kawin.svg" alt="Ternak Kawin" class="w-full">
    </div>

    <!-- Popup -->
    <?= view('components/modal/layanan', ['popupClass' => 'popupLayanan-2']); ?>
    <!-- End Popup -->
</div>
<!-- End Ternak Kawin -->