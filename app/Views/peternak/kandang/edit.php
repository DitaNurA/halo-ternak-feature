<?= $this->extend('layouts/main'); ?>
<?= $this->section('style'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>

    <div class="p-4">
        <button onclick="window.history.go(-1)" class="cursor-pointer">
            <img src="/assets/icons/arrow-back.svg" alt="Back" class="size-6">
        </button>

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
                    <h1 class="text-2xl font-medium">Ubah Kandang Ternak</h1>
                    <div class="mt-3 w-64 h-[1px] bg-success"></div>
                </div>
    
                <form id="form" method="post" class="mt-4">
                    <div class="w-full flex-justify">
                        <div>
                            <div class="relative">
                                <img src="/assets/<?= $data['foto'] ? 'images/kandang/' . $data['foto'] : 'icons/kandang-ternak.svg'; ?>" alt="<?= $data['nama_kandang']; ?>" id="image-reader-preview" class="size-28 rounded-full border-[1px] border-primary">
                                <label for="image-reader" class="absolute -right-1 -bottom-1 cursor-pointer">
                                <div class="p-3 rounded-full bg-primary">
                                    <img src="/assets/icons/pencil.svg" class="size-4">
                                </div>
                                </label>
                                <input type="file" class="foto_kandang-input" name="foto_kandang" id="image-reader" hidden>
                            </div>
                            <div class="mt-1">
                                <span class="foto_kandang-error text-xs text-red-500 hidden"></span>
                            </div>
                        </div>
                    </div>
    
                    <div class="mt-6">
                        <div>
                            <input type="text" name="nama_kandang" placeholder="Nama Kandang" autocomplete="off" class="nama_kandang-input w-full input-outline-primary px-4 py-1.5 rounded-md placeholder-primary" value="<?= $data['nama_kandang']; ?>">
                            <span class="nama_kandang-error text-xs text-red-500 hidden"></span>
                        </div>

                        <div class="mt-3 w-full grid grid-cols-[1.5fr__1fr] gap-2 items-center">
                            <div>
                                <input type="text" name="kapasitas_kandang" placeholder="Kapasitas Kandang" autocomplete="off" class="kapasitas-input input-outline-primary w-full px-4 py-1.5 rounded-md placeholder-primary" value="<?= $data['kapasitas']; ?>">
                                <span class="kapasitas-error text-xs text-red-500 hidden"></span>
                            </div>

                            <div>
                                <select name="id_ternak" class="id_ternak-input input-outline-primary w-full px-4 py-1.5 rounded-md placeholder-primary">
                                    <option disabled selected>Pilih Ternak</option>
                                    <?php if ( count($ternak) ) { ?>
                                    <?php foreach($ternak as $row) { ?>
                                        <option value="<?= $row['id_ternak']; ?>" <?= $data['id_ternak'] == $row['id_ternak'] ? 'selected' : ''; ?>><?= $row['nama_hewan']; ?></option>
                                    <?php }} else { ?>
                                        <option disabled>ternak tidak ditemukan.</option>
                                    <?php } ?>
                                </select>
                                <span class="id_ternak-error text-xs text-red-500"></span>
                            </div>
                        </div>
    
                        <div class="mt-3">
                            <input type="text" name="kecamatan" placeholder="Lokasi Kecamatan Kandang" autocomplete="off" class="kecamatan-input w-full input-outline-primary px-4 py-1.5 rounded-md placeholder-primary" value="<?= $data['kecamatan']; ?>">
                            <span class="kecamatan-error text-xs text-red-500 hidden"></span>
                        </div>
    
                        <!-- <div class="mt-3">
                            <input type="text" name="kelurahan" placeholder="Lokasi Kelurahan Kandang" autocomplete="off" class="w-full input-outline-primary px-4 py-1.5 rounded-md placeholder-primary">
                        </div> -->
    
                        <div class="mt-3">
                            <input type="text" name="alamat_lengkap" placeholder="Alamat Lengkap Kandang" autocomplete="off" class="alamat_lengkap-input w-full input-outline-primary px-4 py-1.5 rounded-md placeholder-primary" value="<?= $data['alamat_lengkap']; ?>" readonly>
                            <span class="alamat_lengkap-error text-xs text-red-500 hidden"></span>
                        </div>
    
                        <div class="mt-3">
                            <div class="w-full rounded-md border-[1px] border-primary overflow-hidden">
                                <input type="hidden" name="ip_alamat" id="ipAlamat" class="ip_alamat-input" value="<?= $data['ip_alamat']; ?>">
                                <div id="map" style="width: 100%;height: 200px;"></div>
                            </div>
                            <span class="ip_alamat-error text-xs text-red-500 hidden"></span>
                        </div>
    
                        <div class="mt-4 w-full flex-justify">
                            <button class="button-submit flex-center button px-4 py-2.5 rounded-md">
                                <?= $this->include('components/loading/button'); ?>
                                <span>Simpan</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-4">
            <?= $this->include('components/peternak/hewan-ternak'); ?>
        </div>
    </div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
    <script src="/assets/js/image-reader.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script>
        const lat = '<?= explode(',', $data['ip_alamat'])[0]; ?>'
        const lon = '<?= explode(',', $data['ip_alamat'])[1]; ?>'
        let marker

        $(function() {
            const inputs = ['foto_kandang', 'nama_kandang', 'kapasitas_kandang', 'id_ternak', 'kecamatan', 'alamat_lengkap', 'ip_alamat']

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
                                    $(`.${value}-input`).removeClass('input-outline-primary')
                                    $(`.${value}-error`).removeClass('hidden')
                                    $(`.${value}-error`).text(response?.errors[value])
                                })
                            }
                        }
                    },
                    error: () => {
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

    <script src="/assets/js/leaflet.js"></script>
    <script>
        marker = L.marker({lat: lat, lon: lon}).bindPopup('Lokasi kandang ternak').addTo(map)
    </script>
<?= $this->endSection(); ?>