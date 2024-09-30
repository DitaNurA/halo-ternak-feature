<?= $this->extend('layouts/auth'); ?>
<?= $this->section('content'); ?>

    <form action="" method="post" class="mt-6">
        <div class="mt-4 flex-items relative">
            <label for="code" class="absolute left-3">
                <img src="/assets/icons/key.svg" alt="Kode" class="size-5">
            </label>
            <input type="password" name="code" id="code" placeholder="Masukkan Kode" autocomplete="off" class="w-full input-success px-4 pl-10 py-2 rounded-md placeholder-primary">
            <button type="button" class="toggle-password absolute right-3" data-input="#code">
                <img src="/assets/icons/eye.svg" class="size-5">
            </button>
        </div>

        <div class="mt-6 w-full flex-justify">
            <button class="button px-8 py-2.5 rounded-md">Selanjutnya</button>
        </div>
    </form>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="/assets/js/password.js"></script>
<?= $this->endSection(); ?>