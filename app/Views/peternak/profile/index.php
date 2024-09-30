<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

    <div class="p-4">
        <?= $this->include('components/peternak/profile-card.php'); ?>

        <div class="mt-4">
            <?= view('components/peternak/kandang-ternak'); ?>
        </div>
    </div>

<?= $this->endSection(); ?>