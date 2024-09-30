<form id="formOrderLayanan" method="post" enctype="multipart/form-data" class="w-full bg-primary text-light rounded-md p-6">
    <input type="hidden" name="id_layanan" value="<?= $id_layanan; ?>">

    <div class="w-full flex-between-center">
        <h1 class="text-xl font-semibold"><?= $title; ?></h1>

        <button>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <label for="image-reader" class="cursor-pointer">
        <div class="mt-4 border-[1px] border-light border-dashed p-2 rounded-md flex-center">
            <div>
                <div class="w-full flex-justify">
                    <img src="/assets/icons/upload.svg" class="size-14" id="image-reader-preview">
                </div>
                <h1 class="mt-1 font-normal text-xs text-center">Upload Gambar Kondisi Hewan Ternak<br>(Maks. 1Mb)</h1>
    
                <input type="file" name="foto" id="image-reader" hidden>
            </div>
        </div>
        <span class="foto-error text-xs text-red-500 hidden"></span>
    </label>

    <div class="mt-3">
        <textarea name="deskripsi" rows="8" placeholder="Tuliskan Kondisi dan gejala hewan ternak anda disini." class="deskripsi-input w-full outline-none resize-none p-3 bg-transparent rounded-md border-[1px] border-light placeholder-light"></textarea>
        <span class="deskripsi-error text-xs text-red-500 hidden"></span>
    </div>

    <div class="mt-2 w-full flex-between-center gap-3">
        <div class="w-full">
            <input type="date" name="tanggal" class="tanggal-input w-full outline-none bg-transparent border-[1px] border-light rounded-md px-4 py-2">
            <span class="tanggal-error text-xs text-red-500 hidden"></span>
        </div>

        <div class="w-full">
            <input type="time" name="waktu" class="waktu-input w-full outline-none bg-transparent border-[1px] border-light rounded-md px-4 py-2">
            <span class="waktu-error text-xs text-red-500 hidden"></span>
        </div>
    </div>

    <div class="mt-4 w-full flex-justify">
        <button class="button-success flex-center px-4 py-2 rounded-md">
            <?= $this->include('components/loading/button'); ?>
            <span>Pesan Sekarang</span>
        </button>
    </div>
</form>
<?= $this->section('script'); ?>
<script src="/assets/js/image-reader.js"></script>
<script>
    $(function() {
        const inputs = ['foto', 'deskripsi', 'tanggal', 'waktu']

        $('#formOrderLayanan').on('submit', function(e) {
            e.preventDefault()

            $(this).find('#loading').removeClass('hidden')

            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Geolocation tidak support pada perangkat anda!',
                    timer: 2000
                })
                $('#formOrderLayanan').find('#loading').addClass('hidden')
            }

            function showError(error){
                switch(error.code){
                case error.PERMISSION_DENIED:
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Akses harus di izinkan agar bisa mendeteksi lokasi anda!',
                        timer: 2000
                    })
                    break
                case error.POSITION_UNAVAILABLE:
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Informasi lokasi tidak tersedia. Coba aktifkan lokasi di perangkat anda!',
                        timer: 2000
                    })
                    break
                case error.TIMEOUT:
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Gagal mendapatkan lokasi. Coba periksa koneksi inernet anda!',
                        timer: 2000
                    })
                    break
                case error.UNKNOWN_ERROR:
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "Something wen't wrong. Gagal mengambil data lokasi!",
                        timer: 2000
                    })
                    break
                }
                $('#formOrderLayanan').find('#loading').addClass('hidden')
            }

            async function showPosition(position){
                const latitude = position.coords.latitude
                const longitude = position.coords.longitude
                const address = latitude + "," + longitude

                inputs.map((val) => {
                    $(`.${val}-input`).removeClass('input-error')
                    $(`.${val}-error`).addClass('hidden')
                    $(`.${val}-error`).text('')
                })
                const formData = new FormData(e.target)

                formData.set('address', address)

                await $.ajax({
                    url: `https://nominatim.openstreetmap.org/search?format=json&q=${latitude},${longitude}`,
                    dataType: 'json',
                    success: (response) => {
                        if ( response[0] && response[0].display_name ) {
                            const data = response[0].display_name.split(',')
                            formData.set('kecamatan', data[data.length - 6])
                        }
                    }
                })

                $.ajax({
                    url: '/peternak/order/layanan/' + <?= $id_layanan; ?>,
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: (response) => {
                        $('#formOrderLayanan').find('#loading').addClass('hidden')

                        if ( response?.status ) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Pesanan berhasil dibuat!',
                                timer: 2000
                            }).then(() => {
                                window.location.href = '<?= role_url('hewan/detail/' . $data['id_hewan']); ?>'
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
                                    text: 'Pesanan gagal dibuat!',
                                    timer: 2000
                                })
                            }
                        }
                    },
                    error: () => {
                        $('#formOrderLayanan').find('#loading').addClass('hidden')
                        
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: "Something wen't wrong!",
                            timer: 2000
                        })
                    }
                })
            }
        })
    })
</script>
<?= $this->endSection(); ?>