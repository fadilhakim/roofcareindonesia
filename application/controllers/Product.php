<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
    public function __construct(){
        parent::__construct();


    }

    public function view_metal_roofting_system(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('services/mrs/index');
        $content['footer_web']  = $this->load->view('layout/footer_web');

        $this->load->view('layout/page_web',$content);
    }

}
