<!-- app/Views/dokter/home/home.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('/assets/css/style.css') ?>">
    <?= $this->renderSection('style'); ?>
    <script src="<?=base_url('/assets/js/jquery.min.js') ?>"></script>
</head>

<body class="bg-gray-100 font-poppins flex justify-center items-center h-screen">
    <div class="max-w-md w-full bg-white shadow-lg overflow-y-auto h-screen">

        <header class="">
            <?= $this->include('dokter/dokter_components/header/navbar'); ?>
        </header>
        <main>
            <div>
                <?= $this->renderSection('landingpage'); ?>
                <?= $this->renderSection('tentangkami'); ?>
                <?= $this->renderSection('fitur'); ?>
                <?= $this->renderSection('edukasi'); ?>
            </div>
        </main>
        <footer>
            <?= $this->include('dokter/dokter_components/footer/footer'); ?>
        </footer>
        <?= $this->renderSection('script'); ?>

    </div>
</body>

</html>