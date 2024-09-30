<!-- app/Views/admin/obat/show_detailobat.php -->
<?= $this->section('show_detail'); ?>
<div class="w-full max-w-md mx-auto bg-blue-50 p-6 rounded-xl shadow-lg text-blue-500 border border-green-500 mt-8">
    <form action="<?= base_url('admin/obat/update/'. $obat['id_obat']) ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-4">
            <label for="foto">Gambar Obat</label>
            <input type="file" name="foto" id="foto"
                class="form-control w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500">

            <!-- Jika ada foto lama, tampilkan -->
            <?php if ($obat['foto']): ?>
            <input type="hidden" name="foto_lama" value="<?= $obat['foto'] ?>">
            <img src="<?= base_url('assets/uploads/obat/' . $obat['foto']) ?>" alt="Gambar Obat" class="w-20 h-20 mt-2">
            <p class="text-sm text-gray-600">File yang ada: <?= $obat['foto'] ?></p>
            <?php endif; ?>
        </div>
        <div class="mb-4">
            <label for="nama_obat" class="block mb-2">Nama Obat</label>
            <input type="text" name="nama_obat" id="nama_obat" value="<?= $obat['nama_obat'] ?>"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                required>
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block mb-2">Deskripsi Obat</label>
            <textarea type="text" name="deskripsi" id="deskripsi" rows="5"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                required><?= $obat['deskripsi'] ?></textarea>
        </div>
        <div class="flex justify-center items-center">
            <a href="<?= base_url('admin/obat') ?>" class="px-3 py-1 bg-gray-500 text-white rounded-lg mr-2">Batal</a>
            <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded-lg ml-2">Ubah</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>