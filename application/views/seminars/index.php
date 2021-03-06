<!-- BANNER -->
<div class="section banner-page" data-background="<?= base_url() ?>public/images/dummy/parallax-2.jpg">
  <div class="content-wrap pos-relative">
    <div class="container">
      <div class="col-12 col-md-12">
        <div class="d-flex bd-highlight mb-2">
          <div class="title-page">Roofing Seminars</div>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a href="index.html">Services</a></li>
            <li class="breadcrumb-item active" aria-current="page">Roofing Seminars</li>
          </ol>
        </nav>
      </div>
    </div>

  </div>
</div>


  <!-- CONTENT -->
	<div id="class" class="">
		<div class="content-wrap">
			<div class="container">

				<div class="row">
					<div class="col-12 col-sm-12 col-md-4 order-last">

        </div>
      </div>
      <div class="row gutter-5 grid-v1">
        <div class="grid-sizer-v1"></div>
        <div class="gutter-sizer-v1"></div>
        <?php foreach ($data_seminar->result() as $seminar): ?>

          <div class="col-sm-6 col-md-4 grid-item-v1 eco manufacturing gas">
            <div class="box-image-5 shadow">
              <a href="<?php echo base_url() ?>seminars/detail/<?= $seminar->id ?>" title="Industrial Complex">
                <div class="media">
                  <img src="<?= base_url();?>public/images/dummy-img-600x500.jpg" alt="" class="img-fluid">
                </div>
                <div class="body">
                  <div class="content">
                    <h4 class="title"><?= $seminar->judul_seminar ?></h4>
                    <span class="category"><?= $seminar->kategori_seminar ?></span>
                  </div>
                </div>
              </a>
            </div>
          </div>

        <?php endforeach; ?>
