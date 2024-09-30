<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('/assets/css/style.css') ?>">
    <title>Detail Postingan Ternak</title>
    <?= $this->renderSection('style'); ?>
</head>

<body class="bg-gray-100 font-poppins flex justify-center items-center h-screen">
    <div class="max-w-md w-full bg-white shadow-lg overflow-y-auto h-screen">
        <header>
            <?= $this->include('components/header/navbar'); ?>
        </header>
        <main>
            <div class="container mx-auto p-4" id="main-content">
                <?= $this->include('components/judul'); ?>
                <?= $this->renderSection('show_detailternak'); ?>
                
            </div>
        </main>
        <footer>
            <?= $this->include('components/footer/footer'); ?>
        </footer>
        <?= $this->renderSection('script'); ?>

    </div>
    <script>
    // Set the title of the page to the h2 tag
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('page-title').textContent = document.title;
    });
    </script>
</body>

</html>