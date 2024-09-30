<!-- app/Views/admin/posternak/listposternak.php -->
<?= $this->section('list_posternak'); ?>
<!-- List Ternak -->
<div class="mt-4">
    <!-- Contoh item -->
    <div class="grid grid-cols-1 gap-4">
        <?php for ($i = 0; $i < 5; $i++): ?>
        <div class="flex items-center bg-white shadow p-4 rounded-lg">
            <img src="https://via.placeholder.com/80" class="w-20 h-20 rounded-full" alt="Foto Ternak">
            <div class="ml-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-1">Sapi <?= $i+1 ?></h2>
                <div>
                    <span class="text-green-600 text-sm bg-green-100 px-2 py-1 rounded mt-1">Disetujui</span>
                    <button class="bg-blue-500 text-white text-sm px-2 py-1 rounded mt-2 detail-button"
                        href="<?= base_url('detail_posternak') ?>">Detail</button>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>
</div>
<?= $this->include('components/overlay/overlay'); ?>
<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/detail-button.js'); ?>"></script>
<?= $this->endSection(); ?>