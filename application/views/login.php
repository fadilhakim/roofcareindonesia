<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PMOIS | PT Lintasarta</title>
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

    <!-- Custom Css -->
    <link href="<?= base_url();?>public/css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        
        <div class="card">
            <div class="body">
				<div class="logo">
					<a><b>PROGRAM MANAGEMENT OFFICE<br/>INFORMATION SYSTEM</b>
					<img src="public/images/icon/lintas.jpg" height="100" alt="" />
					</a>
				</div>
								
                <!--
				<form id="sign_in" method="POST">
				-->
				<form action="<?= base_url().'login'; ?>" id="form_login" name="form_login"  method="post" class="form-login" accept-charset="utf-8">
                    <!--
					<div class="msg">Sign in to start your session</div>
					-->
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
					<?= $err_msg; ?>
                    <div class="row">
						<!--
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
						-->
                        <div class="col-xs-4 right">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">Login</button>
                        </div>
                    </div>
					<!--
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="sign-up.html">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div>
					-->
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= base_url();?>public/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url();?>public/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url();?>public/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url();?>public/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url();?>public/js/admin.js"></script>
    <script src="<?= base_url();?>public/js/pages/_login/login.js"></script>
</body>

</html>