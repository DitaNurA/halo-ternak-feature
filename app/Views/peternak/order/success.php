<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="w-full h-screen flex-center" style="background: url('/assets/icons/success-background.svg') no-repeat;">
    <div class="w-3/4">
        <div class="w-full flex-justify">
            <img src="/assets/icons/checklist.svg" class="size-32">
        </div>

        <div class="mt-8">
            <h1 class="text-2xl font-medium text-center">Layanan Selesai</h1>
            <p class="mt-2 text-center">Terima kasih telah menggunakan layanan kami hari ini. Kami sangat menghargai Anda!</p>
        </div>

        <div class="mt-16 w-full flex-justify">
            <button class="button-outline-primary px-4 text-base py-2 rounded-md">Kembali ke Hewan Ternak</button>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>