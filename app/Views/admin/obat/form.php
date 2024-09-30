<!-- app/Views/admin/obat/form_createobat.php -->
<?= $this->section('form'); ?>
<div class="w-full max-w-md mx-auto bg-blue-50 p-6 rounded-xl shadow-lg text-blue-500 border border-green-500 mt-8">
    <form action="<?= base_url('admin/obat/create') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-4">
            <!-- Gambar Obat -->
            <label for="foto">Gambar Obat</label>
            <input type="file" name="foto" id="foto" class="form-control w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="nama_obat" class="block mb-2">Nama Obat</label>
            <input type="text" name="nama_obat" id="nama_obat"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                required>
        </div>
        <div class="mb-4">
            <label for="deskripsi" class="block mb-2">Deskripsi Obat</label>
            <textarea type="text" name="deskripsi" id="deskripsi" rows="4"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                required></textarea>
        </div>

        <div class="flex justify-center items-center">
            <button type="reset" class="px-3 py-1 bg-gray-500 text-white rounded-lg mr-2">Batal</button>
            <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded-lg ml-2">Simpan</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>