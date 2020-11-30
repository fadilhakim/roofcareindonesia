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

      public function detail_blog($id){

        $getDataById = $this->blog_model->get_all_data_by_id($id);
                    
                    $data['id'] = $id;
                    $data['title'] = $getDataById['title'];
                    $data['description'] = $getDataById['description'];
                    $data['image'] = $getDataById['image'];
    
    
        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('news/blog/detail', $data);
        $content['footer_web']  = $this->load->view('layout/footer_web');
    
        $this->load->view('layout/page_web',$content);
      }

}