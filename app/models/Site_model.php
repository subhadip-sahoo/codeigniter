<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function insert($table, $data){
        if($this->db->insert($table, $data)){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    public function update($table, $data, $where){
        $this->db->trans_start();
        $this->db->update($table, $data, $where);
        $this->db->trans_complete();
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            if ($this->db->trans_status() === FALSE) {
                return FALSE;
            }
            return TRUE;
        }
    }
    
    public function authenticate($email, $pass){
        $query = $this->db->get_where('smg_users', array('user_email' => $email, 'password' => md5($pass)));
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return FALSE;
        }
    }
    
    public function get_userdata($user_id){
        $query = $this->db->get_where('smg_users', array('id_user' => $user_id));
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return FALSE;
        }
    }
    
    public function add_user_details($user_id, $option_name, $option_value){
        $query = $this->db->insert('smg_user_details', array('id_user' => $user_id, 'option_name' => $option_name, 'option_value' => $option_value));
        if(!$query){
            return FALSE;
        }
        return TRUE;
    }
    
    public function update_user_details($user_id, $option_name, $option_value){
        $query = $this->db->update('smg_user_details', array('option_value' => $option_value), array('id_user' => $user_id, 'option_name' => $option_name));
        if(!$query){
            return FALSE;
        }
        return TRUE;
    }
    
    public function get_user_details($user_id, $option_name){
        $query = $this->db->get_where('smg_user_details', array('id_user' => $user_id, 'option_name' => $option_name));
        $row = $query->row();
        if(isset($row)){
            return $row->option_value;
        }
        return FALSE;
    }
    
    public function check_user_details($user_id, $option_name){
        $query = $this->db->get_where('smg_user_details', array('id_user' => $user_id, 'option_name' => $option_name));
        $row = $query->row();
        if(isset($row)){
            return $row->option_value;
        }
        return FALSE;
    }
    
    public function delete_user_details($user_id, $option_name){
        $query = $this->db->delete('smg_user_details', array('id_user' => $user_id, 'option_name' => $option_name));
        $row = $query->row();
        if(isset($row)){
            return $row->option_value;
        }
        return FALSE;
    }
    
    public function check_permalink($option_value){
        $query = $this->db->get_where('smg_user_details', array('option_name' => 'organization_url', 'option_value' => $option_value));
        if($query->num_rows() > 0){
            return FALSE;
        }
        return TRUE;
    }
    
    public function get_organizations(){
        $query = "SELECT 
                    u.*,
                    CASE u.user_status
                        WHEN 'A' THEN 'Active'
                        WHEN 'I' THEN 'Inactive'
                        WHEN 'H' THEN 'Hold'
                    END
                    AS organization_status,
                    (SELECT option_value FROM smg_user_details WHERE option_name = 'organization_location' AND id_user = u.id_user) as organization_location 
                FROM 
                    smg_users AS u
                WHERE 
                    user_type = 2";
        $q = $this->db->query($query);
        if($q->num_rows() > 0){
            return $q->result();
        }
        return FALSE;
    }
    
    public function check_pass($user_id, $pass){
        $query = $this->db->get_where('smg_users', array('id_user' => $user_id, 'password' => $pass));
        if($query->num_rows() == 1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}

