<!-- Navbar -->
<nav class="w-full fixed top-0 left-0 right-2 p-6 pb-0 flex-justify z-[9999]">
    <div class="mobile-responsive relative">
        <div class="px-4 py-2 bg-primary bg-opacity-10 backdrop-blur-md rounded-lg flex-between-center">
            <!-- Hamburger -->
            <button class="hamburger" id="menu-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6 text-success">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
            <!-- End Hamburger -->
            <div>
                <img src="/assets/images/navbar/logo-navbar.png" alt="<?= config('App')->app_name; ?>"
                    class="w-[107px]">
            </div>
            <!-- Profile Icon -->
            <div>
                <?php if ( session()->has('id') ) { ?>
                <a href="<?= role_url(); ?>">
                    <img src="/assets/images/<?= session()->get('foto') ? 'user/' . session()->get('foto') : 'dummy/profil.png'; ?>"
                        alt="" class="size-8 object-cover object-center rounded-full">
                </a>
                <?php } ?>
            </div>
        </div>
        <!-- Include Dropdown Menu -->
        <?= $this->include('admin/components/header/navbar-menu'); ?>
    </div>
</nav>