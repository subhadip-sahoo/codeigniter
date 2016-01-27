<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
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
        $sessionvar = $this->session->userdata;
        $chk_user_q = "SELECT *
                        FROM   smg_users
                        WHERE  user_email = '".$email."' AND password = '".md5($pass)."'";
        $chk_user_query = $this->db->query($chk_user_q);
        if($chk_user_query->num_rows() == 1){
            $result = $chk_user_query->row();
            if($result->user_type != 3){
                return $result;
            }else{
                if(isset($sessionvar['id_user']) && $sessionvar['id_user'] != ""){
                    $cond = '"user_org_id":"'.$sessionvar['id_user'].'"';
                    $q = "SELECT *
                                    FROM   smg_users
                                    WHERE  other_details like '%".$cond."%' AND user_email = '".$email."' AND password = '".md5($pass)."'";

                    $query = $this->db->query($q);
                    if($query->num_rows() == 1){
                            return $query->row();
                    }else{
                            return FALSE;
                    }
                }else{
                    $query = $this->db->get_where('smg_users', array('user_email' => $email, 'password' => md5($pass)));
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
		
		/*$query = $this->db->get_where('smg_users', array('user_email' => $email, 'password' => md5($pass)));
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return FALSE;
        }*/
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
    
    public function get_video(){
	$this->db->select('*');
	$query = $this->db->get('smg_video'); 
        if($query->num_rows() > 0){
            return $query->result();
        }
        return FALSE;
    }
	
    public function row_delete($id){
        if($this->db->delete('smg_video', array('video_id' => $id))){
            return TRUE;
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
	
    function insert($data){
        if($this->db->insert('smg_video', $data)){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
}