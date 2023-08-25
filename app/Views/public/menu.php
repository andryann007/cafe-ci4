<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Spacing Biar Ga Kepotong Navigation Bar -->
<div class="nav-border-bottom container-fluid" style="height: 75px; background-color: black;">
</div>

<div class="container-fluid containerProduct" style="background-color: black; margin-top:10px;">
    <!-- Three columns of text below the carousel -->
    <h2 id="titleProduct"><b>Our Product<b></h2>
    <div id="rowProduct" class="row" style="justify-content: center; text-align:center; border-radius: 2px;">
        <?php foreach ($products as $product) : ?>
            <div id="productCard" class="col-lg-3 col-md-3 col-sm-3 text-dark">
                <img id="productImage" src="<?= base_url(); ?>/img/uploads/<?= $product['product_image']; ?>" class="img-fluid" />
                <h3 id="productName"><?= $product['product_name']; ?></h3>
                <p id="productPrice"><?= "Rp. " . number_format($product['product_price'], 2, ',', '.'); ?></p>
                <!-- <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p> -->
            </div><!-- /.col-lg-4 -->
        <?php endforeach; ?>
    </div><!-- /.row -->
</div>

<?= $this->endSection(); ?>