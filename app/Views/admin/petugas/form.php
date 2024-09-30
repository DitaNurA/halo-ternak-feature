<!-- app/Views/admin/petugas/form_create.php -->
<?= $this->section('form'); ?>
<div class="w-full max-w-md mx-auto bg-blue-50 p-6 rounded-xl shadow-lg text-blue-500 border border-green-500 mt-8">
    <form action="<?= base_url('admin/petugas/create') ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <div class="mb-4">
            <label for="id_user" class="block mb-2">ID User</label>
            <input type="text" name="id_user" id="id_user" autocomplete="off"
                class="form-control w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                required>
                <span class="text-red-500 text-sm" id="error_id_user" style="display: none;">Harus diisi</span>
        </div>
        <div class="mb-4">
            <label for="nama" class="block mb-2">Nama Petugas</label>
            <input type="text" name="nama" id="nama" autocomplete="off"
                class="form-control w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                required>
                <span class="text-red-500 text-sm" id="error_nama" style="display: none;">Harus diisi</span>
        </div>
        <div class="mb-4">
            <label for="no_registrasi" class="block mb-2">No. Registrasi</label>
            <input type="text" name="no_registrasi" id="no_registrasi" autocomplete="off"
                class="form-control w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                required>
                <span class="text-red-500 text-sm" id="error_no_registrasi" style="display: none;">Harus diisi</span>
        </div>
        <div class="mb-4">
            <label for="kecamatan" class="block mb-2">Kecamatan</label>
            <input type="text" name="kecamatan" id="kecamatan" autocomplete="off"
                class="form-control w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                required>
                <span class="text-red-500 text-sm" id="error_kecamatan" style="display: none;">Harus diisi</span>
        </div>
        <div class="mb-4">
            <label for="desa_binaan" class="block mb-2">Desa Binaan</label>
            <input type="text" name="desa_binaan" id="desa_binaan" autocomplete="off"
                class="form-control w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                required>
                <span class="text-red-500 text-sm" id="error_desa_binaan" style="display: none;">Harus diisi</span>
        </div>
        <div class="mb-4">
            <label for="no_wa" class="block mb-2">Nomor Whatsapp</label>
            <input type="numeric" name="no_wa" id="no_wa" autocomplete="off"
                class="form=control w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                required>
                <span class="text-red-500 text-sm" id="error_no_wa" style="display: none;">Harus diisi</span>
        </div>
        <div class="mb-4">
            <label for="password" class="block mb-2">Kata Sandi</label>
            <input type="password" name="password" id="password" autocomplete="off"
                class="form-control w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500"
                required>
                <span class="text-red-500 text-sm" id="error_no_registrasi" style="display: none;">Harus diisi</span>
        </div>
        <div class="mb-4">
            <label for="status" class="block">Status</label>
            <select name="status" id="status"
                class="form-control w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500">
                <option value="approve">Approve</option>
                <option value="pending">Pending</option>
                <option value="reject">Reject</option>
            </select>
        </div>
        <div class="mb-4">
            <!-- Foto Petugas -->
            <label for="foto">Foto Petugas</label>
            <input type="file" name="foto" id="foto" class="form-control w-full px-3 py-1 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500">
        </div>
        <div class="flex justify-center items-center">
            <!-- Submit Button -->
            <button type="reset" class="px-3 py-1 bg-gray-500 text-white rounded-lg mr-2">Batal</button>
            <button type="submit" class="px-3 py-1 bg-blue-600 text-white rounded-lg ml-2">Simpan</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('form').on('submit', function(event) {
        let valid = true;
        $('.text-red-500').hide(); // Reset pesan kesalahan

        const idUser = $('#id_user');
        if (!idUser.val()) {
            $('#error_id_user').show();
            valid = false;
        }
        const namaPetugas = $('#nama');
        if (!namaPetugas.val()) {
            $('#error_nama').show();
            valid = false;
        }

        const noRegistrasi = $('#no_registrasi');
        if (!noRegistrasi.val()) {
            $('#error_no_registrasi').show();
            valid = false;
        }

        const kecamatan = $('#kecamatan');
        if (!kecamatan.val()) {
            $('#error_kecamatan').show();
            valid = false;
        }
        const desaBinaan = $('#desa_binaan');
        if (!desaBinaan.val()) {
            $('#error_desa_binaan').show();
            valid = false;
        }
        const noWA = $('#no_wa');
        if (!noWA.val()) {
            $('#error_no_wa').show();
            valid = false;
        }


        if (!valid) {
            event.preventDefault(); // Mencegah pengiriman form
        }
    });
});
</script>
<?= $this->endSection(); ?>