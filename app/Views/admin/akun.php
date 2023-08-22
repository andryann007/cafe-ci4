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
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"type="text/css"/>

    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Template Table Bootstrap 5 -->
    <link
      href="<?= base_url(); ?>/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>

    <!-- Template Responsive Table Bootstrap 5-->
    <link href="<?= base_url(); ?>/css/responsive.dataTables.min.css" rel="stylesheet" />

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
        <li class="nav-item active">
          <a class="nav-link" href="/admin/akun">
            <i class="fas fa-id-card"></i>
            <span>Data Akun</span></a
          >
        </li>

        <!-- Nav Item - Data Kategori -->
        <li class="nav-item">
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
              <h3 class="mb-0 text-gray-800 col-md-6">Data Akun</h3>

              <button
                type="button"
                style="margin-right: 10px;"
                class="btn btn-success btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#addAccount"
              >
                <i class="fas fa-plus"></i>
                Tambah Data
              </button>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                  Data - Data Akun
                </h6>
              </div>

              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                  <div class="table-responsive table-striped display nowrap">
                        <table
                          class="table table-bordered"
                          id="dataTable"
                          width="100%"
                          cellspacing="0"
                        >
                          <thead class="thead-dark">
                            <tr class="text-center align-middle">
                              <th>No</th>
                              <th>Nama Lengkap</th>
                              <th>Email</th>
                              <th>Username</th>
                              <th>Password</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php $i =1; ?>
                              <?php foreach ($accounts as $account) : ?>
                              <tr class="text-center align-middle">
                                  <td>
                                      <?= $i++; ?>
                                  </td>
                                  <td>
                                      <?= $account['nama_lengkap']; ?>
                                  </td>
                                  <td>
                                      <?= $account['email']; ?>
                                  </td>
                                  <td>
                                      <?= $account['username']; ?>
                                  </td>
                                  <td>
                                      <?= md5($account['password']); ?>
                                  </td>
                                  <td>
                                      <?php if($account['is_active'] == "active") : ?>
                                          Aktif
                                      <?php endif; ?>

                                      <?php if($account['is_active'] == 'not_active') : ?>
                                          Non-Aktif
                                      <?php endif; ?>
                                  </td>
                                  <td>
                                  <button
                                      type="button"
                                      class="btn btn-warning"
                                      id="btnEdit"
                                      data-bs-toggle="modal"
                                      data-bs-target="#editAccount"
                                      data-id="<?= $account['user_id']; ?>"
                                      data-nama="<?= $account['nama_lengkap'];?>"
                                      data-email="<?= $account['email'];?>"
                                      data-username="<?= $account['username'];?>"
                                      data-password="<?= $account['password'];?>"
                                      data-status="<?= $account['is_active'];?>"
                                  >
                                      <i class="fas fa-edit"></i>
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
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
      </div>
      <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

     <!-- Add Data Modal -->
  <div
    class="modal fade"
    id="addAccount"
    tabindex="-1"
    aria-labelledby="addModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Tambah Data Akun</h5>
          <button
            type="button"
            class="close"
            data-bs-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <?= form_open('admin/save_akun', ['class' => 'formSimpanDataAkun']); ?>
        <?= csrf_field(); ?>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="namaUser">Nama Lengkap</label>
                  <input class="form-control" type="text" name="namaUser" id="namaUser"/>
                  <div class="invalid-feedback errorNamaUser"></div>
                </div>

                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" id="username" class="form-control"/>
                  <div class="invalid-feedback errorUsername"></div>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="emailUser">Email</label>
                  <input type="email" name="emailUser" id="emailUser" class="form-control"/>
                  <div class="invalid-feedback errorEmailUser"></div>
                </div>

                <div class="form-group">
                  <label for="passUser">Password</label>
                  <div class="input-group toogleVisibility">
                    <div class="input-group-append">
                      <input type="password" name="passUser" id="passUser" class="form-control"/>
                      <button class="btn btn-outline-secondary btnTooglePassword" type="button">
                        <i class="fas fa-eye"></i>
                      </button>
                    </div>
                    <div class="invalid-feedback errorPassUser"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
                  <label for="statusAkunUser">Status Akun</label>
                  <select class="form-control" name="statusAkunUser" id="statusAkunUser">
                    <option value="">-- Choose Account Status --</option>
                    <option value="active">Active</option>
                    <option value="not_active">Not Active</option>
                  </select>
                  <div class="invalid-feedback errorStatusAkun"></div>
                </div>
            </div>

          <div class="d--sm-flex modal-footer mb-4" style="justify-content: space-between;">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
              <i class="fas fa-trash"></i> Batal
            </button>
            <button type="submit" class="btn btn-primary addNewAccount" name="addNewAccount">
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
    id="editAccount"
    tabindex="-1"
    aria-labelledby="editModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Update Data Akun</h5>
          <button
            type="button"
            class="close"
            data-bs-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <?= form_open('admin/update_akun', ['class' => 'formUpdateDataAkun']); ?>
        <?= csrf_field(); ?>
          <div class="modal-body">
            
            <input type="hidden" id="idUser" name="idUser" class="form-control"/>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="editNamaUser">Nama Lengkap</label>
                  <input type="text" name="editNamaUser" id="editNamaUser" class="form-control" readonly/>
                  <div class="invalid-feedback errorEditNamaUser"></div>
                </div>

                <div class="form-group">
                  <label for="editUsername">Username</label>
                  <input type="text" name="editUsername" id="editUsername" class="form-control" readonly/>
                  <div class="invalid-feedback errorEditUsername"></div>
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="editEmailUser">Email</label>
                  <input type="email" name="editEmailUser" id="editEmailUser" class="form-control" readonly/>
                  <div class="invalid-feedback errorEditEmailUser"></div>
                </div>

                <div class="form-group">
                  <label for="editPassUser">Password</label>
                  <div class="input-group toogleVisibility">
                    <input type="password" name="editPassUser"  id="editPassUser" class="form-control" required/>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary btnTooglePassword" type="button">
                        <i class="fas fa-eye"></i>
                      </button>
                    </div>
                    <div class="invalid-feedback errorEditPassUser"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
                  <label for="editStatusAkunUser">Status Akun</label>
                  <select class="form-control" name="editStatusAkunUser" id="editStatusAkunUser" required>
                    <option value="">-- Choose Account Status --</option>
                    <option value="active">Active</option>
                    <option value="not_active">Not Active</option>
                  </select>
                  <div class="invalid-feedback errorEditStatusAkun"></div>
                </div>
            </div>

          <div class="d--sm-flex modal-footer mb-4" style="justify-content: space-between;">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
              <i class="fas fa-trash"></i> Batal
            </button>
            <button type="submit" class="btn btn-warning" name="editAccount">
              <i class="fas fa-edit"></i> Edit
            </button>
          </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/datatables/jquery.dataTables.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

    <script src="<?= base_url(); ?>/js/dataTables.bootstrap5.min.js"></script>

    <script src="<?= base_url(); ?>/js/dataTables.responsive.min.js"></script>

    <script src="<?= base_url(); ?>/js/demo/datatables-demo.js"></script>

    <script src="<?= base_url(); ?>/js/sweetalert2.all.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(e){
        e.preventDefault();

        $('#dataTable').DataTable({
          responsive: true
        });
      });
    </script>

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
        $('.modal-body #idUser').val($(this).data('id'));
        $('.modal-body #editNamaUser').val($(this).data('nama'));
        $('.modal-body #editEmailUser').val($(this).data('email'));
        $('.modal-body #editUsername').val($(this).data('username'));
        $('.modal-body #editPassUser').val($(this).data('password'));
        $('.modal-body #editStatusAkunUser').val($(this).data('status'));
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
       $('.formSimpanDataAkun').submit(function(e){
          e.preventDefault();
          
          $.ajax({
            type : "post",
            url : $(this).attr('action'),
            data : $(this).serialize(),
            dataType : "json",
            beforeSend: function(){
              $('.addNewAccount').attr('disable', 'disabled');
              $('.addNewAccount').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function(){
              $('.addNewAccount').removeAttr('disable');
              $('.addNewAccount').html('<i class="fa fa-save"></i> Simpan Data');
            },
            success: function(response){
              if(response.error){
                if(response.error.nama_lengkap){
                  $('.modal-body #namaUser').addClass('is-invalid');
                  $('.errorNamaUser').html(response.error.nama_lengkap);
                } else {
                  $('.modal-body #namaUser').removeClass('is-invalid');
                  $('.errorNamaUser').html();
                }

                if(response.error.username){
                  $('.modal-body #username').addClass('is-invalid');
                  $('.errorUsername').html(response.error.username);
                } else {
                  $('.modal-body #username').removeClass('is-invalid');
                  $('.errorUsername').html();
                }

                if(response.error.email){
                  $('.modal-body #emailUser').addClass('is-invalid');
                  $('.errorEmailUser').html(response.error.email);
                } else {
                  $('.modal-body #emailUser').removeClass('is-invalid');
                  $('.errorEmailUser').html();
                }

                if(response.error.password){
                  $('.modal-body #passUser').addClass('is-invalid');
                  $('.errorPassUser').html(response.error.password);
                } else {
                  $('.modal-body #passUser').removeClass('is-invalid');
                  $('.errorPassUser').html();
                }

                if(response.error.is_active){
                  $('.modal-body #statusAkunUser').addClass('is-invalid');
                  $('.errorStatusAkun').html(response.error.is_active);
                } else {
                  $('.modal-body #statusAkunUser').removeClass('is-invalid');
                  $('.errorStatusAkun').html();
                }
              }
              
              if(response.success){
                window.location.href = ("<?= site_url('admin/akun'); ?>");
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
       $('.formUpdateDataAkun').submit(function(e){
          e.preventDefault();
          
          $.ajax({
            type : "post",
            url : $(this).attr('action'),
            data : $(this).serialize(),
            dataType : "json",
            beforeSend: function(){
              $('.editAccount').attr('disable', 'disabled');
              $('.editAccount').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function(){
              $('.editAccount').removeAttr('disable');
              $('.editAccount').html('<i class="fa fa-edit"></i> Update Data');
            },
            success: function(response){
              if(response.error){
                if(response.error.nama_lengkap){
                  $('.modal-body #editNamaUser').addClass('is-invalid');
                  $('.errorEditNamaUser').html(response.error.nama_lengkap);
                } else {
                  $('.modal-body #editNamaUser').removeClass('is-invalid');
                  $('.errorEditNamaUser').html();
                }

                if(response.error.username){
                  $('.modal-body #editUsername').addClass('is-invalid');
                  $('.errorEditUsername').html(response.error.username);
                } else {
                  $('.modal-body #editUsername').removeClass('is-invalid');
                  $('.errorEditUsername').html();
                }

                if(response.error.email){
                  $('.modal-body #editEmailUser').addClass('is-invalid');
                  $('.errorEditEmailUser').html(response.error.email);
                } else {
                  $('.modal-body #editEmailUser').removeClass('is-invalid');
                  $('.errorEditEmailUser').html();
                }

                if(response.error.password){
                  $('.modal-body #editPassUser').addClass('is-invalid');
                  $('.errorEditPassUser').html(response.error.password);
                } else {
                  $('.modal-body #editPassUser').removeClass('is-invalid');
                  $('.errorEditPassUser').html();
                }

                if(response.error.is_active){
                  $('.modal-body #editStatusAkunUser').addClass('is-invalid');
                  $('.errorEditStatusAkun').html(response.error.is_active);
                } else {
                  $('.modal-body #editStatusAkunUser').removeClass('is-invalid');
                  $('.errorEditStatusAkun').html();
                }
              }
              
              if(response.success){
                window.location.href = ("<?= site_url('admin/akun'); ?>");

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

    <!-- <script type="text/javascript">
      $(document).on('click', '.nav-item .btnLogout', function(event){
        event.preventDefault();

        Swal.fire({
        title: 'Are you sure?',
        text: "You are going to logout!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, i want logout!'
      }).then((result) => {
        if (result.isConfirmed) {
          href="<?php echo site_url('/owner/logout');?>"
          Swal.fire(
            'Logout!',
            'Your successfully logout.',
            'success'
          )
        }
      })
      });
    </script> -->
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
