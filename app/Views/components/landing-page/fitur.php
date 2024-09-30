<div class="p-4" id="fitur">
    <h1 class="text-2xl font-medium text-center">Fitur</h1>
    <div class="w-full flex-justify">
        <div class="mt-2 w-10 h-0.5 bg-success"></div>
    </div>

    <div class="px-6">
        <p class="mt-3 text-base text-center">Platform online yang menawarkan tiga kategori utama yang berfokus pada kebutuhan peternak</p>
    </div>

    <div class="mt-3 px-2">
        <div>
            <?= view('components/landing-page/fitur-card', [
                'title' => 'Jual Ternak',
                'image' => 'jual-ternak.svg',
                'description' => 'Memberikan informasi lengkap mengenai ternak yang dijual.',
                'url' => '/ternak',
                'button' => 'Lihat Hewan ternak'
            ]); ?>
        </div>

        <div class="mt-3">
            <?= view('components/landing-page/fitur-card', [
                'title' => 'Obat',
                'image' => 'obat.svg',
                'description' => 'Memberikan informasi obat dan suplemen untuk kesehatan dan perawatan ternak.',
                'url' => '/obat',
                'button' => 'Informasi Obat'
            ]); ?>
        </div>

        <div class="mt-3">
            <?= view('components/landing-page/fitur-card', [
                'title' => 'Layanan',
                'image' => 'layanan.svg',
                'description' => 'layanan treatment untuk ternak meliputi pemeriksaan dan konsultasi dengan dokter hewan.',
                'url' => '/layanan',
                'button' => 'Pesan Layanan'
            ]); ?>
        </div>
    </div>
</div>