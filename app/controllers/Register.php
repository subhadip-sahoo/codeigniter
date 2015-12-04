<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $header['title'] = 'Registration';
        $data['header'] = $header;
        $data['template'] = 'site/screens/register';
        $this->load->view('site/master_layout', $data);
    }
    
    public function registration(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('display_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('user_email', 'Email Address', 'trim|required|valid_email|is_unique[smg_users.user_email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
        if($this->form_validation->run() == FALSE){
            $this->index();
        }
        else{
            $this->load->model('site_model');
            $data = array(
                'display_name' => $this->input->post('display_name', TRUE),
                'user_email' => $this->input->post('user_email', TRUE),
                'user_type' => $this->input->post('user_type', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
                'created_at' => date(DATETIME_DATABASE_FORMAT),
                'updated_at' => date(DATETIME_DATABASE_FORMAT)
            );
            if($this->site_model->insert('smg_users', $data)){
                $header['title'] = 'Registration';
                $data['header'] = $header;
                $data['suc_msg'] = 'You have successfully ragister.';
                $data['template'] = 'site/screens/register';
                $this->load->view('site/master_layout', $data);
            }
        }
    }
}