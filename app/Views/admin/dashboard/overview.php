<!-- app/Views/admin/dashboard/overview.php -->

<?= $this->section('overview'); ?>
<!-- Overview Section (Vertical Stack) -->
<h2 class="text-2xl font-semibold text-blue-500 mt-6">Overview</h2>
<style>
    .bg-overview {
        --tw-bg-opacity: 1;
        background-color: rgb(139 69 19 / var(--tw-bg-opacity));
    }
</style>
<div class="mt-4 space-y-2 ">
    <!-- Verifikasi Petugas -->
    <div class="flex items-center p-2 bg-green-600 text-white rounded-lg">
        <div class="text-4xl font-bold mr-16 ml-4">10</div>
        <div>
            <p class="text-lg text-center">Verifikasi Petugas</p>
            <p class="text-sm text-center">Petugas Belum Diverifikasi</p>
        </div>
    </div>
    <!-- Verifikasi Ternak Dijual -->
    <div class="flex items-center p-2 bg-overview text-white rounded-lg">
        <div class="text-4xl font-bold mr-14 ml-4">10</div>
        <div>
            <p class="text-lg text-center">Verifikasi Ternak Dijual</p>
            <p class="text-sm text-center">Postingan Ternak Belum Disetujui</p>
        </div>
    </div>
    <!-- Kotak Saran -->
    <div class="flex items-center p-2 bg-blue-500 text-white rounded-lg">
        <div class="text-4xl font-bold mr-16 ml-4">10</div>
        <div>
            <p class="text-lg text-center ml-4">Kotak Saran</p>
            <p class="text-sm text-center ml-4">Total Kotak Saran Masuk</p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>