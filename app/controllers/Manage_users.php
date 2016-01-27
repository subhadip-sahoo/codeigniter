<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_users extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
        $this->load->model('user_model');
        $this->load->model('site_model');
        $this->load->library('pagination');
    }
    
    public function index(){
        $pagiConfig = paginav(base_url('manage-users/page'), $this->user_model->get_users_count(), 5, 3, base_url('manage-users'));
        $page = ($this->uri->segment($pagiConfig['uri_segment'], 0)) ? $this->uri->segment($pagiConfig['uri_segment']) : 0;
        if($users = $this->user_model->get_users($pagiConfig['per_page'], $page)){
            $data['users'] = $users;
        }else{
            $data['users'] = 'No users found to display';
        }
        $data['pagination'] = $this->pagination->create_links();
        $header['title'] = 'Manage Users';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        $data['template'] = 'site/screens/manage_users';
        $this->load->view('site/master_layout', $data);
    }
    
    public function page(){
        $pagiConfig = paginav(base_url('manage-users/page'), $this->user_model->get_users_count(), 5, 3, base_url('manage-users'));
        $page = ($this->uri->segment($pagiConfig['uri_segment'], 0)) ? $this->uri->segment($pagiConfig['uri_segment']) : 0;
        if($users = $this->user_model->get_users($pagiConfig['per_page'], $page)){
            $data['users'] = $users;
        }else{
            $data['users'] = 'No users found to display';
        }
        $data['pagination'] = $this->pagination->create_links();
        $header['title'] = 'Manage Users';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        $data['template'] = 'site/screens/manage_users';
        $this->load->view('site/master_layout', $data);
    }
    
    public function delete(){
        $this->load->model('site_model');
        if($this->site_model->delete('smg_users', array('id_user' =>$this->uri->segment(3)))){
            $this->session->set_userdata(array('suc_msg' => 'Item has been successfully deleted.'));
            redirect('manage-users');
            exit();
        }else{
            $this->session->set_userdata(array('err_msg' => 'There is an error occured. Please try after sometime.'));
            redirect('manage-users');
            exit();
        }
    }
}