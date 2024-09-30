<!-- app/Views/admin/peternak/listpeternak.php -->
<?= $this->section('list'); ?>
<div class="mt-4">
    <!-- List Peternak -->
    <div class="grid grid-cols-1 gap-4">
        <?php foreach ($peternak as $p) : ?>
        <div class="flex items-center bg-white shadow p-4 rounded-lg">
            <!-- Tampilkan gambar peternak -->
            <img src="<?= base_url('assets/uploads/peternak/' . $p['foto']) ?>" class="w-20 h-20 rounded-full" alt="Foto peternak">
            <div class="ml-4">
                <h2 class="text-lg font-semibold text-gray-700 mb-2"><?= $p['nama'] ?></h2>
                <div>
                    <!-- Tampilkan alamat sesuai data -->
                    <span class="text-gray-200 text-sm bg-gray-600 px-2 py-1 rounded mt-1"><?= $p['alamat'] ?></span>
                    <a class="bg-blue-500 text-white text-sm px-2 py-1 rounded mt-2 detail-button"
                        href="<?= base_url('admin/peternak/detail/' . $p['id_peternak']) ?>">Detail</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<?= $this->include('admin/components/overlay/overlay'); ?>
<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/detail-button.js'); ?>"></script>
<?= $this->endSection(); ?>