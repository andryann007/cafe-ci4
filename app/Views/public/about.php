<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Spacing Biar Ga Kepotong Navigation Bar -->
<div class="container-fluid" style="height: 75px; background-color: black;">
</div>

<div class="container-fluid" style="background-color: black;">
    <div id="rowAbout" class="row">
        <div class="col-md-6 col-sm-12">
            <h2 id="titleAbout">What is My Cafe?</h2>
            <p class="info">My Cafe is a space where you can relax, read a book, or hangout with your friends.<br>
                My Cafe is also an exiting place to be, with live music, art shows, and other special events.<br>
                Our Motto is to serving authentic coffee and food, made with fresh ingredients</p>
        </div>
        <div class="col-md-6 col-sm-12">
            <img id="aboutUs" style="border-radius: 10px;" src="<?= base_url(); ?>/img/assets/background.jpg" class="img-fluid">
        </div>
    </div>
</div>

<hr class="divider">

<div class="container-fluid">
    <div id="rowVision" class="row">
        <div class="col-lg-6 col-md-6">
            <img id="ourVision" class="img-fluid" style="border-radius: 10px;" src="<?= base_url(); ?>/img/assets/vision.jpg" />
        </div>
        <div class="col-lg-6 col-md-6">
            <h2 id="titleVision"><span class="text-muted">Our</span> Vision</h2>
            <p class="lead text-muted"><b>Our vision is to be the leading cafe in Indonesia by delivering customer satisfaction throught <span class="text-light">"providing best product quality, giving best services, & fullfill customer needs"</span></b></p>
        </div>
    </div>
</div>

<hr class="divider">

<div class="container-fluid">
    <div id="rowMission" class="row">
        <div class="col-md-6 col-lg-6">
            <h2 id="titleMission"><span class="text-muted">Our</span> Mission</h2>
            <p class="lead text-muted"><b>Our mission is to serving our customers by <span class="text-light">providing the best products & services, even a customer request the most ridiculous request.</span></b></p>
        </div>
        <div class="col-md-6 col-lg-6">
            <img id="ourMission" class="img-fluid" style="border-radius: 10px;" src="<?= base_url(); ?>/img/assets/mission.jpg" />
        </div>
    </div>
</div>

<?= $this->endSection(); ?>