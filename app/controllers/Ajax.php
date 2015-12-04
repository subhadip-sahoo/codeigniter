<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        if(!$this->input->post_get('action') == 'DOING_AJAX' || $this->input->post_get('action') == NULL){
            die('RESTRICTED');
        }
        $this->load->model('site_model');
    }
    
    public function check_permalink(){
        if($this->site_model->check_permalink($this->input->post_get('permalink'))){
            echo 'unique';
        }else{
            echo 'exists';
        }
    }
    /*
    *{{
    *    Function: get_data
    *    Description: used for ajax call in organization settings page. 
    *    Status: This function has been depreciated
    *}}
    */
    public function get_data(){
        $data_arr = array();
        if($data = $this->site_model->get_user_details($this->session->userdata('id_user'), $this->input->post_get('option_name'))){
            $details_arr = explode(',', $data);
            $count = 0;
            foreach($details_arr as $da){
                $count++;
                $arr = array(
                    'name' => 'organization_depertments[]',
                    'id' => 'organization_depertments_'.$count,
                    'value' => $da
                );
                array_push($data_arr, (object)$arr);
            }
            echo json_encode($data_arr);
        }
    }
}
