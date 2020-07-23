<div class="section banner-page" data-background="images/dummy-img-1920x300.jpg">
		<div class="content-wrap pos-relative">
			<div class="container">
				<div class="col-12 col-md-12">
					<div class="d-flex bd-highlight mb-2">
						<div class="title-page">Services</div>
					</div>
					<nav aria-label="breadcrumb">
					  <ol class="breadcrumb ">
					    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Services</li>
					  </ol>
					</nav>
				</div>
			</div>
		</div>
    </div>
    
    <!-- SERVICES -->
	<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
                    <!-- Item 1 -->
                    <?php foreach($item_data->result() as $item) : ?>
					<div class="col-sm-12 col-md-12 col-lg-4">
						<div class="feature-box-7 shadow">
							<div class="media-box">
								<a href="services-detail.html"><img src="<?= base_url()?>public/images/uploads/<?= $item->image ?>" alt="" class="img-fluid"></a>
							</div>
							<div class="body">
								<div class="info-box">
									<div class="text">
										<div class="title"><?= $item->title ?></div>
										<p><?= $item->description ?></p>
										<a href="<?= base_url() ?>services/detail/<?= $item->id ?>" title="Get Detail">Get Detail</a>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>    