<div class="p-4" id="edukasi">
    <h1 class="text-2xl font-medium text-center">Edukasi</h1>
    <div class="w-full flex-justify">
        <div class="mt-2 w-[73px] h-0.5 bg-success"></div>
    </div>

    <div class="px-4">
        <p class="mt-3 text-base text-center">Menyediakan berbagai video YouTube yang berfokus pada topik peternakan untuk memberikan pengetahuan dan wawasan tentang praktik terbaik dalam peternakan</p>
    </div>

    <!-- Slider -->
     <div class="mt-4 relative flex-items">
            <!-- Prev Arrow -->
            <button class="prev-arrow absolute left-4 z-[1]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="size-8 text-success">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </button>
            <!-- End Prev Arrow -->

         <div class="w-full edukasi-slider">
            <img src="/assets/images/dummy/edukasi.png" alt="" class="w-full">
            <img src="/assets/images/dummy/edukasi.png" alt="" class="w-full">
            <img src="/assets/images/dummy/edukasi.png" alt="" class="w-full">
            <img src="/assets/images/dummy/edukasi.png" alt="" class="w-full">
            <img src="/assets/images/dummy/edukasi.png" alt="" class="w-full">
         </div>

         <!-- Next Arrow -->
         <button class="next-arrow absolute right-4 z-[1]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-8 text-success">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
            </svg>
         </button>
         <!-- End Next Arrow -->
     </div>
     <!-- End Slider -->
</div>

<?= $this->section('script'); ?>
    <script src="/assets/js/slick.min.js"></script>
    <script>
        $(function() {
            $('.edukasi-slider').slick({
                centerMode: true,
                centerPadding: '60px',
                slidesToShow: 1,
                prevArrow: $('.prev-arrow'),
                nextArrow: $('.next-arrow')
            })
        })
    </script>
<?= $this->endSection(); ?>