<div class="p-6 border-[1px] border-primary bg-primary bg-opacity-20 rounded-xl relative overflow-hidden">
    <div>
        <h1 class="text-2xl font-medium">Pesanan Saya</h1>
        <div class="mt-3 w-64 h-[1px] bg-success"></div>
    </div>

    <div class="mt-4">
        <?php if ( count($transaksi_peternak) ) { ?>
        <?php foreach($transaksi_peternak as $row) { ?>
        <div>
            <?= view('components/card/peternak/my-order', ['data' => $row]); ?>
        </div>
        <?php }} else { ?>
            <div class="w-full flex-justify">
                <h1 class="font-medium text-center">Data masih kosong.</h1>
            </div>
        <?php } ?>
    </div>
</div>