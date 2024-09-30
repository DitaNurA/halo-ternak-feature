<div class="nav-menu w-full absolute left-0 block hidden">
    <ul class="mt-1 p-5 bg-primary bg-opacity-10 backdrop-blur-md rounded-lg">

        <li class="w-full flex-justify">
            <a href="/#home" class="nav-link text-primary text-base font-light text-center transition ease-in-out hover:underline">Beranda</a>
        </li>
        <li class="mt-[10px] w-full flex-justify">
            <a href="/#tentang-kami" class="nav-link text-primary text-base font-light text-center transition ease-in-out hover:underline">Tentang Kami</a>
        </li>
        <li class="mt-[10px] w-full flex-justify">
            <a href="/#fitur" class="nav-link text-primary text-base font-light text-center transition ease-in-out hover:underline">Fitur</a>
        </li>
        <li class="mt-[10px] w-full flex-justify">
            <a href="/#edukasi" class="nav-link text-primary text-base font-light text-center transition ease-in-out hover:underline">Edukasi</a>
        </li>

        <?php if ( session()->has('id') ) { ?>
        <li class="mt-[10px]"><a href="/logout">
            <button class="bg-primary py-1 text-light font-light w-full text-base rounded-md">Logout</button>
        </a></li>
        <?php } else { ?>
        <li class="mt-[10px]"><a href="/register">
            <button class="button-outline-primary  py-1 font-light w-full text-base rounded-md">Daftar Akun</button>
        </a></li>
        <li class="mt-[10px]"><a href="/login">
            <button class="bg-primary py-1 text-light font-light w-full text-base rounded-md">Masuk</button>
        </a></li>
        <?php } ?>
    </ul>
</div>