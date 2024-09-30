<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="p-4">
    <div class="w-full flex-between-center px-4">
        <button onclick="window.history.go(-1)">
            <img src="/assets/icons/arrow-back.svg" alt="Back" class="size-6">
        </button>

        <div class="px-4">
            <h1 class="text-2xl text-center font-medium">Obat</h1>

            <div class="mt-1.5 w-full flex-justify">
                <div class="w-12 h-0.5 bg-success"></div>
            </div>
        </div>

        <div></div>
    </div>

    <div class="mt-3 px-9">
        <p class="text-base text-center">Memberikan informasi obat dan suplemen untuk kesehatan dan perawatan ternak</p>
    </div>

    <form id="formSearchObat" method="get" class="mt-2 px-2">
        <?= $this->include('components/form/input-keyword.php'); ?>
    </form>

    <?php if ( count($obat) ) { ?>
    <div class="mt-8 grid grid-cols-2 gap-5">
        <div id="searchResult">
            <?php foreach($obat as $row) { ?>
            <div class="mb-2">
                <?= view('components/card/obat', ['data' => $row]); ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php } else { ?>
        <div class="mt-4 w-full flex-justify">
            <h1 class="font-medium text-center">Obat tidak ditemukan.</h1>
        </div>
    <?php } ?>

    <div class="mt-6">
        <?= $pager->links('obat', 'tailwind_pagination') ?>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
    <script src="/assets/js/popup.js"></script>
<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
<script>
    $(function() {
        function renderResult(data = []) {
            $('#searchResult').html('')
            if ( data.length ) {
                data.map((value) => {
                    $('#searchResult').append(`<div class="mb-2"><div class="rounded-md border-[1px] border-success">
    <div>
        <img src="/assets/images/${value.foto ? 'obat/' + value.foto : 'dummy/obat.png'}" alt="${value.nama_obat}" class="w-full rounded-md">
    </div>
    <div class="p-1.5 pb-2">
        <h1 class="text-limit-1 text-base font-medium">${value.nama_obat}</h1>
        <p class="text-limit-2 text-xs font-normal">${value.deskripsi}</p>

        <div class="w-full flex justify-end">
            <button class="popup-btn button px-3 rounded-md" data-target="popupObat-${value.id_obat}">Lihat</button>
        </div>
    </div>

    <!-- Popup -->
    <div class="popupObat-${value.id_obat} popup-container w-full h-screen fixed top-0 left-0 z-10 flex justify-center hidden">
        <div class="mobile-responsive h-full relative flex-items p-12">
            <div class="popup-card w-full bg-light border-[1px] border-success p-4 rounded-xl grid grid-cols-2 gap-3 relative z-[1]">
                <button class="popup-btn-close absolute top-2 right-3" data-target="popupObat-${value.id_obat}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
        
                <div>
                    <img src="/assets/images/dummy/obat.png" alt="" class="w-full">
                </div>
                <div>
                    <h1 class="text-base font-medium">${value.nama_obat}</h1>
                    <p class="text-[10px] leading-[15px]">${value.deskripsi}</p>
                </div>
            </div>
            <div class="popup-before w-full h-full bg-black bg-opacity-50 absolute top-0 left-0"></div>
        </div>
    </div>
    <!-- End Popup -->
</div><div>`)
                })
            } else {
                $('#searchResult').append(`<div class="mt-4 w-full flex-justify">
                    <h1 class="font-semibold">Obat tidak ditemukan.</h1>
                </div>`)
            }
        }

        function fetchAll() {
            $.ajax({
                url: '?fetch=all',
                success: (response) => {
                    if ( response?.data ) {
                        renderResult(response.data)
                    }
                }
            })
        }

        $('#formSearchObat').on('submit', function(e) {
            e.preventDefault()
            
            $.ajax({
                url: '?keyword=' + $(this).find('#keyword').val(),
                success: (response) => {
                    if ( response?.data ) {
                        renderResult(response.data)
                    } else {
                        fetchAll()
                    }
                },
                error: () => {
                    fetchAll()
                }
            })
        })

        $('#paginateLink').each(function() {
            $(this).on('click', function(e) {
                e.preventDefault()
                const url = '?keyword=' + $('#formSearchObat').find('#keyword').val() + '&' + $(this).attr('href')

                $.ajax({
                    url: url,
                    success: (response) => {
                        if ( response?.data ) {
                            renderResult(response.data)
                        }
                    }
                })
            })
        })
    })
</script>
<?= $this->endSection(); ?>