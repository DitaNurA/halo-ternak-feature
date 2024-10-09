<!--views/dokter/jual_ternak/c_filter.php-->
<!-- Dropdown filter (awalnya tersembunyi) -->
<div id="filter-dropdown"
    class="block hidden rounded-xl mt-2 shadow-lg absolute w-auto mx-auto z-10 max-w-sm">
    <div class="mt-1 p-3 bg-primary bg-opacity-10 backdrop-blur-md rounded-lg text-center font-light">
        <!-- Filter untuk Jenis Hewan -->
        <div class="mb-4">
            <label class="block text-lg font-semibold mb-2">Jenis Hewan</label>
            <div class="relative">
                <button id="dropdown-hewan-btn" class="w-full text-left bg-blue-50 hover:bg-blue-200 p-3 rounded-md">
                    Pilih Hewan
                </button>
                <div id="dropdown-hewan-options" class="absolute w-full mt-1 shadow-lg rounded-lg hidden z-10">
                    <ul>
                        <li class="py-2 px-4 cursor-pointer bg-blue-50 hover:bg-blue-100" data-value="Sapi">Sapi</li>
                        <li class="py-2 px-4 cursor-pointer bg-blue-50 hover:bg-blue-100" data-value="Domba">Domba</li>
                        <li class="py-2 px-4 cursor-pointer bg-blue-50 hover:bg-blue-100" data-value="Kambing">Kambing</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Filter untuk Lokasi -->
        <div class="mb-4">
            <label class="block text-lg mb-2 font-semibold">Lokasi</label>
            <div class="relative">
                <button id="dropdown-lokasi-btn" class="w-full text-left bg-blue-50 hover:bg-blue-200 p-3 rounded-md">
                    Pilih Lokasi
                </button>
                <div id="dropdown-lokasi-options"
                    class="absolute w-full mt-1 bg-blue-50 shadow-lg rounded-lg hidden z-10">
                    <ul>
                        <li class="py-2 px-4 cursor-pointer bg-blue-50 hover:bg-blue-100" data-value="Kec. Montong">Kec. Montong
                        </li>
                        <li class="py-2 px-4 cursor-pointer bg-blue-50 hover:bg-blue-100" data-value="Kec. Merakurak">Kec.
                            Merakurak</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Filter untuk Harga -->
        <div class="mb-4">
            <label class="block text-lg mb-2 font-semibold">Harga</label>
            <div class="flex space-x-2">
                <input id="min-price" type="number" placeholder="Min" class="w-1/2 p-3 bg-blue-50 rounded-md">
                <input id="max-price" type="number" placeholder="Max" class="w-1/2 p-3 bg-blue-50 rounded-md">
            </div>
        </div>

        <!-- Tombol Terapkan -->
        <button id="apply-filters-btn" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg mt-4">
            Terapkan
        </button>
    </div>
</div>
<script>
    // Ambil elemen tombol dan dropdown
const filterButton = document.getElementById('filter');
const filterDropdown = document.getElementById('filter-dropdown');

// Tampilkan/sembunyikan dropdown filter ketika tombol "Filter" diklik
///////
// Ambil elemen tombol dan dropdown
const dropdownHewanBtn = document.getElementById('dropdown-hewan-btn');
const dropdownHewanOptions = document.getElementById('dropdown-hewan-options');
const dropdownLokasiBtn = document.getElementById('dropdown-lokasi-btn');
const dropdownLokasiOptions = document.getElementById('dropdown-lokasi-options');

// Tampilkan/sembunyikan dropdown filter utama ketika tombol "Filter" diklik
filterButton.addEventListener('click', () => {
  filterDropdown.classList.toggle('hidden');
     // Atur posisi dropdown tepat di bawah tombol
     filterDropdown.style.top = `${rect.bottom + window.scrollY}px`;
    filterDropdown.style.left = `${rect.left}px`;
    
    // Sesuaikan lebar dropdown dengan lebar tombol filter
   // filterDropdown.style.width = `${rect.width}px`;

  
});

// Tampilkan dropdown "Jenis Hewan" saat tombolnya diklik
dropdownHewanBtn.addEventListener('click', () => {
    dropdownHewanOptions.classList.toggle('hidden');
});

// Pilih opsi dalam dropdown "Jenis Hewan"
dropdownHewanOptions.querySelectorAll('li').forEach(option => {
    option.addEventListener('click', () => {
        // Dapatkan value dari opsi yang dipilih
        const selectedHewan = option.getAttribute('data-value');

        // Ubah teks tombol dropdown menjadi pilihan hewan yang dipilih
        dropdownHewanBtn.textContent = selectedHewan;

        // Sembunyikan dropdown setelah memilih
        dropdownHewanOptions.classList.add('hidden');
    });
});

// Tampilkan dropdown "Lokasi" saat tombolnya diklik
dropdownLokasiBtn.addEventListener('click', () => {
    dropdownLokasiOptions.classList.toggle('hidden');
});

// Pilih opsi dalam dropdown "Lokasi"
dropdownLokasiOptions.querySelectorAll('li').forEach(option => {
    option.addEventListener('click', () => {
        // Dapatkan value dari opsi yang dipilih
        const selectedLokasi = option.getAttribute('data-value');

        // Ubah teks tombol dropdown menjadi lokasi yang dipilih
        dropdownLokasiBtn.textContent = selectedLokasi;

        // Sembunyikan dropdown setelah memilih
        dropdownLokasiOptions.classList.add('hidden');
    });
});

// Menutup dropdown ketika klik di luar dropdown
document.addEventListener('click', function(event) {
    const isClickInsideHewan = dropdownHewanBtn.contains(event.target) || dropdownHewanOptions.contains(event
        .target);
    const isClickInsideLokasi = dropdownLokasiBtn.contains(event.target) || dropdownLokasiOptions.contains(event
        .target);

    if (!isClickInsideHewan) {
        dropdownHewanOptions.classList.add('hidden');
    }
    if (!isClickInsideLokasi) {
        dropdownLokasiOptions.classList.add('hidden');
    }
});
</script>