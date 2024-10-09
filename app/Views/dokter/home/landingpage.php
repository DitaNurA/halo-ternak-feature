<?= $this->section('landingpage'); ?>
<section class="text-left p-6 bg-cover bg-center bg-no-repeat text-white rounded-b-lg shadow-md"
    style="background-image: url('<?= base_url('assets/images/Ilustrasihome.svg') ?>');">
    <h1 class="text-3xl font-bold text-blue-500">Trusted Licence, Best Treatment!</h1>
    <div class="ml-0 w-24 h-1 mt-2 bg-green-500"></div>
    <p class="mt-4 text-blue-400 text-sm">
        Selamat datang di HaloTernak, platform terintegrasi yang menyederhanakan perawatan ternak dan penghubung
        antara peternak, dokter hewan, dan masyarakat umum.
    </p>
    <a href="<?= base_url('dokter') ?>" class="mt-6 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg" id="start-button">Mulai</a>
    <?= $this->include('components/overlay/overlay'); ?>
<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/start-button.js'); ?>"></script>
</section>

<?= $this->endSection(); ?>