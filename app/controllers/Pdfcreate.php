<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfcreate extends CI_Controller {
    
    function __construct() { 
        parent::__construct();
        $this->load->model('survey_model');
    }
    
    function index(){
        $id_user = $this->uri->segment(2); 
        $created_at = urldecode($this->uri->segment(3));
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
       // $content.='<p style="padding: 75px 15px 0;text-align:center; border-top: solid 1px #E0E0E0; font-size: 10px;">&nbsp;<br>© 2016. SMG Health. All rights reserved.</p>';
        $pdf->SetFont('helvetica', '', 12);
        $pdf->setTextRenderingMode($stroke=0, $fill=true, $clip=false);
        //$pdf->writeHTMLCell(0, 10, '© 2016. SMG Health. All rights reserved.', 0, false, 'C', 0, '', 0, false, 'T', 'M');
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
            // set color for text stroke
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
                                </div>
';
            $pdf->SetFont('helvetica', '', 12);
            $pdf->setTextRenderingMode($stroke=0, $fill=true, $clip=false);
            //$pdf->writeHTMLCell(0, 10, '© 2016. SMG Health. All rights reserved.', 0, false, 'C', 0, '', 0, false, 'T', 'M');
            $pdf->writeHTML($content, true, false, false, false, '');
            
        }
        $pdf->Output('example.pdf', 'I');            
    }
}