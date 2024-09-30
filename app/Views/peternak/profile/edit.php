<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

    <div class="p-4">
        <div class="p-6 border-[1px] border-primary bg-primary bg-opacity-20 rounded-xl relative overflow-hidden">
            <div class="absolute top-3 right-3">
                <a href="/peternak">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>

            <div>
                <h1 class="text-2xl font-medium">Ubah Profil</h1>
                <div class="mt-3 w-64 h-[1px] bg-success"></div>
            </div>

            <form id="form" method="post" enctype="multipart/form-data" class="w-full mt-4 flex gap-5">
                <div>
                    <div class="size-24 relative">
                        <img src="/assets/images/<?= $user['foto'] ? 'user/' . $user['foto'] : 'dummy/profil.png'; ?>" alt="" id="image-reader-preview" class="image-profile w-full h-full object-cover object-center rounded-full border-[1px] border-primary">
                        <label for="image-reader" class="absolute -right-1 -bottom-1 cursor-pointer">
                            <div class="p-3 rounded-full bg-primary">
                                <img src="/assets/icons/pencil.svg" class="size-4">
                            </div>
                        </label>
                        <input type="file" name="foto" id="image-reader" hidden>
                    </div>
                    <span class="foto-error text-xs text-red-500 hidden"></span>
                </div>

                <div class="w-full">
                    <div>
                        <input type="text" class="nama-input w-full outline-none bg-light border-[1px] border-primary rounded-md px-6 py-1 placeholder-primary" name="nama" placeholder="Nama Lengkap" value="<?= $user['nama']; ?>" autocomplete="off">
                        <span class="nama-error text-xs text-red-500 hidden"></span>
                    </div>

                    <div>
                        <input class="alamat-input mt-4 w-full outline-none bg-light border-[1px] border-primary rounded-md px-6 py-1 placeholder-primary" name="alamat" placeholder="Alamat" value="<?= $user['alamat']; ?>" autocomplete="off">
                        <span class="alamat-error text-xs text-red-500 hidden"></span>
                    </div>

                    <div>
                        <input type="text" class="no_wa-input mt-4 w-full outline-none border-[1px] bg-light border-primary rounded-md px-6 py-1 placeholder-primary" name="no_wa" placeholder="No. WA" value="<?= $user['no_wa']; ?>" autocomplete="off">
                        <span class="no_wa-error text-xs text-red-500 hidden"></span>
                    </div>

                    <div class="mt-4 px-4">
                        <button type="submit" class="button-submit button flex-center px-4 py-1.5 rounded-md">
                            <?= $this->include('components/loading/button'); ?>
                            <span>Simpan</span>
                        </button>
                    </div>

                    <div class="mt-2">
                        <a href="/forgot-password" class="underline text-xs">Lupa kata sandi?</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <?= view('components/peternak/kandang-ternak'); ?>
        </div>
    </div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
    <script src="/assets/js/image-reader.js"></script>
    <script>
        $(function() {
            const inputs = ['nama', 'alamat', 'no_wa']

            $('#form').on('submit', function(e) {
                inputs.map((val) => {
                    $(`.${val}-input`).removeClass('input-error')
                    $(`.${val}-error`).addClass('hidden')
                    $(`.${val}-error`).text('')
                })
                e.preventDefault()
                const formData = new FormData(e.target)

                $.ajax({
                    url: '/profil/edit',
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    beforeSend: () => {
                        $('.button-submit').find('#loading').removeClass('hidden')
                    },
                    success: (response) => {
                        $('.button-submit').find('#loading').addClass('hidden')

                        if ( response?.status ) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Data berhasil disimpan!',
                                timer: 2000
                            }).then(() => {
                                window.location.href = '<?= role_url(); ?>'
                            })
                        } else {
                            if ( response?.errors ) {
                                Object.keys(response.errors).map((value) => {
                                    $(`.${value}-input`).addClass('input-error')
                                    $(`.${value}-error`).removeClass('hidden')
                                    $(`.${value}-error`).text(response.errors[value])
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
                    error: (e) => {
                        $('.button-submit').find('#loading').addClass('hidden')

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