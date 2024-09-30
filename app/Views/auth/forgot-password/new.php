<?= $this->extend('layouts/auth'); ?>
<?= $this->section('content'); ?>

    <form action="" method="post" class="mt-6">
        <div class="flex-items relative">
            <label for="password" class="absolute left-3">
                <img src="/assets/icons/key.svg" alt="Password" class="size-5">
            </label>
            <input type="password" name="new_password" id="password" placeholder="Buat Kata Sandi Baru" autocomplete="off" class="w-full input-success px-4 pl-10 py-2 rounded-md placeholder-primary">
            <button type="button" class="toggle-password absolute right-3" data-input="#password">
                <img src="/assets/icons/eye.svg" class="size-5">
            </button>
        </div>

        <div class="mt-4 flex-items relative">
            <label for="confirmPassword" class="absolute left-3">
                <img src="/assets/icons/key.svg" alt="Konfirmasi Password" class="size-5">
            </label>
            <input type="password" name="confirm_new_password" id="confirmPassword" placeholder="Konfirmasi Kata Sandi" autocomplete="off" class="w-full input-success px-4 pl-10 py-2 rounded-md placeholder-primary">
            <button type="button" class="toggle-password absolute right-3" data-input="#confirmPassword">
                <img src="/assets/icons/eye.svg" class="size-5">
            </button>
        </div>

        <div class="mt-6 w-full flex-justify">
            <button class="button px-8 py-2.5 rounded-md">Ubah</button>
        </div>
    </form>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="/assets/js/password.js"></script>
<?= $this->endSection(); ?>