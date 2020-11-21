<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
    public function __construct(){
        parent::__construct();


    }


    public function view_new_installation(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('new_installation/index.php');
        $content['footer_web']  = $this->load->view('layout/footer_web');

        $this->load->view('layout/page_web',$content);
    }

    public function view_re_roofing(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('re_roofing/index.php');
        $content['footer_web']  = $this->load->view('layout/footer_web');
    
        $this->load->view('layout/page_web',$content);
    }

    public function view_retrofitting(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('retrofitting/index.php');
        $content['footer_web']  = $this->load->view('layout/footer_web');
    
        $this->load->view('layout/page_web',$content);
    }

    public function view_roof_inspection(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('roof_inspection/index.php');
        $content['footer_web']  = $this->load->view('layout/footer_web');
    
        $this->load->view('layout/page_web',$content);
    }

    public function view_roof_repair(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('roof_repair/index.php');
        $content['footer_web']  = $this->load->view('layout/footer_web');
    
        $this->load->view('layout/page_web',$content);
    }

    public function view_roof_maintenance(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('roof_maintenance/index.php');
        $content['footer_web']  = $this->load->view('layout/footer_web');
    
        $this->load->view('layout/page_web',$content);
    }
}