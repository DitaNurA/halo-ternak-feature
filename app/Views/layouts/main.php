<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="/assets/css/style.css">
    <?= $this->renderSection('style'); ?>

    <script src="/assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="/assets/js/sweetalert.min.js"></script> -->

    <title><?= config('App')->app_name; ?></title>
</head>
<body class="bg-secondary">

    <div class="w-full flex-justify h-full min-h-screen">
        <div class="mobile-responsive bg-light w-full min-h-screen relative">
    
            <header>
                <?php if ( !isset($hideNavbar) ) { ?>
                    <?= $this->include('components/header/navbar'); ?>
                <?php } ?>
            </header>
    
            <main class="<?= !isset($hideNavbar) ? 'pt-20' : ''; ?> <?= !isset($hideFooter) ? 'pb-48' : ''; ?>">
                <?= $this->renderSection('content'); ?>
            </main>
    
            <footer>
                <?php if ( !isset($hideFooter) ) { ?>
                    <?= $this->include('components/footer/footer'); ?>
                <?php } ?>
            </footer>
    
        </div>
    </div>

    <!-- Alert -->
     <?php if ( session()->has('success') ) { ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '<?= session()->get('success'); ?>',
                timer: 2000
            })
        </script>
    <?php } ?>

     <?php if ( session()->has('error') ) { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '<?= session()->get('error'); ?>',
                timer: 2000
            })
        </script>
    <?php } ?>
     <!-- End Alert -->
    
    <?= $this->renderSection('script'); ?>
</body>
</html>