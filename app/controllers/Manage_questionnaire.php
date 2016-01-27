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
        if($cats = $this->questionnaire_model->get_question_cats()){
            $data['cats'] = $cats;
        }
        $data['template'] = 'site/screens/manage_questionnaire';
        $this->load->view('site/master_layout', $data);
    }

    function edit_questionnaire(){
        $header['title'] = 'Admin Dashboard -- Edit Questionnaire';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        if($cats = $this->questionnaire_model->get_question_cats()){
            $data['cats'] = $cats;
        }

        $question_no = $this->uri->segment(3); 
        $get_quest = $this->questionnaire_model->get_quest($question_no);
        foreach($get_quest as $gq){
           $id_questionnaire = $gq->id_questionnaire;
           $data['id_questionnaire'] = $gq->id_questionnaire;
           $data['question'] = $gq->question;
           $data['get_ans']  = $this->questionnaire_model->get_ans($id_questionnaire);
        }
        
        $data['template'] = 'site/screens/edit_questionnaire';
        $this->load->view('site/master_layout', $data);
    }

    function update_questionnaire(){
        
        $question = $this->input->post('question');
        $id_questionnaire = $this->input->post('id_questionnaire');
        $update_ques = $this->questionnaire_model->update_ques($question, $id_questionnaire);

        $answare_1 = $this->input->post('answare_1');
        $credit_1 = $this->input->post('credit_1');
        $answare_id_1 = $this->input->post('answare_id_1');
        $update_ans = $this->questionnaire_model->update_ans($answare_1, $credit_1, $answare_id_1);

        $answare_2 = $this->input->post('answare_2');
        $credit_2 = $this->input->post('credit_2');
        $answare_id_2 = $this->input->post('answare_id_2');
        $update_ans = $this->questionnaire_model->update_ans($answare_2, $credit_2, $answare_id_2);

        $answare_3 = $this->input->post('answare_3');
        $credit_3 = $this->input->post('credit_3');
        $answare_id_3 = $this->input->post('answare_id_3');
        $update_ans = $this->questionnaire_model->update_ans($answare_3, $credit_3, $answare_id_3);

        $answare_4 = $this->input->post('answare_4');
        $credit_4 = $this->input->post('credit_4');
        $answare_id_4 = $this->input->post('answare_id_4');
        $update_ans = $this->questionnaire_model->update_ans($answare_4, $credit_4, $answare_id_4);

        $answare_5 = $this->input->post('answare_5');
        $credit_5 = $this->input->post('credit_5');
        $answare_id_5 = $this->input->post('answare_id_5');
        $update_ans = $this->questionnaire_model->update_ans($answare_5, $credit_5, $answare_id_5);

        $this->session->set_userdata('suc_msg', 'Update Questionnaire Sucessfully');

        redirect('manage_questionnaire');
        exit();
    }
}