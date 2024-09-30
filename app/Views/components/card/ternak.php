<div class="rounded-md border-[1px] border-success">
    <div>
        <img src="/assets/images/<?= $data['foto'] ? 'hewan-ternak/' . $data['foto'] : 'dummy/ternak.png'; ?>" alt="" class="w-full rounded-md">
    </div>
    <div class="p-1.5 pb-2">
        <h1 class="text-limit-1 text-base font-medium"><?= $data['nama_hewan']; ?></h1>
        <h1 class="text-xs font-normal">Rp <?= number_format($data['harga']); ?></h1>

        <div class="mt-2 w-full flex-between-center">
            <div class="flex-items gap-1">
                <img src="/assets/icons/map-primary.svg" class="size-3">
                <h1><?= $data['kecamatan']; ?></h1>
            </div>
            <button class="popup-btn button px-3 rounded-md" data-target="popupTernak-<?= $data['id_hewan']; ?>">Lihat</button>
        </div>
    </div>

    <!-- Popup -->
    <?= view('components/modal/ternak', ['popupClass' => 'popupTernak-' . $data['id_hewan']]); ?>
    <!-- End Popup -->
</div>