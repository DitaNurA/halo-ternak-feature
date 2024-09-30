<?= $this->extend('layouts/main'); ?>
<?= $this->section('style'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>

    <div class="p-4">
        <?= $this->include('components/peternak/profile-card.php'); ?>

        <div class="mt-4">
            <div class="p-6 border-[1px] border-primary bg-primary bg-opacity-20 rounded-xl relative overflow-hidden">
                <div class="absolute top-3 right-3">
                    <a href="/peternak">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </a>
                </div>

                <div>
                    <h1 class="text-2xl font-medium">Tambah Kandang Ternak</h1>
                    <div class="mt-3 w-64 h-[1px] bg-success"></div>
                </div>

                <form action="" method="post" enctype="multipart/form-data" class="mt-4">
                    <div class="w-full flex-justify">
                        <div>
                            <div class="relative">
                                <img src="/assets/icons/kandang-ternak.svg" alt="" id="image-reader-preview" class="size-28 rounded-full border-[1px] border-primary">
                                <label for="image-reader" class="absolute -right-1 -bottom-1 cursor-pointer">
                                <div class="p-3 rounded-full bg-primary">
                                    <img src="/assets/icons/pencil.svg" class="size-4">
                                </div>
                                </label>
                                <input type="file" name="foto_kandang" id="image-reader" hidden>
                            </div>
                            <div class="mt-1">
                                <?php if ( session()->has('foto_kandang') ) { ?>
                                    <span class="text-xs text-red-500"><?= session()->get('foto_kandang'); ?></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <div>
                            <input type="text" name="nama_kandang" placeholder="Nama Kandang" autocomplete="off" class="<?= session()->has('nama_kandang') ? 'input-error' : 'input-outline-primary'; ?> w-full px-4 py-1.5 rounded-md placeholder-primary" value="<?= old('nama_kandang'); ?>">
                            <?php if ( session()->has('nama_kandang') ) { ?>
                                <span class="text-xs text-red-500"><?= session()->get('nama_kandang'); ?></span>
                            <?php } ?>
                        </div>

                        <div class="mt-3 w-full grid grid-cols-[1.5fr__1fr] gap-2 items-center">
                            <div>
                                <input type="text" name="kapasitas_kandang" placeholder="Kapasitas Kandang" autocomplete="off" class="<?= session()->has('kapasitas_kandang') ? 'input-error' : 'input-outline-primary'; ?> w-full px-4 py-1.5 rounded-md placeholder-primary">
                                <?php if ( session()->has('kapasitas_kandang') ) { ?>
                                    <span class="text-xs text-red-500"><?= session()->get('kapasitas_kandang'); ?></span>
                                <?php } ?>
                            </div>

                            <div>
                                <select name="id_ternak" class="<?= session()->has('id_ternak') ? 'input-error' : 'input-outline-primary'; ?> w-full px-4 py-1.5 rounded-md placeholder-primary">
                                    <option disabled selected>Pilih Ternak</option>
                                    <?php if ( count($ternak) ) { ?>
                                    <?php foreach($ternak as $row) { ?>
                                        <option value="<?= $row['nama_hewan']; ?>" <?= old('id_ternak') == $row['id_ternak'] ? 'selected' : '' ?>><?= $row['nama_hewan']; ?></option>
                                    <?php }} else { ?>
                                        <option disabled>ternak tidak ditemukan.</option>
                                    <?php } ?>
                                </select>
                                <?php if ( session()->has('id_ternak') ) { ?>
                                    <span class="text-xs text-red-500"><?= session()->get('id_ternak'); ?></span>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="mt-3">
                            <input type="text" name="kecamatan" placeholder="Lokasi Kecamatan Kandang" autocomplete="off" class="<?= session()->has('kecamatan') ? 'input-error' : 'input-outline-primary'; ?> w-full px-4 py-1.5 rounded-md placeholder-primary" value="<?= old('kecamatan'); ?>">
                            <?php if ( session()->has('kecamatan') ) { ?>
                                <span class="text-xs text-red-500"><?= session()->get('kecamatan'); ?></span>
                            <?php } ?>
                        </div>

                        <div class="mt-3">
                            <input type="text" name="kelurahan" placeholder="Lokasi Kelurahan Kandang" autocomplete="off" class="<?= session()->has('kelurahan') ? 'input-error' : 'input-outline-primary'; ?> w-full px-4 py-1.5 rounded-md placeholder-primary" value="<?= old('kelurahan'); ?>">
                            <?php if ( session()->has('kelurahan') ) { ?>
                                <span class="text-xs text-red-500"><?= session()->get('kelurahan'); ?></span>
                            <?php } ?>
                        </div>

                        <div class="mt-3">
                            <input type="text" name="alamat_lengkap" placeholder="Alamat Lengkap Kandang" autocomplete="off" class="<?= session()->has('alamat_lengkap') ? 'input-error' : 'input-outline-primary'; ?> w-full px-4 py-1.5 rounded-md placeholder-primary" value="<?= old('alamat_lengkap'); ?>">
                            <?php if ( session()->has('alamat_lengkap') ) { ?>
                                <span class="text-xs text-red-500"><?= session()->get('alamat_lengkap'); ?></span>
                            <?php } ?>
                        </div>

                        <div class="mt-3">
                            <div class="w-full rounded-md border-[1px] border-primary overflow-hidden">
                                <input type="hidden" name="ip_alamat" id="ipAlamat">
                                <div id="map" style="width: 100%;height: 200px;"></div>
                            </div>
                            <?php if ( session()->has('ip_alamat') ) { ?>
                                <span class="text-xs text-red-500"><?= session()->get('ip_alamat'); ?></span>
                            <?php } ?>

                        </div>

                        <div class="mt-4 w-full flex-justify">
                            <button class="button px-4 py-2.5 rounded-md">Tambahkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
<?= $this->section('script'); ?>
    <script src="/assets/js/image-reader.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>

    <script>
        function initialize() {
            const propertiPeta = {
                center:new google.maps.LatLng(-8.5830695,116.3202515),
                zoom:9,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            }
            
            const peta = new google.maps.Map(document.getElementById("map"), propertiPeta)
            
            // membuat Marker
            const marker=new google.maps.Marker({
                position: new google.maps.LatLng(-8.5830695,116.3202515),
                map: peta
            })
        }
        google.maps.event.addDomListener(window, 'load', initialize)
    </script>
<?= $this->endSection(); ?>