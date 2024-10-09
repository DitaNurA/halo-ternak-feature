<!-- app/Views/dokter/dokter_components/judul.php -->
<!-- Kembali dan Judul Halaman -->
<div class="flex justify-between items-center">
    <button id="backButton" class="text-green-600 flex-grow-0">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <div class="flex-grow text-center">
        <div class="flex flex-col items-center">
            <h2 id="page-title" class="text-blue-600 text-xl font-semibold text-center"></h2>
            <div class="w-24 h-1 mt-1 bg-green-500"></div>
        </div>
    </div>
    <div class="flex-grow-0 w-6"></div> <!-- Placeholder untuk mengimbangi tombol di kiri -->
</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="fixed inset-0 bg-white bg-opacity-75 flex justify-center items-center z-50 hidden">
    <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-blue-500"></div>
    <span class="ml-4 text-blue-500 font-semibold">Loading...</span>
</div>
<script src="<?= base_url('/assets/js/script.js') ?>"></script>
<script>
    $(document).ready(function() {
    $('#backButton').on('click', function(e) {
        e.preventDefault(); // Mencegah aksi default tombol
        
        // Tampilkan overlay loading
        $('#loadingOverlay').removeClass('hidden');

        // Tunggu 1 detik sebelum kembali ke halaman sebelumnya
        setTimeout(() => {
            window.history.back();
        }, 1000); // 1 detik delay
    });
});

</script>