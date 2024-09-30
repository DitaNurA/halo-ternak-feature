<button class="popup-btn bg-primary p-3 rounded-2xl fixed bottom-4 right-4 z-[52]" data-target="kotak-saran-popup">
    <img src="/assets/icons/kotak-saran.svg" class="size-8">
</button>

<?= $this->include('components/modal/kotak-saran'); ?>

<?= $this->section('script'); ?>
    <script src="/assets/js/popup.js"></script>
<?= $this->endSection(); ?>