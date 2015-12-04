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
                if($permalink = $this->site_model->check_user_details($this->session->userdata('id_user'), 'organization_url')){
                    redirect("organization/$permalink");
                    exit();
                }else {
                    $this->session->set_userdata('err_msg', 'The permalink is not unique.');
                    $this->logout();
                }
                break;
            case 3:
                $header['title'] = 'Registration';
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
            $this->form_validation->set_rules('organization_depertments[]', 'Organization Departments', 'trim|required');
            $this->form_validation->set_rules('organization_levels[]', 'Organization Levels', 'trim|required');
            $this->form_validation->set_rules('organization_location', 'Organization Location', 'trim|required');
            $this->form_validation->set_rules('user_email', 'Email Address', 'trim|required|valid_email|is_unique[smg_users.user_email]');
            
            if($this->form_validation->run() == FALSE){
                $header['title'] = 'Add organization';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['departments'] = $this->input->post('organization_depertments[]', TRUE);
                $data['levels'] = $this->input->post('organization_levels[]', TRUE);
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
                    'created_at' => date(DATETIME_DATABASE_FORMAT),
                    'updated_at' => date(DATETIME_DATABASE_FORMAT)
                );
                
                if($uid = $this->site_model->insert('smg_users', $user_data)){
                    $this->site_model->add_user_details($uid, 'organization_url', $this->input->post('organization_url', TRUE));
                    $this->site_model->add_user_details($uid, 'organization_depertments', implode(',', $this->input->post('organization_depertments', TRUE)));
                    $this->site_model->add_user_details($uid, 'organization_levels', implode(',', $this->input->post('organization_levels', TRUE)));
                    $this->site_model->add_user_details($uid, 'organization_location', $this->input->post('organization_location', TRUE));
                    $this->site_model->add_user_details($uid, 'otp_used', 0);
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
                    $msg['location'] = $this->input->post('organization_location', TRUE);
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
            $header['title'] = 'Add organization';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            $data['template'] = 'site/screens/add_organization';
            $this->load->view('site/master_layout', $data);
        }
    }
}
