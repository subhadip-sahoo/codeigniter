<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_product extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
        $this->load->model('site_model');
    }
    
    public function index(){
        if($result = $this->site_model->get_all('smg_product')){
            $data['data'] = $result;
        }else{
            $data['data'] = 'There is no page to display';
        }
        $header['title'] = 'Manage Product';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
        $data['template'] = 'site/screens/manage_product';
        $this->load->view('site/master_layout', $data);
    }
    
    public function edit(){
        if($this->uri->segment(3, 0) === FALSE){
            $this->session->set_userdata('err_msg', 'Invalid request');
            redirect('manage-product');
            exit();
        }
        if(!$this->site_model->get_all('smg_users')){
            $this->session->set_userdata('err_msg', 'Invalid edit request');
            redirect('manage-product');
            exit();
        }
        if($this->input->post('edit_product') <> NULL){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('product_title', 'Product title', 'trim|required');
            if($this->form_validation->run() === FALSE){
                $page_id = $this->uri->segment(3);
                if($res = $this->site_model->get_row('smg_product', array('smg_product_id' => $page_id))){
                    $data['data'] = $res;
                }
                $header['title'] = 'Edit Product';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['header'] = $header;
                $data['template'] = 'site/screens/edit_product';
                $this->load->view('site/master_layout', $data);
            }else{
                echo $page_id = $this->uri->segment(3);
                $data = array(
                    'smg_product_name' => $this->input->post('product_title', TRUE),
                    'smg_product_content' => $this->input->post('product_content', TRUE)
                );
                if($this->site_model->update('smg_product', $data, array('smg_product_id' => $page_id))){
                    $this->session->set_userdata('suc_msg', 'Page has been successfully updated.');
                    redirect('manage-product');
                    exit();
                }else{
                    $this->session->set_userdata('err_msg', 'There is an error occured. Please try after sometime.');
                    redirect('manage-product');
                    exit();
                }
            }
        }else{
            $page_id = $this->uri->segment(3);
            if($res = $this->site_model->get_row('smg_product', array('smg_product_id' => $page_id))){
                $data['data'] = $res;
            }
            $header['title'] = 'Edit Product';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            $data['template'] = 'site/screens/edit_product';
            $this->load->view('site/master_layout', $data);
        }
    }
    

    public function add(){
        if($this->input->post('add_product') <> NULL){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div role="alert" class="alert alert-danger alert-dismissibl"><button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>', '</div>'); 
            $this->form_validation->set_rules('smg_product_name', 'Product name', 'trim|required');
            if($this->form_validation->run() === FALSE){
                $header['title'] = 'Add Product';
                $header['display_name'] = $this->session->userdata('display_name');
                $data['header'] = $header;
                $data['template'] = 'site/screens/add_product';
                $this->load->view('site/master_layout', $data);
            }else{
                $data = array(
                    'smg_product_name' => $this->input->post('smg_product_name', TRUE),
                    'smg_product_content' => $this->input->post('smg_product_content', TRUE)
                );
                if($this->site_model->insert('smg_product', $data)){
                    $this->session->set_userdata('suc_msg', 'Product has been successfully created.');
                    redirect('manage-product');
                    exit();
                }else{
                    $this->session->set_userdata('err_msg', 'There is an error occured. Please try after sometime.');
                    redirect('manage-product');
                    exit();
                }
            }
        }else{
            $header['title'] = 'Add Product';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            $data['template'] = 'site/screens/add_product';
            $this->load->view('site/master_layout', $data);
        }
    }

    public function delete(){
        if($this->site_model->delete('smg_product', array('smg_product_id' =>$this->uri->segment(3)))){
            $this->session->set_userdata(array('suc_msg' => 'Page has been successfully deleted.'));
            redirect('manage-product');
            exit();
        }else{
            $this->session->set_userdata(array('err_msg' => 'There is an error occured. Please try after sometime.'));
            redirect('manage-product');
            exit();
        }
    }
}