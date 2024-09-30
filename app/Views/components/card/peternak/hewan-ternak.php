<div class="p-3 rounded-md border-[1px] border-success flex-items gap-2">
    <div class="flex-center">
        <img src="/assets/images/<?= $data['foto'] ? 'hewan-ternak/' . $data['foto'] : 'dummy/sapi.png'; ?>" alt="<?= $data['nama_hewan']; ?>" class="w-20">
    </div>

    <div>
        <h1 class="text-base font-medium"><?= $data['nama_hewan']; ?></h1>
        <div class="flex-items gap-0.5">
            <img src="/assets/icons/gender.svg" class="size-3">
            <h1 class="text-xs"><?= $data['jenis_kelamin']; ?></h1>
        </div>

        <div class="mt-1">
            <a href="/peternak/hewan/detail/<?= $data['id_hewan']; ?>">
                <button class="button px-4 py-0.5 rounded-md text-xs">Lihat Sapi</button>
            </a>
        </div>
    </div>
</div>