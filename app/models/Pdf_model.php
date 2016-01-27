<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }

    function insert($data){
        if($this->db->insert('smg_pdf', $data)){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    function get_pdf(){
        $this->db->select('*');
        $query = $this->db->get('smg_pdf'); 
        if($query->num_rows() > 0){
            return $query->result();
        }
        return FALSE;
    }

    public function row_delete($id){
        if($this->db->delete('smg_pdf', array('pdf_id' => $id))){
            return TRUE;
        }
        return FALSE;
    }

 }