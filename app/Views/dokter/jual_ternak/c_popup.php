<!--views/dokter/jual_ternak/c_popup.php-->
<!-- Popup Modal (Ini bisa berada di header/footer atau file terpisah lainnya) -->
<div id="popupModal" class="absolute inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg relative w-80 text-center">
        <button id="closeModal" class="absolute top-2 right-2 text-blue-500 text-xl font-bold">&times;</button>
        <img id="ternak-gambar" src="path_to_detail_image" alt="Detail Ternak" class="mx-auto h-28">
        <h2 id="ternak-nama" class="text-lg font-bold">Nama Ternak</h2>
        <p id="ternak-harga" class="text-gray-500">Rp. 0,00</p>
        <p id="ternak-lokasi" class="text-gray-500">Lokasi</p>
          <!-- Informasi Ternak -->
          <div class="grid grid-cols-2 gap-2 mt-4 text-left">
            <div>
                <p class="text-sm text-gray-600">Hewan Ternak</p>
                <p class="text-sm font-bold">Domba</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Jenis Spesifik</p>
                <p class="text-sm font-bold">PE</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Jenis Kelamin</p>
                <p class="text-sm font-bold">Jantan</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Umur Ternak</p>
                <p class="text-sm font-bold">2 Tahun</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Berat Ternak</p>
                <p class="text-sm font-bold">70Kg</p>
            </div>
            <div>
    <p class="text-sm text-gray-600">Riwayat Ternak</p>
    <select id="riwayat-ternak" class="border rounded-lg p-1 w-full text-sm">
        <option value="sakit">Ternak Sakit</option>
        <option value="tidak sakit">Ternak Tidak Sakit</option>
    </select>
</div>
        </div>
        
        <!-- Deskripsi -->
        <div class="text-left mt-4">
            <p class="text-sm font-bold">Deskripsi</p>
            <p class="text-sm text-gray-600">Temukan domba premium kami, sempurna untuk meningkatkan kualitas ternak Anda dengan hewan yang sehat dan kuat...</p>
        </div>
        
        <!-- Tombol Chat Penjual -->
        <button class="bg-green-500 text-white p-2 mt-4 rounded-full w-full flex items-center justify-center">
            <i class="fas fa-comments mr-2"></i> Chat Penjual
        </button>
    </div>
</div>