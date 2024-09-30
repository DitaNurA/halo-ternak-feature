<!-- app/Views/admin/edukasi/list_edukasi.php -->
<?= $this->section('list'); ?>
<!-- List Edukasi -->
<div class="mt-4">
    <!-- Contoh item -->
    <div class="grid grid-cols-1 gap-4">
        <?php foreach ($edukasi as $e):?>
        <div class="flex items-center bg-white shadow p-4 rounded-lg">
            <div class="ml-4">
            <h2 class="text-lg font-semibold text-blue-500 mb-2"><?= $e['judul_yt'] ?></h2>
            <p class="text-md font-light mb-2">
            <a href="<?= $e['link_yt'] ?>" target="_blank" class="text-blue-500 underline">
                        <?= $e['link_yt'] ?>
                    </a></p>
            <p class="text-xs font-light text-blue-500 mb-2"><?= $e['deskripsi']?></p>
                <div>
                <a href="<?= base_url('admin/edukasi/detail/' . $e['id_edukasi']) ?>" 
                class="bg-blue-500 text-white text-sm px-2 py-1 rounded ml-2">Detail</a>
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