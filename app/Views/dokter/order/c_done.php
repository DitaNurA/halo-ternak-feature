<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('/assets/css/style.css') ?>">
    <title>Layanan Selesai</title>
</head>

<body class="bg-gray-100 font-poppins flex justify-center items-center h-screen">
    <div class="max-w-md w-full bg-white shadow-lg overflow-y-auto h-screen">

        <header>
        </header>
        <main>
            <div class="container mx-auto p-4">
                <?= $this->include('dokter/order/done_popup'); ?>
            </div>
        </main>
        <footer>
        </footer>
    </div>
</body>

</html>