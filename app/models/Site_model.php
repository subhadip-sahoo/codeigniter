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
        }else{
            if($this->db->trans_status() === FALSE) {
                return FALSE;
            }
            return TRUE;
        }
    }
    
    public function delete($table, $where){
        if($this->db->delete($table, $where)){
            return TRUE;
        }
        return FALSE;
    }
    
    public function get_all($table, $where = FALSE){
        $query = ($where) ? $this->db->get_where($table, $where) : $this->db->get($table);
        if($query->num_rows() > 0){
            return $query->result();
        }
        return FALSE;
    }
    
    public function get_row($table, $where){
        $query = $this->db->get_where($table, $where);
        if($query->num_rows() > 0){
            return $query->row();
        }
        return FALSE;
    }
    
    public function authenticate($email, $pass){
        $sessionvar = $this->session->userdata;
        $chk_user_status = "SELECT * FROM smg_users WHERE user_email = '".$email."' AND password = '".md5($pass)."'";
        $q = $this->db->query($chk_user_status);
        if($q->num_rows() == 1){
            $row = $q->row();
            if($row->user_status <> 'A'){
                return 'inactive';
            }
        }
        $chk_user_q = "SELECT * FROM smg_users WHERE user_email = '".$email."' AND password = '".md5($pass)."' AND user_status = 'A'";
        $chk_user_query = $this->db->query($chk_user_q);
        if($chk_user_query->num_rows() == 1){
            $result = $chk_user_query->row();
            if($result->user_type != 3){
                return $result;
            }else{
                if(isset($sessionvar['id_user']) && $sessionvar['id_user'] != ""){
                    $cond = '"user_org_id":"'.$sessionvar['id_user'].'"';
                    $q = "SELECT * FROM smg_users WHERE other_details like '%".$cond."%' AND user_email = '".$email."' AND password = '".md5($pass)."' AND user_status = 'A'";
                    $query = $this->db->query($q);
                    if($query->num_rows() == 1){
                        return $query->row();
                    }else{
                        return FALSE;
                    }
                }else{
                    $query = $this->db->get_where('smg_users', array('user_email' => $email, 'password' => md5($pass), 'user_status' => 'A'));
                    if($query->num_rows() == 1){
                        return $query->row();
                    }else{
                        return FALSE;
                    }
                }
            }
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
                    (SELECT option_value FROM smg_user_details WHERE option_name = 'head_office_location' AND id_user = u.id_user AND user_type = 2) as organization_location 
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
	
    public function get_org_name_by_slug($org_slug){
        $this->db->select('*');
        $this->db->from('smg_user_details');
        $this->db->where(array('smg_user_details.option_name' => 'organization_url', 'smg_user_details.option_value' => $org_slug));
        $this->db->join('smg_users', 'smg_users.id_user = smg_user_details.id_user');

        $query = $this->db->get();
        return $query->result();
        return FALSE;
    }
	
    public function get_org_details_by_userid($user_id){
        $this->db->select('*');
        $this->db->from('smg_user_details');
        $this->db->where(array('id_user' => $user_id));

        $query = $this->db->get();
        return $query->result();
        return FALSE;
    }
    
    public function check_email($email){
        $query = $this->db->get_where('smg_users', array('user_email' => $email));
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return FALSE;
        }
    }
    
    public function check_activation_key($key, $user_id){
        $query = $this->db->get_where('smg_users', array('activation_key' => $key, 'id_user' => $user_id));
        if($query->num_rows() == 1){
            return $query->row();
        }
        return FALSE;
    }

    public function get_product(){
        $query = $this->db->get('smg_product');
        return $query->result();
    }
    
    public function get_countoforgs($id_user){
        $query = $this->db->query("SELECT count( id_user ) AS countuser FROM `smg_users` WHERE  `user_type` =3 AND `user_organization` =".$id_user); 
     
        $result =  $query->result();
        foreach($result as $res){
            return $res->countuser;
        }
    }

    public function delete_org($id){
        $this->db->delete('smg_users', array('id_user' => $id)); 
    }
    
    public function get_all_employee(){
        
    }

    public function total_participent($id_user){
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
                AND
                    user_organization = $id_user
                ";
        $q = $this->db->query($query);
        //print_r($q->result()); die;
        return $q->result();
    }
    
//    public function get_employee_details_by_id($user_id){
//        $query = "SELECT su.*, (SELECT display_name FROM smg_users WHERE id_user = su.user_organization) AS org_name FROM `smg_users` AS su WHERE su.id_user = $user_id";
//    }
}