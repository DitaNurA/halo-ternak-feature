<!-- app/Views/admin/peternak/show_detailpeternak.php -->
<?= $this->section('show_detail'); ?>
<div class="w-full max-w-md mx-auto bg-blue-50 p-6 rounded-xl shadow-lg text-blue-500 border border-green-500 mt-8">
    <form action="<?= base_url('admin/peternak/update/' . $peternak['id_peternak']) ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-4">
            <label for="nama" class="block mb-2">Nama Peternak</label>
            <input type="text" name="nama" id="nama"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                value="<?= $peternak['nama'] ?>" required>
        </div>
        <div class="mb-4">
            <label for="alamat" class="block mb-2">Alamat</label>
            <input type="text" name="alamat" id="alamat"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                value="<?= $peternak['alamat'] ?>" required>
        </div>
        <div class="mb-4">
            <label for="jumlah_kandang" class="block mb-2">Jumlah Kandang</label>
            <input type="text" name="jumlah_kandang" id="jumlah_kandang"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                value="<?= $peternak['jumlah_kandang'] ?>" required>
        </div>
        <div class="mb-4">
            <label for="jumlah_ternak" class="block mb-2">Jumlah Ternak</label>
            <input type="text" name="jumlah_ternak" id="jumlah_ternak"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                value="<?= $peternak['jumlah_ternak'] ?>" required>
        </div>
        <div class="mb-4">
            <label for="layanan_selesai" class="block mb-2">Layanan Selesai</label>
            <input type="text" name="layanan_selesai" id="layanan_selesai"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                value="<?= $peternak['layanan_selesai'] ?>" required>
        </div>
        <div class="mb-4">
            <label for="no_wa" class="block mb-2">Nomor Whatsapp</label>
            <input type="text" name="no_wa" id="no_wa"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                value="<?= $peternak['no_wa'] ?>" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block mb-2">Kata Sandi</label>
            <input type="password" name="password" id="password"
                class="form-control w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
    <label for="foto">Foto Peternak</label>
    <input type="file" name="foto" id="foto" 
        class="form-control w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500">

    <!-- Jika ada foto lama, tampilkan -->
    <?php if ($peternak['foto']): ?>
        <input type="hidden" name="foto_lama" value="<?= $peternak['foto'] ?>">
        <img src="<?= base_url('assets/uploads/peternak/' . $peternak['foto']) ?>" alt="Foto Peternak" class="w-20 h-20 mt-2">
        <p class="text-sm text-gray-600">File yang ada: <?= $peternak['foto'] ?></p>
    <?php endif; ?>
</div>
<div class="flex justify-center items-center">
            <!-- Cancel Button -->
            <a href="<?= base_url('admin/peternak') ?>" class="px-3 py-1 bg-gray-500 text-white rounded-lg mr-2">Batal</a>
            <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded-lg ml-2">Ubah</button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>