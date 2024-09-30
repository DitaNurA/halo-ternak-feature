<!-- app/Views/admin/kotak_saran/listsaran.php -->
<?= $this->section('listsaran'); ?>
<!-- List Saran -->
<div class="mt-4">
    <div class="grid grid-cols-1 gap-4">
        <?php foreach ($saran as $i => $s): ?>
        <div class="bg-white shadow p-4 rounded-lg">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700"><?= $s['nama'] ?></h2>
                    <span class="text-gray-500 text-sm">No. Telp: <?= $s['no_wa'] ?></span>
                </div>
                <button id="toggleButton-<?= $i ?>" class="bg-blue-500 text-white text-sm px-2 py-1 rounded" onclick="toggleDetail(<?= $i ?>)">
                    Lihat Saran
                </button>
            </div>

            <div id="detail-<?= $i ?>" class="mt-4 hidden">
                <p class="text-gray-700 text-sm bg-blue-50 p-2 rounded">
                    <?= $s['saran'] ?>
                </p>

                <div class="mt-2">
                    <!-- Tambahkan data-no-wa untuk menyimpan nomor telepon dari database -->
                    <button class="bg-green-500 text-white text-sm px-4 py-2 rounded" onclick="sendWhatsApp('<?= $s['no_wa'] ?>')">
                        Kirim Pesan
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    // Fungsi untuk menampilkan atau menyembunyikan detail saran
    function toggleDetail(index) {
        const detailElement = document.getElementById(`detail-${index}`);
        const toggleButton = document.getElementById(`toggleButton-${index}`);

        // Jika detail saat ini tersembunyi, maka tampilkan
        if (detailElement.classList.contains('hidden')) {
            detailElement.classList.remove('hidden');
            toggleButton.textContent = 'X';
            toggleButton.classList.remove('bg-blue-500');
            toggleButton.classList.add('bg-blue-500');
        } else {
            detailElement.classList.add('hidden');
            toggleButton.textContent = 'Lihat Saran';
            toggleButton.classList.remove('bg-blue-500');
            toggleButton.classList.add('bg-blue-500');
        }
    }

    // Fungsi untuk membuka WhatsApp dengan nomor yang diambil dari kolom no_wa
function sendWhatsApp(phone) {
    // Buat URL WhatsApp dengan nomor yang dipassing dari PHP
    const url = `https://wa.me/${phone}`;
    window.open(url, '_blank'); // Buka link di tab baru
}
</script>
<?= $this->endSection(); ?>
