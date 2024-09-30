<div class="popupTernak-<?= $data['id_hewan']; ?> popup-container w-full h-screen fixed top-0 left-0 z-[51] flex justify-center hidden">
    <div class="mobile-responsive h-full relative flex-items p-12">
        <div class="popup-card hidden-scrollbar w-full max-h-full overflow-y-auto bg-light border-[1px] border-success p-4 rounded-xl relative z-[1]">
            <button class="popup-btn-close absolute top-5 right-5" data-target="popupTernak-<?= $data['id_hewan']; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>

            <div>
                <img src="/assets/images/<?= $data['foto'] ? 'hewan-ternak/' . $data['foto'] : 'dummy/ternak.png'; ?>" alt="" class="w-full rounded-xl">
            </div>

            <div class="mt-3">
                <h1 class="text-2xl font-medium"><?= $data['nama_hewan']; ?></h1>
                <h1 class="mt-1 text-base font-medium">Rp. <?= number_format($data['harga']); ?></h1>

                <div class="mt-2 flex-items gap-1">
                    <img src="/assets/icons/map-primary.svg" class="size-4">
                    <h1><?= $data['kecamatan']; ?></h1>
                </div>

                <div class="mt-2 w-full h-0.5 bg-success"></div>

                <div class="mt-2 grid grid-cols-2 gap-4 justify-between">
                    <div>
                        <h1 class="font-medium">Hewan Ternak</h1>
                        <div class="mt-1 w-full button-outline-primary px-4 rounded-md"><?= $data['nama_ternak']; ?></div>
                    </div>
                    <div>
                        <h1 class="font-medium">Jenis Spesifik</h1>
                        <div class="mt-1 w-full button-outline-primary px-4 rounded-md"><?= $data['jenis_ternak']; ?></div>
                    </div>
                    <div>
                        <h1 class="font-medium">Jenis Kelamin</h1>
                        <div class="mt-1 w-full button-outline-primary px-4 rounded-md"><?= $data['jenis_kelamin']; ?></div>
                    </div>
                    <div>
                        <h1 class="font-medium">Umur Ternak</h1>
                        <div class="mt-1 w-full button-outline-primary px-4 rounded-md"><?= $data['usia']; ?> Tahun</div>
                    </div>
                    <div>
                        <h1 class="font-medium">Berat Ternak</h1>
                        <div class="mt-1 w-full button-outline-primary px-4 rounded-md"><?= $data['berat']; ?>kg</div>
                    </div>
                    <div>
                        <h1 class="font-medium">Riwayat Ternak</h1>
                        <div class="mt-1 w-full button-outline-primary px-4 rounded-md">Ternak Sakit</div>
                    </div>
                </div>

                <div class="mt-2 w-full h-0.5 bg-success"></div>

                <div class="mt-2">
                    <h1 class="font-medium">Deskripsi</h1>
                    <p class="mt-1 text-xs">Temukan domba premium kami, sempurna untuk meningkatkan kualitas ternak Anda dengan hewan yang sehat dan kuat. Domba kami dipelihara dengan standar perawatan tertinggi, bebas penyakit, dan menghasilkan wol serta daging berkualitas terbaik.</p>
                </div>

                <div class="mt-4 w-full flex-justify">
                    <a href="">
                        <button class="button-success px-4 py-2 rounded-md flex-items gap-2">
                            <img src="/assets/icons/whatsapp.svg" class="size-5">
                            <span>Chat Penjual</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="popup-before w-full h-full bg-black bg-opacity-50 absolute top-0 left-0"></div>
    </div>
</div>