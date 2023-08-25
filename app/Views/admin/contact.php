<?= $this->extend('layout/template_admin'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">
  <!-- Page Heading -->
  <div style="justify-content: space-between; align-items: center; margin-bottom:10px;" class="d-none d-flex">
    <h3 class="mb-0 text-gray-800 col-md-12">Data Contact Us</h3>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        Data - Data Contact Us
      </h6>
    </div>

    <div class="card-body">
      <div class="table-responsive table-striped">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr class="text-center align-middle">
              <th>No</th>
              <th>Tanggal</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Pesan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($contacts as $contact) : ?>
              <tr class="text-center align-middle">
                <td>
                  <?= $i++; ?>
                </td>
                <td>
                  <?= $contact['created_at']; ?>
                </td>
                <td>
                  <?= $contact['contact_name']; ?>
                </td>
                <td>
                  <?= $contact['contact_email']; ?>
                </td>
                <td>
                  <?= $contact['contact_message']; ?>
                </td>
                <td>
                  <button type="button" class="btn btn-dark" id="btnReply" data-bs-toggle="modal" data-bs-target="#replyMessage" data-id="<?= $contact['contact_id']; ?>" data-email_pengirim="<?= session()->get('email'); ?>" data-email_penerima="<?= $contact['contact_email']; ?>">
                    <i class="fas fa-reply"></i>
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

<!-- Reply Modal -->
<div class="modal fade" id="replyMessage" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Balas Pesan</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?= form_open('admin/reply_message', ['class' => 'formReplyMessage']); ?>
      <?= csrf_field(); ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="emailPengirim">Email Pengirim</label>
          <input class="form-control" type="text" name="emailPengirim" id="emailPengirim" readonly />
        </div>

        <div class="form-group">
          <label for="emailPenerima">Email Penerima</label>
          <input class="form-control" type="text" name="emailPenerima" id="emailPenerima" readonly />
        </div>

        <div class="form-group">
          <label for="subjekEmail">Subjek Email</label>
          <input class="form-control" type="text" name="subjekEmail" id="subjekEmail" />
          <div class="invalid-feedback errorSubjekEmail"></div>
        </div>

        <div class="form-group">
          <label for="pesanEmail">Pesan Email</label>
          <textarea rows="3" name="pesanEmail" id="pesanEmail" class="form-control"></textarea>
          <div class="invalid-feedback errorPesanEmail"></div>
        </div>

        <div class="d--sm-flex modal-footer mb-4" style="justify-content: space-between;">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
            <i class="fas fa-trash"></i> Batal
          </button>
          <button type="submit" class="btn btn-dark reply" name="reply">
            <i class="fas fa-paper-plane"></i> Kirim
          </button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on('click', '#btnReply', function() {
    $('.modal-body #idProduk').val($(this).data('id'));
    $('.modal-body #emailPengirim').val($(this).data('email_pengirim'));
    $('.modal-body #emailPenerima').val($(this).data('email_penerima'));
  });
</script>

<script type="text/javascript">
  $('.formReplyMessage').submit(function(e) {
    e.preventDefault();

    $.ajax({
      type: "post",
      url: $(this).attr('action'),
      data: $(this).serialize(),
      dataType: "json",
      beforeSend: function() {
        $('.reply').attr('disable', 'disabled');
        $('.reply').html('<i class="fas fa-spin fa-spinner"></i>');
      },
      complete: function() {
        $('.reply').removeAttr('disable');
        $('.reply').html('<i class="fas fa-paper-plane"></i> Kirim');
      },
      success: function(response) {
        if (response.error) {
          if (response.error.email_subject) {
            $('.modal-body #subjekEmail').addClass('is-invalid');
            $('.errorSubjekEmail').html(response.error.email_subject);
          } else {
            $('.modal-body #subjekEmail').removeClass('is-invalid');
            $('.errorSubjekEmail').html();
          }

          if (response.error.email_message) {
            $('.modal-body #pesanEmail').addClass('is-invalid');
            $('.errorPesanEmail').html(response.error.email_message);
          } else {
            $('.modal-body #pesanEmail').removeClass('is-invalid');
            $('.errorPesanEmail').html();
          }
        }

        if (response.success) {
          window.location.href = ("<?= site_url('admin/contact'); ?>");

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