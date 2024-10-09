<!-- Profil -->
<?= $this->section('profil'); ?>
<div class="bg-white border border-blue-500 p-4 rounded-lg">
    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="text-blue-600 text-xl font-medium ml-6 mt-2">Profil</h2>
            <!-- Garis bawah hijau -->
            <div class="h-1 mt-1 bg-green-500 ml-6 w-full"></div>
        </div>
        <button class="bg-blue-500 text-white text-sm px-1 py-1 rounded-full">
            <img src="/mnt/data/prof.png" alt="Edit Profil" class="w-4 h-4 inline">
        </button>
    </div>
    <div class="flex items-center">
        <img src="https://via.placeholder.com/80" class="w-20 h-20 rounded-full" alt="Foto Profil">
        <div class="ml-4">
            <p class="text-blue-500 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500 ml-4 mb-2 w-full">drh. Adhitnya</p>
            <p class="text-blue-500 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500 ml-4 mb-2 w-full">Kecamatan Montong</p>
            <p class="text-blue-500 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500 ml-4 mb-2 w-full">Desa Montong</p>
            <p class="text-blue-500 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500 ml-4 mb-2 w-full">08125467877</p>
            <p class="text-blue-500 border border-green-500 rounded-lg focus:outline-none focus:border-blue-500 ml-4 mb-2 w-full">12345</p>
        </div>
    </div>
<?= $this->endSection(); ?>
