<!-- app/Views/admin/posternak/show_detailternak.php -->
<?= $this->section('show_detailternak'); ?>
<div class="w-full max-w-md mx-auto bg-blue-50 p-6 rounded-xl shadow-lg text-blue-500 border border-green-500 mt-8">
    <form action="<?= base_url('posternak/save') ?>" method="post">
        <?= csrf_field() ?>
        <div class="mb-4">
            <label class="block mb-2">Gambar Ternak</label>
            <img src="<?= base_url('images/nama_ternak.jpg') ?>" alt="Gambar Ternak"
                class="w-full rounded-lg border border-green-500">
        </div>
        <div class="mb-4">
            <label for="nama_Ternak" class="block mb-2">Nama Ternak</label>
            <input type="text" name="nama_ternak" id="nama_ternak"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                value="Ini Nama Ternak" required>
        </div>
        <div class="mb-4">
            <label for="harga" class="block mb-2">Harga</label>
            <input type="text" name="harga" id="harga"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                value="3000000" required>
        </div>
        <div class="mb-4">
            <label for="alamat" class="block mb-2">Alamat</label>
            <input type="text" name="alamat" id="alamat"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                value="Kec.Plumpang" required>
        </div>
        <div class="mb-4">
            <label for="des_pos" class="block mb-2">Deskripsi</label>
            <input type="text" name="des_pos" id="des_pos"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                value="ini deskripsi postingan ternak" required>
        </div>
        <div class="mb-4">
            <label for="nama_penjual" class="block mb-2">Nama Penjual</label>
            <input type="text" name="nama_penjual" id="nama_penjual"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                value="Hariyanto" required>
        </div>
        <div class="mb-4">
            <label for="status" class="block">Status</label>
            <select name="status" id="status"
                class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500">
                <option value="approve">Disetujui</option>
                <option value="pending">Pending</option>
                <option value="reject">Reject</option>
            </select>
            <div class="flex justify-center items-center">
                <button type="reset" class="px-3 py-1 bg-gray-500 text-white rounded-lg mr-2">Hapus</button>
                <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded-lg ml-2">Ubah</button>
            </div>
    </form>
</div>
<?= $this->endSection(); ?>