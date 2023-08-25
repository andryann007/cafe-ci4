<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
  <!-- Page Heading -->
  <div style="justify-content: space-between; align-items: center; margin-bottom:10px;" class="d-none d-flex">
    <h3 class="mb-0 text-gray-800 col-md-6">Data Produk</h3>

    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addProduct">
      <i class="fas fa-plus"></i>
      Tambah Data
    </button>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        Data - Data Gambar
      </h6>
    </div>

    <div class="card-body">
      <div class="table-responsive table-striped">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr class="text-center align-middle">
              <th>No</th>
              <th>Nama Produk</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Gambar</th>
              <th>Deskripsi Produk</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($products as $product) : ?>
              <tr class="text-center align-middle">
                <td>
                  <?= $i++; ?>
                </td>
                <td>
                  <?= $product['product_name']; ?>
                </td>
                <td>
                  <?= ucwords($product['category_name']); ?>
                </td>
                <td>
                  <?= "Rp. " . number_format($product['product_price'], 2, ',', '.'); ?>
                </td>
                <td>
                  <img src="<?= base_url(); ?>/img/uploads/<?= $product['product_image']; ?>" class="img-thumbnail">
                </td>
                <td>
                  <?= $product['product_desc']; ?>
                </td>
                <td>
                  <button type="button" class="btn btn-warning" id="btnEdit" data-bs-toggle="modal" data-bs-target="#editProduct" data-id="<?= $product['product_id']; ?>" data-name="<?= $product['product_name']; ?>" data-category="<?= $product['category_id']; ?>" data-price="<?= $product['product_price']; ?>" data-picture="<?= $product['product_image']; ?>" data-desc="<?= $product['product_desc']; ?>">
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

<!-- Add Data Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Tambah Data Produk</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?= form_open_multipart('', ['class' => 'formSimpanDataProduk']); ?>
      <?= csrf_field(); ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="namaProduk">Nama Produk</label>
              <input type="text" name="namaProduk" id="namaProduk" class="form-control" />
              <div class="invalid-feedback errorNamaProduk"></div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="kategoriProduk">Kategori</label>
              <select class="form-control" name="kategoriProduk" id="kategoriProduk">
                <?php foreach ($categories as $category) : ?>
                  <option value="<?= $category['category_id']; ?>">
                    <?= ucwords($category['category_name']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-feedback errorKategoriProduk"></div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="hargaProduk">Harga Produk</label>
          <input type="number" min="10000" name="hargaProduk" id="hargaProduk" class="form-control" />
          <div class="invalid-feedback errorHargaProduk"></div>
        </div>

        <label for="gambarProduk">Gambar Produk</label>
        <div class="input-group mb-3">
          <input class="form-control" type="file" name="gambarProduk" id="gambarProduk" aria-label="Choose File..." />
          <div class="invalid-feedback errorGambarProduk"></div>
        </div>

        <div class="form-group">
          <label for="descProduk">Deskripsi Produk</label>
          <textarea rows="3" name="descProduk" id="descProduk" class="form-control"></textarea>
          <div class="invalid-feedback errorDescProduk"></div>
        </div>
      </div>
      <div class="d--sm-flex modal-footer mb-4" style="justify-content: space-between;">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
          <i class="fas fa-trash"></i> Batal
        </button>
        <button type="submit" class="btn btn-primary addNewProduct" name="addNewProduct">
          <i class="fas fa-plus"></i> Tambah
        </button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<!-- Edit Data Modal -->
<div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Update Data Produk</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?= form_open_multipart('', ['class' => 'formUpdateDataProduk']); ?>
      <?= csrf_field(); ?>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="editNamaProduk">Nama Produk</label>
              <input type="text" name="editNamaProduk" id="editNamaProduk" class="form-control" />
              <div class="invalid-feedback errorEditNamaProduk"></div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="editKategoriProduk">Kategori</label>
              <select class="form-control" name="editKategoriProduk" id="editKategoriProduk">
                <?php foreach ($categories as $category) : ?>
                  <option value="<?= $category['category_id']; ?>">
                    <?= ucwords($category['category_name']); ?>
                  </option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-feedback errorEditKategoriProduk"></div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="editHargaProduk">Harga Produk</label>
          <input type="number" min="10000" name="editHargaProduk" id="editHargaProduk" class="form-control" />
          <div class="invalid-feedback errorEditHargaProduk"></div>
        </div>

        <label for="editGambarProduk">Gambar Produk</label>
        <div class="input-group mb-3">
          <input class="form-control" type="file" name="editGambarProduk" id="editGambarProduk" aria-label="Choose File..." />
          <div class="invalid-feedback errorEditGambarProduk"></div>
        </div>

        <div class="form-group">
          <label for="editDescProduk">Deskripsi Produk</label>
          <textarea rows="3" name="editDescProduk" id="editDescProduk" class="form-control"></textarea>
          <div class="invalid-feedback errorEditDescProduk"></div>
        </div>
      </div>
      <div class="d--sm-flex modal-footer mb-4" style="justify-content: space-between;">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
          <i class="fas fa-trash"></i> Batal
        </button>
        <button type="submit" class="btn btn-warning editProduct" name="editProduct">
          <i class="fas fa-edit"></i> Update
        </button>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '#btnEdit', function() {
    $('.modal-body #idProduk').val($(this).data('id'));
    $('.modal-body #editNamaProduk').val($(this).data('name'));
    $('.modal-body #editKategoriProduk').val($(this).data('category'));
    $('.modal-body #editHargaProduk').val($(this).data('price'));
    document.getElementById("editGambarProduk").setAttribute("name", $(this).data('picture'));
    document.getElementById("editDescProduk").value = $(this).data('desc');
  });
