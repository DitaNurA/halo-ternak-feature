<!-- Detail -->
<div class="mt-4 p-6 border-[1px] border-primary rounded-xl relative overflow-hidden">
    <div class="absolute top-0 right-0 p-3 pl-6 pb-6 rounded-bl-full bg-primary">
        <a href="/peternak/hewan/edit/<?= $data['id_hewan']; ?>">
            <img src="/assets/icons/pencil.svg" class="size-5">
        </a>
    </div>

    <div>
        <h1 class="text-2xl font-medium">Rincian Hewan Ternak</h1>
        <div class="mt-3 w-64 h-[1px] bg-success"></div>
    </div>

    <form action="" method="post" class="mt-4">
        <div class="w-full flex-justify">
            <div class="relative">
                <img src="/assets/images/<?= $data['foto'] ? 'hewan-ternak/' . $data['foto'] : 'dummy/sapi.png'; ?>" alt="<?= $data['nama_hewan']; ?>" class="size-28 rounded-full border-[1px] border-primary">
            </div>
        </div>

        <div class="mt-6">
            <div class="w-full bg-primary px-4 py-1.5 rounded-md">
                <h1 class="text-light"><?= $data['nama_hewan']; ?></h1>
            </div>

            <div class="mt-3 w-full bg-primary px-4 py-1.5 rounded-md">
                <h1 class="text-light"><?= $data['nama_ternak']; ?></h1>
            </div>

            <div class="mt-3 w-full bg-primary px-4 py-1.5 rounded-md">
                <h1 class="text-light"><?= $data['jenis_ternak']; ?></h1>
            </div>

            <div class="mt-3 w-full bg-primary px-4 py-1.5 rounded-md">
                <h1 class="text-light"><?= $data['jenis_kelamin']; ?></h1>
            </div>

            <div class="mt-3 w-full bg-primary px-4 py-1.5 rounded-md">
                <h1 class="text-light"><?= $data['berat']; ?> KG</h1>
            </div>

            <div class="mt-3 w-full bg-primary px-4 py-1.5 rounded-md">
                <h1 class="text-light"><?= $data['usia']; ?> th</h1>
            </div>

            <div class="mt-3 w-full bg-primary px-4 py-1.5 rounded-md">
                <h1 class="text-light">Rp <?= number_format($data['harga']); ?></h1>
            </div>

            <div class="mt-6 w-full flex-justify gap-4">
                <button type="button" class="popup-btn bg-[#797979] text-light px-4 py-1.5 rounded-md" data-target="popup-delete-ternak">Hapus</button>
                <?= view('components/modal/peternak/delete-ternak', ['data' => $data]); ?>

                <?php if ( boolval($data['status_dijual']) ) { ?>
                    <button type="button" class="popup-btn button-outline-primary px-4 py-1.5 rounded-md" data-target="tidak-jadi-jual-ternak">Tidak Jadi Jual</button>
                    <?= view('components/modal/peternak/tidak-jadi-jual-ternak', ['data' => $data]); ?>
                <?php } else { ?>
                    <button type="button" class="popup-btn button px-4 py-1.5 rounded-md" data-target="jual-ternak">Jual Ternak</button>
                    <?= view('components/modal/peternak/jual-ternak', ['data' => $data]); ?>
                <?php } ?>
            </div>
        </div>
    </form>
</div>
<!-- End Detail -->