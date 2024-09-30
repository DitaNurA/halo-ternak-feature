<div class="p-3 rounded-md border-[1px] border-success flex-items gap-2">
    <div class="flex-center">
        <img src="/assets/<?= $data['foto'] ? 'images/kandang/' . $data['foto'] : 'icons/kandang-ternak.svg'; ?>" class="w-20">
    </div>

    <div>
        <h1 class="text-base font-medium"><?= $data['nama_kandang']; ?></h1>
        <div class="flex-items gap-0.5">
            <img src="/assets/icons/map-primary.svg" class="size-3">
            <h1 class="text-xs"><?= $data['kecamatan']; ?></h1>
        </div>

        <div class="mt-1">
            <a href="/peternak/kandang/detail/<?= $data['id_kandang_ternak']; ?>">
                <button class="button px-4 py-0.5 rounded-md text-xs">Lihat Detail</button>
            </a>
        </div>
    </div>
</div>