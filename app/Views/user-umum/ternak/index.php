<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="p-4">
    <div class="w-full flex-between-center px-4">
        <button onclick="window.history.go(-1)">
            <img src="/assets/icons/arrow-back.svg" alt="Back" class="size-6">
        </button>

        <div class="px-4">
            <h1 class="text-2xl text-center font-medium">Jual Ternak</h1>

            <div class="mt-1.5 w-full flex-justify">
                <div class="w-12 h-0.5 bg-success"></div>
            </div>
        </div>

        <div></div>
    </div>

    <div class="mt-3 px-9">
        <p class="text-base text-center">Memberikan informasi lengkap mengenai ternak yang dijual.</p>
    </div>

    <form id="formSearchHewan" method="get" class="mt-2 px-2 relative">
        <div class="w-full flex-between-center gap-4">
            <div class="w-full">
                <?= $this->include('components/form/input-keyword.php'); ?>
            </div>

            <button type="button" class="filter-ternak-btn">
                <img src="/assets/icons/filter.svg" class="size-7">
            </button>
        </div>

        <?= $this->include('components/dropdown/filter-ternak'); ?>
    </form>

    <?php if ( count($ternak) ) { ?>
        <div class="mt-8 grid grid-cols-2 gap-5">
            <div id="searchResult">
                <?php foreach($ternak as $row) { ?>
                    <div class="mb-2">
                        <?= view('components/card/ternak', ['data' => $row]); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="mt-4 w-full flex-justify">
            <h1 class="font-medium text-center">Ternak tidak ditemukan.</h1>
        </div>
    <?php } ?>

    <div class="mt-6">
        <?= $pager->links('hewan', 'tailwind_pagination'); ?>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
    <script src="/assets/js/popup.js"></script>
    <script>
        $(function() {
            $('.filter-ternak-btn').on('click', function() {
                $('.filter-ternak-container').toggleClass('hidden')
            })

            function renderResult(data = []) {
                $('#searchResult').html('')
                if ( data.length ) {
                    data.map((value) => {
                        $('#searchResult').append(`<div class="mb-2"><div class="rounded-md border-[1px] border-success">
    <div>
        <img src="/assets/images/${value.foto ? 'hewan-ternak/' + value.foto : 'dummy/ternak.png'}" alt="${value.nama_hewan}" class="w-full rounded-md">
    </div>
    <div class="p-1.5 pb-2">
        <h1 class="text-limit-1 text-base font-medium">${value.nama_hewan}</h1>
        <h1 class="text-xs font-normal">Rp ${new Intl.NumberFormat({}, {
            currency: 'IDR'
        }).format(value.harga)}</h1>

        <div class="mt-2 w-full flex-between-center">
            <div class="flex-items gap-1">
                <img src="/assets/icons/map-primary.svg" class="size-3">
                <h1>${value.kecamatan}</h1>
            </div>
            <button class="popup-btn button px-3 rounded-md" data-target="popupTernak-${value.id_hewan}">Lihat</button>
        </div>
    </div>

    <!-- Popup -->
    <div class="popupTernak-${value.id_hewan} popup-container w-full h-screen fixed top-0 left-0 z-[51] flex justify-center hidden">
        <div class="mobile-responsive h-full relative flex-items p-12">
            <div class="popup-card hidden-scrollbar w-full max-h-full overflow-y-auto bg-light border-[1px] border-success p-4 rounded-xl relative z-[1]">
                <button class="popup-btn-close absolute top-5 right-5" data-target="popupTernak-${value.id_hewan}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>

                <div>
                    <img src="/assets/images/${value.foto ? 'hewan-ternak/' + value.foto : 'dummy/ternak.png'}" alt="${value.nama_hewan}" class="w-full rounded-xl">
                </div>

                <div class="mt-3">
                    <h1 class="text-2xl font-medium">${value.nama_hewan}</h1>
                    <h1 class="mt-1 text-base font-medium">Rp ${new Intl.NumberFormat({}, { currency: 'IDR' }).format(value.harga)}</h1>

                    <div class="mt-2 flex-items gap-1">
                        <img src="/assets/icons/map-primary.svg" class="size-4">
                        <h1>${value.kecamatan}</h1>
                    </div>

                    <div class="mt-2 w-full h-0.5 bg-success"></div>

                    <div class="mt-2 grid grid-cols-2 gap-4 justify-between">
                        <div>
                            <h1 class="font-medium">Hewan Ternak</h1>
                            <div class="mt-1 w-full button-outline-primary px-4 rounded-md">${value.nama_ternak}</div>
                        </div>
                        <div>
                            <h1 class="font-medium">Jenis Spesifik</h1>
                            <div class="mt-1 w-full button-outline-primary px-4 rounded-md">${value.jenis_ternak}</div>
                        </div>
                        <div>
                            <h1 class="font-medium">Jenis Kelamin</h1>
                            <div class="mt-1 w-full button-outline-primary px-4 rounded-md">${value.jenis_kelamin}</div>
                        </div>
                        <div>
                            <h1 class="font-medium">Umur Ternak</h1>
                            <div class="mt-1 w-full button-outline-primary px-4 rounded-md">${value.usia} Tahun</div>
                        </div>
                        <div>
                            <h1 class="font-medium">Berat Ternak</h1>
                            <div class="mt-1 w-full button-outline-primary px-4 rounded-md">${value.berat}kg</div>
                        </div>
                        <div>
                            <h1 class="font-medium">Riwayat Ternak</h1>
                            <div class="mt-1 w-full button-outline-primary px-4 rounded-md">Ternak Sakit</div>
                        </div>
                    </div>

                    <div class="mt-2 w-full h-0.5 bg-success"></div>

                    <div class="mt-2">
                        <h1 class="font-medium">Deskripsi</h1>
                        <p class="mt-1 text-xs">Temukan domba premium kami, sempurna untuk meningkatkan kualitas ternak Anda dengan hewan yang sehat dan kuat. Domba kami dipelihara dengan standar perawatan tertinggi, bebas penyakit, dan menghasilkan wol serta daging berkualitas terbaik.</p>
                    </div>

                    <div class="mt-4 w-full flex-justify">
                        <a href="">
                            <button class="button-success px-4 py-2 rounded-md flex-items gap-2">
                                <img src="/assets/icons/whatsapp.svg" class="size-5">
                                <span>Chat Penjual</span>
                            </button>
                        </a>
                    </div>
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
                        <h1 class="font-semibold">Data tidak ditemukan.</h1>
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

            $('#formSearchHewan').on('submit', function(e) {
                e.preventDefault()
                const formData = new FormData(e.target)

                const keyword = formData.get('keyword')
                const jenis = formData.get('jenis_ternak')
                const lokasi = formData.get('lokasi')
                const harga_dari = formData.get('harga_dari')
                const harga_ke = formData.get('harga_ke')
                
                $.ajax({
                    url: `?keyword=${keyword}&jenis_ternak=${jenis}&lokasi=${lokasi}&harga_dari=${harga_dari}&harga_ke=${harga_ke}`,
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
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
                    const url = '?keyword=' + $('#formSearchHewan').find('#keyword').val() + '&' + $(this).attr('href')

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