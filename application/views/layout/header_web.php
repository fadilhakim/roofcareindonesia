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
						    <img style="width:70%" src="<?= base_url();?>/public/images/logo_roofcare.jpg" alt="" />
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
					                  ABOUT
						              </a>
			                </li>

                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="dropdownMenuButton1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PRODUCTS</a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                          <a style="font-weight:normal;" class="nav-link" href="<?= base_url();?>product/safety_lines">
                            Safety Lines
                          </a>

                          <a style="font-weight:normal;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Systems</a>
                          <div class="dropdown-menu">
    			                     <a class="dropdown-item" href="<?= base_url();?>product/metal_roofting_system">Metal Roofing Systems</a>
      				                 <a class="dropdown-item" href="<?= base_url();?>product/steep_slope_roofting">Steep Slope Roofing</a>
                               <a class="dropdown-item" href="<?= base_url();?>product/singleply_roofting">Single-ply Roofing Systems</a>
                               <a class="dropdown-item" href="<?= base_url();?>product/green_roofting_option">Green Roofing Options</a>
                               <a class="dropdown-item" href="<?= base_url();?>product/liquid_applied_membrande">Liquid Applied Membrane</a>
                               <a class="dropdown-item" href="<?= base_url();?>product/siphonic_gutter">Siphonic Gutter</a>
    					            </div>

                        </div>




                      </li>

			                <li class="nav-item dropdown">

        							  <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SERVICES</a>
          							  <div class="dropdown-menu">
            								<a class="dropdown-item" href="<?= base_url() ?>services/new-installation">New Installation</a>
            								<a class="dropdown-item" href="<?= base_url() ?>services/re-roofing">Re-roofing</a>
            								<a class="dropdown-item" href="<?= base_url() ?>services/retrofitting">Retrofitting</a>
            								<a class="dropdown-item" href="<?= base_url() ?>services/roof-inspection">Roof Inspection</a>
            								<a class="dropdown-item" href="<?= base_url() ?>services/roof-repair">Roof Repair</a>
            								<a class="dropdown-item" href="<?= base_url() ?>services/roof-maintenance">Roof Maintenance</a>
            								<a class="dropdown-item" href="<?= base_url() ?>services/roofing-seminars">Roofing Seminars*</a>
            								<a class="dropdown-item" href="<?= base_url() ?>services/roof-restoration">Roof Restoration</a>
            								<a class="dropdown-item" href="<?= base_url() ?>services/roof-cleaning">Roof Cleaning</a>
            								<a class="dropdown-item" href="<?= base_url() ?>services/engineering">Engineering</a>
            								<a class="dropdown-item" href="<?= base_url() ?>services/view_estimating">Estimating</a>
          							</div>
		                  </li>


        							<li class="nav-item dropdown">
        								<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PROJECTS</a>
        								<div class="dropdown-menu">
        									<a class="dropdown-item" href="<?= base_url() ?>projects/residentials">Residentials</a>
        									<a class="dropdown-item" href="<?= base_url() ?>projects/commercials">Commercials</a>
        									<a class="dropdown-item" href="<?= base_url() ?>projects/industrials">Industrials</a>
        								</div>
    	                </li>

		                <li class="nav-item dropdown">
      								<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">NEWS</a>
      								<div class="dropdown-menu">
      									<a class="dropdown-item" href="<?= base_url() ?>case_studies">Case Studies</a>
      									<a class="dropdown-item" href="<?= base_url() ?>news/blog">Blog</a>
      								</div>
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
