<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="absolute p-8 z-[1]">
    <button onclick="window.history.go(-1)">
        <img src="/assets/icons/arrow-back.svg" alt="Back" class="size-6">
    </button>
</div>

<div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d63376.21083709539!2d112.0595603!3d-6.8890244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1725259754493!5m2!1sid!2sid" class="w-full" height="1000" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<?= $this->endSection(); ?>