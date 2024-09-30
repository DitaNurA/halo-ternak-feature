<div class="p-6 border-[1px] border-success rounded-xl relative overflow-hidden">

    <div>
        <h1 class="text-2xl font-medium">Riyawat Pesanan</h1>
        <div class="mt-3 w-64 h-[1px] bg-success"></div>
    </div>

    <div class="mt-4">
        <form action="" method="get" class="w-full flex-between-center gap-4">
            <div class="w-full">
                <input type="text" name="keyword" autocomplete="off" placeholder="Cari riwayat pesanan..." class="w-full outline-none border-[1px] border-success rounded-md px-4 py-1 placeholder-primary">
            </div>

            <div>
                <button class="button px-3 py-1 rounded-md">
                    <img src="/assets/icons/search-light.svg" class="size-5">
                </button>
            </div>
        </form>
    </div>

    <div class="mt-4">
        <div>
            <?= view('components/card/peternak/order-history'); ?>
        </div>

        <div class="mt-3">
            <?= view('components/card/peternak/order-history'); ?>
        </div>

        <div class="mt-3">
            <?= view('components/card/peternak/order-history'); ?>
        </div>

        <div class="mt-6">
            <?= $this->include('components/paginate'); ?>
        </div>
    </div>
</div>