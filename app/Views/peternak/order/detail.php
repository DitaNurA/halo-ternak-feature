<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

    <div class="p-4">
        <div class="w-full flex-between-center">
            <button onclick="window.history.go(-1)">
                <img src="/assets/icons/arrow-back.svg" alt="Back" class="size-6">
            </button>

            <div>
                <h1 class="text-xl font-medium">Pesanan</h1>
                <div class="w-full flex-justify">
                    <div class="w-[73px] h-0.5 bg-success"></div>
                </div>
            </div>

            <div></div>
        </div>

        <div class="mt-6">
            <?= view('components/card/layanan/ternak-sakit', ['hide_button' => true]); ?>
        </div>

        <!-- Profile -->
        <div class="mt-4">
            <div class="p-6 border-[1px] border-primary rounded-xl relative overflow-hidden">
                <div>
                    <h1 class="text-2xl font-medium">Profil Peternak</h1>
                    <div class="mt-3 w-64 h-[1px] bg-success"></div>
                </div>

                <div class="w-full mt-4 flex-items gap-5">
                    <div class="flex-center">
                        <div>
                            <img src="/assets/images/dummy/sapi.png" alt="" class="w-full size-24 rounded-full">
                        </div>
                    </div>

                    <div class="w-full">
                        <div>
                            <h1 class="font-medium">Peternak</h1>
                            <div class="mt-1 w-full bg-primary text-light rounded-md px-6 py-1">
                                <h1 class="font-normal text-xs">Hariyanto</h1>
                            </div>
                        </div>
                        <div class="mt-2">
                            <h1 class="font-semibold">Nama Hewan Ternak</h1>
                            <div class="mt-1 w-full bg-primary text-light rounded-md px-6 py-1">
                                <h1 class="font-normal text-xs">Upin</h1>
                            </div>
                        </div>
                        <div class="mt-2">
                            <h1 class="font-medium">Alamat Kandang</h1>
                            <div class="mt-1 w-full bg-primary text-light rounded-md px-6 py-1">
                                <h1 class="font-normal text-xs">Jl. Imam Bonjol No. 25 Jatirogo</h1>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Profile -->

        <div class="mt-5 w-full flex-between-center gap-3">
            <div class="button-outline-primary rounded-md px-4 py-1.5 flex-items gap-2">
                <h1 class="text-xs font-normal">02-10-2024</h1>
                <img src="/assets/icons/calendar.svg" class="size-4">
            </div>

            <div class="button-outline-primary rounded-md px-4 py-1.5 flex-items gap-2">
                <h1 class="text-xs font-normal">09:00 WIB</h1>
                <img src="/assets/icons/clock.svg" class="size-4">
            </div>

            <div class="button-outline-primary rounded-md px-4 py-1.5 flex-items gap-2">
                <h1 class="text-xs font-normal">12:00 WIB</h1>
                <img src="/assets/icons/clock.svg" class="size-4">
            </div>
        </div>

        <div class="mt-5 w-full flex-between-center gap-3">
            <div class="bg-primary text-light text-center w-full py-1.5 rounded-md">Sakit</div>
            <div class="button-outline-primary text-center w-full py-1.5 rounded-md">Tidak Sakit</div>
        </div>

        <div class="mt-5 rounded-md border-[1px] border-primary overflow-hidden">
            <img src="/assets/images/dummy/sapi-landscape.png" alt="" class="w-full">
        </div>

        <div class="mt-5 p-2.5 w-full border-[1px] border-primary rounded-md">
            <p class="text-xs">Pesan Ini diambil dari hasil pemeriksaan dokter hewan atau petugas medis</p>
        </div>

        <div class="mt-5 w-full flex-justify">
            <button class="button px-6 py-2 rounded-md">Cetak</button>
        </div>
    </div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="/assets/js/popup.js"></script>
<?= $this->endSection(); ?>