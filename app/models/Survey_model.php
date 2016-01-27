<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    public function survey_questions(){
        $query = "SELECT * FROM `smg_questionnaire` WHERE `question_no` != 0 ORDER BY `question_no`";
        $q = $this->db->query($query);
        if($q->num_rows() > 0){
            return $q->result();
        }
        return FALSE;
    }
    
    public function get_all_dimentions(){
        $query = "SELECT * FROM `smg_questionnaire` WHERE `parent` = 0";
        $q = $this->db->query($query);
        if($q->num_rows() > 0){
            return $q->result();
        }
        return FALSE;
    }
    
    public function survey_question_category($id){
        $query = "SELECT `parent` FROM `smg_questionnaire` WHERE `id_questionnaire` = $id";
        $q = $this->db->query($query);
        if($q->num_rows() > 0){
            return $q->result();
        }
        return FALSE;
    }
    
    public function getcategory($key){
        $query = "SELECT `question` FROM `smg_questionnaire` WHERE `id_questionnaire` = $key";
        $q = $this->db->query($query);
        $res =$q->result();
        foreach($res as $r){
            return $question = $r->question;
        }
    }
    
    public function getvalue($key){
        $query = "SELECT `credit_point` FROM `smg_questionnaire` WHERE `id_questionnaire` = $key";
        $q = $this->db->query($query);
        $res = $q->result();
        if($q->num_rows() > 0){
            foreach($res as $r){
                return $credit_point = $r->credit_point;
            }
        }else{
            return 0;
        }
    }
    
    public function getsurveyreport($id){
        $query = "SELECT created_at FROM smg_survey WHERE id_user = $id ORDER BY id_survey DESC";
        $q = $this->db->query($query);
        return $q->result();
    }
    
    public function getsurveydetails($id_user, $created_at){
        $query = "SELECT survey_data FROM smg_survey WHERE id_user = '".$id_user."' and created_at= '".$created_at."'"; 
        $q = $this->db->query($query);
        $res =$q->result();
        foreach($res as $r){
            return $survey_data = $r->survey_data;
        }
    }
    
    public function check_user_survey($user_id){
        $query = "SELECT * FROM smg_survey WHERE id_user = {$user_id}";
        $q = $this->db->query($query);
        if($q->num_rows() > 0){
            return $q->num_rows();
        }
        return FALSE;
    }
    
    public function get_all_survey(){
        $query = "SELECT s.survey_data, u.display_name, u.id_user, u.other_details FROM smg_survey as s INNER JOIN smg_users as u on s.id_user = u.id_user"; 
        $q = $this->db->query($query);
        if($q->num_rows() > 0){
            return $q->result();
        }
        return FALSE;
    }

    public function get_organization_survey($id_user){
        $query = "SELECT s.survey_data, u.display_name, u.id_user, u.other_details FROM smg_survey as s INNER JOIN smg_users as u on s.id_user = u.id_user AND u.user_organization = ".$id_user; 
        $q = $this->db->query($query);
        
        return $q->result();
        
        
    }

    public function get_organization($id_user){

        $query = "SELECT display_name FROM smg_users WHERE id_user = (select user_organization from smg_users where id_user = '".$id_user."') "; 
        $q = $this->db->query($query);
        $result = $q->result();
        foreach($result as $res){
            return $res->display_name;
        }
    }
    public function get_all_userid($search){
        $query = "SELECT * FROM smg_users WHERE other_details REGEXP '".$search."'";
        //echo $query = "SELECT * FROM  `smg_users` WHERE  `other_details` LIKE  '%".$search."%'"; 
        $q = $this->db->query($query);
       
        if($q->num_rows() > 0){
            return $q->result();
        }
        return FALSE;
       
    }
    public function get_search_surveys_details($id_user){
       $query = "SELECT s.survey_data, u.display_name, u.id_user, u.other_details FROM smg_survey as s INNER JOIN smg_users as u on s.id_user = u.id_user AND s.id_user = ".$id_user; 
       $q = $this->db->query($query);
       return $q->result();
        
    }

    public function getQuestion($value){
       $query = "SELECT  parent  FROM smg_questionnaire where id_questionnaire =".$value; 
       $q = $this->db->query($query);
       $result = $q->result();
       foreach($result  as $res){
            $parent = $res->parent;
            $query = "SELECT  parent  FROM smg_questionnaire where id_questionnaire =".$parent; 
            $q = $this->db->query($query);
            $result1 = $q->result();
            foreach($result1  as $res1){
                $parent1 = $res1->parent;
                $query = "SELECT  question  FROM smg_questionnaire where id_questionnaire =".$parent1; 
                $q = $this->db->query($query);
                $result = $q->result();
                foreach ($result as $res) {
                    # code...
                    return $res->question;
                }
            }
       }

       
    }

    public function getFeedback($getQuestion, $total){

        $query = "SELECT  id_questionnaire  FROM smg_questionnaire where question ='".$getQuestion."'"; 
        $q = $this->db->query($query);
        $result = $q->result();
        foreach($result  as $res){
            $id_questionnaire = $res->id_questionnaire;
            $query = "SELECT  feedback  FROM smg_feedback where id_dimension ='".$id_questionnaire."' AND to_value >= '".$total."'"; 
            $q = $this->db->query($query);
           
            $result1 = $q->result();
            foreach ($result1 as $res1) {
                    # code...
                    return $res1->feedback;
            }
        }
    }
}