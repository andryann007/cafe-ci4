<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Andryan">

    <link rel="icon" type="image/png" href="<?= base_url(); ?>/img/icons/cup-hot-fill.svg" />

    <title>Login CMS</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/styles.css" rel="stylesheet">

    <!-- Sweet Alert 2 Library-->
    <link href="<?= base_url(); ?>/css/sweetalert2.min.css" rel="stylesheet" />
</head>

<body class="bg-gradient-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row">

            <div class="col">

                <div class="card o-hidden border-0 shadow-lg d-flex mx-auto my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row" style="align-items: center;">
                        <div class="col-lg-6 col-md-12 col-sm-12 d-none d-block">
                            <img src="<?= base_url(); ?>/img/assets/background.jpg" alt="Logo My Cafe" class="img-thumbnail">
                        </div>    
                        <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login to My Cafe CMS</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="inputUsername" aria-describedby="usernameHelp"
                                                placeholder="Enter Username..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="inputPassword" placeholder="Password..." required>
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" name="btnLogin" class="btn btn-primary btn-user btn-block" value="Login">
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="/admin/forget_password">Forget Password ? Click Here !!!</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

    <script src="<?= base_url(); ?>/js/sweetalert2.all.min.js"></script>

    <script>
        <?php if(session()->get('message')) :?>
            Swal.fire(
                'Berhasil Logout',
                '<?= session()->getFlashdata('message');?>',
                'success'
            )
        <?php endif; ?>

        <?php if(session()->get('error')) :?>
            Swal.fire({
            icon: 'error',
            title: 'Gagal Login',
            text: '<?= session()->getFlashdata('error');?>',
            footer: 'Anda Gagal Login, Coba Lagi !!!'
            })
        <?php endif; ?>
    </script>

</body>

</html>