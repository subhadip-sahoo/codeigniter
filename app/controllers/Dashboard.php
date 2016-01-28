<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
    }
    
    public function index(){
        $userType = $this->session->userdata('user_type');
        switch ($userType){
            case 1:
                $this->load->model('site_model');
                if($orgs = $this->site_model->get_organizations()){
                    $data['orgs'] = $orgs;
                    //$data['countoforgs'] = $this->site_model->get_countoforgs($id_user);
               }else{
                    $data['orgs'] = 'No organizaion added.';
                }
                $header['title'] = 'Admin Dashboard';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['header'] = $header;
                $data['template'] = 'site/screens/dashboard_siteadmin';
                $this->load->view('site/master_layout', $data);
                break;
            case 2: 
                $this->load->model('site_model');
//                get_product($this->session->userdata('id_user'));
                if($permalink = $this->site_model->check_user_details($this->session->userdata('id_user'), 'organization_url')){
                    redirect("organization/$permalink");
                    exit();
                }else{
                    $this->session->set_userdata('err_msg', 'The permalink is not unique.');
                    $this->logout();
                }
                break;
            case 3:                
                $data['sidebar'] = get_employee_sidebar();
                $data['id_user'] = $this->session->userdata('id_user');
//                $data['surveylist'] = $this->survey_model->getsurveyreport($this->session->userdata('id_user'));
                $header['title'] = 'Dashboard';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['header'] = $header;
                $data['template'] = 'site/screens/dashboard_employee';
                $this->load->view('site/master_layout', $data);
                break;
            default :
                break;
        }
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect();
        exit();
    }
    
    public function add_organization(){
        if($this->input->post('add_org') <> NULL){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('organization_name', 'Organization Name', 'trim|required');
            $this->form_validation->set_rules('organization_url', 'Organization URL', 'trim|required');
            $this->form_validation->set_rules('organization_location[]', 'Organization Location', 'trim|required');
            $this->form_validation->set_rules('organization_depertments[]', 'Organization Departments', 'trim|required');
            $this->form_validation->set_rules('organization_levels[]', 'Organization Levels', 'trim|required');
            $this->form_validation->set_rules('user_email', 'Email Address', 'trim|required|valid_email|is_unique[smg_users.user_email]');
            $this->form_validation->set_rules('product', 'Organization Product', 'trim|required');
            
            if($this->form_validation->run() == FALSE){
                $header['title'] = 'Add organization';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['locations'] = $this->input->post('organization_location[]', TRUE);
                $data['departments'] = $this->input->post('organization_depertments[]', TRUE);
                $data['levels'] = $this->input->post('organization_levels', TRUE);
                $data['product'] = $this->input->post('product', TRUE);
                $data['header'] = $header;
                $data['template'] = 'site/screens/add_organization';
                $this->load->view('site/master_layout', $data);
            }else{
                $this->load->model('site_model');
                $otp = mt_rand(100000, 999999);
                
                $user_data = array(
                    'display_name' => $this->input->post('organization_name', TRUE),
                    'user_email' => $this->input->post('user_email', TRUE),
                    'user_type' => 2,
                    'password' => md5($otp),
                    'product' => $this->input->post('product'),
                    'created_at' => date(DATETIME_DATABASE_FORMAT),
                    'updated_at' => date(DATETIME_DATABASE_FORMAT)
                );
                
                if($uid = $this->site_model->insert('smg_users', $user_data)){
                    $this->site_model->add_user_details($uid, 'organization_url', $this->input->post('organization_url', TRUE));
                    $this->site_model->add_user_details($uid, 'organization_depertments', implode(',', $this->input->post('organization_depertments', TRUE)));
                    $this->site_model->add_user_details($uid, 'organization_levels', implode(',', $this->input->post('organization_levels', TRUE)));
                    $this->site_model->add_user_details($uid, 'organization_location', implode(',',$this->input->post('organization_location', TRUE)));
                    $this->site_model->add_user_details($uid, 'otp_used', 0);
                    $this->site_model->add_user_details($uid, 'head_office_location', $this->input->post('head_office_location', TRUE));
                    $this->site_model->add_user_details($uid, 'total_number_emp', $this->input->post('total_number_emp', TRUE));
                    $this->site_model->add_user_details($uid, 'program_manager_name', $this->input->post('program_manager_name', TRUE));
                    $this->site_model->add_user_details($uid, 'program_manager_telephone', $this->input->post('program_manager_telephone', TRUE));
                    $this->site_model->add_user_details($uid, 'program_manager_mobile', $this->input->post('program_manager_mobile', TRUE));
                    $this->site_model->add_user_details($uid, 'program_manager_email', $this->input->post('program_manager_email', TRUE));
                    /* Email script to organization */
                    $this->load->library('email');
                    $config['mailtype'] = 'html';
                    $this->email->initialize($config);

                    $this->email->from('subhadip.sahoo@businessprodesigns.com', 'Subhadip Sahoo');
                    $this->email->to($this->input->post('user_email', TRUE));
                    $this->email->cc('subhadip.sahoo@businessprodesigns.com');
                    $this->email->subject('New organizaton registration in SMG Health Admin.');
                    $msg['name'] = $this->input->post('organization_name', TRUE);
                    $msg['url'] = $this->input->post('organization_url', TRUE);
                    $msg['depts'] = implode(', ', $this->input->post('organization_depertments', TRUE));
                    $msg['levels'] = implode(', ', $this->input->post('organization_levels', TRUE));
                    $msg['location'] = implode(', ',$this->input->post('organization_location', TRUE));
                    $msg['email'] = $this->input->post('user_email', TRUE);
                    $msg['otp'] = $otp;
                    
                    $bodyMsg = $this->load->view('site/email-templates/tmpl_add_organizations', $msg, TRUE);
                    
                    $this->email->message($bodyMsg);
                    $this->email->send();
                    
                    $this->session->set_userdata('suc_msg', 'Organization has been successfully added.');
                    redirect('dashboard');
                    exit();
                }else{
                    $this->session->set_userdata('err_msg', 'There is an error occured. Please try again later.');
                    redirect('dashboard/add-organization');
                    exit();
                }
            }
        }else{
            $this->load->model('site_model');
            $header['title'] = 'Add organization';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            $data['product'] = $this->site_model->get_product();
            $data['template'] = 'site/screens/add_organization';
            $this->load->view('site/master_layout', $data);
        }
    }
	
    public function add_video(){
        if($this->input->post('add_video') <> NULL){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('video_title', 'Video Title', 'trim|required');
            $this->form_validation->set_rules('video_name', 'Video Embedded URL', 'trim|required');
            if($this->form_validation->run() == FALSE) {
                $header['title'] = 'Add video';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['header'] = $header;
                $data['template'] = 'site/screens/add_video';
                $this->load->view('site/master_layout', $data);
            }else{
                $data = array( 
                    'video_title' => $this->input->post('video_title', TRUE),
                    'video_name' => $this->input->post('video_name', TRUE)
                );
                $this->load->model('Video_model');
                $this->Video_model->insert($data);
                $this->session->set_userdata('suc_msg', 'Video has been successfully added.');
                redirect("manage-video");
                exit();
                $this->session->set_userdata('err_msg', 'There is an error occured. Please try again later.');
                redirect('dashboard/add-organization');
                exit();
            }
        }
        else{		   
            $header['title'] = 'Add video';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            $data['template'] = 'site/screens/add_video';
            $this->load->view('site/master_layout', $data);
        }
    }
	 
    public function add_pdf(){
        $header['title'] = 'Add pdf';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        $data['template'] = 'site/screens/add_pdf';
        $this->load->view('site/master_layout', $data);
    }

    public function do_upload(){
        $this->load->helper('form');
        $config = array(
            'upload_path' => "./assets/site/pdf/",
            'allowed_types' => "pdf",
            'overwrite' => FALSE
                //'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                //'max_height' => "768",
                //'max_width' => "1024"
        );
        //print_r($config);die;
        $this->load->library('upload', $config);

        if($this->upload->do_upload()){   
            echo "success";
            $upload_data = $this->upload->data();

            $insert_data =  array(
                'pdf_name' =>$upload_data['file_name']
            );
            $this->db->insert('smg_pdf', $insert_data);

            $this->session->set_userdata('pdf_suc_msg', 'Pdf has been successfully added.');
            redirect("manage-pdf");
            exit();
        }
        else{
            $this->session->set_userdata('pdf_err_msg', 'There is an error occured. Please try again later.');
            redirect("dashboard/add_pdf");
        }
    }

    function delete_organization(){
        $id = $this->uri->segment(3);
        $this->load->model('site_model');
        $this->site_model->delete_org($id);
        $this->session->set_userdata('suc_msg', 'Delete Organization Sucessfully');
        redirect("dashboard");
        exit();
    }
    
    public function settings(){        
        if($this->input->post('update_email') <> NULL){
            $this->load->model('site_model');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('user_email', 'Email address', 'trim|required|valid_email|is_unique[smg_users.user_email]');

            if($this->form_validation->run() == FALSE){
                if($userdata = $this->site_model->get_userdata($this->session->userdata('id_user'))){
                    $data['user_email'] = $this->input->post('user_email', TRUE);
                }
                $data['sidebar'] = get_employee_sidebar();
                $data['id_user'] = $this->session->userdata('id_user');
                if($user = $this->site_model->get_row('smg_users', array('id_user' => $this->session->userdata('id_user')))){
                    $data['user'] = json_decode($user->other_details);
                    $data['user_field'] = $user;
                }
                $org_other_details = $this->site_model->get_org_details_by_userid($user->user_organization);
                foreach($org_other_details as $org_other_detail){
                    switch ($org_other_detail->option_name) {
                        case "organization_depertments":
                            $data['user_depertment'] = explode(",",$org_other_detail->option_value);
                            break;
                        case "organization_levels":
                            $data['user_level'] = explode(",",$org_other_detail->option_value);
                            break;
                        case "organization_location":
                            $data['user_location'] = explode(",",$org_other_detail->option_value);
                            break;
                        default:
                            break;
                    }
                }
                $header['title'] = 'Settings';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['error'] = 'update_email_form';
                $data['header'] = $header;
                $data['template'] = 'site/screens/employee_settings';
                $this->load->view('site/master_layout', $data);
            }else{
                $this->load->model('site_model');
                $user_data = array(
                    'user_email' => $this->input->post('user_email', TRUE),
                    'updated_at' => date(DATETIME_DATABASE_FORMAT)
                );
                $condition = array(
                    'id_user' => $this->session->userdata('id_user')
                );
                $permalink = $this->uri->segment(2);
                if($this->site_model->update('smg_users', $user_data, $condition)){
                    $this->session->set_userdata('suc_msg', 'Email has been successfully updated.');
                    redirect("dashboard/settings");
                    exit();
                }else{
                    $this->session->set_userdata('err_msg', 'There is an error occured. Please try again later.');
                    redirect("dashboard/settings");
                    exit();
                }
            }
        }else if($this->input->post('update_pass') <> NULL){
            $this->load->model('site_model');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('cur_pass', 'Current  password', 'trim|required');
            $this->form_validation->set_rules('new_pass', 'New pasword', 'trim|required');
            $this->form_validation->set_rules('con_pass', 'Confirm password', 'trim|required|matches[new_pass]');

            if($this->form_validation->run() == FALSE){
                if($userdata = $this->site_model->get_userdata($this->session->userdata('id_user'))){
                    $data['user_email'] = $userdata->user_email;
                }
                $data['sidebar'] = get_employee_sidebar();
                $data['id_user'] = $this->session->userdata('id_user');
                if($user = $this->site_model->get_row('smg_users', array('id_user' => $this->session->userdata('id_user')))){
                    $data['user'] = json_decode($user->other_details);
                    $data['user_field'] = $user;
                }
                $org_other_details = $this->site_model->get_org_details_by_userid($user->user_organization);
                foreach($org_other_details as $org_other_detail){
                    switch ($org_other_detail->option_name) {
                        case "organization_depertments":
                            $data['user_depertment'] = explode(",",$org_other_detail->option_value);
                            break;
                        case "organization_levels":
                            $data['user_level'] = explode(",",$org_other_detail->option_value);
                            break;
                        case "organization_location":
                            $data['user_location'] = explode(",",$org_other_detail->option_value);
                            break;
                        default:
                            break;
                    }
                }
                $header['title'] = 'Settings';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['error'] = 'update_pass_form';
                $data['header'] = $header;
                $data['template'] = 'site/screens/employee_settings';
                $this->load->view('site/master_layout', $data);
            }else{
                $this->load->model('site_model');
                if($this->site_model->check_pass($this->session->userdata('id_user'), md5($this->input->post('cur_pass')))){
                    $user_data = array(
                        'password' => md5($this->input->post('new_pass', TRUE)),
                        'updated_at' => date(DATETIME_DATABASE_FORMAT)
                    );
                    $condition = array(
                        'id_user' => $this->session->userdata('id_user')
                    );
                    if($this->site_model->update('smg_users', $user_data, $condition)){
                        $this->session->set_userdata('pass_suc_msg', 'Password has been successfully updated.');
                        redirect("dashboard/settings");
                        exit();
                    }else{
                        $this->session->set_userdata('pass_err_msg', 'There is an error occured. Please try again later.');
                        redirect("dashboard/settings");
                        exit();
                    }
                }else{
                    $this->session->set_userdata('pass_err_msg', 'Current password does not match');
                    redirect("dashboard/settings");
                    exit();
                }
            }
        }else if($this->input->post('update_details') <> NULL){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('display_name', 'Name', 'trim|required');
            $this->form_validation->set_rules('user_depertment', 'User departments', 'trim|required');
            $this->form_validation->set_rules('user_location', 'User location', 'trim|required');
            $this->form_validation->set_rules('user_level', 'User level', 'trim|required');
            $this->form_validation->set_rules('user_gender', 'User gender', 'trim|required');
            $this->form_validation->set_rules('user_age', 'User age', 'trim|required');
            if($this->form_validation->run() === FALSE){
                $this->load->model('site_model');
                if($userdata = $this->site_model->get_userdata($this->session->userdata('id_user'))){
                    $data['user_email'] = $userdata->user_email; 
                }
                $data['sidebar'] = get_employee_sidebar();
                $data['id_user'] = $this->session->userdata('id_user');
                if($user = $this->site_model->get_row('smg_users', array('id_user' => $this->session->userdata('id_user')))){
                    $data['user'] = json_decode($user->other_details);
                    $data['user_field'] = $user;
                }
                $org_other_details = $this->site_model->get_org_details_by_userid($user->user_organization);
                foreach($org_other_details as $org_other_detail){
                    switch ($org_other_detail->option_name) {
                        case "organization_depertments":
                            $data['user_depertment'] = explode(",",$org_other_detail->option_value);
                            break;
                        case "organization_levels":
                            $data['user_level'] = explode(",",$org_other_detail->option_value);
                            break;
                        case "organization_location":
                            $data['user_location'] = explode(",",$org_other_detail->option_value);
                            break;
                        default:
                            break;
                    }
                }
                $header['title'] = 'Settings';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['header'] = $header;
                $data['template'] = 'site/screens/employee_settings';
                $this->load->view('site/master_layout', $data);
            }
            else{
                $this->load->model('site_model');
                $userdetails_arr = array();
                if($user = $this->site_model->get_row('smg_users', array('id_user' => $this->session->userdata('id_user')))){
                    $other_details = json_decode($user->other_details);
                    $userdetails_arr["user_org_id"] = $other_details->user_org_id;
                    $userdetails_arr["user_organisation"] = $other_details->user_organisation;
                }
                $userdetails_arr["user_contact"] = $this->input->post('user_contact', TRUE);
                $userdetails_arr["user_address"] = $this->input->post('user_address', TRUE);
                $userdetails_arr["user_depertment"] = $this->input->post('user_depertment', TRUE);
                $userdetails_arr["user_location"] = $this->input->post('user_location', TRUE);
                $userdetails_arr["user_level"] = $this->input->post('user_level', TRUE);
                $userdetails_arr["user_gender"] = $this->input->post('user_gender', TRUE);
                $userdetails_arr["user_age"] = $this->input->post('user_age', TRUE);

                $data = array(
                    'display_name' => $this->input->post('display_name', TRUE),
                    'other_details' => json_encode($userdetails_arr),
                    'updated_at' => date(DATETIME_DATABASE_FORMAT)
                );
                if($this->site_model->update('smg_users', $data, array('id_user' => $this->session->userdata('id_user')))){
                    $this->session->set_userdata('suc_msg_details', 'Details has been successfully updated');
                    redirect("dashboard/settings");
                    exit();
                }else{
                    $this->session->set_userdata('err_msg_details', 'There is an error occured. Please try again later.');
                    redirect("dashboard/settings");
                    exit();
                }
            }
        }else{
            $this->load->model('site_model');
            if($userdata = $this->site_model->get_userdata($this->session->userdata('id_user'))){
                $data['user_email'] = $userdata->user_email; 
            }
            $data['sidebar'] = get_employee_sidebar();
            $data['id_user'] = $this->session->userdata('id_user');
            if($user = $this->site_model->get_row('smg_users', array('id_user' => $this->session->userdata('id_user')))){
                $data['user'] = json_decode($user->other_details);
                $data['user_field'] = $user;
            }
            $org_other_details = $this->site_model->get_org_details_by_userid($user->user_organization);
            foreach($org_other_details as $org_other_detail){
                switch ($org_other_detail->option_name) {
                    case "organization_depertments":
                        $data['user_depertment'] = explode(",",$org_other_detail->option_value);
                        break;
                    case "organization_levels":
                        $data['user_level'] = explode(",",$org_other_detail->option_value);
                        break;
                    case "organization_location":
                        $data['user_location'] = explode(",",$org_other_detail->option_value);
                        break;
                    default:
                        break;
                }
            }
            $header['title'] = 'Settings';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            $data['template'] = 'site/screens/employee_settings';
            $this->load->view('site/master_layout', $data);
        }
    }
    
    public function inactive_user(){
        $user_id = $this->uri->segment(3);
        $this->load->model('site_model');
        if($this->site_model->update('smg_users', array('user_status' => 'I'), array('id_user' => $user_id))){
            $this->session->set_userdata('suc_meg', 'User has been successfully updated');
            redirect("dashboard");
            exit();
        }
    }
    
    public function active_user(){
        $user_id = $this->uri->segment(3);
        $this->load->model('site_model');
        if($this->site_model->update('smg_users', array('user_status' => 'A'), array('id_user' => $user_id))){
            $this->session->set_userdata('suc_meg', 'User has been successfully updated');
            redirect("dashboard");
            exit();
        }
    }
    
    public function inactive_employee(){
        $user_id = $this->uri->segment(3);
        $this->load->model('site_model');
        if($this->site_model->update('smg_users', array('user_status' => 'I'), array('id_user' => $user_id))){
            $this->session->set_userdata('suc_meg', 'User has been successfully updated');
            redirect("manage-users");
            exit();
        }
    }
    
    public function active_employee(){
        $user_id = $this->uri->segment(3);
        $this->load->model('site_model');
        if($this->site_model->update('smg_users', array('user_status' => 'A'), array('id_user' => $user_id))){
            $this->session->set_userdata('suc_meg', 'User has been successfully updated');
            redirect("manage-users");
            exit();
        }
    }
}