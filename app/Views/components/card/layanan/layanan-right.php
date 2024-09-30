<div class="mb-6 px-3 py-2 grid grid-cols-[2fr__1fr] gap-8 rounded-md border-[1px] border-success">
    <div>
        <h1 class="text-base text-right font-medium"><?= $data['nama_layanan']; ?></h1>
        <p class="text-xs text-right"><?= $data['deskripsi']; ?></p>
        <?php if ( !isset($hide_button) ) { ?>
        <div class="w-full flex justify-end mt-2">
            <button class="popup-btn button px-4 py-1.5 rounded-md" data-target="popupLayanan-<?= $data['id_layanan']; ?>">
                <a href="/peternak/order/ternak-kawin/<?= $id_hewan; ?>">Pesan Sekarang</a>
            </button>
        </div>
        <?php } ?>
    </div>

    <div class="p-2">
        <img src="/assets/images/layanan/<?= $data['foto']; ?>" alt="<?= $data['nama_layanan']; ?>" class="w-full">
    </div>

    <!-- Popup -->
    <?php if ( !session()->has('id') ) { ?>
        <?= view('components/modal/layanan', ['popupClass' => 'popupLayanan-' . $data['id_layanan']]); ?>
    <?php } ?>
    <!-- End Popup -->
</div>