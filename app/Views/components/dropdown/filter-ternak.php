<div class="filter-ternak-container w-full absolute left-0 z-10 hidden">
    <div class="mt-3 rounded-xl p-4 bg-[#E9F5FFB0] bg-opacity-[69] backdrop-blur-md">
        <!-- Jenis Hewan -->
        <div>
            <h1 class="text-base font-semibold">Jenis Hewan</h1>

            <div class="mt-3 flex-items gap-4">
                <div>
                    <label for="sapi">
                        <input type="radio" name="jenis_ternak" id="sapi" hidden class="peer" value="sapi">
                        <div class="border-[1px] border-primary text-primary px-4 py-2 rounded-md transition ease-in-out peer-checked:bg-primary peer-checked:text-light cursor-pointer">Sapi</div>
                    </label>
                </div>

                <div>
                    <label for="domba">
                        <input type="radio" name="jenis_ternak" id="domba" class="peer" hidden value="domba">
                        <div class="border-[1px] border-primary text-primary px-4 py-2 rounded-md transition ease-in-out peer-checked:bg-primary peer-checked:text-light cursor-pointer">Domba</div>
                    </label>
                </div>

                <div>
                    <label for="kambing">
                        <input type="radio" name="jenis_ternak" id="kambing" class="peer" hidden value="kambing">
                        <div class="border-[1px] border-primary text-primary px-4 py-2 rounded-md transition ease-in-out peer-checked:bg-primary peer-checked:text-light cursor-pointer">Kambing</div>
                    </label>
                </div>
            </div>
        </div>
        <!-- End Jenis Hewan -->

        <!-- Lokasi -->
        <div class="mt-5">
            <h1 class="text-base font-semibold">Lokasi</h1>
            <div class="mt-3 flex-items gap-4">
                <div>
                    <label for="montong">
                        <input type="radio" name="lokasi" id="montong" hidden class="peer" value="montong">
                        <div class="border-[1px] border-primary text-primary px-4 py-2 rounded-md transition ease-in-out peer-checked:bg-primary peer-checked:text-light cursor-pointer">Kec. Montong</div>
                    </label>
                </div>

                <div>
                    <label for="merakurak">
                        <input type="radio" name="lokasi" id="merakurak" class="peer" hidden value="merakurak">
                        <div class="border-[1px] border-primary text-primary px-4 py-2 rounded-md transition ease-in-out peer-checked:bg-primary peer-checked:text-light cursor-pointer">Kec. Merakurak</div>
                    </label>
                </div>
            </div>
        </div>
        <!-- End Lokasi -->

        <!-- Harga -->
        <div class="mt-5">
            <h1 class="text-base font-medium">Harga</h1>

            <div class="mt-3 flex-items gap-4">
                <input type="text" name="harga_dari" placeholder="Rp0" autocomplete="off" inputmode="numeric" class="w-36 bg-transparent outline-none border-[1px] border-primary px-4 py-2 rounded-md">
                <h1>to</h1>
                <input type="text" name="harga_ke" placeholder="Rp0" autocomplete="off" inputmode="numeric" class="w-36 bg-transparent outline-none border-[1px] border-primary px-4 py-2 rounded-md">
            </div>
        </div>
        <!-- End Harga -->

        <div class="mt-4">
            <button class="w-full button py-2 rounded-md">Terapkan</button>
        </div>

    </div>
</div>