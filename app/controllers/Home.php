<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $header['title'] = 'Home Page';
        $data['header'] = $header;
        $data['test'] = 'This is a test content.';
        $data['template'] = 'site/screens/home';
        $this->load->view('site/master_layout', $data);
    }
}

