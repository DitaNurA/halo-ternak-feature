<?= $this->extend('layouts/main'); ?>

<?= $this->section('style'); ?>
    <link rel="stylesheet" href="/assets/css/slick.css">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

 <!-- Hero -->
 <?= $this->include('components/landing-page/hero'); ?>
 <!-- End Hero -->

 <!-- Tentang Kami -->
 <?= $this->include('components/landing-page/tentang-kami'); ?>
 <!-- End Tentang Kami -->

 <!-- Mengapa Harus Halo Ternak -->
 <?= $this->include('components/landing-page/mengapa'); ?>
 <!-- End Mengapa Harus Halo Ternak -->

 <!-- Fitur -->
  <?= $this->include('components/landing-page/fitur'); ?>
  <!-- End Fitur -->

  <!-- Peta Ternak -->
   <?= $this->include('components/landing-page/peta-ternak'); ?>
  <!-- End Peta Ternak -->

  <!-- Edukasi -->
   <?= $this->include('components/landing-page/edukasi'); ?>
  <!-- End Edukasi -->

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
  <script src="/assets/js/jquery.easing.min.js"></script>

  <script>
    $(function() {
      $('.nav-link').on('click', function(e) {
        e.preventDefault()
        const href = $(this).attr('href').replace('/', '')

        $('html, body').animate({
          scrollTop: $(href).offset().top
        }, 700, 'easeInOutExpo')
      })
    })
  </script>
<?= $this->endSection(); ?>