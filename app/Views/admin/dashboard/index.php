<!-- app/Views/admin/dashboard/dashboard.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('/assets/css/style.css') ?>">
    <?= $this->renderSection('style'); ?>
</head>

<body class="bg-gray-100 font-poppins flex justify-center items-center h-screen">
    <div class="max-w-md w-full bg-white shadow-lg overflow-y-auto h-screen">

        <header>
            <?= $this->include('admin/components/header/navbar'); ?>
        </header>
        <main>
            <div class="container mx-auto p-4 mt-8">
                <?= $this->renderSection('hiadmin'); ?>
                <?= $this->renderSection('overview'); ?>
                <?= $this->renderSection('stats'); ?>
            </div>
        </main>
        <footer>
                <?php if ( !isset($hideFooter) ) { ?>
                    <?= $this->include('admin/components/footer/footer'); ?>
                <?php } ?>
            </footer>

    </div>
</body>

</html>