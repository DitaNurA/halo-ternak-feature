<!-- app/Views/admin/obat/show_detailedukasi.php -->
<?= $this->section('showdetail'); ?>
    <div class="w-full max-w-md mx-auto bg-blue-50 p-6 rounded-xl shadow-lg text-blue-500 border border-green-500 mt-8">
        <form action="<?= base_url('admin/edukasi/update/'. $edukasi['id_edukasi']) ?>" method="POST">
            <?= csrf_field() ?>
            <div class="mb-4">
                <label for="judul_yt" class="block mb-2">Judul Youtube</label>
                <input type="text" name="judul_yt" id="judul_yt" value="<?= $edukasi['judul_yt'] ?>"
                    class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                    value="Judul Youtube" required>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block mb-2">Deskripsi</label>
                <textarea rows="5" type="text" name="deskripsi" id="deskripsi"
                    class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                     required><?= $edukasi['deskripsi'] ?></textarea>
            </div>
            <div class="mb-4">
                <label for="link_yt" class="block mb-2">Link Youtube</label>
                <input type="text" name="link_yt" id="link_yt" value="<?= $edukasi['link_yt'] ?>"
                    class="w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                    value="3" required>
            </div>
            <div class="flex justify-center items-center">
            <a href="<?= base_url('admin/edukasi') ?>" class="px-3 py-1 bg-gray-500 text-white rounded-lg mr-2">Batal</a>
                <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded-lg ml-2">Ubah</button>
            </div>
        </form>
    </div>
    <?= $this->endSection(); ?>