
    $(document).ready(function() {
        $('.detail-button').on('click', function(e) {
            e.preventDefault(); // Mencegah aksi default (navigasi langsung)
            
            // Tampilkan overlay loading
            $('#loadingOverlay').removeClass('hidden');

            // Tunggu 2 detik sebelum melanjutkan ke halaman detail
            setTimeout(() => {
                window.location.href = $(this).attr('href');
            }, 2000); // 2 detik delay
        });
    });
