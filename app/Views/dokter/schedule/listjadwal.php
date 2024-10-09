<!-- app/Views/dokter/schedule/listjadwal.php -->
<?= $this->section('listjadwal'); ?>
<div class="mb-8 bg-blue-50 rounded-2xl border border-blue-500 ">
    <h2 class="text-blue-600 text-xl font-medium ml-6 mt-6">Jadwal Saya</h2>
    <div class="h-1 mt-1 bg-green-500 ml-6 max-w-[60%]"></div>
    <div class="mt-4 grid grid-cols-1 gap-4 ">
        <!-- Contoh item -->
        <div class="flex items-center shadow p-4 rounded-lg border border-green-500 ml-6 mr-6">
            <img src="https://via.placeholder.com/80" class="w-20 h-20 rounded-full" alt="Gambar Ternak">
            <div class="ml-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Ternak Sakit</h2>
                <div>
                    <span class="text-green-600 text-sm bg-green-100 px-2 py-1 rounded mt-1">di Latsari</span>
                    <button class="bg-blue-500 text-white text-sm px-2 py-1 rounded mt-2"><a href="<?= base_url('schedule') ?>">Lihat Pesanan</a></button>
                </div>
            </div>
        </div>
        <div class="flex items-center shadow p-4 rounded-lg border border-green-500 ml-6 mr-6">
            <img src="https://via.placeholder.com/80" class="w-20 h-20 rounded-full" alt="Gambar Ternak">
            <div class="ml-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Ternak Kawin</h2>
                <div>
                    <span class="text-green-600 text-sm bg-green-100 px-2 py-1 rounded mt-1">di Latsari</span>
                    <button class="bg-blue-500 text-white text-sm px-2 py-1 rounded mt-2">Lihat Pesanan</button>
                </div>
            </div>
        </div>
        <div class="flex items-center shadow p-4 rounded-lg border border-green-500 ml-6 mr-6">
            <img src="https://via.placeholder.com/80" class="w-20 h-20 rounded-full" alt="Gambar Ternak">
            <div class="ml-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-2">Ternak Bunting</h2>
                <div>
                    <span class="text-green-600 text-sm bg-green-100 px-2 py-1 rounded mt-1">di Latsari</span>
                    <button class="bg-blue-500 text-white text-sm px-2 py-1 rounded mt-2">Lihat Pesanan</button>
                </div>
            </div>
        </div>
        <?= $this->include('components/pagination/pageslide'); ?>
    </div>

</div>
<?= $this->endSection(); ?>