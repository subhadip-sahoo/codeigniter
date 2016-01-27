<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function message_alert($msg, $msg_code, $show_close = TRUE){
    $message = '';
    switch($msg_code):
        case 1: // info
            $message .= '<div role="alert" class="alert alert-info alert-dismissibl">';
            if($show_close){
                $message .= '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>';
            }
            $message .= $msg;
            $message .= '</div>';
            break;
        case 2: // success
            $message .= '<div role="alert" class="alert alert-success alert-dismissibl">';
            if($show_close){
                $message .= '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>';
            }
            $message .= $msg;
            $message .= '</div>';
            break;
        case 3: // warning
            $message .= '<div role="alert" class="alert alert-warning alert-dismissibl">';
            if($show_close){
                $message .= '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>';
            }
            $message .= $msg;
            $message .= '</div>';
            break;
        case 4: // error
            $message .= '<div role="alert" class="alert alert-danger alert-dismissibl">';
            if($show_close){
                $message .= '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>';
            }
            $message .= $msg;
            $message .= '</div>';
            break;
    endswitch;
    return $message;
}

function DBUG($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    die();
}

function keygen($length = 10){
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

function get_admin_permalink(){
    if(get_instance()->uri->segment(1, 0) === FALSE){
        return FALSE;
    }
    return get_instance()->uri->segment(1, 0);
}

function paginav($base_url, $total_rows, $per_page, $uri_segment, $first_url){
    $CI = &get_instance();
    $config = array();
    $config['base_url'] = $base_url;
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $per_page;
    $config['uri_segment'] = $uri_segment;
    $config['use_page_numbers']  = TRUE;
    $config['first_url'] = $first_url;
    $config['first_tag_open'] = $config['last_tag_open'] = $config['next_tag_open'] = $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
    $config['first_tag_close'] = $config['last_tag_close'] = $config['next_tag_close'] = $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = "<li class='active'><a href='javascript:void(0);'>";
    $config['cur_tag_close'] = "</a></li>";
    $config['first_link'] = 'First';
    $config['last_link'] = 'Last';
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Prev';

    $CI->pagination->initialize($config);
    return $config;
}

function get_org_product($org_id){
    $CI = &get_instance();
    $CI->db->select('smg_product.smg_product_id');
    $CI->db->from('smg_users');
    $CI->db->join('smg_product', 'smg_users.product = smg_product.smg_product_id');
    $CI->db->where('smg_users.id_user', $org_id);
    $query = $CI->db->get();
    if($query->num_rows() > 0){
        $row = $query->row();
        return $row->smg_product_id;
    }
    return FALSE;
}

function get_user_org_product($user_id){
    $CI = &get_instance();
    $CI->db->select('user_organization');
    $query = $CI->db->get_where('smg_users', array('id_user' => $user_id));
    if($query->num_rows() > 0){
        $row = $query->row();
        $user_org_id = $row->user_organization;
        return get_org_product($user_org_id);
    }
    return FALSE;
}

function get_employee_sidebar(){
    $CI = &get_instance();
    $CI->load->model('survey_model');
    $CI->load->model('site_model');
    $sidebar = array();
    if($links = $CI->site_model->get_all('smg_pages')){
        $sidebar['links'] = $links;
    }else{
        $sidebar['links'] = 'No links found!';
    }
    $CI->load->model('Pdf_model');
    if($docs = $CI->Pdf_model->get_pdf()){
        $sidebar['pdfs'] = $docs;
    }else{
        $sidebar['pdfs'] = 'No PDF added.';
    }
    $CI->load->model('Video_model');
    if($vids = $CI->Video_model->get_video()){
        $sidebar['vids'] = $vids;
    }else{
        $sidebar['vids'] = 'No video added.';
    }
    $sidebar['id_user'] = $CI->session->userdata('id_user');
    $sidebar['surveylist'] = $CI->survey_model->getsurveyreport($CI->session->userdata('id_user'));
    
    return $sidebar;
}