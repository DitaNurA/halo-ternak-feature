<?= $this->section('c_show'); ?>
<!-- File: show.php -->

<section class="p-6 h-screen">
    <p class="text-blue-400 text-center">
        Layanan treatment untuk ternak meliputi pemeriksaan dan konsultasi dengan dokter hewan.
    </p>
    <div class="grid gap-4 mt-4">
        <!-- Feature 1 -->
        <div class="bg-white p-4 shadow-md rounded-lg flex border border-green-500">
            <img src="<?= base_url('assets/images/layanan/ternak-sakit.svg') ?>" alt="Feature 1" class="h-13 mr-4">
            <div>
                <h3 class="font-semibold text-blue-500 text-sm">Ternak Sakit</h3>
                <p class="text-blue-400 text-xs">Layanan ini mencakup diagnosa pengobatan dan pemulihan untuk ternak
                    yang mengalami masalah kesehatan.</p>
                <button class="mt-2 px-2 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600 openModal">Pesan
                    Sekarang</button>
            </div>
        </div>

        <!-- Feature 2 -->
        <div class="bg-white p-4 shadow-md rounded-lg flex border border-green-500">
            <img src="<?= base_url('assets/images/layanan/ternak-kawin.svg') ?>" alt="Feature 2" class="h-13 mr-4 ">
            <div>
                <h3 class="font-bold text-blue-500 text-sm">Ternak Kawin</h3>
                <p class="text-blue-400 text-xs">Layanan ini membantu dalam proses reproduksi ternak, termasuk di
                    dalamnya inseminasi buatan atau bantuan kawin secara alami.</p>
                <button class="mt-2 px-2 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600 openModal">Pesan
                    Sekarang</button>
            </div>
        </div>

        <!-- Feature 3 -->
        <div class="bg-white p-4 shadow-md rounded-lg flex border border-green-500">
            <img src="<?= base_url('assets/images/layanan/periksa-bunting.svg') ?>" alt="Feature 3" class="h-13 mr-4">
            <div>
                <h3 class="font-bold text-blue-500 text-sm">Periksa Bunting</h3>
                <p class="text-blue-400 text-xs">Layanan ini fokus pada perawatan sapi yang sedang dalam masa
                    kebuntingan. Terdiri dari pemeriksaan rutin, pemantauan kesehatan, dan persiapan menjelang
                    kelahiran.</p>
                <button class="mt-2 px-2 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600 openModal">Pesan
                    Sekarang</button>
            </div>
        </div>
    <?= $this-> include ('dokter/layanan/c_popup'); ?>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    // Ambil elemen modal dan tombol tutup
    const modal = document.getElementById('popupModal');
    const closeModal = document.getElementById('closeModal');
    const openModalButtons = document.querySelectorAll('.openModal');

    // Tambahkan event listener ke setiap tombol 'Pesan Sekarang'
    openModalButtons.forEach(button => {
        button.addEventListener('click', function () {
            modal.classList.remove('hidden');
        });
    });

    // Event listener untuk menutup modal
    closeModal.addEventListener('click', function () {
        modal.classList.add('hidden');
    });

    // Menutup modal jika klik di luar modal
    window.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
});
</script>
</section>

<?= $this->endSection(); ?>