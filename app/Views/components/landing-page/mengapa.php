<div class="p-4">
    <h1 class="text-2xl font-medium text-center">Mengapa Harus HaloTernak?</h1>
    <div class="w-full flex-justify">
        <div class="mt-2 w-44 h-0.5 bg-success"></div>
    </div>

    <div class="mt-5 px-2">
        <div>
            <?= view('components/landing-page/mengapa-card', [
                'image' => 'pembelian.svg',
                'title' => 'Pembelian Persediaan Ternak yang Efisien',
                'description' => 'Beli pakan, obat-obatan, dan vitamin secara online, menghemat waktu dan tenaga petani dengan mudah.'
            ]); ?>
        </div>

        <div class="mt-3">
            <?= view('components/landing-page/mengapa-card', [
                'image' => 'akses-mudah.svg',
                'title' => 'Akses mudah ke layanan dokter hewan',
                'description' => 'Peternak dapat dengan cepat memanggil dokter hewan untuk perawatan ternak tanpa mencari atau menunggu lama.'
            ]); ?>
        </div>

        <div class="mt-3">
            <?= view('components/landing-page/mengapa-card', [
                'image' => 'sumber-daya.svg',
                'title' => 'Sumber Daya Pendidikan untuk Petani Pemula',
                'description' => 'Situs web ini menawarkan panduan dan informasi untuk membantu pemula merawat ternak.'
            ]); ?>
        </div>

        <div class="mt-3">
            <?= view('components/landing-page/mengapa-card', [
                'image' => 'alat.svg',
                'title' => 'Alat Pelaporan dan Pemantauan Kesehatan',
                'description' => 'Lacak kesehatan ternak secara teratur dengan fitur untuk tindakan pencegahan tepat waktu.'
            ]); ?>
        </div>

        <div class="mt-3">
            <?= view('components/landing-page/mengapa-card', [
                'image' => 'akses-produk.svg',
                'title' => 'Akses ke Produk dan Layanan Berkualitas',
                'description' => 'Situs web ini memastikan petani mendapatkan produk berkualitas tinggi melalui mitra tepercaya.'
            ]); ?>
        </div>
    </div>
 </div>