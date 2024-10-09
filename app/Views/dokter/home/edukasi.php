<!-- app/Views/dokter/home/edukasi.php -->

<?= $this->section('edukasi'); ?>
<!-- Education Section -->
<section class="bg-white p-6 mt-6 shadow-md rounded-lg" id="edukasi">
    <h2 class="text-2xl font-bold text-blue-500 text-center">Edukasi</h2>
    <div class="w-24 h-1 mx-auto mt-2 bg-green-500"></div>
    <p class="mt-4 text-blue-400 text-center">
        Menyediakan berbagai video youtube yang berfokus pada topik peternakan untuk memberikan pengetahuan dan wawasan
        tentng praktik terbaik dalam peternakan.
    </p>
    <!-- Added image below the paragraph -->
    <img src="<?= base_url('assets/images/Ilustrations.svg') ?>" alt="Tentang Kami Image"
        class="mt-4 mx-auto h-40 w-auto">
</section>
<?= $this->endSection(); ?>