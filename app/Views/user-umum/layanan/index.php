<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="p-4">
    <div class="w-full flex-between-center px-4">
        <button onclick="window.history.go(-1)">
            <img src="/assets/icons/arrow-back.svg" alt="Back" class="size-6">
        </button>

        <div class="px-4">
            <h1 class="text-2xl text-center font-medium">Layanan</h1>

            <div class="mt-1.5 w-full flex-justify">
                <div class="w-12 h-0.5 bg-success"></div>
            </div>
        </div>

        <div></div>
    </div>

    <div class="mt-3 px-9">
        <p class="text-base text-center">Layanan treatment untuk ternak meliputi pemeriksaan dan konsultasi dengan dokter hewan.</p>
    </div>

    <div class="mt-8">
        <?= $this->include('components/card/layanan'); ?>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
    <script src="/assets/js/popup.js"></script>
<?= $this->endSection(); ?>