<?php 

	class MyEmail {
		
		// update config mail 

		private $mail_config;
		private $CI;

		function __construct() {
			
			$this->CI =& get_instance();
			
			$this->CI->load->config("mail");
			$this->mail_config = $this->CI->config->item("mail");
		
		}
		
		private function set_config($newConfig = array()) {
			
			if(!empty($newConfig["email_to"])){
				$this->mail_config["email_to"] = $newConfig["email_to"];
			} 
			//elseif(empty($this->mail_config["email_to"]) && empty($newConfig["email_to"])){
			// 	$this->mail_config["email_to"] = "ariesdimasy@gmail.com";
			// }
		}

		function send($new_email = array(), $newConfig = array()) {

			$this->set_config($newConfig); // set new config

			$this->CI->load->library('email', $this->mail_config);

			// Email dan nama pengirim
			$this->CI->email->from($new_email["email_from"], $new_email["name_from"]);

			// Email penerima
			$this->CI->email->to($new_email["email_to"]); // Ganti dengan email tujuan kamu

			// Lampiran email, isi dengan url/path file
			if(isset($new_email["attachment"])){
				$this->CI->email->attach($new_email["attachment"]);
			}
			
			// Subject email
			$this->CI->email->subject($new_email["subject"]);

			// Isi email
			$this->CI->email->message($new_email["message"]);

			// Tampilkan pesan sukses atau error
			if ($this->CI->email->send()) {
				return 'Success! email sent.';
			} else {
				return 'Error! email cant be send.';
			}
			
		}

		function send_new_gmail() {

			$this->CI->load->library("phpmailer_library");
	
			$mail = $this->CI->phpmailer_library->load();
	
			//$mail = new PHPMailer();		
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);
			$mail->isSMTP();
			$mail->SMTPDebug = 0;
			$mail->Debugoutput = 'html';
			$mail->Host = '10.24.117.105';
			$mail->Port = 25;
			$mail->Username = "pmois.notification@lintasarta.co.id";
			$mail->Password = "2P69gKhD";
			
			$mail->setFrom("pmois.notification@lintasarta.co.id","DImas");
			$mail->addAddress("alhusna901@gmail.com");
			$mail->Subject = "test email";
			$mail->msgHTML("est message");
			
			if (!$mail->send()) {
				$data = "Mailer Error: " . $mail->ErrorInfo;
			}else{
				$data = "SENT!";
			}
			
			return $data;
		}

	}
	

?>
