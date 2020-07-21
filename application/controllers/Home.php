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

  public function detail_case_studies(){

    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('case_studies/detail');
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

  public function seminars(){

    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('seminars/index');
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

  public function detail_seminars(){

    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('seminars/detail');
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

  public function page404(){

    $content['header_web']  = $this->load->view('layout/header_web');
    $content['content_web'] = $this->load->view('page404');
    $content['footer_web']  = $this->load->view('layout/footer_web');

    $this->load->view('layout/page_web',$content);
  }

}
