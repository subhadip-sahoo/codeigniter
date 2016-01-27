<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_all_dimensions_feedback() {
        $sql = "SELECT sq.*, sf.*, GROUP_CONCAT(sf.id_feedback, ',' , sf.from_value, '-', sf.to_value) AS val FROM `smg_feedback` AS sf LEFT JOIN smg_questionnaire AS sq ON sf.id_dimension = sq.id_questionnaire GROUP BY sf.id_dimension";
//        $this->db->select('*');
//        $this->db->from('smg_feedback');
//        $this->db->join('smg_questionnaire', 'smg_feedback.id_dimension = smg_questionnaire.id_questionnaire', 'left');
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            return $query->result();
        }
        return FALSE;
    }
    
    public function check_score_range($id_dimenson, $score_range){
        $range = explode('-', $score_range);
        $this->db->select('*');
        $this->db->from('smg_feedback');
        $this->db->where('id_dimension', $id_dimenson);
        $this->db->where('from_value', $range[0]);
        $this->db->where('to_value', $range[1]);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return FALSE;
        }
        return TRUE;
    }
    
    public function get_feedback_by_id($id_feedback) {
        $this->db->select('*');
        $this->db->from('smg_feedback');
        $this->db->join('smg_questionnaire', 'smg_feedback.id_dimension = smg_questionnaire.id_questionnaire', 'left');
        $this->db->where('smg_feedback.id_feedback', $id_feedback);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->row();
        }
        return FALSE;
    }
}