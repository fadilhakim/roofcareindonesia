<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if(!$user = $this->session->userdata('username'))
		// {
		// 	redirect('login');
		// }else{
		//
		//
		//
		// 	$this->load->model("services_model");
		// 	$this->load->model("dashboard_model");
		//
		// 	$this->load->helper("money_format_helper");
		// }
		 $this->load->model('insert_model');
		 $this->load->model('case_studies_model');
		 $this->load->model('services_model');
		$this->load->helper(array('form', 'url'));
	}

	public function index (){
		$content['header_web']  = $this->load->view('layout/header');
    $content['content_web'] = $this->load->view('dashboard/index');
    $content['footer_web']  = $this->load->view('layout/footer');
    $this->load->view('layout/page',$content);
	}
	public function login (){
		$content['header_web']  = $this->load->view('layout/header');
    $content['content_web'] = $this->load->view('dashboard/login');
    $content['footer_web']  = $this->load->view('layout/footer');
    $this->load->view('layout/page',$content);
	}

	public function seminars (){
		$content['header_web']  = $this->load->view('layout/header');
    $content['content_web'] = $this->load->view('dashboard/seminars/index');
    $content['footer_web']  = $this->load->view('layout/footer');
    $this->load->view('layout/page',$content);
	}
	public function seminars_detail (){
		$content['header_web']  = $this->load->view('layout/header');
    $content['content_web'] = $this->load->view('dashboard/seminars/detail');
    $content['footer_web']  = $this->load->view('layout/footer');
    $this->load->view('layout/page',$content);
	}

	public function seminars_create (){
		$content['header_web']  = $this->load->view('layout/header');
    $content['content_web'] = $this->load->view('dashboard/seminars/create');
    $content['footer_web']  = $this->load->view('layout/footer');
    $this->load->view('layout/page',$content);
	}
	public function seminars_submit (){
		$judul_seminar = $this->input->post('judul_seminar');
		$kategori_seminar = $this->input->post('kategori_seminar');
		$deskripsi = $this->input->post('deskripsi');
		$this->image = $this->_uploadImage();
		$image = $_FILES['gambar_seminar']['name'];
		$data_post = array(
				'judul_seminar' => $judul_seminar,
				'kategori_seminar' => $kategori_seminar,
				'gambar_seminar' => $image,
				'deskripsi' => $deskripsi
			);
		$this->insert_model->insert_seminar($data_post,'t_seminar');

		redirect('dashboard/seminars');
	}

	private function _uploadImage(){
		$config['upload_path']          = './public/images/uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['overwrite']			      = true;
		//$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar_seminar');

			if (!$this->upload->do_upload('gambar_seminar')){
				echo "error upload";
				exit();
			}
		}


		// case studies

		public function case_studies(){

			$data['item_data'] = $this->case_studies_model->get_all_data();

			$content['header_web']  = $this->load->view('layout/header');
			$content['content_web'] = $this->load->view('dashboard/case_studies/index', $data);
			$content['footer_web']  = $this->load->view('layout/footer');

			$this->load->view('layout/page',$content);
		}

		public function case_studies_create(){

			$content['header_web']  = $this->load->view('layout/header');
			$content['content_web'] = $this->load->view('dashboard/case_studies/create');
			$content['footer_web']  = $this->load->view('layout/footer');

			$this->load->view('layout/page',$content);
		}

		public function case_studies_submit(){
			$judul_case_studies = $this->input->post('judul_case_studies');
			// $kategori_seminar = $this->input->post('kategori_seminar');
			$deskripsi = $this->input->post('deskripsi');
			$this->image = $this->_uploadImageCaseStudies();
			$image = $_FILES['gambar_case_studies']['name'];
			$data_post = array(
					'title' => $judul_case_studies,
					'image' => $image,
					'description' => $deskripsi
				);
			$this->insert_model->insert_case_studies($data_post,'t_case_studies');
	
			redirect('dashboard/case-studies');
		}

		private function _uploadImageCaseStudies(){
			$config['upload_path']          = './public/images/uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['overwrite']			      = true;
			//$config['max_size']             = 1024; // 1MB
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
	
			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar_case_studies');
	
				if (!$this->upload->do_upload('gambar_case_studies')){
					echo "error upload";
					exit();
				}
			}

			public function case_studies_delete($id){
				$deleted = $this->case_studies_model->delete_data($id);

				if($deleted){
					redirect('dashboard/case-studies');
				}
			}

			public function case_studies_edit($id){

				$getDataById = $this->case_studies_model->get_all_data_by_id($id);
				
				$data['id'] = $id;
				$data['title'] = $getDataById['title'];
				$data['description'] = $getDataById['description'];
				$data['image'] = $getDataById['image'];

		
				$content['header_web']  = $this->load->view('layout/header');
				$content['content_web'] = $this->load->view('dashboard/case_studies/edit', $data);
				$content['footer_web']  = $this->load->view('layout/footer');

				$this->load->view('layout/page',$content);
			}


			public function case_studies_update($id){
				$judul_case_studies = $this->input->post('judul_case_studies');
				$deskripsi = $this->input->post('deskripsi');

				if(!empty($_FILES['gambar_case_studies']['name'])){
					$this->image = $this->_uploadImageCaseStudies();
					$image = $_FILES['gambar_case_studies']['name'];
				}else {
					// $this->image = $this->input->post('old_image');
					$image = $this->input->post('old_image');
				}

				
				
				$data_post = array(
					'title' => $judul_case_studies,
					'image' => $image,
					'description' => $deskripsi
				);

				$updated = $this->case_studies_model->update_data($data_post, $id);

				if($updated){
					redirect('dashboard/case-studies');
				}	
			}


			// services


			public function services(){

				$data['item_data'] = $this->services_model->get_all_data();

				$content['header_web']  = $this->load->view('layout/header');
				$content['content_web'] = $this->load->view('dashboard/services-dashboard/index', $data);
				$content['footer_web']  = $this->load->view('layout/footer');

				$this->load->view('layout/page',$content);
			}

			public function services_create(){

				$content['header_web']  = $this->load->view('layout/header');
				$content['content_web'] = $this->load->view('dashboard/services-dashboard/create');
				$content['footer_web']  = $this->load->view('layout/footer');

				$this->load->view('layout/page',$content);
			}

			public function services_submit(){

				$judul_services = $this->input->post('judul_services');
				$deskripsi = $this->input->post('deskripsi');
				$this->image = $this->_uploadImageServices();
				$image = $_FILES['gambar_services']['name'];
				$data_post = array(
						'title' => $judul_services,
						'image' => $image,
						'description' => $deskripsi
					);
				$this->services_model->insert_services($data_post,'t_services');

				redirect('dashboard/services');
			}

			private function _uploadImageServices(){
				$config['upload_path']          = './public/images/uploads/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['overwrite']			      = true;
				//$config['max_size']             = 1024; // 1MB
				// $config['max_width']            = 1024;
				// $config['max_height']           = 768;
		
				$this->load->library('upload', $config);
				$this->upload->do_upload('gambar_services');
		
					if (!$this->upload->do_upload('gambar_services')){
						echo "error upload";
						exit();
					}
				}


				public function services_delete($id){
					$deleted = $this->services_model->delete_data($id);

					if($deleted){
						redirect('dashboard/services');
					}	
				}

				public function services_edit($id){

					$getDataById = $this->services_model->get_all_data_by_id($id);
				
					$data['id'] = $id;
					$data['title'] = $getDataById['title'];
					$data['description'] = $getDataById['description'];
					$data['image'] = $getDataById['image'];

			
					$content['header_web']  = $this->load->view('layout/header');
					$content['content_web'] = $this->load->view('dashboard/services-dashboard/edit', $data);
					$content['footer_web']  = $this->load->view('layout/footer');

					$this->load->view('layout/page',$content);
				}


				public function services_update($id){
					$judul_services = $this->input->post('judul_services');
					$deskripsi = $this->input->post('deskripsi');
	
					if(!empty($_FILES['gambar_services']['name'])){
						$this->image = $this->_uploadImageServices();
						$image = $_FILES['gambar_services']['name'];
					}else {
						// $this->image = $this->input->post('old_image');
						$image = $this->input->post('old_image');
					}
	
					
					
					$data_post = array(
						'title' => $judul_services,
						'image' => $image,
						'description' => $deskripsi
					);
	
					$updated = $this->services_model->update_data($data_post, $id);
	
					if($updated){
						redirect('dashboard/services');
					}	
				}

		

}
