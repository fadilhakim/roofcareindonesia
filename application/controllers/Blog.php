<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller{


    public function __construct()
	{
		parent::__construct();

		 
 
     $this->load->model('blog_model');
    }
    

    public function index(){

        $data['item_data'] = $this->blog_model->get_all_data();

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('news/blog/index', $data);
        $content['footer_web']  = $this->load->view('layout/footer_web');
    
        $this->load->view('layout/page_web',$content);
      }

}