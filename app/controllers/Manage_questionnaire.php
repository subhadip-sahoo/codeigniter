<?php

class Manage_questionnaire extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
        $this->load->model('questionnaire_model');
    }
    
    public function index(){
        $header['title'] = 'Admin Dashboard';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        if($questions = $this->questionnaire_model->get_questionnaire()){
            $data['questions'] = $questions;
        }
        $data['template'] = 'site/screens/manage_questionnaire';
        $this->load->view('site/master_layout', $data);
    }
}

