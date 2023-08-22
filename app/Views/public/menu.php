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
        <link href="<?= base_url(); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom CSS Templates -->
        <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet" type="text/css" />

        <!-- Custom Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet" />

        <link rel="icon" type="image/png" href="<?= base_url(); ?>/img/icons/cup-hot-fill.svg" />

        <title>My Cafe</title> 
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="opacity: 0.85;">
            <div class="container">
                <!-- Navbar Title Bootstrap 5 -->
                <a class="navbar-brand" href="#">My Cafe</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Menu Bootstrap 5 -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <div class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About Us</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/menu" style="font-weight: bold;">Our Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">Contact Us</a>
                        </li>
                    </div>

                    <div class="navbar-extra">
                        <form class="form-inline">    
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Spacing Biar Ga Kepotong Navigation Bar -->
        <div class="nav-border-bottom container-fluid" style="height: 75px; background-color: black;">
        </div>

        <div class="container-fluid containerProduct" style="background-color: black; margin-top:10px;">
            <!-- Three columns of text below the carousel -->
            <h2 id="titleProduct"><b>Our Product<b></h2>
            <div id="rowProduct" class="row" style="justify-content: center; text-align:center; border-radius: 2px;">
            <?php foreach($products as $product) : ?>
            <div id="productCard" class="col-lg-3 col-md-3 col-sm-3 text-dark">
                <img id="productImage" src="<?= base_url(); ?>/img/uploads/<?=$product['product_image'];?>" class="img-fluid"/>
                <h3 id="productName"><?= $product['product_name']; ?></h3>
                <p id="productPrice"><?= "Rp. " . number_format($product['product_price'], 2, ',', '.'); ?></p>
                <!-- <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p> -->
            </div><!-- /.col-lg-4 -->
            <?php endforeach; ?>
            </div><!-- /.row -->
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>
</html>