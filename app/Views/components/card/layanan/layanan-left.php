<div class="mb-6 px-3 py-2 grid grid-cols-[1fr__2fr] items-center gap-8 rounded-md border-[1px] border-success">
    <div class="p-2">
        <img src="/assets/images/layanan/<?= $data['foto']; ?>" alt="<?= $data['nama_layanan']; ?>" class="w-full">
    </div>

    <div>
        <h1 class="text-base font-medium"><?= $data['nama_layanan']; ?></h1>
        <p class="text-xs"><?= $data['deskripsi']; ?></p>
        <?php if ( !isset($hide_button) ) { ?>
        <button class="popup-btn mt-2 button px-4 py-1.5 rounded-md" data-target="popupLayanan-<?= $data['id_layanan']; ?>">
            <a href="/peternak/order/ternak-sakit/<?= $id_hewan; ?>">Pesan Sekarang</a>
        </button>
        <?php } ?>
    </div>

    <!-- Popup -->
    <?php if ( !session()->has('id') ) { ?>
        <?= view('components/modal/layanan', ['popupClass' => 'popupLayanan-' . $data['id_layanan']]); ?>
    <?php } ?>
    <!-- End Popup -->
</div>