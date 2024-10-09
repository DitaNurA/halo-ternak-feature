<!--views/dokter/jual_ternak/c_list.php-->
<?= $this->section('c_list'); ?>
<section class="p-2 h-screen">
    <p class="text-blue-400 text-center">
        Memberikan informasi lengkap mengenai ternak yang ditawarkan.
    </p>
    <!-- Search Bar -->
    <div class="flex justify-start items-center space-x-4 py-1">
        <input type="text" class="w-full px-4 py-1 border rounded-lg border-green-500 text-blue-500 bg-blue-50 mt-2"
            placeholder="Temukan Produk Lebih Spesifik">
        <button
            class="ml-2 mt-2 px-4 py-1 bg-blue-50 text-green-500 rounded-lg border border-green-500 hover:bg-blue-100 relative"
            id="filter">
            <i class="fas fa-filter"></i>
        </button>
    </div>
    <?= $this->include('dokter/jual_ternak/c_filter'); ?>

    <?php
$ternak = [
    ['id' => 1, 'nama' => 'Domba 01', 'harga' => 'Rp. 2.200.000,00', 'lokasi' => 'Latsari', 'gambar' => 'assets/images/kambing.jpg'],
    ['id' => 2, 'nama' => 'Domba 02', 'harga' => 'Rp. 2.300.000,00', 'lokasi' => 'Latsari', 'gambar' => 'assets/images/kambing.jpg'],
    ['id' => 3, 'nama' => 'Domba 03', 'harga' => 'Rp. 2.000.000,00', 'lokasi' => 'Latsari', 'gambar' => 'assets/images/kambing.jpg'],
    ['id' => 4, 'nama' => 'Domba 04', 'harga' => 'Rp. 2.100.000,00', 'lokasi' => 'Latsari', 'gambar' => 'assets/images/kambing.jpg'],
    
    // Tambahkan data ternak lainnya
];
?>

    <!-- Grid View of Animals -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mt-2">
        <?php foreach ($ternak as $item): ?>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="<?= base_url($item['gambar']) ?>" alt="<?= $item['nama'] ?>" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-blue-500 font-bold"><?= $item['nama'] ?></h3>
                <p class="text-blue-400"><?= $item['harga'] ?></p>
                <p class="text-blue-400"><i class="fas fa-map-marker-alt"></i> <?= $item['lokasi'] ?></p>
                <button class="lihat-btn mt-2 px-4 py-2 bg-blue-500 text-white text-xs rounded hover:bg-blue-600"
                    data-id="<?= $item['id'] ?>" data-nama="<?= $item['nama'] ?>" data-harga="<?= $item['harga'] ?>"
                    data-lokasi="<?= $item['lokasi'] ?>" data-riwayat="Ternak Sakit"
                    data-gambar="<?= base_url($item['gambar']) ?>">
                    Lihat
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?= $this->include('dokter/jual_ternak/c_popup');?>
    <script>
    // Pastikan seluruh halaman telah dimuat sebelum mengakses elemen
    document.addEventListener('DOMContentLoaded', () => {
        // Get the popup modal and close button
        const popupModal = document.getElementById('popupModal');
        const closeModal = document.getElementById('closeModal');

        // Get all "Lihat" buttons
        const lihatButtons = document.querySelectorAll('.lihat-btn');

        // Event listener for all buttons
        lihatButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const nama = event.target.getAttribute('data-nama');
                const harga = event.target.getAttribute('data-harga');
                const lokasi = event.target.getAttribute('data-lokasi');
                const gambar = event.target.getAttribute('data-gambar');

                // Update the modal content
                const namaEl = document.getElementById('ternak-nama');
                const hargaEl = document.getElementById('ternak-harga');
                const lokasiEl = document.getElementById('ternak-lokasi');
                const gambarEl = document.getElementById('ternak-gambar');

                // Check if elements exist before modifying
                if (namaEl) namaEl.innerText = nama;
                if (hargaEl) hargaEl.innerText = harga;
                if (lokasiEl) lokasiEl.innerText = lokasi;
                if (gambarEl) gambarEl.setAttribute('src', gambar);

                // Show the modal
                if (popupModal) popupModal.classList.remove('hidden');
                // Ambil atribut data dari tombol yang diklik
                const riwayat = event.target.getAttribute('data-riwayat');

                // Ambil elemen dropdown riwayat ternak
                const riwayatDropdown = document.getElementById('riwayat-ternak');

                // Pastikan elemen dropdown ditemukan sebelum mengaksesnya
                if (riwayatDropdown) {
                    riwayatDropdown.value = (riwayat === "Ternak Sakit") ? "sakit" :
                        "tidak sakit";
                }
            });
        });
        // Close modal event
        if (closeModal) {
            closeModal.addEventListener('click', () => {
                popupModal.classList.add('hidden');
            });
        }
    });
    </script>
</section>

<?= $this->endSection(); ?>