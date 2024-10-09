<!-- Navbar -->
<div class="bg-blue-50 px-4 py-1 mb-4 rounded-xl mt-6 ml-4 mr-4">
    <div class="flex justify-between items-center">
        <!-- Tombol Menu -->
        <div>
            <button class="text-green-500" id="menu-button">☰</button>
        </div>

        <!-- Logo -->
        <div class="flex-grow flex justify-center">
            <img src="<?= base_url('assets/images/Logolanding.png'); ?>" alt="HaloTernak Logo"
                class="h-6 mr-3 items-center">
        </div>
        <!-- Profile Icon -->
        <div class="flex items-center">
            <button class="text-blue-600" onclick="window.location.href='<?= base_url('akun') ?>'">
                <img src="assets/images/profil.png" alt="Profile" class="w-8 h-8 rounded-full">
            </button>
        </div>
    </div>
    <!-- Include Dropdown Menu -->
    <?= $this->include('dokter/dokter_components/header/navbar-menu'); ?>
</div>