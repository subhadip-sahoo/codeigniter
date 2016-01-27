<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            $org_slug = $this->uri->segment(2);
            $this->load->model('site_model');
            $org_details = $this->site_model->get_org_name_by_slug($org_slug);
            if(!empty($org_details)){
                $this->session->set_userdata('id_user', $org_details[0]->id_user);
                $this->session->set_userdata('org_slug', $org_details[0]->option_value);
                $this->session->set_userdata('user_organisation', $org_details[0]->display_name);
                $this->session->set_userdata('user_email', $org_details[0]->user_email);
            }
            redirect();
            exit();
        }
    }
    
    public function index($permalink){
    	$this->load->model('site_model');
        $this->load->model('survey_model');
        $header['title'] = 'Organization Dashboard';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        $data['permalink'] = $permalink;
        $id_user = $this->session->userdata('id_user');
		$data['users'] = $this->site_model->total_participent($id_user);
        if($dimentions = $this->survey_model->get_all_dimentions()){
            $data['dimentions'] = $dimentions;
        }
        $all_surveys = $this->survey_model->get_organization_survey($id_user);
        $report_html = '';
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
        $data['template'] = 'site/screens/dashboard_organization';
        $this->load->view('site/master_layout', $data);
    }
    
    public function organization_activites($permalink, $method){
        $method = str_replace('-', '_', $method);
        $this->$method();
    }
    
    public function share_link(){
        if($this->input->post('send_link') <> NULL){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('recipient[]', 'Recipients', 'trim|required|valid_email');
            
            if($this->form_validation->run() == FALSE){
                $header['title'] = 'Share Link';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['recipient'] = $this->input->post('recipient[]', TRUE);
                $data['header'] = $header;
                $data['permalink'] = $this->uri->segment(2);
                $data['template'] = 'site/screens/organization_share_link';
                $this->load->view('site/master_layout', $data);
            }else{
                /* Email script to recipients */
                $organization_name = $this->session->userdata('display_name');
                $this->load->library('email');
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                
                $this->email->from('subhadip.sahoo@businessprodesigns.com', 'Subhadip Sahoo');
                $this->email->to($this->input->post('recipient[]', TRUE));
                $this->email->cc('subhadip.sahoo@businessprodesigns.com');
                
                $this->email->subject("$organization_name has shared a link");
                
                $msg['organization_url'] = $this->input->post('survey_link', TRUE);
                $msg['organization_name'] = $organization_name;

                $bodyMsg = $this->load->view('site/email-templates/tmpl_share_link', $msg, TRUE);

                $this->email->message($bodyMsg);
                $this->email->send();

                $this->session->set_userdata('share_suc_msg', 'Link has been successfully shared.');
                redirect('dashboard');
                exit();
            }
        }else{
            $header['title'] = 'Share Link';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            $data['permalink'] = $this->uri->segment(2);
            $data['template'] = 'site/screens/organization_share_link';
            $this->load->view('site/master_layout', $data);
        }
    }
    
    public function settings(){
        if($this->input->post('update_org') <> NULL){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('organization_location[]', 'Organization Location', 'trim|required');
            $this->form_validation->set_rules('organization_depertments[]', 'Organization Departments', 'trim|required');
            $this->form_validation->set_rules('organization_levels[]', 'Organization Levels', 'trim|required');
            
            if($this->form_validation->run() == FALSE){
                $header['title'] = 'Settings';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['organization_name'] = $this->input->post('organization_name', TRUE);
                $data['organization_url'] = $this->input->post('organization_url', TRUE);
                $data['organization_location'] = $this->input->post('organization_location[]', TRUE);
                $data['organization_depertments'] = $this->input->post('organization_depertments[]', TRUE);
                $data['organization_levels'] = $this->input->post('organization_levels[]', TRUE);
                $data['user_email'] = $this->input->post('user_email', TRUE);
                $data['header'] = $header;
                $data['error'] = 'update_org_form';
                $data['permalink'] = $this->uri->segment(2);
                $data['template'] = 'site/screens/organization_settings';
                $this->load->view('site/master_layout', $data);
            }else{
                $permalink = $this->uri->segment(2);
                $this->load->model('site_model');
                $this->site_model->update_user_details($this->session->userdata('id_user'), 'organization_depertments', implode(',', $this->input->post('organization_depertments', TRUE)));
                $this->site_model->update_user_details($this->session->userdata('id_user'), 'organization_levels', implode(',', $this->input->post('organization_levels', TRUE)));
                $this->site_model->update_user_details($this->session->userdata('id_user'), 'organization_location', implode(',',$this->input->post('organization_location', TRUE)));

                $this->session->set_userdata('suc_msg', 'Organization has been successfully updated.');
                redirect("organization/$permalink/settings");
                exit();
            }
        }else if($this->input->post('update_email') <> NULL){
            $this->load->model('site_model');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('user_email', 'Email address', 'trim|required|valid_email|is_unique[smg_users.user_email]');

            if($this->form_validation->run() == FALSE){
                if($userdata = $this->site_model->get_userdata($this->session->userdata('id_user'))){
                    $data['user_email'] = $this->input->post('user_email', TRUE);
                    $data['organization_name'] = $userdata->display_name; 
                }
                $depts = $this->site_model->get_user_details($this->session->userdata('id_user'), 'organization_depertments');
                $depts_arr = explode(',', $depts);
                $levels = $this->site_model->get_user_details($this->session->userdata('id_user'), 'organization_levels');
                $levels_arr = explode(',', $levels);
                $locs = $this->site_model->get_user_details($this->session->userdata('id_user'), 'organization_location');
                $locs_arr = explode(',', $locs);
                $data['organization_location'] = $locs_arr;
                $data['organization_depertments'] = $depts_arr;
                $data['organization_levels'] = $levels_arr;
                $data['organization_url'] = $this->site_model->get_user_details($this->session->userdata('id_user'), 'organization_url');
                $header['title'] = 'Settings';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['header'] = $header;
                $data['error'] = 'update_email_form';
                $data['permalink'] = $this->uri->segment(2);
                $data['template'] = 'site/screens/organization_settings';
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
                    redirect("organization/$permalink/settings");
                    exit();
                }else{
                    $this->session->set_userdata('err_msg', 'There is an error occured. Please try again later.');
                    redirect("organization/$permalink/settings");
                    exit();
                }
            }
        }else if($this->input->post('update_pass') <> NULL){
            $permalink = $this->uri->segment(2);
            $this->load->model('site_model');
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('cur_pass', 'Current  password', 'trim|required');
            $this->form_validation->set_rules('new_pass', 'New pasword', 'trim|required');
            $this->form_validation->set_rules('con_pass', 'Confirm password', 'trim|required|matches[new_pass]');

            if($this->form_validation->run() == FALSE){
                if($userdata = $this->site_model->get_userdata($this->session->userdata('id_user'))){
                    $data['user_email'] = $userdata->user_email;
                    $data['organization_name'] = $userdata->display_name; 
                }
                $depts = $this->site_model->get_user_details($this->session->userdata('id_user'), 'organization_depertments');
                $depts_arr = explode(',', $depts);
                $levels = $this->site_model->get_user_details($this->session->userdata('id_user'), 'organization_levels');
                $levels_arr = explode(',', $levels);
                $locs = $this->site_model->get_user_details($this->session->userdata('id_user'), 'organization_location');
                $locs_arr = explode(',', $locs);
                $data['organization_location'] = $locs_arr;
                $data['organization_depertments'] = $depts_arr;
                $data['organization_levels'] = $levels_arr;
                $data['organization_url'] = $this->site_model->get_user_details($this->session->userdata('id_user'), 'organization_url');
                $header['title'] = 'Settings';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['header'] = $header;
                $data['error'] = 'update_pass_form';
                $data['permalink'] = $this->uri->segment(2);
                $data['template'] = 'site/screens/organization_settings';
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
                    $permalink = $this->uri->segment(2);
                    if($this->site_model->update('smg_users', $user_data, $condition)){
                        $this->session->set_userdata('pass_suc_msg', 'Password has been successfully updated.');
                        redirect("organization/$permalink/settings");
                        exit();
                    }else{
                        $this->session->set_userdata('pass_err_msg', 'There is an error occured. Please try again later.');
                        redirect("organization/$permalink/settings");
                        exit();
                    }
                }else{
                    $this->session->set_userdata('pass_err_msg', 'Current password does not match');
                    redirect("organization/$permalink/settings");
                    exit();
                }
            }
        }else{
            $this->load->model('site_model');
            if($userdata = $this->site_model->get_userdata($this->session->userdata('id_user'))){
                $data['user_email'] = $userdata->user_email; 
                $data['organization_name'] = $userdata->display_name; 
            }
            $locs = $this->site_model->get_user_details($this->session->userdata('id_user'), 'organization_location');
            $locs_arr = explode(',', $locs);
            $depts = $this->site_model->get_user_details($this->session->userdata('id_user'), 'organization_depertments');
            $depts_arr = explode(',', $depts);
            $levels = $this->site_model->get_user_details($this->session->userdata('id_user'), 'organization_levels');
            $levels_arr = explode(',', $levels);
            $data['organization_location'] = $locs_arr;
            $data['organization_depertments'] = $depts_arr;
            $data['organization_levels'] = $levels_arr;
            $data['organization_url'] = $this->site_model->get_user_details($this->session->userdata('id_user'), 'organization_url');
            $header['title'] = 'Settings';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            $data['permalink'] = $this->uri->segment(2);
            $data['template'] = 'site/screens/organization_settings';
            $this->load->view('site/master_layout', $data);
        }
    }
    
    public function delete(){
        $this->load->model('site_model');
        if($this->site_model->delete('smg_users', array('id_user' =>$this->uri->segment(3)))){
            $this->session->set_userdata(array('suc_msg' => 'Item has been successfully deleted.'));
            redirect('dashboard');
            exit();
        }else{
            $this->session->set_userdata(array('err_msg' => 'There is an error occured. Please try after sometime.'));
            redirect('dashboard');
            exit();
        }
    }
}