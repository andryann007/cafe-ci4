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

        <!-- Sweet Alert 2 Library-->
        <link href="<?= base_url(); ?>/css/sweetalert2.min.css" rel="stylesheet" />

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
                        <li class="nav-item">
                            <a class="nav-link" href="/menu">Our Menu</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/contact" style="font-weight: bold;">Contact Us</a>
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

        <div class="nav-border-bottom container-fluid containerContact" style="background-color: white; min-height:570px;">
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

        <!-- Sweet Alert 2 JS -->
        <script src="<?= base_url(); ?>/js/sweetalert2.all.min.js"></script>

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
                    window.location.href = ("<?= site_url('home/contact'); ?>");

                    Swal.fire ({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.success
                    })
                }
                },
                error: function(xhr, ajaxOptions, thrownError){
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal Dikirim'
                    })
                }
            });
            return false;
            });
        </script>
    </body>
</html>