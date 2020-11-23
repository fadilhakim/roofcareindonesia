<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct(){
        parent::__construct();


    }

    public function safety_lines(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('products/safety/index');
        $content['footer_web']  = $this->load->view('layout/footer_web');

        $this->load->view('layout/page_web',$content);
    }

    public function metal_roofting_system(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('products/mrs/index.php');
        $content['footer_web']  = $this->load->view('layout/footer_web');

        $this->load->view('layout/page_web',$content);
    }

    public function steep_slope_roofting(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('products/steep_slope/index');
        $content['footer_web']  = $this->load->view('layout/footer_web');

        $this->load->view('layout/page_web',$content);
    }

    public function singleply_roofting(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('products/singlepy/index');
        $content['footer_web']  = $this->load->view('layout/footer_web');

        $this->load->view('layout/page_web',$content);
    }

    public function green_roofting_option(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('products/green/index');
        $content['footer_web']  = $this->load->view('layout/footer_web');

        $this->load->view('layout/page_web',$content);
    }

    public function liquid_applied_membrande(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('products/liquid/index');
        $content['footer_web']  = $this->load->view('layout/footer_web');

        $this->load->view('layout/page_web',$content);
    }

    public function siphonic_gutter(){

        $content['header_web']  = $this->load->view('layout/header_web');
        $content['content_web'] = $this->load->view('products/siphonic/index');
        $content['footer_web']  = $this->load->view('layout/footer_web');

        $this->load->view('layout/page_web',$content);
    }

}
