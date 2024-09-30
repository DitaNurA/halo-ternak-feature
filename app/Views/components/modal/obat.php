<div class="<?= $popupClass; ?> popup-container w-full h-screen fixed top-0 left-0 z-10 flex justify-center hidden">
    <div class="mobile-responsive h-full relative flex-items p-12">
        <div class="popup-card w-full bg-light border-[1px] border-success p-4 rounded-xl grid grid-cols-2 gap-3 relative z-[1]">
            <button class="popup-btn-close absolute top-2 right-3" data-target="<?= $popupClass; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
    
            <div>
                <img src="/assets/images/dummy/obat.png" alt="" class="w-full">
            </div>
            <div>
                <h1 class="text-base font-medium"><?= $data['nama_obat']; ?></h1>
                <p class="text-[10px] leading-[15px]"><?= $data['deskripsi']; ?></p>
            </div>
        </div>
        <div class="popup-before w-full h-full bg-black bg-opacity-50 absolute top-0 left-0"></div>
    </div>
</div>