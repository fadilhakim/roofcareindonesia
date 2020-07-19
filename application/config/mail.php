<?php 

	$config["mail"]['mailtype']  = 'html';
	$config["mail"]['charset']   = 'utf-8';
	$config["mail"]['protocol']  = getenv("MAIL_SMTP_PROTOCOL");
	$config["mail"]['smtp_host'] = getenv("MAIL_SMTP_HOST");
	$config["mail"]['smtp_user'] = getenv("MAIL_SMTP_USER");
	$config["mail"]['smtp_pass'] = getenv("MAIL_SMTP_PASS");
	$config["mail"]['smtp_port'] = getenv("MAIL_SMTP_PORT");
	$config["mail"]['smtp_crypto'] = "tls";
	// $config["mail"]["ssl"]["verify_peer"] = false;
	// $config["mail"]["ssl"]["verify_peer_name"] = false;
	// $config["mail"]["ssl"]["allow_self_signed"] = true;
	$config["mail"]['crlf']      = "\r\n";
	$config["mail"]['newline']   = "\r\n";

	$config["mail"]["email_to"] = ""; // untuk keperluan test
