<!-- app/Views/admin/dashboard/stats.php -->


<?= $this->section('stats'); ?>
<div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2">
    <!-- Various Stats -->
    <div class="p-2 bg-white shadow rounded-lg flex items-center text-blue-500">
        <img src="<?= base_url('/assets/images/DashboardAdmin/IconPetugas.svg') ?>" alt="icon petugas"
            class="h-12 w-12 mr-2">
        <div class="flex flex-col justify-center w-full">
            <h3 class="text-xl">1000</h3>
            <h3 class="text-md">Petugas</h3>
        </div>
    </div>
    <div class="p-2 bg-white shadow rounded-lg flex items-center text-blue-500">
        <img src="<?= base_url('/assets/images/DashboardAdmin/iconPeternak.svg') ?>" alt="icon peternak"
            class="h-12 w-12 mr-2">
        <div class="flex flex-col justify-center w-full">
            <h3 class="text-xl">1000</h3>
            <h3 class="text-md">Peternak</h3>
        </div>
    </div>
</div>
<div class="mt-6 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-1">
    <div class="bg-white shadow rounded-lg flex items-center text-blue-500">
        <img src="<?= base_url('/assets/images/DashboardAdmin/iconLayananSelesai.svg') ?>" alt="icon layanan selesai"
            class="h-12 w-12 mr-2">
        <div class="flex flex-col justify-center w-full">
            <h3 class="text-xl">1000</h3>
            <h3 class="text-md">Layanan Selesai</h3>
        </div>
    </div>
    <div class="p-2 bg-white shadow rounded-lg flex items-center text-blue-500">
        <img src="<?= base_url('/assets/images/DashboardAdmin/IconTernakTerjual.svg') ?>" alt="icon ternak terjual"
            class="h-12 w-12 mr-2">
        <div class="flex flex-col justify-center w-full">
            <h3 class="text-xl">1000</h3>
            <h3 class="text-md">Ternak Dijual</h3>
        </div>
    </div>
    <div class="p-2 bg-white shadow rounded-lg flex items-center text-blue-500">
        <img src="<?= base_url('/assets/images/DashboardAdmin/iconHewan.png') ?>" alt="iconhewan" class="h-12 w-12 mr-2">
        <div class="flex flex-col justify-center w-full">
            <h3 class="text-xl">1000</h3>
            <h3 class="text-md">Hewan Ternak</h3>
        </div>
    </div>
</div>

<div class="mt-6 bg-white shadow rounded-lg p-4">
    <h3 class="text-lg font-semibold text-blue-500">Total Pengguna</h3>
    <div class="mt-4">
        <!-- Placeholder for a chart -->
        <div class="bg-gray-200 h-40 rounded-lg flex items-center justify-center">
            <span class="text-gray-600">[Chart Placeholder]</span>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>