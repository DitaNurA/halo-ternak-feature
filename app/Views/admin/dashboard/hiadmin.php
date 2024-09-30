<!-- app/Views/admin/dashboard/hiadmin.php -->

<?= $this->section('hiadmin'); ?>
<!-- Box Hi, Admin -->
<div class="bg-blue-50 shadow rounded-lg p-4 flex items-center justify-between border border-green-600 mt-8">
    <div>
        <h2 class="text-lg font-semibold text-blue-600">Hi, Admin</h2>
        <p class="text-blue-500">Silakan pilih opsi di sidebar untuk mengakses fitur yang tersedia</p>
    </div>
    <!-- Ilustrasi Gambar -->
    <div>
        <img src="<?= base_url('/assets/images/DashboardAdmin/IlustrasiHiAdmin.svg') ?>" alt="Admin Illustration"
            class="h-25">
    </div>
</div>
<?= $this->endSection(); ?>