<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="Andryan" />

    <link rel="icon" type="image/png" href="<?= base_url(); ?>/img/icons/cup-hot-fill.svg" />

    <title>Dashboard Admin - My Cafe</title>

    <!-- Custom fonts for this template-->
    <link
      href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- template table bootstrap 4 -->
    <link
      href="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap5.min.css"
      rel="stylesheet"
    />

    <!-- Sweet Alert 2 Library-->
    <link href="<?= base_url(); ?>/css/sweetalert2.min.css" rel="stylesheet" />
  </head>

  <body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Sidebar -->
      <ul
        class="navbar-nav bg-dark sidebar sidebar-dark accordion"
        id="accordionSidebar"
      >
        <!-- Sidebar - Brand -->
        <a
          style="justify-content: space-arround; align-items:center;"
          class="sidebar-brand d-flex"
          href="/admin"
        >
          <i class="fas fa-file-invoice"></i>
          <div class="sidebar-brand-text mx-2">My Cafe CMS</div>
        </a>
        <!-- Heading Data Master -->
        <div class="sidebar-heading">Data Master</div>

        <!-- Nav Item - Data Akun -->
        <li class="nav-item">
          <a class="nav-link" href="/admin/akun">
            <i class="fas fa-id-card"></i>
            <span>Data Akun</span></a
          >
        </li>

        <!-- Nav Item - Data Kategori -->
        <li class="nav-item active">
          <a class="nav-link" href="/admin/kategori">
            <i class="fas fa-filter"></i>
            <span>Data Kategori</span></a
          >
        </li>

        <!-- Nav Item - Data Produk -->
        <li class="nav-item">
          <a class="nav-link" href="/admin/produk">
            <i class="fas fa-cubes"></i>
            <span>Data Produk</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading">Contact Us</div>

        <!-- Nav Item - Data Contact Us -->
        <li class="nav-item">
          <a class="nav-link" href="/admin/contact">
            <i class="fas fa-comment"></i>
            <span>Data Contact Us</span></a
          >
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" />

        <!-- Heading -->
        <div class="sidebar-heading">Logout</div>

        <!-- Nav Item - Logout -->
        <li class="nav-item">
          <a class="nav-link btnLogout" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="fas fa-power-off"></i>
            <span>Logout</span></a
          >
        </li>
      </ul>
      <!-- End of Sidebar -->

      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <?= $this -> include("template/topbar"); ?>
            <!-- End of Topbar -->
            
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div
              style="justify-content: space-between; align-items: center; margin-bottom:10px;" class="d-none d-flex"
            >
              <h3 class="mb-0 text-gray-800 col-md-6">Data Kategori</h3>

              <button
                type="button"
                class="btn btn-success btn-sm"
                style="margin-right: 10px;"
                data-bs-toggle="modal"
                data-bs-target="#addCategory"
              >
                <i class="fas fa-plus"></i>
                Tambah Data
              </button>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                  Data - Data Kategori
                </h6>
              </div>

              <div class="card-body">
                <div class="table-responsive table-striped">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead class="thead-dark">
                      <tr class="text-center align-middle">
                        <th>No</th>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i =1; ?>
                        <?php foreach ($categories as $category) : ?>
                        <tr class="text-center align-middle">
                            <td>
                                <?= $i++; ?>
                            </td>
                            <td>
                                <?= $category['category_id']; ?>
                            </td>
                            <td>
                                <?= $category['category_name']; ?>
                            </td>
                            <td class="d-sm-flex" style="justify-content: center;">
                            <button
                                type="button"
                                class="btn btn-warning mr-2"
                                id="btnEdit"
                                data-bs-toggle="modal"
                                data-bs-target="#editCategory"
                                data-id="<?= $category['category_id']; ?>"
                                data-nama="<?= $category['category_name'];?>"
                            >
                              <i class="fas fa-edit"></i>
                            </button>

                            <button
                                type="button"
                                class="btn btn-danger mr-2"
                                id="btnDelete"
                                data-bs-toggle="modal"
                                data-bs-target="#deleteCategory"
                                data-id="<?= $category['category_id']; ?>"
                                data-nama="<?= $category['category_name'];?>"
                            >
                              <i class="fas fa-trash"></i>
                            </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
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

    <!-- Add Data Modal -->
  <div
    class="modal fade"
    id="addCategory"
    tabindex="-1"
    aria-labelledby="addModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Tambah Data Kategori</h5>
          <button
            type="button"
            class="close"
            data-bs-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <?= form_open('admin/save_kategori', ['class' => 'formSimpanDataKategori']); ?>
        <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="namaKategori">Nama Kategori</label>
                    <input type="text" name="namaKategori" id="namaKategori" class="form-control"/>
                    <div class="invalid-feedback errorNamaKategori"></div>
                </div>
            </div>
            <div class="d--sm-flex modal-footer mb-4" style="justify-content: space-between;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                <i class="fas fa-trash"></i> Batal
                </button>
                <button type="submit" class="btn btn-primary addNewCategory" name="addNewCategory">
                <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>

  <!-- Edit Data Modal -->
  <div
    class="modal fade"
    id="editCategory"
    tabindex="-1"
    aria-labelledby="editModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Update Data Kategori</h5>
          <button
            type="button"
            class="close"
            data-bs-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <?= form_open('admin/update_kategori', ['class' => 'formUpdateDataKategori']); ?>
        <?= csrf_field(); ?>
          <div class="modal-body">
              <input type="hidden" id="idKategori" name="idKategori" class="form-control"/>
              <div class="form-group">
                <label for="editNamaKategori">Nama Kategori</label>
                <input type="text" name="editNamaKategori" id="editNamaKategori" class="form-control"/>
                <div class="invalid-feedback errorEditNamaKategori"></div>
              </div>
          </div>

          <div class="d--sm-flex modal-footer mb-4" style="justify-content: space-between;">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                <i class="fas fa-trash"></i> Batal
              </button>
              <button type="submit" class="btn btn-warning editCategory" name="editCategory">
                <i class="fas fa-edit"></i> Edit
              </button>
          </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>

  <!-- Delete Category Modal-->
  <div
      class="modal fade"
      id="deleteCategory"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are You Sure to Delete ?</h5>
            <button
              class="close"
              type="button"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <?= form_open('admin/delete_kategori'); ?>
          <?= csrf_field(); ?>
          <div class="modal-body">
              <input type="hidden" id="deleteIdKategori" name="deleteIdKategori" class="form-control"/>
              <div class="form-group">
                <label for="deleteNamaKategori">Nama Kategori</label>
                <input type="text" name="deleteNamaKategori" id="deleteNamaKategori" class="form-control" readonly/>
                <div class="invalid-feedback errorEditNamaKategori"></div>
              </div>
          </div>

          <div class="d--sm-flex modal-footer mb-4">
              <button type="submit" class="btn btn-danger deleteCategory" name="deleteCategory">
                <i class="fas fa-trash"></i> Hapus
              </button>
          </div>
          <?= form_close(); ?>
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

    <script src="<?= base_url(); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/datatables/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>/js/demo/datatables-demo.js"></script>

    <script src="<?= base_url(); ?>/js/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
      $(document).on('click', '#btnProfile', function(){
        $('.modal-body #idUser').val($(this).data('id'));
        $('.modal-body #namaUser').val($(this).data('nama'));
        $('.modal-body #emailUser').val($(this).data('email'));
        $('.modal-body #username').val($(this).data('username'));
        $('.modal-body #passUser').val($(this).data('password'));
      })
    </script>

    <script>
      $(document).on('click', '#btnEdit', function(){
        $('.modal-body #idKategori').val($(this).data('id'));
        $('.modal-body #editNamaKategori').val($(this).data('nama'));
      });
    </script>

    <script>
      $(document).on('click', '#btnDelete', function(){
        $('.modal-body #deleteIdKategori').val($(this).data('id'));
        $('.modal-body #deleteNamaKategori').val($(this).data('nama'));
      });
    </script>

    <script type="text/javascript">
        $(document).on('click', '.btnTooglePassword', function(event){
            event.preventDefault();
            if($('.toogleVisibility input').attr("type") == "password"){
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

    <script type="text/javascript">
       $('.formSimpanDataKategori').submit(function(e){
          e.preventDefault();
          
          $.ajax({
            type : "post",
            url : $(this).attr('action'),
            data : $(this).serialize(),
            dataType : "json",
            beforeSend: function(){
              $('.addNewCategory').attr('disable', 'disabled');
              $('.addNewCategory').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function(){
              $('.addNewCategory').removeAttr('disable');
              $('.addNewCategory').html('<i class="fa fa-save"></i> Simpan Data');
            },
            success: function(response){
              if(response.error){
                if(response.error.category_name){
                  $('#namaKategori').addClass('is-invalid');
                  $('.errorNamaKategori').html(response.error.category_name);
                }
              }
              if(response.success){
                $('#namaKategori').removeClass('is-invalid');
                $('.errorNamaKategori').html();
                window.location.href = ("<?= site_url('admin/kategori'); ?>");
              }
            },
            error: function(xhr, ajaxOptions, thrownError){
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
          });
          return false;
        });
    </script>

    <script type="text/javascript">
       $('.formUpdateDataKategori').submit(function(e){
          e.preventDefault();
          
          $.ajax({
            type : "post",
            url : $(this).attr('action'),
            data : $(this).serialize(),
            dataType : "json",
            beforeSend: function(){
              $('.editCategory').attr('disable', 'disabled');
              $('.editCategory').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function(){
              $('.editCategory').removeAttr('disable');
              $('.editCategory').html('<i class="fa fa-edit"></i> Update Data');
            },
            success: function(response){
              if(response.error){
                if(response.error.category_name){
                  $('#editNamaKategori').addClass('is-invalid');
                  $('.errorEditNamaKategori').html(response.error.category_name);
                } else {
                  $('#editNamaKategori').removeClass('is-invalid');
                  $('.errorEditNamaKategori').html();
                }
              }
              if(response.success){
                window.location.href = ("<?= site_url('admin/kategori'); ?>");

                Swal.fire ({
                  icon: 'success',
                  title: 'Berhasil',
                  text: response.success
                })
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

  <!-- Logout Modal-->
  <div
      class="modal fade"
      id="logoutModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button
              class="close"
              type="button"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            Select <b>"Logout"</b> below if you are ready to leave !!!
          </div>
          <div class="modal-footer">
            <a class="btn btn-danger" href="<?php echo site_url('/admin/logout');?>">
              <i class="fas fa-power-off"></i> Logout
            </a>
          </div>
        </div>
      </div>
  </div>

</html>