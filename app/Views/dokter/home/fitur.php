<?= $this->section('fitur'); ?>
<!-- Features Section -->
<section class="mt-6 p-6">
    <h2 class="text-2xl font-bold text-blue-500 text-center">Fitur</h2>
    <div class="w-24 h-1 mx-auto mt-2 bg-green-500"></div>
    <p class="mt-4 text-blue-400 text-center">
        Platform Online yang menawarkan tiga kategori utama yang berfokus pada kebutuhan peternak.
    </p>
    <div class="grid gap-4 mt-4">
        <!-- Feature 1 -->
        <div class="bg-white p-4 shadow-md rounded-lg flex border border-green-500">
            <img src="<?= base_url('assets/images/fitur/JualTernak.svg') ?>" alt="Feature 1" class="h-13 mr-4">
            <div>
                <h3 class="font-semibold text-blue-500 text-sm">Jual Ternak</h3>
                <p class="text-blue-400 text-xs">Memberikan lnformasi lengkap mengenai ternak yang dijual.</p>
                <button class="mt-2 px-2 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                    <a href="<?= base_url('jual')?>">Lihat Hewan Ternak</a></button>
            </div>
        </div>

        <!-- Feature 2 -->
        <div class="bg-white p-4 shadow-md rounded-lg flex border border-green-500">
            <img src="<?= base_url('assets/images/fitur/obat.svg') ?>" alt="Feature 2" class="h-13 mr-4 ">
            <div class="ml-4">
                <h3 class="font-bold text-blue-500 text-sm">Obat</h3>
                <p class="text-blue-400 text-xs">Memberikan informasi obat dan suplemen untuk kesehatan dan perawatan ternak.</p>
                <button class="mt-2 px-2 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                <a href="<?= base_url('info_obat')?>">Informasi Obat</a></button>
            </div>
        </div>

        <!-- Feature 3 -->
        <div class="bg-white p-4 shadow-md rounded-lg flex border border-green-500">
            <img src="<?= base_url('assets/images/fitur/Layanan.svg') ?>" alt="Feature 3" class="h-13 mr-4">
            <div>
                <h3 class="font-bold text-blue-500 text-sm">Layanan</h3>
                <p class="text-blue-400 text-xs">Layanan treatment untuk ternak meliputi pemeriksaan dan konsultasi dengan dokter hewan.</p>
                <button class="mt-2 px-2 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                    <a href="<?= base_url('layanan')?>">Pesan layanan</a></button>
            </div>
        </div>

        
    </div>
</section>
<?= $this->endSection(); ?>