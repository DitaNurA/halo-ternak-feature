<!-- app/Views/admin/dashboard/navbar-menu.php -->
<div id="dropdown-menu"
    class="block hidden rounded-xl shadow-lg absolute top-16 w-auto left-0 right-0 mx-auto max-w-sm z-10 border border-green-500">
    <ul id="menu-list" class="mt-1 p-3 bg-blue-50 rounded-lg text-center">
        <li class="py-1 text-base font-light text-center transition ease-in-out hover:underline"><a href="<?= base_url('/admin') ?>">Dashboard</a></li>
        <li class="py-1 text-base font-light text-center transition ease-in-out hover:underline"><a href="<?= base_url('admin/petugas') ?>">Data Petugas</a></li>
        <li class="py-1 text-base font-light text-center transition ease-in-out hover:underline"><a href="<?= base_url('admin/peternak') ?>">Data Peternak</a></li>
        <li class="py-1 text-base font-light text-center transition ease-in-out hover:underline"><a href="<?= base_url('posternak') ?>">Postingan Ternak</a></li>
        <li class="py-1 text-base font-light text-center transition ease-in-out hover:underline"><a href="<?= base_url('admin/obat') ?>">Obat</a></li>
        <li class="py-1 text-base font-light text-center transition ease-in-out hover:underline"><a href="<?= base_url('admin/edukasi') ?>">Edukasi</a></li>
        <li class="py-1 text-base font-light text-center transition ease-in-out hover:underline"><a href="<?= base_url('admin/kotak-saran') ?>">Kotak Saran</a></li>
        <li><a href="<?= base_url('akun') ?>"><button class="button-outline-primary py-1 font-light w-full text-base rounded-md bg-primary text-white">Akun</button></a></li>
        <?php if ( session()->has('id') ) { ?>
        <li class="mt-[10px]"><a href="/logout">
            <button class="py-1 border border-primary font-light w-full text-base rounded-md mt-1">Logout</button>
        </a></li> <?php }?>

    </ul>
</div>
<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/menu.js'); ?>"></script>

