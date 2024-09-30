<!-- Kotak Saran -->
 <?= $this->include('components/footer/kotak-saran'); ?>
<!-- End Kotak Saran -->

<div class="mt-8 w-full relative z-0 text-light">
    <!-- Ilustration -->
     <div class="w-full absolute bottom-0 top-0 left-0 z-0">
        <img src="/assets/images/footer/ilustration.svg" alt="Ilustration" class="w-full -translate-y-[20%]">
     </div>
    <!-- End Ilustration -->

    <div class="relative bottom-0 px-6 py-2 bg-[#5BA534]">
        <!-- Footer Logo -->
        <div>
            <img src="/assets/images/footer/logo-footer.svg" alt="<?= config('App')->app_name; ?>" class="w-[204px]">
        </div>
        <!-- End Footer Logo -->

        <p class="mt-4 text-base font-extralight max-w-[83%]">Halo Ternak adalah platform yang menjembatani para medic dan peternak. Di sini, Anda dapat berkonsultasi mengenai kesehatan ternak dan menjual hewan ternak.</p>

        <!-- Informasi Kontak -->
        <?= $this->include('components/footer/informasi-kontak'); ?>
        <!-- End Informasi Kontak -->

        <!-- Fitur -->
         <div class="mt-6">
            <h1 class="text-xl font-semibold">Fitur</h1>

            <ul class="mt-8">
                <li><a href="" class="link-underline font-extralight">Edukasi</a></li>
                <li class="mt-4"><a href="" class="link-underline font-extralight">Peta Kandang Ternak</a></li>
                <li class="mt-4"><a href="" class="link-underline font-extralight">Marketplace</a></li>
            </ul>
         </div>
        <!-- End Fitur -->

        <!-- Link -->
         <div class="mt-6">
            <h1 class="text-2xl font-semibold">Link</h1>

            <ul class="mt-8">
                <li><a href="" class="link-underline font-extralight">Kebijakan Privasi</a></li>
                <li class="mt-4"><a href="" class="link-underline font-extralight">Syarat & Ketentuan</a></li>
            </ul>
         </div>
        <!-- End Link -->

         <!-- Social Media -->
          <div class="mt-6 flex-items gap-5">
            <a href="">
                <img src="/assets/images/footer/facebook.svg" alt="Facebook" class="size-8">
            </a>

            <a href="">
                <img src="/assets/images/footer/instagram.svg" alt="Instagram" class="size-8">
            </a>

            <a href="">
                <img src="/assets/images/footer/youtube.svg" alt="Youtube" class="size-8">
            </a>
          </div>
         <!-- End Social Media -->

        <div class="mt-6">
            <h1 class="text-center opacity-50 font-extralight">Copyright 2024 &copy; <?= config('App')->app_name; ?></h1>
        </div>
    </div>
</div>