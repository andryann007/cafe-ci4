<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Halaman Utama Untuk Public" />
    <meta name="author" content="Andryan" />

    <!-- Fontawesome Templates -->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap 5 Templates -->
    <link href="<?= base_url(); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS Templates -->
    <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet" type="text/css" />

    <!-- Core JavaScript-->
    <script src="<?= base_url(); ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery.easing.min.js"></script>

    <link rel="icon" type="image/png" href="<?= base_url(); ?>/img/icons/cup-hot-fill.svg" />

    <title>My Cafe</title>
</head>

<body>
    <?= $this->include("layout/navbar"); ?>
    <?= $this->renderSection('content'); ?>
</body>

</html>