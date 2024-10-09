<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('/assets/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>Ternak</title>
</head>

<body class="bg-gray-100 font-poppins flex justify-center items-center h-screen">
    <div class="max-w-md w-full bg-white shadow-lg overflow-y-auto h-screen">

        <header>
            <?= $this->include('dokter/dokter_components/header/navbar'); ?>
        </header>
        <main>
            <div class="container mx-auto p-4">
                <?= $this->include('components/judul'); ?>
                <?= $this->renderSection('c_list'); ?>
                <?= $this->include('components/pagination/pageslide'); ?>
            </div>
        </main>
        <footer>
            <?= $this->include('components/footer/footer'); ?>
        </footer>

    </div>
    <script>
    // Set the title of the page to the h2 tag
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('page-title').textContent = document.title;
    });
    </script>
</body>

</html>