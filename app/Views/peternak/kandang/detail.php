<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

    <div class="p-4">
        <button onclick="window.history.go(-1)">
            <img src="/assets/icons/arrow-back.svg" alt="Back" class="size-6">
        </button>

        <div class="mt-4">
            <?= $this->include('components/peternak/detail-kandang'); ?>
        </div>

        <div class="mt-4">
            <?= view('components/peternak/hewan-ternak'); ?>
        </div>
    </div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="/assets/js/popup.js"></script>
<?= $this->endSection(); ?>