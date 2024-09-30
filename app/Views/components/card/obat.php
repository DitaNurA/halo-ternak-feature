<div class="rounded-md border-[1px] border-success">
    <div>
        <img src="/assets/images/dummy/obat.png" alt="" class="w-full rounded-md">
    </div>
    <div class="p-1.5 pb-2">
        <h1 class="text-limit-1 text-base font-medium"><?= $data['nama_obat']; ?></h1>
        <p class="text-limit-2 text-xs font-normal"><?= $data['deskripsi']; ?></p>

        <div class="w-full flex justify-end">
            <button class="popup-btn button px-3 rounded-md" data-target="popupObat-<?= $data['id_obat']; ?>">Lihat</button>
        </div>
    </div>

    <!-- Popup -->
    <?= view('components/modal/obat', [
        'data' => $data,
        'popupClass' => 'popupObat-' . $data['id_obat']
    ]); ?>
    <!-- End Popup -->
</div>