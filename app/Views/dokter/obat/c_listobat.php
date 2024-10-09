<!--views/dokter/obat/c_list.php-->
<?= $this->section('c_listobat'); ?>
<section class="p-2 h-screen">
    <p class="text-center text-blue-400">
        Memberikan informasi obat dan suplemen untuk kesehatan dan perawatan ternak.
    </p>

    <!-- Search Bar -->
    <div class="flex justify-start items-center space-x-4 py-1">
        <input type="text" class="w-full px-4 py-2 border rounded-lg border-green-500 text-blue-500 bg-blue-50 mt-2"
            placeholder="Temukan Produk Lebih Spesifik">
        <button
            class="ml-2 mt-2 px-4 py-2 bg-blue-50 text-green-500 rounded-lg border border-green-500 hover:bg-blue-100">
            <i class="fas fa-search"></i>
        </button>
    </div>

    <!-- List of Medications -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mt-4">
        <?php 
        $medications = [
            ['id' => 1, 'nama' => 'Obat Sapi', 'deskripsi' => 'Untuk menyembuhkan penyakit ...', 'gambar' => 'assets/images/obatternak.jpg'],
            ['id' => 2, 'nama' => 'Obat Sapi', 'deskripsi' => 'Untuk menyembuhkan penyakit ...', 'gambar' => 'assets/images/obatternak.jpg'],
            ['id' => 3, 'nama' => 'Obat Sapi', 'deskripsi' => 'Untuk menyembuhkan penyakit ...', 'gambar' => 'assets/images/obatternak.jpg'],
            ['id' => 4, 'nama' => 'Obat Sapi', 'deskripsi' => 'Untuk menyembuhkan penyakit ...', 'gambar' => 'assets/images/obatternak.jpg'],
        ];
        ?>

        <?php foreach ($medications as $med): ?>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="<?= base_url($med['gambar']) ?>" alt="<?= $med['nama'] ?>" class="w-full h-48 object-cover">
            <div class="p-4">
                <h3 class="text-blue-500 font-bold"><?= $med['nama'] ?></h3>
                <p class="text-blue-400"><?= $med['deskripsi'] ?></p>
                <button class="mt-2 px-4 py-2 bg-blue-500 text-white text-xs rounded hover:bg-blue-600"
                    data-id="<?= $med['id'] ?>" data-nama="<?= $med['nama'] ?>" data-deskripsi="<?= $med['deskripsi'] ?>" data-gambar="<?= $med['gambar'] ?>">
                    Lihat
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Termasuk c_popup.php -->
    <?= $this->include('dokter/obat/c_popup') ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('popupModal');
            const closeModal = document.getElementById('closeModal');

            // Fungsi untuk membuka modal dan mengisi dengan data produk yang sesuai
            function openModal(id, imageSrc, productName, description) {
                document.getElementById('obat-gambar').src = imageSrc;
                document.getElementById('obat-nama').textContent = productName;
                document.getElementById('obat-deskripsi').textContent = description;
                modal.classList.remove('hidden');
            }

            // Tutup modal ketika tombol "x" di klik
            if (closeModal) {
                closeModal.addEventListener('click', () => {
                    modal.classList.add('hidden');
                });
            }

            // Tambahkan event listener untuk semua tombol "Lihat"
            document.querySelectorAll('button[data-id]').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');
                    const productName = this.getAttribute('data-nama');
                    const productDescription = this.getAttribute('data-deskripsi');
                    const productImage = this.getAttribute('data-gambar');

                    openModal(productId, productImage, productName, productDescription);
                });
            });
        });
    </script>
</section>
<?= $this->endSection(); ?>
