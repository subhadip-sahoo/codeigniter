<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_logged_in')){
            redirect();
            exit();
        }
        $this->load->model('survey_model');
        $this->load->model('questionnaire_model');
        $this->load->model('site_model');
    }
    
    public function index(){
        if($this->input->post('action') <> NULL && $this->input->post('action') == 'user_survey'){
            if($cats = $this->questionnaire_model->get_question_cats()){
                foreach ($cats as $cat) {
                    $data[$cat->id_questionnaire] = array();
                    if($questions = $this->questionnaire_model->get_questionnaire($cat->id_questionnaire)){
                        foreach ($questions as $q) {
                            $data[$cat->id_questionnaire][] = $this->input->post('answer_'.$q->question_no);
                        }
                    }
                }
            }
            $survey_data = serialize($data);
            $created_at = date(DATETIME_DATABASE_FORMAT);
            $table_data = array(
                'id_user' => $this->session->userdata('id_user'),
                'survey_data' => $survey_data,
                'created_at' => $created_at
            );
            if($this->site_model->insert('smg_survey', $table_data)){
                $id_user = $this->session->userdata('id_user'); 
                $display_name = $this->session->userdata('display_name');
                $getOrganization = $this->survey_model->get_organization($id_user); 
                $getsurveydetails = $this->survey_model->getsurveydetails($id_user, $created_at);
                $getsurveydetail = unserialize($getsurveydetails);

                $this->load->library('Pdf');
                $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('AMIT');
                $pdf->SetTitle('SMG Health Survey Report');
                $pdf->SetSubject('Survey Report');
                $pdf->SetKeywords('SMG Health Survey Report ');

                // set header and footer fonts
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP-15, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

                // set auto page breaks
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

                // set image scale factor
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

                // set some language-dependent strings (optional)
                if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
                    require_once(dirname(__FILE__).'/lang/eng.php');
                    $pdf->setLanguageArray($l);
                }

                $pdf->SetFont('helvetica', '', 48);
                // remove default header
                $pdf->setPrintHeader(false);

                // add a page
                $pdf->AddPage();

                // get the current page break margin
                $bMargin = $pdf->getBreakMargin();
                // get current auto-page-break mode
                $auto_page_break = $pdf->getAutoPageBreak();
                // disable auto-page-break
                $pdf->SetAutoPageBreak(false, 0);
                // set bacground image
                $img_file = Base_url().'assets/site/images/coverImage.jpg';
                $pdf->Image($img_file, 0, 0, 210, 297, '', '', '', false, 400, '', false, false, 0);
                // restore auto-page-break status
                $pdf->SetAutoPageBreak($auto_page_break, $bMargin);
                // set the starting point for the page content
                $pdf->setPageMark();

                // Print a text
                $html = '<div style="position: relative; top:200px; right:0; left:0; text-align:center; padding: 50px 15px;">
                                            <h1 style="margin: 0 0 20px; color: #333; font-weight: 500;font-size: 40px;">SMG Health Bounce Back Survey</h1>
                                            <h2 style="margin: 0 0 0px; color: #333; font-weight: 500;font-size: 24px; text-transform: capitalize;">'.$getOrganization.'</h2>
                                            <h3 style="margin: 0 0 20px; color: #333; font-weight: 500;font-size: 18px;">'.$created_at.'</h3>
                                        </div>';
                $pdf->writeHTML($html, true, false, true, false, '');

                // ---------------------------------------------------------

                $img_file = Base_url().'assets/site/images/innerbanner.jpg';

                $pdf->AddPage();

                $pdf->Image($img_file, 0, 0, 210, 47, '', '', '', false, 300, '', false, false, 0);
                // set color for text stroke
                $pdf->SetDrawColor(255,0,0);
                $content = '<table cellspacing="0" cellpadding="0">
                    <tr><td><img title="" alt="" src="'.Base_url().'assets/site/images/dase_logo.png"></td></tr>
                    <tr><td>'.$display_name.'</td></tr>
                    <tr><td>'.$created_at.'</td></tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr><td>&nbsp;</td></tr>
                </table>';
                $content.='<div style="padding: 30px;">
                                        <p style="margin: 0 0 10px;color: #424242;font-weight: 500;font-size: 20px;">Introduction</p>
                                        <p>Thank you for completing your Bounce Back Survey. This report provides you with a summary of your results, makes some personalised recommendations and provides you with the tools to create an action plan.<br>
                                        Each dimension is presented individually with a description of your results and strategies for strengthening.</p>
                                        <p style="margin: 5px 0 10px;color: #424242;font-weight: 500;font-size: 20px;">Understanding Your Report</p>
                                        <p>Your report contains a description of the 10 dimensions of resilience for which you were assessed.  Your individual assessment results for each dimension is presented as a flag.  Refer to the table below when reading your report.</p>
                                        <p>Red flag: <img src="'.Base_url().'assets/site/images/close_icon.jpg" height="25" alt="">
                                        &nbsp;&nbsp;&nbsp;Green Flag:<img src="'.Base_url().'assets/site/images/tick_icon.jpg" height="25" alt=""></p>
                                        <p style="margin: 5px 0 10px; color: #424242; font-weight: 500; font-size: 20px;">Summary of Results</p>
                                        <table style="text-align: left;">
                                            <thead>
                                                <tr>
                                                    <th style="padding:3px; border: solid 1px #e0e0e0; background-color:#18A7A5;color:#fff; width:200px">Name</th>
                                                    <th style="padding:3px; border: solid 1px #e0e0e0; background-color:#18A7A5;color:#fff; width:90px">Question 1</th>
                                                    <th style="padding:3px; border: solid 1px #e0e0e0; background-color:#18A7A5;color:#fff; width:90px">Question 2</th>
                                                    <th style="padding:3px; border: solid 1px #e0e0e0; background-color:#18A7A5;color:#fff; width:90px">Question 3</th>
                                                    <th style="padding:3px; border: solid 1px #e0e0e0; background-color:#18A7A5;color:#fff; width:90px">Question 4</th>
                                                    <th style="padding:3px; border: solid 1px #e0e0e0; background-color:#18A7A5;color:#fff; width:90px">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                 $grandtotal = 0;
                //$content.='<table cellspacing="0" cellpadding="5" border="1">';
               // $content.='<tr><td width="25%"><strong>Dimension</strong></td><td width="10%"><strong>Score</strong></td><td width="65%"><strong>Comment</strong></td></tr>';
                 foreach($getsurveydetail as $key => $value){
                    $getcategory = $this->survey_model->getcategory($key);
                    $getvalue1 = $this->survey_model->getvalue($value[0]);
                    $getvalue2 = $this->survey_model->getvalue($value[1]);
                    $getvalue3 = $this->survey_model->getvalue($value[2]);
                    $getvalue4 = $this->survey_model->getvalue($value[3]);
                    $getQuestion = $this->survey_model->getQuestion($value[3]);
                    $total = $getvalue1+$getvalue2+$getvalue3+$getvalue4;
                    $grandtotal = $grandtotal+$total;
                    $content.='
                                                <tr>
                                                    <td style="padding:3px; border: solid 1px #e0e0e0; background-color:#f5f5f5; width:200px">'.$getQuestion.'</td>
                                                    <td style="padding:3px; border: solid 1px #e0e0e0; width:90px">'.$getvalue1.'</td>
                                                    <td style="padding:3px; border: solid 1px #e0e0e0; width:90px">'.$getvalue2.'</td>
                                                    <td style="padding:3px; border: solid 1px #e0e0e0; width:90px">'.$getvalue3.'</td>
                                                    <td style="padding:3px; border: solid 1px #e0e0e0; width:90px">'.$getvalue4.'</td>
                                                    <td style="padding:3px; border: solid 1px #e0e0e0; width:90px">'.$total.'</td>
                                                </tr>';   

                }


                $content.='               </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td style="padding:3px; border: solid 1px #e0e0e0;" colspan="5"></td>
                                                    <td style="padding:3px; border: solid 1px #e0e0e0;background-color:#B72529; color:#fff;">'.$grandtotal.'</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>';
                $pdf->SetFont('helvetica', '', 12);
                $pdf->setTextRenderingMode($stroke=0, $fill=true, $clip=false);
                $pdf->writeHTML($content, true, false, false, false, '');

                foreach($getsurveydetail as $key => $value){
                    $getcategory = $this->survey_model->getcategory($key);
                    $getvalue1 = $this->survey_model->getvalue($value[0]);
                    $getvalue2 = $this->survey_model->getvalue($value[1]);
                    $getvalue3 = $this->survey_model->getvalue($value[2]);
                    $getvalue4 = $this->survey_model->getvalue($value[3]);
                    $getQuestion = $this->survey_model->getQuestion($value[3]);
                    $total = $getvalue1+$getvalue2+$getvalue3+$getvalue4;
                    $getFeedback = $this->survey_model->getFeedback($getQuestion, $total);
                    $pdf->AddPage();
                    // set the starting point for the page content
                    $pdf->setPageMark();
                    $pdf->Image($img_file, 0, 0, 210, 47, '', '', '', false, 300, '', false, false, 0);
                    $pdf->SetDrawColor(255,0,0);
                    $content = '<table cellspacing="0" cellpadding="0">
                        <tr><td><img title="" alt="" src="'.Base_url().'assets/site/images/dase_logo.png"></td></tr>
                        <tr><td>'.$display_name.'</td></tr>
                        <tr><td>'.$created_at.'</td></tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr><td>&nbsp;</td></tr>
                    </table>';
                    if($total > 13){
                        $icon = "tick_icon.jpg";
                    }else{
                        $icon = "close_icon.jpg";
                    }
                    $content.='<div style="padding: 30px;">
                                <p style="margin: 0 0 10px;color: #424242;font-weight: 500;font-size: 20px;">Interpretation of scores</p>';

                    $content.='<div style="padding:0 0 30px;">
                                            <h3 style="margin: 0 0 5px;color: #18A7A5;font-weight: 700;font-size: 24px;"><span style="display:inline-block; width:200px; color: #ADADAD; font-weight:500;">Dimension :</span>'.$getQuestion.'</h3>
                                            <h3 style="margin: 0 0 5px;color: #18A7A5;font-weight: 700;font-size: 24px;"><span style="display:inline-block; width:200px; color: #ADADAD; font-weight:500;">Score :</span>'.$total.'</h3>
                                            <h3 style="margin: 0 0 5px;color: #18A7A5;font-weight: 700;font-size: 24px;"><span style="display:inline-block; width:200px; color: #ADADAD; font-weight:500;">Comment :</span><img src="'.Base_url().'assets/site/images/'.$icon.'" alt=""></h3>
                                            <div style="margin-left:200px;">
                                                '.$getFeedback.'
                                            </div>
                                        </div>';
                    $pdf->SetFont('helvetica', '', 12);
                    $pdf->setTextRenderingMode($stroke=0, $fill=true, $clip=false);
                    //$pdf->writeHTMLCell(0, 10, '© 2016. SMG Health. All rights reserved.', 0, false, 'C', 0, '', 0, false, 'T', 'M');
                    $pdf->writeHTML($content, true, false, false, false, '');

                }
                
                /* Create ditectory to save PDF report */
                $fillpath = realpath("assets/site/reports");
                if(!is_dir($fillpath."/$id_user"))
                    mkdir($fillpath."/$id_user");
                $filename = $fillpath."/$id_user/".'survey-report-'.strtotime('now').'.pdf';
                $pdf->Output($filename, 'F');
                
                /* Mail to user */
                $username = $this->session->userdata('display_name');
                $user = $this->site_model->get_row('smg_users', array('id_user' => $this->session->userdata('id_user')));
                $user_email = $user->user_email;
                $this->load->library('email');
                $config['mailtype'] = 'html';
                $this->email->initialize($config);
                
                $this->email->from('subhadip.sahoo@businessprodesigns.com', 'Subhadip Sahoo');
                $this->email->to($user_email);
                $this->email->subject("Thanks for giving bounce back survey");
                $msg['username'] = $username;
                $bodyMsg = $this->load->view('site/email-templates/tmpl_survey_report', $msg, TRUE);
                
                $this->email->message($bodyMsg);
                $this->email->attach($filename);
                $this->email->send();
                
                $this->session->set_userdata('suc_msg', 'You have successfully submitted the survey.');
                redirect('thank-you');
//                redirect('https://www.smghealth.com.au');
                exit();
            }
        }else{
            $data['sidebar'] = get_employee_sidebar();
            $header['title'] = 'Survey Panel';
            $header['display_name'] = $this->session->userdata('display_name');
            $data['header'] = $header;
            if($ques = $this->survey_model->survey_questions()){
                $data['questions'] = $ques;
            }
            $data['template'] = 'site/screens/survey_panel';
            $this->load->view('site/master_layout', $data);
        }
    }
    
    public function thank_you(){
        $data['sidebar'] = get_employee_sidebar();
        $header['title'] = 'Thank you';
        $header['display_name'] = $this->session->userdata('display_name');
        $data['header'] = $header;
//        if($ques = $this->survey_model->survey_questions()){
//            $data['questions'] = $ques;
//        }
        $data['template'] = 'site/screens/thank_you';
        $this->load->view('site/master_layout', $data);
    }
}