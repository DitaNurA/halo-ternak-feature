<div class="<?= $popupClass; ?> popup-container w-full h-screen fixed top-0 left-0 z-10 flex justify-center hidden">
    <div class="mobile-responsive h-full relative flex-items p-12">
        <div class="popup-card w-full bg-light border-[1px] border-success p-4 rounded-xl relative z-[1]">
            <button class="popup-btn-close absolute top-2 right-3" data-target="<?= $popupClass; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="w-full">
                <div class="w-full flex-justify">
                    <img src="/assets/images/popup/popup-before-login.svg" alt="" class="w-36">
                </div>

                <div class="mt-5">
                    <h1 class="text-base text-center font-medium">Maaf, Harus Login<br>Terlebih Dahulu</h1>
                    <div class="mt-5 flex-center gap-3">
                        <a href="/register">
                            <button class="button-outline-primary px-4 py-2 rounded-md">Daftar</button>
                        </a>

                        <a href="/login">
                            <button class="button px-4 py-2 rounded-md">Login</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup-before w-full h-full bg-black bg-opacity-50 absolute top-0 left-0"></div>
    </div>
</div>