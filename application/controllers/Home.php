<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Home extends CI_Controller
{

  public function __construct()
	{
		parent::__construct();


     $this->load->model('case_studies_model');
     $this->load->model('services_model');
     $this->load->model('seminar_model');
	}

  public function index(){

    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('index');
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

  public function about(){

    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('about');
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

  public function contact(){

    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('contact');
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

  public function case_studies(){

    $data['item_data'] = $this->case_studies_model->get_all_data();

    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('case_studies/index', $data);
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

  public function detail_case_studies($id){

    $getDataById = $this->case_studies_model->get_all_data_by_id($id);

				$data['id'] = $id;
				$data['title'] = $getDataById['title'];
				$data['description'] = $getDataById['description'];
				$data['image'] = $getDataById['image'];


    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('case_studies/detail', $data);
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

  public function seminars(){
    $data['data_seminar'] = $this->seminar_model->get_all_data();
    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('seminars/index',$data);
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

  public function detail_seminars($id){

    $getDataById = $this->seminar_model->get_all_data_by_id($id);

		$data['id'] = $id;
		$data['judul_seminar'] = $getDataById['judul_seminar'];
		$data['deskripsi'] = $getDataById['deskripsi'];
		$data['gambar_seminar'] = $getDataById['gambar_seminar'];

    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('seminars/detail',$data);
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

  public function page404(){

    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('page404');
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

  public function services(){

    $data['item_data'] = $this->services_model->get_all_data();

    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('services-page/index', $data);
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

  public function detail_services($id){
    $getDataById = $this->services_model->get_all_data_by_id($id);

    $data['id'] = $id;
    $data['title'] = $getDataById['title'];
    $data['description'] = $getDataById['description'];
    $data['image'] = $getDataById['image'];


    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('services-page/detail', $data);
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

}
