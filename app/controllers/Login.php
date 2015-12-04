<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if($this->session->userdata('is_logged_in')){
            redirect('dashboard');
            exit();
        }
    }
    
    public function index(){
        $this->load->view('site/screens/login');
    }
    
    public function login(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
        $this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run() == FALSE){            
            $this->load->view('site/screens/login');
        }
        else{
            $this->load->model('site_model');
            if($auth = $this->site_model->authenticate($this->input->post('email_address'), $this->input->post('password'))){
                $userInfo = array(
                    'id_user' => $auth->id_user,
                    'display_name' => $auth->display_name,
                    'user_email' => $auth->user_email,
                    'user_type' => $auth->user_type,
                    'user_status' => $auth->user_status,
                    'is_logged_in' => TRUE
                );
                $this->session->set_userdata($userInfo);
                redirect('dashboard');
                exit();
            }else{
                $msg['authentication_failed'] = 'Email address or password does not match!';
                $this->load->view('site/screens/login', $msg);
            }
        }
    }
}