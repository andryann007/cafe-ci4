<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

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

<script type="text/javascript">
    $('.formKirimPesan').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
                $('.btnSendMessage').attr('disable', 'disabled');
                $('.btnSendMessage').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.btnSendMessage').removeAttr('disable');
                $('.btnSendMessage').html('<i class="fa fa-paper-plane"></i> Kirim');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.nama) {
                        $('.modal-body #nama').addClass('is-invalid');
                        $('.errorNama').html(response.error.nama);
                    } else {
                        $('.modal-body #nama').removeClass('is-invalid');
                        $('.errorNama').html();
                    }

                    if (response.error.email) {
                        $('.modal-body #email').addClass('is-invalid');
                        $('.errorEmail').html(response.error.email);
                    } else {
                        $('.modal-body #email').removeClass('is-invalid');
                        $('.errorEmail').html();
                    }

                    if (response.error.password) {
                        $('.modal-body #message').addClass('is-invalid');
                        $('.errorMessage').html(response.error.password);
                    } else {
                        $('.modal-body #message').removeClass('is-invalid');
                        $('.errorMessage').html();
                    }
                }

                if (response.success) {
                    window.location.href = ("<?= site_url('home/contact'); ?>");

                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.success
                    })
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
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

<?= $this->endSection(); ?>