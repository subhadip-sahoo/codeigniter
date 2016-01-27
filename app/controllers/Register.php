<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('session');
    }
    
    public function index(){
        $header['title'] = 'Registration';
        $data['header'] = $header;
        $data['template'] = 'site/screens/register';
        $this->load->view('site/master_layout', $data);
    }
    
    public function registration($org_slug = ""){
        /*if($org_slug != ""){
                $this->load->model('site_model');
                $org_details = $this->site_model->get_org_name_by_slug($org_slug);
                $org_other_details = $this->site_model->get_org_details_by_userid($org_details[0]->id_user);
                echo "<pre>"; print_r($org_other_details);die;
                $this->session->set_userdata('org_slug', $org_details[0]->option_value);
                $this->session->set_userdata('user_organisation', $org_details[0]->display_name);
                redirect("register");
        }*/
        $sessionvar = $this->session->userdata;
        if(isset($sessionvar["user_organisation"]) && $sessionvar["user_organisation"] != ""){
            $this->load->model('site_model');
            $org_other_details = $this->site_model->get_org_details_by_userid($sessionvar["id_user"]);
            foreach($org_other_details as $org_other_detail){
                switch ($org_other_detail->option_name) {
                    case "organization_depertments":
                        $registration_data['user_depertment'] = explode(",",$org_other_detail->option_value);
                        break;
                    case "organization_levels":
                        $registration_data['user_level'] = explode(",",$org_other_detail->option_value);
                        break;
                    case "organization_location":
                        $registration_data['user_location'] = explode(",",$org_other_detail->option_value);
                        break;
                    default:
                        break;
                }
            }
            $registration_data['user_organisation'] = $sessionvar["user_organisation"];
        }else{
            $registration_data['user_organisation'] = "";
        }
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
        $this->form_validation->set_rules('display_name', 'Name', 'trim|required');
        $this->form_validation->set_rules('user_email', 'Email Address', 'trim|required|valid_email|is_unique[smg_users.user_email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('user_depertment', 'User departments', 'trim|required');
        $this->form_validation->set_rules('user_location', 'User location', 'trim|required');
        $this->form_validation->set_rules('user_level', 'User level', 'trim|required');
        $this->form_validation->set_rules('user_gender', 'User gender', 'trim|required');
        $this->form_validation->set_rules('user_age', 'User age', 'trim|required');
        if($this->form_validation->run() === FALSE){
            $this->load->view('site/screens/register', $registration_data);
        }
        else{
            $this->load->model('site_model');
            $userdetails_arr = array();
            $userdetails_arr["user_org_id"] = $sessionvar["id_user"];
            $userdetails_arr["user_organisation"] = $sessionvar["user_organisation"];
            $userdetails_arr["user_contact"] = $this->input->post('user_contact', TRUE);
            $userdetails_arr["user_address"] = $this->input->post('user_address', TRUE);
            $userdetails_arr["user_depertment"] = $this->input->post('user_depertment', TRUE);
            $userdetails_arr["user_location"] = $this->input->post('user_location', TRUE);
            $userdetails_arr["user_level"] = $this->input->post('user_level', TRUE);
            $userdetails_arr["user_gender"] = $this->input->post('user_gender', TRUE);
            $userdetails_arr["user_age"] = $this->input->post('user_age', TRUE);

            $data = array(
                'display_name' => $this->input->post('display_name', TRUE),
                'user_email' => $this->input->post('user_email', TRUE),
                'user_type' => 3,
                'password' => md5($this->input->post('password', TRUE)),
                'other_details' => json_encode($userdetails_arr),
                'user_organization' => $sessionvar["id_user"],
                'created_at' => date(DATETIME_DATABASE_FORMAT),
                'updated_at' => date(DATETIME_DATABASE_FORMAT)
            );
            if($this->site_model->insert('smg_users', $data)){
                /*$header['title'] = 'Registration';
                $data['header'] = $header;
                $data['suc_msg'] = 'You have successfully ragister.';
                $data['template'] = 'site/screens/register';
                $this->load->view('site/screens/register', $data);*/
				
                /*$config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.1and1.com',
                'smtp_port' => 25,
                'smtp_user' => 'phpmailer@businessproworks.com',
                'smtp_pass' => 'phpmailer',
                'type'  => 'html', 
                'charset'   => 'iso-8859-1'
                );

                $this->load->library('email', $config);

                $this->email->set_newline("\r\n");

                $str = '';
                $str .= "Dear ".$this->input->post('display_name', TRUE)."\n\n";
                $str .= "Thank you for registering with us.\n\n";
                $str .= "Your Login details are as followes,\n";
                $str .= "Username: ".$this->input->post('user_email', TRUE)."\n";
                $str .= "Password: ".$this->input->post('password', TRUE)."\n\n";
                $str .= "Thanks,\n".$sessionvar["user_organisation"];

                $this->email->from($sessionvar["user_email"], $sessionvar["user_organisation"]);
                $this->email->to($this->input->post('user_email', TRUE)); 
                $this->email->subject('SMG User Registration');
                $this->email->message($str); 
                $this->email->send();
                $this->email->print_debugger();*/

                $str = '';
                $str .= "Dear ".$this->input->post('display_name', TRUE).",\n\n";
                $str .= "Thank you for registering with us.\n\n";
                $str .= "Your Login details are as followes,\n";
                $str .= "Username: ".$this->input->post('user_email', TRUE)."\n";
                $str .= "Password: ".$this->input->post('password', TRUE)."\n\n";
                $str .= "Thanks,\n".$sessionvar["user_organisation"];
                $subject = 'SMG Health User Registration';
                $message = nl2br($str);
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= "From:".$Email."\r\n";
                $headers .= "From: ".$sessionvar["user_organisation"]."<".$sessionvar["user_email"].">\r\n";
                mail($this->input->post('user_email', TRUE),$subject,$message,$headers);
                $this->session->set_userdata('suc_msg', 'You have successfully ragistered.');
                redirect('login');
                exit();
            }
        }
    }
}