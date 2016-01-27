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
            $this->load->model('survey_model');
            if($auth = $this->site_model->authenticate($this->input->post('email_address'), $this->input->post('password'))){
                if($auth === 'inactive'){
                    $this->session->set_userdata('err_msg','Your account has been inactive. Please contact to administrator');
                    redirect();
                    exit();
                }
                $userInfo = array(
                    'id_user' => $auth->id_user,
                    'display_name' => $auth->display_name,
                    'user_email' => $auth->user_email,
                    'user_type' => $auth->user_type,
                    'user_status' => $auth->user_status,
                    'is_logged_in' => TRUE
                );
                $this->session->set_userdata($userInfo);
                if($auth->user_type == 3){
                    if($this->survey_model->check_user_survey($auth->id_user)){
                        redirect('dashboard');
                        exit();
                    }else{
                        redirect('survey');
                        exit();
                    }
                }else{
                    redirect('dashboard');
                    exit();
                }
            }else{
                $msg['authentication_failed'] = 'Email address or password does not match!';
                $this->load->view('site/screens/login', $msg);
            }
        }
    }
    
    public function forgot_password(){
        if($this->input->post('forgot_pwd') <> NULL){
            $this->load->model('site_model');
            if($result = $this->site_model->check_email($this->input->post('email_address', TRUE))){
                $this->load->helper('site');
                $key = keygen(20);
                if($status = $this->site_model->update('smg_users', array('activation_key' => $key), array('id_user' => $result->id_user))){
                    $user_id = $result->id_user;
                    $this->load->library('email');
                    $config['mailtype'] = 'html';
                    $this->email->initialize($config);

                    $this->email->from('subhadip.sahoo@businessprodesigns.com', 'Subhadip Sahoo');
                    $this->email->to($result->user_email);

                    $this->email->subject("Reset password request from SMG Health Admin");

                    $msg['display_name'] = $result->display_name;
                    $msg['link'] = base_url("/reset-password/{$key}/{$user_id}");

                    $bodyMsg = $this->load->view('site/email-templates/tmpl_forgot_password', $msg, TRUE);

                    $this->email->message($bodyMsg);
                    if($this->email->send()){
                        $this->session->set_userdata(array('suc_msg' => 'You will receive a reset password link into your registered mail id. Please check your inbox.'));
                        redirect('forgot-password');
                        exit();
                    }else{
                        $this->session->set_userdata(array('err_msg' => 'Mail sending failed! Please try after sometime.'));
                        redirect('forgot-password');
                        exit();
                    }
                }
            }else{
                $this->session->set_userdata(array('err_msg' => 'Provided email does not exists. Please provide the correct email address!'));
                redirect('forgot-password');
                exit();
            }
        }else{
            $this->load->view('site/screens/forgot-password');
        }
    }
    
    public function reset_password($key, $user_id){
        $this->load->model('site_model');
        if($this->input->post('reset_pass') <> NULL){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('new_pass', 'New password', 'trim|required');
            $this->form_validation->set_rules('con_pass', 'Confirm Password', 'trim|required|matches[new_pass]');
            if($this->form_validation->run() == FALSE){            
                $this->load->view('site/screens/reset-password');
            }else{
                if($status = $this->site_model->update('smg_users', array('password' => md5($this->input->post('new_pass', TRUE))), array('id_user' => $user_id))){
                    $this->session->set_userdata(array('suc_msg' => 'Password has been successfully. Please login again.'));
                    redirect();
                    exit();
                }else{
                    $this->session->set_userdata(array('err_msg' => 'There is an error occured. Please try again later.'));
                    redirect();
                    exit();
                }
            }
        }else{
            if($result = $this->site_model->check_activation_key($key, $user_id)){
                $this->load->view('site/screens/reset-password');
            }else{
                $this->session->set_userdata(array('err_msg' => 'There is an error occured. Please try again.'));
                redirect('forgot-password');
                exit();
            }
        }
    }
}