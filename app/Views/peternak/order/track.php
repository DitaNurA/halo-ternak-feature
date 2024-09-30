<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="fixed w-full top-0 left-0 flex-justify z-10">
    <div class="mobile-responsive bg-light p-8 rounded-bl-2xl rounded-br-2xl shadow-xl flex-items gap-4">
        <div>
            <img src="/assets/icons/track.svg" class="w-8 h-20">
        </div>
        <div class="w-full">
            <div class="button-outline-primary w-full px-6 py-1 rounded-md">
                <h1 class="font-medium">Jl. Walisongo</h1>
            </div>
            <div class="mt-5 button-outline-primary w-full px-6 py-1 rounded-md">
                <h1 class="font-medium">Jl. Sunan Giri</h1>
            </div>
        </div>
    </div>
</div>

<div class="relative">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d63376.21083709539!2d112.0595603!3d-6.8890244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1725259754493!5m2!1sid!2sid" class="w-full" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    <div class="w-full absolute py-4 left-0 bottom-0 flex-center gap-4">
        <div class="px-4 py-2 bg-light rounded-full shadow-2xl">
            <div class="w-full flex-justify">
                <img src="/assets/icons/motor.svg" class="size-8">
            </div>
            <h1 class="text-xs font-normal">3 mnt</h1>
        </div>

        <div class="px-4 py-2 bg-light rounded-full shadow-2xl">
            <div class="w-full flex-justify">
                <img src="/assets/icons/car.svg" class="size-8">
            </div>
            <h1 class="text-xs font-normal">6 mnt</h1>
        </div>

        <div class="px-4 py-2 bg-light rounded-full shadow-2xl">
            <div class="w-full flex-justify">
                <img src="/assets/icons/bicycle.svg" class="size-8">
            </div>
            <h1 class="text-xs font-normal">8 mnt</h1>
        </div>

        <div class="px-4 py-2 bg-light rounded-full shadow-2xl">
            <div class="w-full flex-justify">
                <img src="/assets/icons/people.svg" class="size-8">
            </div>
            <h1 class="text-xs font-normal">12 mnt</h1>
        </div>
    </div>
</div>

<?= $this->include('components/card/peternak/maps-footer'); ?>

<?= $this->endSection(); ?>