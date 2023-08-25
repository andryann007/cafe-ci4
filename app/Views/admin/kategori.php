<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
  <!-- Page Heading -->
  <div style="justify-content: space-between; align-items: center; margin-bottom:10px;" class="d-none d-flex">
    <h3 class="mb-0 text-gray-800 col-md-6">Data Kategori</h3>

    <button type="button" class="btn btn-success btn-sm" style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#addCategory">
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
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr class="text-center align-middle">
              <th>No</th>
              <th>Category ID</th>
              <th>Category Name</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
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
                  <button type="button" class="btn btn-warning mr-2" id="btnEdit" data-bs-toggle="modal" data-bs-target="#editCategory" data-id="<?= $category['category_id']; ?>" data-nama="<?= $category['category_name']; ?>">
                    <i class="fas fa-edit"></i>
                  </button>

                  <button type="button" class="btn btn-danger mr-2" id="btnDelete" data-bs-toggle="modal" data-bs-target="#deleteCategory" data-id="<?= $category['category_id']; ?>" data-nama="<?= $category['category_name']; ?>">
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

<!-- Add Data Modal -->
<div class="modal fade" id="addCategory" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Tambah Data Kategori</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?= form_open('admin/save_kategori', ['class' => 'formSimpanDataKategori']); ?>
      <?= csrf_field(); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="namaKategori">Nama Kategori</label>
          <input type="text" name="namaKategori" id="namaKategori" class="form-control" />
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
<div class="modal fade" id="editCategory" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Update Data Kategori</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?= form_open('admin/update_kategori', ['class' => 'formUpdateDataKategori']); ?>
      <?= csrf_field(); ?>
      <div class="modal-body">
        <input type="hidden" id="idKategori" name="idKategori" class="form-control" />
        <div class="form-group">
          <label for="editNamaKategori">Nama Kategori</label>
          <input type="text" name="editNamaKategori" id="editNamaKategori" class="form-control" />
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
<div class="modal fade" id="deleteCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are You Sure to Delete ?</h5>
        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <?= form_open('admin/delete_kategori'); ?>
      <?= csrf_field(); ?>
      <div class="modal-body">
        <input type="hidden" id="deleteIdKategori" name="deleteIdKategori" class="form-control" />
        <div class="form-group">
          <label for="deleteNamaKategori">Nama Kategori</label>
          <input type="text" name="deleteNamaKategori" id="deleteNamaKategori" class="form-control" readonly />
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

<script>
  $(document).on('click', '#btnEdit', function() {
    $('.modal-body #idKategori').val($(this).data('id'));
    $('.modal-body #editNamaKategori').val($(this).data('nama'));
  });
</script>

<script>
  $(document).on('click', '#btnDelete', function() {
    $('.modal-body #deleteIdKategori').val($(this).data('id'));
    $('.modal-body #deleteNamaKategori').val($(this).data('nama'));
  });
</script>

<script type="text/javascript">
  $('.formSimpanDataKategori').submit(function(e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function() {
        $('.addNewCategory').attr('disable', 'disabled');
        $('.addNewCategory').html('<i class="fa fa-spin fa-spinner"></i>');
      },
      complete: function() {
        $('.addNewCategory').removeAttr('disable');
        $('.addNewCategory').html('<i class="fa fa-save"></i> Simpan Data');
      },
      success: function(response) {
        if (response.error) {
          if (response.error.category_name) {
            $('#namaKategori').addClass('is-invalid');
            $('.errorNamaKategori').html(response.error.category_name);
          }
        }
        if (response.success) {
          $('#namaKategori').removeClass('is-invalid');
          $('.errorNamaKategori').html();
          window.location.href = ("<?= site_url('admin/kategori'); ?>");
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      }
    });
    return false;
  });
</script>

<script type="text/javascript">
  $('.formUpdateDataKategori').submit(function(e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function() {
        $('.editCategory').attr('disable', 'disabled');
        $('.editCategory').html('<i class="fa fa-spin fa-spinner"></i>');
      },
      complete: function() {
        $('.editCategory').removeAttr('disable');
        $('.editCategory').html('<i class="fa fa-edit"></i> Update Data');
      },
      success: function(response) {
        if (response.error) {
          if (response.error.category_name) {
            $('#editNamaKategori').addClass('is-invalid');
            $('.errorEditNamaKategori').html(response.error.category_name);
          } else {
            $('#editNamaKategori').removeClass('is-invalid');
            $('.errorEditNamaKategori').html();
          }
        }
        if (response.success) {
          window.location.href = ("<?= site_url('admin/kategori'); ?>");

          Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: response.success
          })
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      }
    });
    return false;
  });
</script>

<script type="text/javascript">
  $('#dataTable').DataTable({
    responsive: true
  });
</script>

<?= $this->endSection(); ?>