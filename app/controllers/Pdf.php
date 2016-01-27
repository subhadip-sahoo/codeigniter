<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
        $this->load->model('Pdf_model');
    }
    
    public function index(){
        $header['title'] = 'Survey Panel';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        $this->load->model('Pdf_model');
        if($docs = $this->Pdf_model->get_pdf()){
            $data['pdf'] = $docs;
        }else{
            $data['pdf'] = 'No PDF added.';
        }
        $data['template'] = 'site/screens/pdf_panel';
        $this->load->view('site/master_layout', $data);
    }
	
  }