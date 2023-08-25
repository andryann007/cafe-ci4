<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Andryan" />

    <link rel="icon" type="image/png" href="<?= base_url(); ?>/img/icons/cup-hot-fill.svg" />

    <title>Dashboard Admin - My Cafe</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Template Table Bootstrap 5 -->
    <link href="<?= base_url(); ?>/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <!-- Template Responsive Table Bootstrap 5-->
    <link href="<?= base_url(); ?>/css/responsive.dataTables.min.css" rel="stylesheet" />

    <!-- Sweet Alert 2 Library-->
    <link href="<?= base_url(); ?>/css/sweetalert2.min.css" rel="stylesheet" />

    <!-- Core JavaScript-->
    <script src="<?= base_url(); ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/js/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>
    <script src="<?= base_url(); ?>/js/sweetalert2.all.min.js"></script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a style="justify-content: center; align-items:center;" class="sidebar-brand">
                <i class="fas fa-file-invoice"></i>
                <div class="sidebar-brand-text mx-2">My Cafe CMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading Data Master -->
            <div class="sidebar-heading">Data Master</div>

            <!-- Nav Item - Data Akun -->
            <li class="nav-item <?= ($title === 'Akun') ? 'active' : ''; ?>">
                <a class="nav-link" href="/admin/akun">
                    <i class="fas fa-id-card"></i>
                    <span>Data Akun</span></a>
            </li>

            <!-- Nav Item - Data Kategori -->
            <li class="nav-item <?= ($title === 'Kategori') ? 'active' : ''; ?>">
                <a class="nav-link" href="/admin/kategori">
                    <i class="fas fa-filter"></i>
                    <span>Data Kategori</span></a>
            </li>

            <!-- Nav Item - Data Produk -->
            <li class="nav-item <?= ($title === 'Produk') ? 'active' : ''; ?>">
                <a class="nav-link" href="/admin/produk">
                    <i class="fas fa-cubes"></i>
                    <span>Data Produk</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Contact Us</div>

            <!-- Nav Item - Data Contact Us -->
            <li class="nav-item <?= ($title === 'Contact') ? 'active' : ''; ?>">
                <a class="nav-link" href="/admin/contact">
                    <i class="fas fa-comment"></i>
                    <span>Data Contact Us</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Logout</div>

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link btnLogout" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="fas fa-power-off"></i>
                    <span>Logout</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?= $this->include("layout/navbar_admin"); ?>

                <?= $this->renderSection('content'); ?>
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script type="text/javascript">
        $(document).on('click', '#btnProfile', function() {
            $('.modal-body #idUser').val($(this).data('id'));
            $('.modal-body #namaUser').val($(this).data('nama'));
            $('.modal-body #emailUser').val($(this).data('email'));
            $('.modal-body #username').val($(this).data('username'));
            $('.modal-body #passUser').val($(this).data('password'));
        })
    </script>

    <script type="text/javascript">
        $(document).on('click', '.btnTooglePassword', function(event) {
            event.preventDefault();
            if ($('.toogleVisibility input').attr("type") == "password") {
                $('.toogleVisibility input').attr('type', 'text');
                $('.toogleVisibility i').removeClass('fa-eye');
                $('.toogleVisibility i').addClass('fa-eye-slash');
            } else {
                $('.toogleVisibility input').attr('type', 'password');
                $('.toogleVisibility i').removeClass('fa-eye-slash');
                $('.toogleVisibility i').addClass('fa-eye');
            }
        });
    </script>
</body>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select <b>"Logout"</b> below if you are ready to leave !!!
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" href="<?php echo site_url('/admin/logout'); ?>">
                    <i class="fas fa-power-off"></i> Logout
                </a>
            </div>
        </div>
    </div>
</div>

</html>