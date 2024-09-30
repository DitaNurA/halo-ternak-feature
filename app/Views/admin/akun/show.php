<!-- app/Views/admin/akun/show.php -->
<?= $this->section('show'); ?>

<div id="profileView">
    <h2 class="text-blue-600 text-xl font-semibold text-center mb-6">Profil</h2>
    <div class="text-center mb-10 mt-4">
        <div class="relative w-24 h-24 mx-auto">
            <img src="<?= base_url('assets/images/profil.png') ?>" alt="Profile Picture"
                class="rounded-full w-full h-full object-cover">
            <button class="absolute bottom-0 right-0 bg-blue-500 text-white rounded-full p-1" onclick="showEditForm()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M17.414 2.586a2 2 0 010 2.828l-10 10a2 2 0 01-.707.464l-5 2a1 1 0 01-1.263-1.263l2-5a2 2 0 01.464-.707l10-10a2 2 0 012.828 0zm-9.121 9.121L5 16l4.293-3.293-1.414-1.414z" />
                </svg>
            </button>
        </div>
        <p class="text-blue-500 mt-8 mb-2">Pak Farid</p>
        <p class="text-blue-500 mb-2">Jl Imam Bonjol No. 25 Jatirago</p>
        <p class="text-blue-500 mb-2">081234678377</p>
    </div>
</div>

<!-- Ubah Profil -->
<div id="editView" class="hidden">
    <h2 class="text-blue-600 text-xl font-semibold text-center mb-4">Ubah Profil</h2>
    <div class="text-center mb-4">
        <div class="relative w-24 h-24 mx-auto">
            <img src="<?= base_url('/assets/images/profil.png') ?>" alt="Profile Picture"
                class="rounded-full w-full h-full object-cover">
            <button class="absolute bottom-0 right-0 bg-green-500 text-white rounded-full p-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M17.414 2.586a2 2 0 010 2.828l-10 10a2 2 0 01-.707.464l-5 2a1 1 0 01-1.263-1.263l2-5a2 2 0 01.464-.707l10-10a2 2 0 012.828 0zm-9.121 9.121L5 16l4.293-3.293-1.414-1.414z" />
                </svg>
            </button>
        </div>
    </div>
    <form class="space-y-4">
        <input type="text" name="name" value="Pak Farid" class="w-full px-4 py-2 border border-blue-300 rounded-lg">
        <input type="text" name="address" value="Jl Imam Bonjol No. 25 Jatirago"
            class="w-full px-4 py-2 border border-blue-300 rounded-lg">
        <input type="text" name="phone" value="081234678377" class="w-full px-4 py-2 border border-blue-300 rounded-lg">
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg">Simpan</button>
    </form>
    <a href="#" class="text-blue-600 block text-center mt-4">Lupa kata Sandi ?</a>
</div>

<script>
function showEditForm() {
    document.getElementById('profileView').classList.add('hidden');
    document.getElementById('editView').classList.remove('hidden');
}

function showProfileView() {
    document.getElementById('profileView').classList.remove('hidden');
    document.getElementById('editView').classList.add('hidden');
}
</script>
<?= $this->endSection(); ?>