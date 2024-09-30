<div class="p-6 border-[1px] border-success rounded-xl relative overflow-hidden">
    <div class="absolute top-0 right-0 p-3 pl-6 pb-6 rounded-bl-full bg-primary">
        <a href="/peternak/kandang/add">
            <img src="/assets/icons/plus.svg" class="size-5">
        </a>
    </div>

    <div>
        <h1 class="text-2xl font-medium">Kandang Ternak</h1>
        <div class="mt-3 w-64 h-[1px] bg-success"></div>
    </div>

    <div class="mt-4">
        <form id="formSearchKandang" method="get" class="w-full flex-between-center gap-4">
            <div class="w-full">
                <input type="text" id="keyword" autocomplete="off" placeholder="Cari kandang anda" class="w-full outline-none border-[1px] border-success rounded-md px-4 py-1 placeholder-primary">
            </div>

            <div>
                <button class="button px-3 py-1 rounded-md">
                    <img src="/assets/icons/search-light.svg" class="size-5">
                </button>
            </div>
        </form>
    </div>

    <div class="mt-4">
        <div id="searchResult">
            <?php if ( count($kandang) ) { ?>
            <?php foreach($kandang as $row) { ?>
                <div class="mb-2">
                    <?= view('components/card/peternak/kandang-ternak', ['data' => $row]); ?>
                </div>
            <?php }} else { ?>
                <?php if ( isset($_GET['keyword']) ) { ?>
                <div class="mt-4 w-full flex-justify">
                    <h1 class="font-semibold">Kandang tidak ditemukan.</h1>
                </div>
                <?php } else { ?>
                <div class="mt-4 w-full flex-justify">
                    <h1 class="font-semibold">Kandang masih kosong.</h1>
                </div>
                <?php } ?>
            <?php } ?>
        </div>

        <div class="mt-6">
            <?= $pager->links('kandang', 'tailwind_pagination') ?>
        </div>
    </div>
</div>

<?= $this->section('script'); ?>
<script>
    $(function() {
        function renderResult(data = []) {
            $('#searchResult').html('')
            if ( data.length ) {
                data.map((value) => {
                    $('#searchResult').append(`<div class="mb-2">
                    <div class="p-3 rounded-md border-[1px] border-success flex-items gap-2">
        <div class="flex-center">
            <img src="/assets/${value.foto ? 'images/kandang/' + value.foto : 'icons/kandang-ternak.svg'}" class="w-20">
        </div>
    
        <div>
            <h1 class="text-base font-medium">${ value.nama_kandang }</h1>
            <div class="flex-items gap-0.5">
                <img src="/assets/icons/map-primary.svg" class="size-3">
                <h1 class="text-xs">${ value.kecamatan }</h1>
            </div>
    
            <div class="mt-1">
                <a href="/peternak/kandang/detail/${ value.id_kandang_ternak }">
                    <button class="button px-4 py-0.5 rounded-md text-xs">Lihat Detail</button>
                </a>
            </div>
        </div>
    </div><div>`)
                })
            } else {
                $('#searchResult').append(`<div class="mt-4 w-full flex-justify">
                    <h1 class="font-semibold">Kandang tidak ditemukan.</h1>
                </div>`)
            }
        }

        function fetchAll() {
            $.ajax({
                url: '/peternak/kandang/search',
                success: (response) => {
                    if ( response?.data ) {
                        renderResult(response.data)
                    }
                }
            })
        }

        $('#formSearchKandang').on('submit', function(e) {
            e.preventDefault()
            
            $.ajax({
                url: '/peternak/kandang/search?keyword=' + $(this).find('#keyword').val(),
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
                const url = '/peternak/kandang/search?keyword=' + $('#formSearchKandang').find('#keyword').val() + '&' + $(this).attr('href')

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