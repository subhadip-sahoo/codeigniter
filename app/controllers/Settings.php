<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
    }
    
    public function index(){
        if($this->input->post('update_email') <> NULL){
            $this->load->model('site_model');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('user_email', 'Email address', 'trim|required|valid_email|is_unique[smg_users.user_email]');

            if($this->form_validation->run() == FALSE){
                if($userdata = $this->site_model->get_userdata($this->session->userdata('id_user'))){
                    $data['user_email'] = $this->input->post('user_email', TRUE);
                }
                $data['sidebar'] = get_employee_sidebar();
                $data['id_user'] = $this->session->userdata('id_user');
                $header['title'] = 'Settings';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['error'] = 'update_email_form';
                $data['header'] = $header;
                $data['template'] = 'site/screens/admin-settings';
                $this->load->view('site/master_layout', $data);
            }else{
                $this->load->model('site_model');
                $user_data = array(
                    'user_email' => $this->input->post('user_email', TRUE),
                    'updated_at' => date(DATETIME_DATABASE_FORMAT)
                );
                $condition = array(
                    'id_user' => $this->session->userdata('id_user')
                );
                $permalink = $this->uri->segment(2);
                if($this->site_model->update('smg_users', $user_data, $condition)){
                    $this->session->set_userdata('suc_msg', 'Email has been successfully updated.');
                    redirect("settings");
                    exit();
                }else{
                    $this->session->set_userdata('err_msg', 'There is an error occured. Please try again later.');
                    redirect("settings");
                    exit();
                }
            }
        }else if($this->input->post('update_pass') <> NULL){
            $this->load->model('site_model');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('cur_pass', 'Current  password', 'trim|required');
            $this->form_validation->set_rules('new_pass', 'New pasword', 'trim|required');
            $this->form_validation->set_rules('con_pass', 'Confirm password', 'trim|required|matches[new_pass]');

            if($this->form_validation->run() == FALSE){
                if($userdata = $this->site_model->get_userdata($this->session->userdata('id_user'))){
                    $data['user_email'] = $userdata->user_email;
                }
                $data['sidebar'] = get_employee_sidebar();
                $data['id_user'] = $this->session->userdata('id_user');
                $header['title'] = 'Settings';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['error'] = 'update_pass_form';
                $data['header'] = $header;
                $data['template'] = 'site/screens/admin-settings';
                $this->load->view('site/master_layout', $data);
            }else{
                $this->load->model('site_model');
                if($this->site_model->check_pass($this->session->userdata('id_user'), md5($this->input->post('cur_pass')))){
                    $user_data = array(
                        'password' => md5($this->input->post('new_pass', TRUE)),
                        'updated_at' => date(DATETIME_DATABASE_FORMAT)
                    );
                    $condition = array(
                        'id_user' => $this->session->userdata('id_user')
                    );
                    if($this->site_model->update('smg_users', $user_data, $condition)){
                        $this->session->set_userdata('pass_suc_msg', 'Password has been successfully updated.');
                        redirect("settings");
                        exit();
                    }else{
                        $this->session->set_userdata('pass_err_msg', 'There is an error occured. Please try again later.');
                        redirect("settings");
                        exit();
                    }
                }else{
                    $this->session->set_userdata('pass_err_msg', 'Current password does not match');
                    redirect("settings");
                    exit();
                }
            }
        }else{
            $this->load->model('site_model');
            if($userdata = $this->site_model->get_userdata($this->session->userdata('id_user'))){
                $data['user_email'] = $userdata->user_email; 
            }
            $data['sidebar'] = get_employee_sidebar();
            $data['id_user'] = $this->session->userdata('id_user');            
            $header['title'] = 'Settings';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            $data['template'] = 'site/screens/admin-settings';
            $this->load->view('site/master_layout', $data);
        }
    }
}