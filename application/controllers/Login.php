<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}
  // public function index(){
  //     $this->load->view('login');
  // }

	public function index()
	{
		$message = '';

		if($this->input->post()){
			$this->form_validation->set_error_delimiters('', '<br/>');
			$this->form_validation->set_rules('password', 'Password', 'trim|callback_check_password');

			if ($this->form_validation->run() == FALSE){
				if(validation_errors() != false){
					$message .= '<div class="alert alert-danger" role="alert" style="padding:25px;">';
					$message .= '<strong>Error <span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></strong> ';
					$message .= ' A problem has been occurred while Login<br/>';
					$message .= validation_errors('<li>', '</li>');
					$message .= '</div>';
				}
			}else{
			    $username = $this->input->post('username');
				$result = $this->login_model->get_user_data($username);

				if ($result != false) {
					$session_data = array(
						'id' => $result->id,
						'username' => $result->username,
						'fullname' => $result->fullname,
						'email' => $result->email
					);

					$this->session->set_userdata($session_data);
					$group_id = $result->group_id;
          redirect('dashboard',$data);

				}
			}
		}else{

		}

		$data['err_msg'] = $message;
	    $this->load->view('login',$data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	public function check_password()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => MD5($this->input->post('password'))
		);
		$result = $this->login_model->check_password($data);
		if ($result == false) {
			$this->form_validation->set_message('check_password','Invalid Username or Password');
			return false;
		}else{
			return true;
		}
	}
}
