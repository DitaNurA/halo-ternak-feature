<div class="tidak-jadi-jual-ternak popup-container w-full h-screen fixed top-0 left-0 z-10 flex justify-center hidden">
    <div class="mobile-responsive h-full relative flex-items p-12">
        <div class="popup-card w-full bg-light border-[1px] border-success p-4 rounded-xl relative z-[1]">
            <button type="button" class="popup-btn-close absolute top-2 right-3" data-target="tidak-jadi-jual-ternak">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 text-primary">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>

            <div class="w-full">
                <div class="w-full flex-justify">
                    <img src="/assets/icons/jual-ternak.svg" alt="" class="w-36">
                </div>

                <div class="mt-5">
                    <h1 class="text-base text-center font-medium">Apakah anda tidak jadi menjual hewan ternak Anda?</h1>
                    <div class="mt-5 flex-center gap-3">
                        <button type="button" class="popup-btn-close button-outline-primary px-4 py-2 rounded-md" data-target="tidak-jadi-jual-ternak">Tidak</button>

                        <button type="button" class="button-tidak-dijual flex-center button border-[1px] border-secondary px-4 py-2 rounded-md">
                            <?= $this->include('components/loading/button'); ?>
                            <span>Iya</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="popup-before w-full h-full bg-black bg-opacity-50 absolute top-0 left-0"></div>
    </div>
</div>
<?= $this->section('script'); ?>
<script>
    $(function() {
        $('.button-tidak-dijual').on('click', function() {
            $.ajax({
                url: '/peternak/hewan/tidak-dijual/' + <?= $data['id_hewan']; ?>,
                beforeSend: () => {
                    $(this).find('#loading').removeClass('hidden')
                },
                success: (response) => {
                    $(this).find('#loading').addClass('hidden')

                    if ( response?.status ) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Hewan ternak tidak dijual!',
                            timer: 2000
                        }).then(() => {
                            window.location.reload()
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Ternak gagal tidak dijual!',
                            timer: 2000
                        })
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
<?= $this->endSection('script'); ?>