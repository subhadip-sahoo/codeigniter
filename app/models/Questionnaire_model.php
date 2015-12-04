<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questionnaire_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_questionnaire(){
        $query = "SELECT * FROM smg_questionnaire WHERE parent != 0 AND type = 2";
        $q = $this->db->query($query);
        if($q->num_rows() > 0){
            return $q->result();
        }else{
            return FALSE;
        }
    }
}
