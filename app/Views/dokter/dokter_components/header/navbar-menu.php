<!-- app/Views/dokter/dokter_components/header/navbar-menu.php -->
<div id="dropdown-menu"
    class="block hidden rounded-xl mt-2 shadow-lg absolute top-16 w-auto left-0 right-0 mx-auto max-w-sm z-10">
    <ul class="mt-1 p-3 bg-primary bg-opacity-10 backdrop-blur-md rounded-lg text-center">
        <li class="py-1 text-base font-light text-center transition ease-in-out hover:underline"><a href="<?= base_url('home') ?>">Home</a></li>
        <li class="py-1 text-base font-light text-center transition ease-in-out hover:underline"><a href="<?= base_url('home#tentangkami') ?>">Tentang Kami</a></li>
        <li class="py-1 text-base font-light text-center transition ease-in-out hover:underline"><a href="<?= base_url('home#fitur') ?>">Fitur</a></li>
        <li class="py-1 text-base font-light text-center transition ease-in-out hover:underline"><a href="<?= base_url('home#edukasi') ?>">edukasi</a></li>
        <li class="py-1 text-base font-light text-center transition ease-in-out hover:underline"><a href="<?= base_url('dokter') ?>">Jadwal Saya</a></li>
        <li class="py-1 text-base font-light text-center transition ease-in-out hover:underline"><a href="<?= base_url('dokter#listpesanan') ?>">Pesanan Terdekat</a></li>
        <li><a href="<?= base_url('akun') ?>"><button class="button-outline-primary  py-1 font-light w-full text-base rounded-md bg-primary text-white">Akun</button></a></li>
        <li><button class="py-1 border border-primary font-light w-full text-base rounded-md mt-1"><a href="<?= base_url('login_admin') ?>">Keluar</a></li>
    </ul>
</div>

<script>
const menuButton = document.getElementById('menu-button');
const dropdownMenu = document.getElementById('dropdown-menu');

// Get all the dropdown menu items
const menuItems = dropdownMenu.querySelectorAll('a');

// Toggle dropdown menu visibility when the menu button is clicked
menuButton.addEventListener('click', () => {
    dropdownMenu.classList.toggle('hidden');
});

// Hide dropdown menu when clicking a menu item
menuItems.forEach(item => {
    item.addEventListener('click', () => {
        dropdownMenu.classList.add('hidden');
    });
});
</script>

