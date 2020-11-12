<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roofcare Indonesia</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="giyanta">

	<!-- ==============================================
	Favicons
	=============================================== -->
	<link rel="shortcut icon" href="<?= base_url();?>/public/images/logo_roofcareIndonesia_icon.png">
	<link rel="apple-touch-icon" href="<?= base_url();?>/public/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?= base_url();?>/public/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?= base_url();?>/public/images/apple-touch-icon-114x114.png">

	<!-- ==============================================
	CSS VENDOR
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/fe/css/vendor/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/fe/css/vendor/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/fe/css/vendor/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/fe/css/vendor/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/fe/css/vendor/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/fe/css/vendor/animate.min.css">

	<!-- ==============================================
	Custom Stylesheet
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/fe/css/style.css" />

    <script src="<?= base_url();?>/public/fe/js/vendor/modernizr.min.js"></script>

</head>

<body data-spy="scroll" data-target="#navbar-example">

	<!-- LOAD PAGE -->
	<div class="animationload">
		<div class="loader"></div>
	</div>

	<!-- BACK TO TOP SECTION -->
	<a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

	<!-- HEADER -->
    <div class="header header-1">
    	<!-- TOP BAR -->
    	<div class="topbar d-none d-md-block">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-sm-6 col-md-6">
						<p class="mb-0">Hotline service : 0821-031-3011-20</p>
					</div>

					<div class="col-sm-6 col-md-6">
						<div class="sosmed-icon d-inline-flex pull-right">
							<p class="mb-0" href="#"><i class="fa fa-envelope"></i> Email : kontak@roofcareindonesia.com</p>
						</div>
					</div>


				</div>
			</div>
		</div>

		<!-- NAVBAR SECTION -->
		<div class="navbar-main">
			<div class="container">
			    <nav id="navbar-example" class="navbar navbar-expand-lg">
			        <a class="navbar-brand" href="<?= base_url();?>">
						    <img style="width:50%" src="<?= base_url();?>/public/images/logo_roofcareIndonesia.png" alt="" />
		          </a>
			        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			            <span class="navbar-toggler-icon"></span>
			        </button>
			        <div class="collapse navbar-collapse" id="navbarNavDropdown">
			            <ul class="navbar-nav ml-auto">
			                <li class="nav-item">
			                    <a class="nav-link" href="<?= base_url();?>">
      						          HOME
      						        </a>
			                </li>

			                <li class="nav-item">
			                    <a class="nav-link" href="<?= base_url();?>about">
					                  ABOUT US
						              </a>
    			                <!-- <div class="dropdown-menu">
    			                  <a class="dropdown-item" href="about-company.html">OUR COMPANY</a>
    	          						<a class="dropdown-item" href="about-history.html">COMPANY HISTORY</a>
    	          						<a class="dropdown-item" href="about-partners.html">OUR PARTNERS</a>
    					            </div> -->
			                </li>
                      <?php $getCategorySystems = $this->sistems_model->get_all_systems_category() ?>
                      <?php $getSubCategorySystems = $this->sistems_model->get_all_systems_sub_category() ?>

                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SYSTEMS</a>
                        <div class="dropdown-menu">
                          <?php foreach ($getCategorySystems->result() as $keyS): ?>
                              <a class="dropdown-item" href="#"><?= $keyS->judul ?></a>
                          <?php endforeach; ?>

                          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Green Roofing Options</a>
                          <div class="dropdown-menu">
    			                  <a class="dropdown-item" href="about-company.html">Gradern Roofs</a>
    	          						<a class="dropdown-item" href="about-history.html">Cool Roofs</a>
    					            </div>
                          <aclass="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gutter Solutions</a>
                          <div class="dropdown-menu">
    			                  <a class="dropdown-item" href="about-company.html">Conventional</a>
    	          						<a class="dropdown-item" href="about-history.html">Siphonic Systems</a>
    					            </div>
                        </div>
                      </li>
                      <?php $getCategoryServices = $this->services_model->get_all_services_category() ?>
			                <li class="nav-item dropdown">
			                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SERVICES</a>
                          <div class="dropdown-menu">

                             <?php foreach ($getCategoryServices->result() as $key): ?>
                                 <a class="dropdown-item" href="<?= base_url(); ?>service_detail/<?= $key->id ?>"><?= $key->judul ?></a>
                             <?php endforeach; ?>
                          </div>
			                </li>



			                <li class="nav-item dropdown">
			                    <a class="nav-link" href="<?= base_url() ?>seminars">
      						          SEMINARS
      						        </a>
			                </li>

			                <li class="nav-item dropdown">
			                    <a class="nav-link" href="<?= base_url() ?>case_studies">
      						          CASE STUDIES
      						        </a>
			                </li>

			                <li class="nav-item">
			                    <a class="nav-link" href="<?= base_url() ?>contact">CONTACT</a>
			                </li>

			            </ul>
			        </div>
			    </nav> <!-- -->
			</div>
		</div>

    </div>
