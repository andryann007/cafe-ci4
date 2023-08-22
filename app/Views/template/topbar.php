<nav class="navbar navbar-expand navbar-light bg-secondary topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <div class="copyright text-center my-auto d-sm-flex">
    <div class="text-light">Today Date : <b>
      <?php
        date_default_timezone_set('Asia/Jakarta');
        echo date("d F Y");
      ?>
      / </b>
    </div>

    <div class="text-light" id="clock">
    </div>
  </div>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-white">
          Halo, <b><?= session()->get('nama_lengkap'); ?></b>
        </span>
        <img class="img-profile rounded-circle" src="<?= base_url(); ?>/img/assets/undraw_profile.svg" />
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <button
          type="button"
          class="btn dropdown-item btn-sm"
          id="btnProfile"
          role="button"
          data-bs-toggle="modal"
          data-bs-target="#myProfileModal"
          data-id="<?= session()->get('user_id');?>"
          data-nama="<?= session()->get('nama_lengkap');?>"
          data-email="<?= session()->get('email');?>"
          data-username="<?= session()->get('username');?>"
          data-password="<?= session()->get('password');?>">

          <i class="fas fa-user a-sm fa-fw mr-2 text-dark"></i>
          My Profiles
        </button>

        <div class="dropdown-divider"></div>
        
        <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal"
        >
          <i class="fas fa-power-off a-sm fa-fw mr-2 text-dark"></i>
          Logout
        </a>
      </div>
    </li>
  </ul>
</nav>

  <!-- My Profile Modal -->
  <div
    class="modal fade"
    id="myProfileModal"
    tabindex="-1"
    aria-labelledby="myProfileModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myProfileModallLabel">My Profiles</h5>
          <button
            type="button"
            class="close"
            data-bs-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <?= form_open('admin/update_profile'); ?>
        <?= csrf_field(); ?>
        <div class="modal-body">
          <input type="hidden" id="idUser" name="idUser" class="form-control"/>
          
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="namaUser">Nama Lengkap</label>
                <input type="text" name="namaUser" id="namaUser" class="form-control" required/>
              </div>

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required/>
              </div>
            </div>
            
            <div class="col-md-6">
              <div class="form-group">
                <label for="emailUser">Email</label>
                <input type="email" name="emailUser" id="emailUser" class="form-control" required/>
              </div>

              <div class="form-group">
                <label for="passUser">Password</label>
                <div class="input-group" id="passwordVisibility">
                  <input type="password" name="passUser" id="passUser" class="form-control" required/>
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary toogle-password" type="button" id="tooglePassword">
                      <i class="fas fa-eye"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="d--sm-flex modal-footer mb-4">
          <button type="submit" class="btn btn-warning" name="changePassword">
            <i class="fas fa-edit"></i> Update Profile
          </button>
        </div>
      <?= form_close(); ?>
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
    function showTime(){
      var d = new Date();
      var timezone = {timeZone: 'Asia/Jakarta'};
      var timeStr = d.toLocaleTimeString('en-US', timezone);

      document.getElementById('clock').innerHTML = "<b> / " + timeStr + "</b>";
      setTimeout(showTime, 1000);
    }

    showTime();
  </script>