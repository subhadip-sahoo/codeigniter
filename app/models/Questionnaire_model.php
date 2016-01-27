<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questionnaire_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_questionnaire($parent){
        $query = "SELECT * FROM smg_questionnaire WHERE parent = $parent AND type = 2";
        $q = $this->db->query($query);
        if($q->num_rows() > 0){
            return $q->result();
        }else{
            return FALSE;
        }
    }
    
    public function get_question_cats(){
        $query = "SELECT * FROM smg_questionnaire WHERE parent = 0 AND type = 1";
        $q = $this->db->query($query);
        if($q->num_rows() > 0){
            return $q->result();
        }else{
            return FALSE;
        }
    }
    
    public function get_question_options($parent){
        $query = "SELECT * FROM smg_questionnaire WHERE parent = $parent AND type = 3";
        $q = $this->db->query($query);
        if($q->num_rows() > 0){
            return $q->result();
        }else{
            return FALSE;
        }
    }

    public function get_quest($question_no){
        $this->db->select('id_questionnaire, question');
        $this->db->where('question_no', $question_no);
        $query = $this->db->get('smg_questionnaire');
        return $query->result();
    }

    public function get_ans($id_questionnaire){
        $this->db->select('id_questionnaire, question, credit_point');
        $this->db->where('parent', $id_questionnaire);
        $query = $this->db->get('smg_questionnaire');
        //echo '<pre>'; print_r($query->result());
        return $query->result();
    }

    public function update_ques($question, $id_questionnaire){
        $data = array(
               'question' => $question
            );

        $this->db->where('id_questionnaire', $id_questionnaire);
        $this->db->update('smg_questionnaire', $data); 
    }

    public function update_ans($answare, $credit, $answare_id){
        $data = array(
               'question' => $answare,
               'credit_point' => $credit
            );

        $this->db->where('id_questionnaire', $id_questionnaire);
        $this->db->update('smg_questionnaire', $data); 
    }
}
