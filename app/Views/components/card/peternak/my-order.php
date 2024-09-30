<div class="p-3 rounded-md border-[1px] border-success flex-items gap-6">
    <div class="flex-center">
        <img src="/assets/images/<?= $data['foto'] ? 'order-layanan/' . $data['foto'] : 'dummy/sapi.png'; ?>" class="w-28">
    </div>

    <div>
        <h1 class="text-base font-medium"><?= $data['nama_hewan']; ?></h1>
        <div class="flex-items gap-0.5">
            <img src="/assets/icons/doctor.svg" class="size-4">
            <h1><?= $data['nama_petugas']; ?></h1>
        </div>

        <div class="mt-1">
            <a href="/peternak/order/detail/<?= $data['id_transaksi']; ?>">
                <button class="button px-4 py-1 rounded-md text-xs">Lihat Pesanan</button>
            </a>
        </div>
    </div>
</div>