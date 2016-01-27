<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function get_users_count(){
        $query = "SELECT 
                    *,
                    CASE user_status
                        WHEN 'A' THEN 'Active'
                        WHEN 'I' THEN 'Inactive'
                        WHEN 'H' THEN 'Hold'
                    END
                    AS organization_status
                FROM 
                    smg_users
                WHERE 
                    user_type = 3";
        $q = $this->db->query($query);
        if($q->num_rows() > 0){
            return $q->num_rows();
        }
        return FALSE;
    }
    
    public function get_users($limit, $start){
        $query = "SELECT 
                    *,
                    CASE user_status
                        WHEN 'A' THEN 'Active'
                        WHEN 'I' THEN 'Inactive'
                        WHEN 'H' THEN 'Hold'
                    END
                    AS organization_status
                FROM 
                    smg_users
                WHERE 
                    user_type = 3
                LIMIT $start, $limit";
        $q = $this->db->query($query);
        if($q->num_rows() > 0){
            return $q->result();
        }
        return FALSE;
    }
}