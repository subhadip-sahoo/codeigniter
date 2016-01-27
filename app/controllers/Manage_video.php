<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_video extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
        $this->load->model('Video_model');
    }
    
    public function index(){
        $header['title'] = 'Admin Dashboard';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        $this->load->model('Video_model');
        if($vids = $this->Video_model->get_video()){
            $data['vids'] = $vids;
        }else{
            $data['vids'] = 'No video added.';
        }
        $data['template'] = 'site/screens/manage_video';
        $this->load->view('site/master_layout', $data);
    }
	
    public function delete_row(){
        if($this->Video_model->row_delete($this->uri->segment(3))){
            $this->session->set_userdata(array('suc_msg' => 'Video has been successfully deleted.'));
            redirect('manage-video');
            exit();
        }else{
            $this->session->set_userdata(array('err_msg' => 'There is an error occured. Please try after sometime.'));
            redirect('manage-video');
            exit();
        }
    }
}