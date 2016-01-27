<?php
class Manage_pdf extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
       // $this->load->model('Video_model');
    }

    public function index(){
    	$header['title'] = 'Admin Dashboard';
       $header['display_name'] = $this->session->userdata('display_name');
       $data['header'] = $header;
       $this->load->model('Pdf_model');
        if($docs = $this->Pdf_model->get_pdf()){
            $data['pdfs'] = $docs;
        }else{
            $data['pdfs'] = 'No Pdf added.';
        }
    	$data['template'] = 'site/screens/manage_pdf';
        $this->load->view('site/master_layout', $data);
    }

    public function delete_row(){
        $this->load->model('Pdf_model');
        if($this->Pdf_model->row_delete($this->uri->segment(3))){
            $this->session->set_userdata(array('suc_msg' => 'Pdf has been successfully deleted.'));
            redirect('manage-pdf');
            exit();
        }else{
            $this->session->set_userdata(array('err_msg' => 'There is an error occured. Please try after sometime.'));
            redirect('manage-pdf');
            exit();
        }
    }
}
?>