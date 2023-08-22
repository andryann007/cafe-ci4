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
                        <li class="nav-item active">
                            <a class="nav-link" href="/about" style="font-weight: bold;">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/menu">Our Menu</a>
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
        <div class="container-fluid" style="height: 75px; background-color: black;">
        </div>

        <div class="container-fluid" style="background-color: black;">
            <div id="rowAbout" class="row">
                <div class="col-md-6 col-sm-12">
                    <h2 id="titleAbout">What is My Cafe?</h2>
                    <p class="info">My Cafe is a space where you can relax, read a book, or hangout with your friends.<br>
                        My Cafe is also an exiting place to be, with live music, art shows, and other special events.<br>
                        Our Motto is to serving authentic coffee and food, made with fresh ingredients</p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img id="aboutUs" style="border-radius: 10px;" src="<?= base_url(); ?>/img/assets/background.jpg" class="img-fluid">
                </div>
            </div>
        </div>

        <hr class="divider">

        <div class="container-fluid">
            <div id="rowVision" class="row">
                <div class="col-lg-6 col-md-6">
                    <img id="ourVision" class="img-fluid" style="border-radius: 10px;" src="<?= base_url(); ?>/img/assets/vision.jpg"/>
                </div>
                <div class="col-lg-6 col-md-6">
                    <h2 id="titleVision"><span class="text-muted">Our</span> Vision</h2>
                    <p class="lead text-muted"><b>Our vision is to be the leading cafe in Indonesia by delivering customer satisfaction throught <span class="text-light">"providing best product quality, giving best services, & fullfill customer needs"</span></b></p>
                </div>
            </div>
        </div>

        <hr class="divider">

        <div class="container-fluid">
            <div id="rowMission" class="row">
                <div class="col-md-6 col-lg-6">
                    <h2 id="titleMission"><span class="text-muted">Our</span> Mission</h2>
                    <p class="lead text-muted"><b>Our mission is to serving our customers by <span class="text-light">providing the best products & services, even a customer request the most ridiculous request.</span></b></p>
                </div>
                <div class="col-md-6 col-lg-6">
                    <img id="ourMission" class="img-fluid" style="border-radius: 10px;" src="<?= base_url(); ?>/img/assets/mission.jpg"/>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>
</html>