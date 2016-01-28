<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_report extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
        
    }
    
    public function index(){
        $this->load->model('survey_model');
        $header['title'] = 'Manage Report';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        $data['id_user'] = $this->session->userdata('id_user');
        if($dimentions = $this->survey_model->get_all_dimentions()){
            $data['dimentions'] = $dimentions;
        }
        if($all_surveys = $this->survey_model->get_all_survey()){
            $report_html = '';
            $locations = array();
            $ages = array();
            $genders = array();
            $departments = array();
            $levels = array();
            foreach ($all_surveys as $survey) {
                $other_details = json_decode($survey->other_details);
                $locations[] = $other_details->user_location;
                $ages[] = $other_details->user_age;
                $genders[] = $other_details->user_gender;
                $departments[] = $other_details->user_depertment;
                $levels[] = $other_details->user_level;
                $survey_data = unserialize($survey->survey_data);
                $display_name = $survey->display_name;
                $report_html .= "<tr>";
                $report_html .= "<td>$display_name</td>";
                foreach($survey_data as $key => $value){
                    $getvalue1 = $this->survey_model->getvalue($value[0]);
                    $getvalue2 = $this->survey_model->getvalue($value[1]);
                    $getvalue3 = $this->survey_model->getvalue($value[2]);
                    $getvalue4 = $this->survey_model->getvalue($value[3]);
                    $total = $getvalue1+$getvalue2+$getvalue3+$getvalue4;
                    $report_html .= "<td>$total</td>";
                }
                $report_html .= '</tr>';
            }
            $data['surveys'] = $report_html;
            $data['locations'] = array_unique($locations);
            $data['ages'] = array_unique($ages);
            $data['genders'] = array_unique($genders);
            $data['departments'] = array_unique($departments);
            $data['levels'] = array_unique($levels);
        }
        $data['template'] = 'site/screens/manage_report';
        $this->load->view('site/master_layout', $data);
    }
    
    function search_report(){
    	if($this->input->post('filter_report') == NULL){
            redirect('manage-report');
            exit();
        }
        $this->load->model('survey_model');
    	$header['title'] = 'Manage Report';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        $data['id_user'] = $this->session->userdata('id_user');
        if($dimentions = $this->survey_model->get_all_dimentions()){
            $data['dimentions'] = $dimentions;
        }
    	
    	$search = '';
    	$location = $this->input->post('location');
    	if($location !=""){
            $search.=',"user_location":"([^"]*)'.$location.'([^"]*)"';
    	}
    	$ages = $this->input->post('ages');
    	if($ages !=""){
            $search.=',"user_age":"([^"]*)'.$ages.'([^"]*)"';
    	}
    	$genders = $this->input->post('genders');
    	if($genders !=""){
            $search.=',"user_gender":"([^"]*)'.$genders.'([^"]*)"';
    	}
    	$departments = $this->input->post('departments');
    	if($departments !=""){
            $search.=',"user_depertment":"([^"]*)'.$departments.'([^"]*)"';
    	}
    	$levels = $this->input->post('levels');
    	if($levels !=""){
            $search.=',"user_level":"([^"]*)'.$levels.'([^"]*)"';
    	}
        if($search == ""){
            redirect("manage_report");
        }else{
        	$locations = array();
            $ages = array();
            $genders = array();
            $departments = array();
            $levels = array();
            $all_surveys = $this->survey_model->get_all_survey();
            foreach ($all_surveys as $survey) {
                $other_details = json_decode($survey->other_details);
                $locations[] = $other_details->user_location;
                $ages[] = $other_details->user_age;
                $genders[] = $other_details->user_gender;
                $departments[] = $other_details->user_depertment;
                $levels[] = $other_details->user_level;
            }    
        	$search_userid = $this->survey_model->get_all_userid(substr($search, 1));
        	$report_html = '';
        	if($search_userid){
                foreach($search_userid as $suid){
                    $id_user = $suid ->id_user; 
                    $search_surveys_details = $this->survey_model->get_search_surveys_details($id_user);
                    foreach ($search_surveys_details as $search_survey) {
                        $survey_data = unserialize($search_survey->survey_data);
                        $display_name = $search_survey->display_name;
                        $report_html .= "<tr>";
                        $report_html .= "<td>$display_name</td>";
                        foreach($survey_data as $key => $value){
                            $getvalue1 = $this->survey_model->getvalue($value[0]);
                            $getvalue2 = $this->survey_model->getvalue($value[1]);
                            $getvalue3 = $this->survey_model->getvalue($value[2]);
                            $getvalue4 = $this->survey_model->getvalue($value[3]);
                            $total = $getvalue1+$getvalue2+$getvalue3+$getvalue4;
                            $report_html .= "<td>$total</td>";
                        }
                        $report_html .= '</tr>';
                    }
                }
            }else{
                $report_html .= "<tr>";
                $report_html .= "<td colspan='11'><center>No Data</center></td>";
                $report_html .= '</tr>';
            }
        }
        $data['surveys'] = $report_html;
        $data['locations'] = array_unique($locations);
        $data['ages'] = array_unique($ages);
        $data['genders'] = array_unique($genders);
        $data['departments'] = array_unique($departments);
        $data['levels'] = array_unique($levels);
        $data['template'] = 'site/screens/manage_report';
        $this->load->view('site/master_layout', $data);
    }
}