<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_feedback extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
        $this->load->model('site_model');
        $this->load->model('feedback_model');
    }
    
    public function index(){
        if($result = $this->feedback_model->get_all_dimensions_feedback()){
            $data['data'] = $result;
        }else{
            $data['data'] = 'There is no feedback to display';
        }
        $header['title'] = 'Manage feedback';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        $data['template'] = 'site/screens/manage_feedback';
        $this->load->view('site/master_layout', $data);
    }
    
    public function add(){
        if($this->input->post('add_feedback') <> NULL){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('dimension', 'Dimension', 'trim|required');
            $this->form_validation->set_rules('score_range', 'Score range', 'trim|required|callback_check_range_by_dimension');
            $this->form_validation->set_rules('feedback', 'Feedback', 'trim|required');
            $this->form_validation->set_message('check_range_by_dimension', 'The score range is already exists for this dimension');
            if($this->form_validation->run() === FALSE){
                if($dimensions = $this->site_model->get_all('smg_questionnaire', array('parent' => 0))){
                    $data['dimensions'] = $dimensions;
                }else{
                    $data['dimensions'] = '';
                }
                $header['title'] = 'Add Feedback';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['header'] = $header;
                $data['template'] = 'site/screens/add_feedback';
                $this->load->view('site/master_layout', $data);
            }else{
                $range = explode('-', $this->input->post('score_range', TRUE));
                $data = array(
                    'id_dimension' => $this->input->post('dimension', TRUE),
                    'from_value' => $range[0],
                    'to_value' => $range[1],
                    'feedback' => $this->input->post('feedback', TRUE),
                    'link' => $this->input->post('link', TRUE),
                    'created_at' => date(DATETIME_DATABASE_FORMAT),
                    'updated_at' => date(DATETIME_DATABASE_FORMAT)
                );
                if($this->site_model->insert('smg_feedback', $data)){
                    $this->session->set_userdata('suc_msg', 'Feedback has been successfully created.');
                    redirect('manage-feedback');
                    exit();
                }else{
                    $this->session->set_userdata('err_msg', 'There is an error occured. Please try after sometime.');
                    redirect('manage-feedback');
                    exit();
                }
            }
        }else{
            if($dimensions = $this->site_model->get_all('smg_questionnaire', array('parent' => 0))){
                $data['dimensions'] = $dimensions;
            }else{
                $data['dimensions'] = '';
            }
            $header['title'] = 'Add Feedback';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            $data['template'] = 'site/screens/add_feedback';
            $this->load->view('site/master_layout', $data);
        }
    }
    
    public function edit(){
        if($this->uri->segment(3, 0) === FALSE){
            $this->session->set_userdata('err_msg', 'Invalid request');
            redirect('manage-feedback');
            exit();
        }
        if(!$this->site_model->get_all('smg_feedback')){
            $this->session->set_userdata('err_msg', 'Invalid edit request');
            redirect('manage-feedback');
            exit();
        }
        if($this->input->post('edit_feedback') <> NULL){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('feedback', 'Feedback', 'trim|required');
            if($this->form_validation->run() === FALSE){
                $feedback_id = $this->uri->segment(3);
                if($res = $this->feedback_model->get_feedback_by_id($feedback_id)){
                    $data['data'] = $res;
                    $data['score_range'] = $res->from_value.'-'.$res->to_value;
                }
                if($dimensions = $this->site_model->get_all('smg_questionnaire', array('parent' => 0))){
                    $data['dimensions'] = $dimensions;
                }else{
                    $data['dimensions'] = '';
                }
                $header['title'] = 'Edit Feedback';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['header'] = $header;
                $data['template'] = 'site/screens/edit_content';
                $this->load->view('site/master_layout', $data);
            }else{
                $feedback_id = $this->uri->segment(3);
                $data = array(
                    'feedback' => $this->input->post('feedback', TRUE),
                    'link' => $this->input->post('link', TRUE),
                    'updated_at' => date(DATETIME_DATABASE_FORMAT)
                );
                if($this->site_model->update('smg_feedback', $data, array('id_feedback' => $feedback_id))){
                    $this->session->set_userdata('suc_msg', 'Feedback has been successfully updated.');
                    redirect('manage-feedback');
                    exit();
                }else{
                    $this->session->set_userdata('err_msg', 'There is an error occured. Please try after sometime.');
                    redirect('manage-feedback');
                    exit();
                }
            }
        }else{
            $feedback_id = $this->uri->segment(3);
            if($res = $this->feedback_model->get_feedback_by_id($feedback_id)){
                $data['data'] = $res;
                $data['score_range'] = $res->from_value.'-'.$res->to_value;
            }
            if($dimensions = $this->site_model->get_all('smg_questionnaire', array('parent' => 0))){
                $data['dimensions'] = $dimensions;
            }else{
                $data['dimensions'] = '';
            }
            $header['title'] = 'Edit Feedback';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            $data['template'] = 'site/screens/edit_feedback';
            $this->load->view('site/master_layout', $data);
        }
    }
    
    public function delete(){
        if($this->site_model->delete('smg_feedback', array('id_feedback' =>$this->uri->segment(3)))){
            $this->session->set_userdata(array('suc_msg' => 'Item has been successfully deleted.'));
            redirect('manage-feedback');
            exit();
        }else{
            $this->session->set_userdata(array('err_msg' => 'There is an error occured. Please try after sometime.'));
            redirect('manage-feedback');
            exit();
        }
    }
    
    public function check_range_by_dimension($score_range){
        return $this->feedback_model->check_score_range($this->input->post('dimension', TRUE), $score_range);
    }
}