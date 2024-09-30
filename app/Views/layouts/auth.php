<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

    <div class="w-full pt-36 px-12 flex-center">
        <div class="w-full p-8 border-[1px] border-success rounded-2xl relative">
            <div class="w-full flex-justify">
                <div class="absolute bg-light -translate-y-[80%]">
                    <img src="/assets/images/auth/ilustrasi.svg" alt="Masuk" class="w-64">
                </div>
            </div>
            
            <div class="mt-16">
                <h1 class="text-lg text-center">
                    <?php if ( isset($form_title) ) { ?>
                        <?= $form_title; ?>
                    <?php } else { ?>
                        Selamat Datang di <span class="font-semibold">HaloTernak</span>
                    <?php } ?>
                </h1>

                <div class="mt-1.5 w-full flex-justify">
                    <div class="w-12 h-0.5 bg-success"></div>
                </div>
            </div>
        
            <?= $this->renderSection('content'); ?>

        </div>
    </div>

<?= $this->endSection(); ?>