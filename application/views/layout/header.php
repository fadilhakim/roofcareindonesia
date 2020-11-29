
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Roof Care Indonesia</title>

    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="<?= base_url();?>public/font/fonts.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url();?>public/font/icons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url();?>public/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url();?>public/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url();?>public/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?= base_url();?>public/plugins/morrisjs/morris.css" rel="stylesheet" />

	<!-- Bootstrap Select Css -->
    <link href="<?= base_url();?>public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

     <!-- Bootstrap DatePicker Css -->
    <link href="<?= base_url();?>public/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?= base_url();?>public/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

	<!-- Sweet Alert Css -->
    <link href="<?= base_url();?>public/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

	<!-- JQuery DataTable Css -->
    <link href="<?= base_url();?>public/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

	<!-- Select2 Autocomplete Css -->
	<link href="<?= base_url();?>public/plugins/select2/select2.css" rel="stylesheet">

	<!-- Custom Css -->
    <link href="<?= base_url();?>public/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url();?>public/css/themes/all-themes.css" rel="stylesheet" />

	<script src="https://use.fontawesome.com/737e64ddbd.js"></script>


	<link rel="stylesheet" href="<?= base_url();?>public/css/hummingbird-treeview.css" type="text/css" />

    <script>
        const hostname = "<?=getenv("HOSTNAME")?>"; // THIS IS FROM ENV
        const base_url = "<?=getenv("BASE_URL")?>"; // THIS IS FROM ENV
    </script>

</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#">Roofcare Indonesia <br/> Content Management</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">

            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url();?>public/images/dummy/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <!-- <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $user['fullname']; ?></div>
                    <div class="email"><?= $user['email']; ?></div> -->
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="<?= base_url().'settings/password/'.$user["id"] ?>"><i class="material-icons">settings</i>Password Change</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?= base_url(); ?>login/logout"><i class="material-icons">input</i>Sign Out</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                  <li class="header">MAIN NAVIGATION</li>

                  <li>
                    <a href="#">
                      <i class="material-icons">widgets</i>
                      <span>Dashboard</span>
                    </a>
                  </li>

                  <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">verified_user</i>
                        <span>Systems</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="#">
                                <span>Cards 1</span>
                            </a>
                        </li>
                    </ul>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>dashboard/services">
                        <i class="material-icons">build</i>
                        <span>Services</span>
                    </a>
                  </li>

                  <li>
                    <a href="<?= base_url() ?>dashboard/seminars">
                      <i class="material-icons">event</i>
                      <span>Seminars</span>
                    </a>
                  </li>

                  <li>
                    <a href="<?= base_url() ?>dashboard/case-studies">
                      <i class="material-icons">find_in_page</i>
                      <span>Case Studies</span>
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url() ?>dashboard/blog">
                      <i class="material-icons">find_in_page</i>
                      <span>Blog</span>
                    </a>
                  </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 <a href="javascript:void(0);">Roofcare Indonesia</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

        <!-- Right Sidebar -->
        <!-- #END# Right Sidebar -->
    </section>
