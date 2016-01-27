<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_content extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
        $this->load->model('site_model');
    }
    
    public function index(){
        if($result = $this->site_model->get_all('smg_pages')){
            $data['data'] = $result;
        }else{
            $data['data'] = 'There is no page to display';
        }
        $header['title'] = 'Manage content';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        $data['template'] = 'site/screens/manage_content';
        $this->load->view('site/master_layout', $data);
    }
    
    public function add(){
        if($this->input->post('add_page') <> NULL){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('page_title', 'Page title', 'trim|required');
            $this->form_validation->set_rules('page_slug', 'Page slug', 'trim|required|is_unique[smg_pages.page_slug]');
            if($this->form_validation->run() === FALSE){
                $header['title'] = 'Add Page';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['header'] = $header;
                $data['template'] = 'site/screens/add_content';
                $this->load->view('site/master_layout', $data);
            }else{
                $data = array(
                    'page_title' => $this->input->post('page_title', TRUE),
                    'page_slug' => $this->input->post('page_slug', TRUE),
                    'page_content' => $this->input->post('page_content', TRUE),
                    'created_at' => date(DATETIME_DATABASE_FORMAT),
                    'updated_at' => date(DATETIME_DATABASE_FORMAT)
                );
                if($this->site_model->insert('smg_pages', $data)){
                    $this->session->set_userdata('suc_msg', 'Page has been successfully created.');
                    redirect('manage-content');
                    exit();
                }else{
                    $this->session->set_userdata('err_msg', 'There is an error occured. Please try after sometime.');
                    redirect('manage-content');
                    exit();
                }
            }
        }else{
            $header['title'] = 'Add Page';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            $data['template'] = 'site/screens/add_content';
            $this->load->view('site/master_layout', $data);
        }
    }
    
    public function edit(){
        if($this->uri->segment(3, 0) === FALSE){
            $this->session->set_userdata('err_msg', 'Invalid request');
            redirect('manage-content');
            exit();
        }
        if(!$this->site_model->get_all('smg_users')){
            $this->session->set_userdata('err_msg', 'Invalid edit request');
            redirect('manage-content');
            exit();
        }
        if($this->input->post('edit_page') <> NULL){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('page_title', 'Page title', 'trim|required');
            if($this->form_validation->run() === FALSE){
                $page_id = $this->uri->segment(3);
                if($res = $this->site_model->get_row('smg_pages', array('id_page' => $page_id))){
                    $data['data'] = $res;
                }
                $header['title'] = 'Edit Page';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['header'] = $header;
                $data['template'] = 'site/screens/edit_content';
                $this->load->view('site/master_layout', $data);
            }else{
                $page_id = $this->uri->segment(3);
                $data = array(
                    'page_title' => $this->input->post('page_title', TRUE),
                    'page_content' => $this->input->post('page_content', TRUE),
                    'updated_at' => date(DATETIME_DATABASE_FORMAT)
                );
                if($this->site_model->update('smg_pages', $data, array('id_page' => $page_id))){
                    $this->session->set_userdata('suc_msg', 'Page has been successfully updated.');
                    redirect('manage-content');
                    exit();
                }else{
                    $this->session->set_userdata('err_msg', 'There is an error occured. Please try after sometime.');
                    redirect('manage-content');
                    exit();
                }
            }
        }else{
            $page_id = $this->uri->segment(3);
            if($res = $this->site_model->get_row('smg_pages', array('id_page' => $page_id))){
                $data['data'] = $res;
            }
            $header['title'] = 'Edit Page';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            $data['template'] = 'site/screens/edit_content';
            $this->load->view('site/master_layout', $data);
        }
    }
    
    public function delete(){
        if($this->site_model->delete('smg_pages', array('id_page' =>$this->uri->segment(3)))){
            $this->session->set_userdata(array('suc_msg' => 'Page has been successfully deleted.'));
            redirect('manage-content');
            exit();
        }else{
            $this->session->set_userdata(array('err_msg' => 'There is an error occured. Please try after sometime.'));
            redirect('manage-content');
            exit();
        }
    }
    
    public function show($slug){
        if($page = $this->site_model->get_row('smg_pages', array('page_slug' => $slug))){
            $data['page'] = $page;
            $header['title'] = $page->page_title;
        }else{
            $data['page'] = 'Page not found!';
            $header['title'] = 'Page not found!';
        }        
        $data['sidebar'] = get_employee_sidebar();
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        $data['template'] = 'site/screens/show_content';
        $this->load->view('site/master_layout', $data);
    }
}