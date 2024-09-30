<!-- app/Views/admin/petugas/list.php -->
<?= $this->section('list'); ?>
<!-- List Petugas -->
<div class="mt-4">
    <div class="grid grid-cols-1 gap-4">
        <?php foreach ($petugas as $p): ?>
        <div class="flex items-center bg-white shadow p-4 rounded-lg border border-blue-500">
            <!-- Menampilkan Foto Petugas -->
            <img src="<?= base_url('assets/uploads/petugas/' . $p['foto']) ?>" 
                 class="w-20 h-20 rounded-full object-cover" alt="Foto Petugas">
            
            <div class="ml-4">
                <!-- Nama Petugas -->
                <h2 class="text-lg font-semibold text-blue-500 mb-2"><?= $p['nama'] ?></h2>
                
                <div>
                    <!-- Box Status Ketersediaan -->
                    <?php if ($p['status'] === 'approve'): ?>
                        <span class="text-green-600 text-sm bg-green-100 px-2 py-1 rounded mt-1">Tersedia</span>
                    <?php else: ?>
                        <span class="text-red-600 text-sm bg-red-100 px-2 py-1 rounded mt-1">Tidak Tersedia</span>
                    <?php endif; ?>

                    <!-- Tombol Detail Petugas -->
                    <a href="<?= base_url('admin/petugas/detail/' . $p['id_petugas']) ?>" 
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
