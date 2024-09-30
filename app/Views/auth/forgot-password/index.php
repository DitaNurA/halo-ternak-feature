<?= $this->extend('layouts/auth'); ?>
<?= $this->section('content'); ?>

    <form action="" method="post" class="mt-6">
        <div class="flex-items relative">
            <label for="no_wa" class="absolute left-3">
                <img src="/assets/icons/phone.svg" alt="No. WhatsApp" class="size-5">
            </label>
            <input type="text" name="no_wa" id="no_wa" inputmode="numeric" placeholder="Masukkan No. WhatsApp" autocomplete="off" class="w-full input-success px-4 pl-10 py-2 rounded-md placeholder-primary">
        </div>

        <div class="mt-6 w-full flex-justify">
            <button class="button px-8 py-2.5 rounded-md">Selanjutnya</button>
        </div>
    </form>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="/assets/js/password.js"></script>
<?= $this->endSection(); ?>