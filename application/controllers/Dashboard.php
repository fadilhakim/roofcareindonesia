<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$user = $this->session->userdata('username'))
		{
			redirect('dashboard/login');
		}else{
			$this->load->model('insert_model');
	 	  $this->load->model('case_studies_model');

	 	  $this->load->model('seminar_model');
	 	  $this->load->model('services_model');

	 	  $this->load->helper(array('form', 'url'));
		}

	}

	public function index (){
		$content['header_web']  = $this->load->view('layout/header');
    $content['content_web'] = $this->load->view('dashboard/index');
    $content['footer_web']  = $this->load->view('layout/footer');
    $this->load->view('layout/page',$content);
	}
	public function login (){
    // $content['content_web'] = $this->load->view('login');
    // $this->load->view('layout/page',$content);
		//$this->load->view('login');
		echo "aduhai";
	}

	public function seminars (){
		$data['data_seminar'] = $this->seminar_model->get_all_data();
		$content['header_web']  = $this->load->view('layout/header');
    $content['content_web'] = $this->load->view('dashboard/seminars/index', $data);
    $content['footer_web']  = $this->load->view('layout/footer');
    $this->load->view('layout/page',$content);
	}
	public function seminars_create (){
		$content['header_web']  = $this->load->view('layout/header');
    $content['content_web'] = $this->load->view('dashboard/seminars/detail');
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

		public function seminars_edit($id){

			$getDataById = $this->seminar_model->get_all_data_by_id($id);
			$data['data_category'] = $this->seminar_model->get_all_seminar_category();

			$data['id'] = $id;
			$data['judul_seminar'] = $getDataById['judul_seminar'];
			$data['deskripsi'] = $getDataById['deskripsi'];
			$data['gambar_seminar'] = $getDataById['gambar_seminar'];
			$data['create_date'] = $getDataById['create_date'];
			$data['no_category'] = $getDataById['kategori_seminar'];

			$content['header_web']  = $this->load->view('layout/header');
			$content['content_web'] = $this->load->view('dashboard/seminars/edit', $data);
			$content['footer_web']  = $this->load->view('layout/footer');

			$this->load->view('layout/page',$content);
		}

		public function seminars_update($id){
			$judul_seminar = $this->input->post('judul_seminar');
			$deskripsi = $this->input->post('deskripsi');
			$kategori_seminar = $this->input->post('kategori_seminar');

			if(!empty($_FILES['gambar_seminar']['name'])){
				$this->gambar_seminar = $this->_uploadImage();
				$gambar_seminar = $_FILES['gambar_seminar']['name'];
			}else {
				// $this->image = $this->input->post('old_image');
				$gambar_seminar = $this->input->post('old_image');
			}

			$data_post = array(
				'judul_seminar' => $judul_seminar,
				'gambar_seminar' => $gambar_seminar,
				'kategori_seminar' => $kategori_seminar,
				'deskripsi' => $deskripsi
			);

			$updated = $this->seminar_model->update_data($data_post, $id);

			if($updated){
				redirect('dashboard/seminars');
			}
		}

		public function seminars_delete($id){
			$deleted = $this->seminar_model->delete_data($id);

			if($deleted){
				redirect('dashboard/seminars');
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