</script>

<script type="text/javascript">
  $('.formSimpanDataProduk').submit(function(e) {
    e.preventDefault();

    var formData = new FormData($('.formSimpanDataProduk')[0]);

    $.ajax({
      type: "post",
      url: "<?= site_url('admin/save_produk'); ?>",
      data: $(this).serialize(),
      contentType: false,
      processData: false,
      data: formData,
      dataType: "json",
      beforeSend: function() {
        $('.modal-footer .addNewProduct').attr('disable', 'disabled');
        $('.modal-footer .addNewProduct').html('<i class="fa fa-spin fa-spinner"></i>');
      },
      complete: function() {
        $('.modal-footer .addNewProduct').removeAttr('disable');
        $('.modal-footer .addNewProduct').html('<i class="fa fa-save"></i> Simpan Data');
      },
      success: function(response) {
        if (response.error) {
          if (response.error.product_name) {
            $('.modal-body #namaProduk').addClass('is-invalid');
            $('.errorNamaProduk').html(response.error.product_name);
          } else {
            $('.modal-body #namaProduk').removeClass('is-invalid');
            $('.errorNamaProduk').html();
          }

          if (response.error.product_category) {
            $('.modal-body #kategoriProduk').addClass('is-invalid');
            $('.errorKategoriProduk').html(response.error.product_category);
          } else {
            $('.modal-body #kategoriProduk').removeClass('is-invalid');
            $('.errorKategoriProduk').html();
          }

          if (response.error.product_price) {
            $('.modal-body #hargaProduk').addClass('is-invalid');
            $('.errorHargaProduk').html(response.error.product_price);
          } else {
            $('.modal-body #hargaProduk').removeClass('is-invalid');
            $('.errorHargaProduk').html();
          }

          if (response.error.product_image) {
            $('.modal-body #gambarProduk').addClass('is-invalid');
            $('.errorGambarProduk').html(response.error.product_image);
          } else {
            $('.modal-body #gambarProduk').removeClass('is-invalid');
            $('.errorGambarProduk').html();
          }

          if (response.error.product_desc) {
            $('.modal-body #descProduk').addClass('is-invalid');
            $('.errorDescProduk').html(response.error.product_desc);
          } else {
            $('.modal-body #descProduk').removeClass('is-invalid');
            $('.errorDescProduk').html();
          }
        }
        if (response.success) {
          window.location.href = ("<?= site_url('admin/produk'); ?>");

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
  $('.formUpdateDataProduk').submit(function(e) {
    e.preventDefault();

    var formData = new FormData($('.formUpdateDataProduk')[0]);

    $.ajax({
      type: "post",
      url: "<?= site_url('admin/update_produk'); ?>",
      data: $(this).serialize(),
      contentType: false,
      processData: false,
      data: formData,
      dataType: "json",
      beforeSend: function() {
        $('.modal-footer .editProduct').attr('disable', 'disabled');
        $('.modal-footer .editProduct').html('<i class="fa fa-spin fa-spinner"></i>');
      },
      complete: function() {
        $('.modal-footer .editProduct').removeAttr('disable');
        $('.modal-footer .editProduct').html('<i class="fa fa-edit"></i> Update');
      },
      success: function(response) {
        if (response.error) {
          if (response.error.product_name) {
            $('.modal-body #editNamaProduk').addClass('is-invalid');
            $('.errorEditNamaProduk').html(response.error.product_name);
          } else {
            $('.modal-body #editNamaProduk').removeClass('is-invalid');
            $('.errorEditNamaProduk').html();
          }

          if (response.error.product_category) {
            $('.modal-body #editKategoriProduk').addClass('is-invalid');
            $('.errorEditKategoriProduk').html(response.error.product_category);
          } else {
            $('.modal-body #editKategoriProduk').removeClass('is-invalid');
            $('.errorEditKategoriProduk').html();
          }

          if (response.error.product_price) {
            $('.modal-body #editHargaProduk').addClass('is-invalid');
            $('.errorEditHargaProduk').html(response.error.product_price);
          } else {
            $('.modal-body #editHargaProduk').removeClass('is-invalid');
            $('.errorEditHargaProduk').html();
          }

          if (response.error.product_image) {
            $('.modal-body #editGambarProduk').addClass('is-invalid');
            $('.errorEditGambarProduk').html(response.error.product_image);
          } else {
            $('.modal-body #editGambarProduk').removeClass('is-invalid');
            $('.errorEditGambarProduk').html();
          }

          if (response.error.product_desc) {
            $('.modal-body #editDescProduk').addClass('is-invalid');
            $('.errorEditDescProduk').html(response.error.product_desc);
          } else {
            $('.modal-body #editDescProduk').removeClass('is-invalid');
            $('.errorEditDescProduk').html();
          }
        }
        if (response.success) {
          window.location.href = ("<?= site_url('admin/produk'); ?>");
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