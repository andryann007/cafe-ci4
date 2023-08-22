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
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="/home" style="font-weight: bold;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About Us</a>
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

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
    
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?= base_url(); ?>/img/assets/background.jpg" style="background:#777; color:#777; height:100%;"/>
              <div class="container">
                <div class="carousel-caption">
                  <h1 class="carouselTitle">Welcome to My Cafe</h1>
                </div>
              </div>
            </div>
            
            <div class="carousel-item">
              <img src="<?= base_url(); ?>/img/assets/about-2.jpg" style="background:#777; color:#777; height:100%;"/>
              <div class="container">
                <div class="carousel-caption">
                  <h1 class="carouselTitle">About Us</h1>
                  <p class="carouselNote">My Cafe is a space where you can relax, read a book, or hangout with your friends.</p>
                  <p><a class="btn btn-lg btn-md btn-sm btn-dark" href="/about">Learn more</a></p>
                </div>
              </div>
            </div>
        
            <div class="carousel-item">
              <img src="<?= base_url(); ?>/img/assets/about-3.jpg" style="background:#777; color:#777; height:100%;"/>
              <div class="container">
                <div class="carousel-caption">
                  <h1 class="carouselTitle">Our Menu</h1>
                  <p class="carouselNote">We're serving authentic coffee and food, made with fresh ingredients.</p>
                  <p><a class="btn btn-lg btn-md btn-sm btn-dark" href="/menu">Browse our menu</a></p>
                </div>
              </div>
            </div>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>

          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <div class="container-fluid" style="background-color: black;">
            <div id="rowAbout" class="row">
                <div class="col-md-6 col-sm-12">
                    <h2 id="titleAbout">What is My Cafe?</h2>
                    <p class="info">My Cafe is a space where you can relax, read a book, or hangout with your friends.<br>
                        My Cafe is also an exiting place to be, with live music, art shows, and other special events.<br>
                        Our Motto is to serving authentic coffee and food, made with fresh ingredients</p>
                    <p class="info" id="aboutDetail"><a href="/about" class="info-link">Info detail <i class="fa fa-angle-double-right"></i></a></p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img id="aboutUs" style="border-radius: 10px;" src="<?= base_url(); ?>/img/assets/background.jpg" class="img-fluid">
                </div>
            </div>
        </div>

        <hr class="divider">

        <div class="container-fluid containerProduct" style="background-color: black;">
            <!-- Three columns of text below the carousel -->
            <h2 id="titleProduct"><b>Our Product<b></h2>
            <div id="rowProduct" class="row" style="justify-content: center; text-align:center; border-radius: 2px;">
            <?php foreach($products as $product) : ?>
            <div id="productCard" class="col-lg-3 col-md-3 col-sm-6 text-dark">
                <img id="productImage" src="<?= base_url(); ?>/img/uploads/<?=$product['product_image'];?>" class="img-fluid"/>
                <h3 id="productName"><?= $product['product_name']; ?></h3>
                <p id="productPrice"><?= "Rp. " . number_format($product['product_price'], 2, ',', '.'); ?></p>
                <!-- <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p> -->
            </div><!-- /.col-lg-4 -->
            <?php endforeach; ?>
            <h5 id="allProduct"><a href="/menu">View All Menu <i class="fas fa-angle-double-down"></i> </a></h5>
            </div><!-- /.row -->
        </div>

        <div class="nav-border-bottom container-fluid containerContact" style="background-color: white;">
            <div id="rowContact" class="row" style="padding-top: 10px;">
                <h2 class="text-dark" style="text-align: center;">Contact Us</h2>
                <div class="col-md-6 mt-2">
                    <h4 class="text-dark" style="text-align: center;">Contact us via email</h4>
                    <div class="container formContact">
                        <?= form_open('home/send_message', ['class' => 'formKirimPesan']); ?>
                        <?= csrf_field(); ?>
                            <div class="modal-body">
                                <div class="form-group mt-2">
                                    <label for="nama">Masukkan Nama Anda</label>
                                    <input type="text" name="nama" id="nama" class="form-control form-control-user" placeholder="Nama Anda">
                                    <div class="invalid-feedback errorNama"></div>
                                </div>
                                
                                <div class="form-group mt-2">
                                    <label for="email">Masukkan Email Anda</label>
                                    <input type="email" name="email" id="email" class="form-control form-control-user" placeholder="Email Anda">
                                    <div class="invalid-feedback errorEmail"></div>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="message">Masukkan Pesan Anda</label>
                                    <textarea rows="5" name="message" id="message" class="form-control" placeholder="Pesan Anda"></textarea>
                                    <div class="invalid-feedback errorMessage"></div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="btnSendMessage" class="btn btn-dark btnSendMessage">
                                    <i class="fas fa-paper-plane"></i> Kirim
                                </button>
                            </div>
                        <?= form_close(); ?>
                    </div>
                </div>

                <div class="col-md-6 mt-2">
                    <h4 class="text-dark" style="text-align: center;">Or contact us via other methods</h4>
                    <div class="container contactList">
                        <p class="info mt-5 text-dark"><img src="<?= base_url(); ?>/img/icons/whatsapp.svg" width="35" height="35"><span class="footer-p"> 021 &ndash; 780 8080</span></p>
                        <p class="info mt-5 text-dark"><img src="<?= base_url(); ?>/img/icons/envelope.svg" width="35" height="35"><span class="footer-p"> order_mycafe@mycafe.co.id</span></p>
                        <p class="info mt-5 text-dark"><img src="<?= base_url(); ?>/img/icons/geo-alt-fill.svg" width="35" height="35"><span class="footer-p"> Jl.Sunter Agung I No.06 Sunter, Jakarta Utara - Indonesia</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
        <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

        <script type="text/javascript">
            $('.formKirimPesan').submit(function(e){
            e.preventDefault();
            
            $.ajax({
                type : "post",
                url : $(this).attr('action'),
                data : $(this).serialize(),
                dataType : "json",
                beforeSend: function(){
                $('.btnSendMessage').attr('disable', 'disabled');
                $('.btnSendMessage').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function(){
                $('.btnSendMessage').removeAttr('disable');
                $('.btnSendMessage').html('<i class="fa fa-paper-plane"></i> Kirim');
                },
                success: function(response){
                if(response.error){
                    if(response.error.nama){
                        $('.modal-body #nama').addClass('is-invalid');
                        $('.errorNama').html(response.error.nama);
                    } else {
                        $('.modal-body #nama').removeClass('is-invalid');
                        $('.errorNama').html();
                    }

                    if(response.error.email){
                        $('.modal-body #email').addClass('is-invalid');
                        $('.errorEmail').html(response.error.email);
                    } else {
                        $('.modal-body #email').removeClass('is-invalid');
                        $('.errorEmail').html();
                    }

                    if(response.error.password){
                        $('.modal-body #message').addClass('is-invalid');
                        $('.errorMessage').html(response.error.password);
                    } else {
                        $('.modal-body #message').removeClass('is-invalid');
                        $('.errorMessage').html();
                    }
                }
                
                if(response.success){
                    window.location.href = ("<?= site_url('home'); ?>");
                }
                },
                error: function(xhr, ajaxOptions, thrownError){
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;
            });
        </script>
    </body>
</html>