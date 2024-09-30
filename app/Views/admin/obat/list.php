<!-- app/Views/admin/obat/listobat.php -->
<?= $this->section('list'); ?>
<!-- List Obat -->
<div class="mt-4">
    <div class="grid grid-cols-1 gap-4">
        <?php foreach ($obat as $o): ?>
        <div class="flex items-center bg-white shadow p-4 rounded-lg border border-blue-500">
            <!-- Menampilkan Foto Petugas -->
            <img src="<?= base_url('assets/uploads/obat/' . $o['foto']) ?>" 
                 class="w-20 h-20 rounded-full object-cover" alt="Foto Obat">
            
            <div class="ml-4">
                <!-- Nama Petugas -->
                <h2 class="text-lg font-semibold text-blue-500 mb-2"><?= $o['nama_obat'] ?></h2>
                
                <div>
                  <!-- Tombol Detail Petugas -->
                    <a href="<?= base_url('admin/detail_obat/' . $o['id_obat']) ?>" 
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