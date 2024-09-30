<div class="kotak-saran-popup popup-container w-full h-screen fixed top-0 left-0 z-[51] flex justify-center hidden">
    <div class="mobile-responsive h-full relative flex-items p-12">
        <div class="popup-card w-full bg-light border-[1px] border-success p-4 rounded-xl relative z-[1]">
            <div class="w-full flex-between-center">
                <h1 class="text-2xl font-medium">Kotak Saran</h1>
                <button class="popup-btn-close" data-target="kotak-saran-popup">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form id="formKotakSaran" method="post" class="mt-3">
                <div>
                    <input type="text" name="nama" value="<?= session()->get('nama'); ?>" autocomplete="off" placeholder="Nama" class="w-full outline-none px-1 py-2 border-b-[1px] border-primary placeholder-primary" readonly>
                    <span class="nama-error text-xs text-red-500 hidden"></span>
                </div>
                <div class="mt-2">
                    <input type="text" name="no_wa" value="<?= session()->get('no_wa'); ?>" autocomplete="off" placeholder="Nomor Hp" class="w-full outline-none px-1 py-2 border-b-[1px] border-primary placeholder-primary" readonly>
                    <span class="no_wa-error text-xs text-red-500 hidden"></span>
                </div>
                <!-- <div class="mt-2">
                    <input type="text" name="keluhan" autocomplete="off" placeholder="Keluhan" class="w-full outline-none px-1 py-2 border-b-[1px] border-primary placeholder-primary">
                </div> -->
                <div class="mt-3">
                    <textarea name="saran" placeholder="Kritik saran" rows="8" class="saran-input input-outline-primary resize-none w-full p-3 rounded-md placeholder-primary"></textarea>
                    <span class="saran-error text-xs text-red-500 hidden"></span>
                </div>
                <div class="mt-4 w-full flex justify-end">
                    <button class="button flex-center px-6 py-1 rounded-md">
                        <?= $this->include('components/loading/button'); ?>
                        <span>Kirim</span>
                    </button>
                </div>
            </form>
        </div>
        <div class="popup-before w-full h-full bg-black bg-opacity-50 absolute top-0 left-0"></div>
    </div>
</div>
<?= $this->section('script'); ?>
<script>
    $(function() {
        const inputs = ['nama', 'no_wa', 'saran']

        $('#formKotakSaran').on('submit', function(e) {
            inputs.map((val) => {
                $(`.${val}-input`).removeClass('input-error')
                $(`.${val}-input`).addClass('input-outline-primary')
                $(`.${val}-error`).addClass('hidden')
                $(`.${val}-error`).text('')
            })
            e.preventDefault()
            const formData = new FormData(e.target)

            $.ajax({
                url: '/kotak-saran',
                method: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: () => {
                    $(this).find('#loading').removeClass('hidden')
                },
                success: (response) => {
                    $(this).find('#loading').addClass('hidden')

                    if ( response?.status ) {
                        $('.kotak-saran-popup').addClass('hidden')
                        
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Saran berhasil dikirim!',
                            timer: 2000
                        })
                    } else {
                        if ( response?.errors ) {
                            Object.keys(response.errors).map((value) => {
                                $(`.${value}-input`).addClass('input-error')
                                $(`.${value}-input`).removeClass('input-outline-primary')
                                $(`.${value}-error`).removeClass('hidden')
                                $(`.${value}-error`).text(response?.errors[value])
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Saran gagal dikirim!',
                                timer: 2000
                            })
                        }
                    }
                },
                error: () => {
                    $(this).find('#loading').addClass('hidden')
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "Something wen't wrong!",
                        timer: 2000
                    })
                }
            })
        })
    })
</script>
<?= $this->endSection(); ?>