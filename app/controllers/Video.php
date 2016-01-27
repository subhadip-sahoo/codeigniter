<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
        $this->load->model('Video_model');
    }
    
    public function index(){
        $header['title'] = 'Survey Panel';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        $this->load->model('Video_model');
        if($vids = $this->Video_model->get_video()){
            $data['vids'] = $vids;
        }else{
            $data['vids'] = 'No video added.';
        }
        $data['template'] = 'site/screens/video_panel';
        $this->load->view('site/master_layout', $data);
    }
	
}