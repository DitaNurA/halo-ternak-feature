<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

    <div class="p-4">
        <button onclick="window.history.go(-1)">
            <img src="/assets/icons/arrow-back.svg" alt="Back" class="size-6">
        </button>

        <div class="mt-4">
            <?= $this->include('components/peternak/detail-kandang'); ?>
        </div>

        <div class="mt-4">
            <div class="p-6 border-[1px] border-primary bg-primary bg-opacity-20 rounded-xl relative overflow-hidden">
                <div class="absolute top-3 right-3">
                    <a onclick="window.history.go(-1)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </a>
                </div>

                <div>
                    <h1 class="text-2xl font-medium">Tambah Hewan Ternak</h1>
                    <div class="mt-3 w-64 h-[1px] bg-success"></div>
                </div>

                <form id="form" method="post" class="mt-4" enctype="multipart/form-data">
                    <div class="w-full flex-justify">
                        <div>
                            <div class="relative">
                                <img src="/assets/images/dummy/sapi.png" alt="" class="size-28 rounded-full border-[1px] border-primary" id="image-reader-preview">
                                <label for="image-reader" class="absolute -right-1 -bottom-1 cursor-pointer">
                                <div class="p-3 rounded-full bg-primary">
                                    <img src="/assets/icons/pencil.svg" class="size-4">
                                </div>
                                </label>
                                <input type="file" name="foto" id="image-reader" hidden>
                            </div>
                            <span class="foto-error text-xs text-red-500 hidden"></span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <div>
                            <input type="text" name="nama_hewan" placeholder="Nama Hewan" autocomplete="off" class="nama_hewan-input w-full input-outline-primary px-4 py-1.5 rounded-md placeholder-primary">
                            <span class="nama_hewan-error text-xs text-red-500 hidden"></span>
                        </div>

                        <div class="mt-3">
                            <select name="jenis_kelamin" autocomplete="off" class="jenis_kelamin-input w-full input-outline-primary px-4 py-1.5 rounded-md placeholder-primary">
                                <option disabled selected>Pilih jenis kelamin</option>
                                <option value="jantan">Jantan</option>
                                <option value="betina">Betina</option>
                            </select>
                            <span class="jenis_kelamin-error text-xs text-red-500 hidden"></span>
                        </div>

                        <div class="mt-3">
                            <select name="jenis_ternak" autocomplete="off" class="jenis_ternak-input w-full input-outline-primary px-4 py-1.5 rounded-md placeholder-primary">
                                <option disabled selected>Pilih jenis ternak</option>
                                <?php if ( count($jenis_ternak) ) { ?>
                                <?php foreach($jenis_ternak as $row) { ?>
                                    <option value="<?= $row['id_jenis_ternak']; ?>"><?= $row['jenis_ternak']; ?></option>
                                <?php }} else { ?>
                                    <option disabled>Data tidak ditemukan.</option>
                                <?php } ?>
                            </select>
                            <span class="jenis_ternak-error text-xs text-red-500 hidden"></span>
                        </div>

                        <div class="mt-3">
                            <div class="w-full flex-between-center gap-1">
                                <input type="number" name="berat" placeholder="Berat" autocomplete="off" class="berat-input w-full input-outline-primary px-4 py-1.5 rounded-md placeholder-primary">
                                <span class="border-[1px] border-primary bg-primary text-light rounded-md px-4 py-1.5">KG</span>
                            </div>
                            <span class="berat-error text-xs text-red-500 hidden"></span>
                        </div>

                        <div class="mt-3">
                            <input type="number" name="usia" placeholder="Usia" autocomplete="off" class="usia-input w-full input-outline-primary px-4 py-1.5 rounded-md placeholder-primary">
                            <span class="usia-error text-xs text-red-500 hidden"></span>
                        </div>

                        <div class="mt-3">
                            <input type="number" name="harga" placeholder="Harga" autocomplete="off" class="harga-input w-full input-outline-primary px-4 py-1.5 rounded-md placeholder-primary">
                            <span class="harga-error text-xs text-red-500 hidden"></span>
                        </div>

                        <div class="mt-4 w-full flex-justify">
                            <button class="button flex-center px-4 py-2.5 rounded-md">
                                <?= $this->include('components/loading/button'); ?>
                                <span>Tambah Hewan Ternak</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script src="/assets/js/popup.js"></script>
<script src="/assets/js/image-reader.js"></script>
<script>
    $(function() {
        const inputs = ['foto', 'nama_hewan', 'jenis_kelamin', 'jenis_ternak', 'jenis_hewan', 'berat', 'usia', 'harga']

        $('#form').on('submit', function(e) {
            inputs.map((val) => {
                $(`.${val}-input`).removeClass('input-error')
                $(`.${val}-input`).addClass('input-outline-primary')
                $(`.${val}-error`).addClass('hidden')
                $(`.${val}-error`).text('')
            })
            e.preventDefault()
            const formData = new FormData(e.target)

            $.ajax({
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
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data berhasil disimpan!',
                            timer: 2000
                        }).then(() => {
                            window.location.href = '<?= role_url('kandang/detail/' . $data['id_kandang_ternak']); ?>'
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
                                text: 'Data gagal disimpan!',
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