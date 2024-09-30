<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

    <div class="p-4">
        <button onclick="window.history.go(-1)">
            <img src="/assets/icons/arrow-back.svg" alt="Back" class="size-6">
        </button>

        <?= view('components/peternak/detail-ternak'); ?>

        <div class="mt-6">
            <?= view('components/peternak/order-layanan', [
                'title' => 'Ternak Sakit',
                'form_action' => '',
            ]); ?>
        </div>

        <div class="mt-6">
            <?= $this->include('components/card/layanan/ternak-kawin'); ?>
            <?= $this->include('components/card/layanan/periksa-bunting'); ?>
        </div>

        <div class="mt-4">
            <?= $this->include('components/peternak/my-order'); ?>
        </div>

        <div class="mt-6">
            <?= view('components/peternak/order-history'); ?>
        </div>
    </div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="/assets/js/popup.js"></script>
<?= $this->endSection(); ?>