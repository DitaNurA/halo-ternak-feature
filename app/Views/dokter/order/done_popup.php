<div class="min-h-screen flex flex-col justify-center items-center bg-gray-100 relative overflow-hidden">
    <!-- Background Confetti -->
    <canvas id="confetti-canvas" class="absolute inset-0 pointer-events-none"></canvas>

    <div class="text-center mb-20 relative z-10">
        <!-- Icon Sukses -->
        <div class="flex justify-center items-center mb-6">
            <div class="w-20 h-20 flex justify-center items-center border-4 border-blue-500 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10 text-blue-500">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>
        <!-- Judul -->
        <h2 class="text-2xl font-bold text-blue-500 mb-4">Layanan Selesai</h2>
        <!-- Pesan -->
        <p class="text-blue-500 mb-6">Terima kasih telah menggunakan layanan kami hari ini. Kami sangat menghargai Anda!</p>
        <!-- Button -->
        <a href="/home" class="border border-blue-500 text-blue-500 py-2 px-6 rounded-lg hover:bg-blue-100 transition duration-300">
            Kembali ke Beranda
        </a>
    </div>
</div>

<!-- Load the canvas-confetti library -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.3.3/dist/confetti.browser.min.js"></script>
<script>
    // Ensure the confetti library is loaded before using it
    window.addEventListener('load', function () {
        // Get the canvas element
        const confettiCanvas = document.getElementById('confetti-canvas');

        // Set the canvas to full screen
        confettiCanvas.width = window.innerWidth;
        confettiCanvas.height = window.innerHeight;

        // Create confetti instance
        const confettiBackground = confetti.create(confettiCanvas, {
            resize: true, // Will resize to fit the canvas
            useWorker: true, // Speed up rendering using web workers
        });

        // Confetti effect (loop)
        function runConfetti() {
            confettiBackground({
                particleCount: 6,
                spread: 80,
                origin: { x: Math.random(), y: Math.random() - 0.2 }
            });
            requestAnimationFrame(runConfetti);
        }

        // Start the animation
        runConfetti();
    });
</script>
