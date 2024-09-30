<?= $this->section('style'); ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<?= $this->endSection(); ?>

<div class="p-6 border-[1px] border-primary rounded-xl relative overflow-hidden">
    <div class="absolute top-0 right-0 p-3 pl-6 pb-6 rounded-bl-full bg-primary">
        <a href="/peternak/kandang/edit/<?= $data['id_kandang_ternak']; ?>">
            <img src="/assets/icons/pencil.svg" class="size-5">
        </a>
    </div>

    <div>
        <h1 class="text-2xl font-medium">Kandang Ternak</h1>
        <div class="mt-3 w-64 h-[1px] bg-primary"></div>
    </div>

    <form action="" method="post" class="mt-4">
        <div class="w-full flex-justify">
            <div class="relative">
                <img src="/assets/<?= $data['foto'] ? 'images/kandang/' . $data['foto'] : 'icons/kandang-ternak.svg'; ?>" alt="<?= $data['nama_kandang']; ?>" class="size-28 rounded-full border-[1px] border-primary">
            </div>
        </div>

        <div class="mt-6">
            <div class="w-full bg-primary px-4 py-1.5 rounded-md">
                <h1 class="text-light"><?= $data['nama_kandang']; ?></h1>
            </div>

            <div class="mt-3 w-full grid grid-cols-[1.5fr__1fr] gap-2 items-center">
                <div class="w-full bg-primary px-4 py-1.5 rounded-md">
                    <h1 class="text-light"><?= $data['total_ternak']; ?> Ekor</h1>
                </div>
                <div class="w-full bg-primary px-4 py-1.5 rounded-md">
                    <h1 class="text-light"><?= $data['nama_hewan']; ?></h1>
                </div>
            </div>

            <div class="mt-3 w-full bg-primary px-4 py-1.5 rounded-md">
                <h1 class="text-light"><?= $data['kecamatan']; ?></h1>
            </div>

            <!-- <div class="mt-3 w-full bg-primary px-4 py-1.5 rounded-md">
                <h1 class="text-light"><?= $data['kelurahan']; ?></h1>
            </div> -->

            <div class="mt-3 w-full bg-primary px-4 py-1.5 rounded-md">
                <h1 class="text-light"><?= $data['alamat_lengkap']; ?></h1>
            </div>

            <div class="mt-3 w-full rounded-md border-[1px] border-primary overflow-hidden">
                <div id="map" style="width: 100%;height: 200px;"></div>
            </div>

            <div class="mt-4 w-full flex-justify">
                <div class="bg-primary text-light px-4 py-1.5 rounded-md">Kapasitas kandang <?= $data['kapasitas']; ?> Ekor</div>
            </div>

            <div class="mt-2 w-full flex-justify">
                <button type="button" class="popup-btn bg-[#797979] text-light px-4 py-1.5 rounded-md" data-target="popup-delete-kandang-<?= $data['id_kandang_ternak']; ?>">Hapus Kandang</button>
            </div>

            <?= view('components/modal/peternak/delete-kandang', ['data' => $data]); ?>
        </div>
    </form>
</div>

<?= $this->section('script'); ?>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    $(function() {
        const latitude = '<?= explode(',', $data['ip_alamat'])[0]; ?>'
        const longitude = '<?= explode(',', $data['ip_alamat'])[1]; ?>'
        var map = L.map('map').setView({ lat : latitude, lon : longitude }, 13)
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map)
        
        L.marker({lat: latitude, lon: longitude}).bindPopup('Lokasi kandang ternak').addTo(map)
    })
</script>
<?= $this->endSection(); ?>