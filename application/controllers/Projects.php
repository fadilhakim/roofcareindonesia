<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {
    public function __construct(){
        parent::__construct();


    }


    public function view_residentials(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('projects/residentials/index.php');
        $content['footer_web']  = $this->load->view('layout/footer_web');

        $this->load->view('layout/page_web',$content);
    }

    public function view_commercials(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('projects/commercials/index.php');
        $content['footer_web']  = $this->load->view('layout/footer_web');

        $this->load->view('layout/page_web',$content);
    }

    public function view_industrials(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('projects/industrials/index.php');
        $content['footer_web']  = $this->load->view('layout/footer_web');

        $this->load->view('layout/page_web',$content);
    }


}