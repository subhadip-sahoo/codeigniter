<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $bs_cls =  (get_user_org_product($this->session->userdata('id_user')) <> 1) ? 'col-md-9 dasboard_detasl' : 'col-md-12'; ?>
            <div class="<?php echo $bs_cls; ?>">
                <section class="dase_orgat content-container">
                    <?php 
                        if($this->session->has_userdata('suc_msg')){
                            echo message_alert($this->session->userdata('suc_msg'), 2);
                            $this->session->unset_userdata('suc_msg');
                        }
                        if($this->session->has_userdata('err_msg')){
                            echo message_alert($this->session->userdata('err_msg'), 4);
                            $this->session->unset_userdata('err_msg');
                        }
                    ?>
                    <header class="pagetitle">
                        <h2>Welcome to survey panel</h2>
                    </header>
                    <div class="pagecontent">
                        <p>Thank for participating in SMG Health’s Bounce Back Survey which will give you information on your strengths and weaknesses relating to your ability to ‘bounce back’ from difficult situations.   Following is a series of questions which will take you approximately 15 minutes to complete. Please consider each statement and select the option which best describes your response to each question.</p>
                        <p>All information obtained in this questionnaire  remains strictly confidential. Your results will not be provided to your company other than in an aggregated and de-identified form if requested. Please view our Privacy Policy at  <a href="http://www.smghealth.com.au/privacy-policy/" target="_blank">http://www.smghealth.com.au/privacy-policy/</a> 
                        <p>By proceeding to the questionnaire, you provide consent for SMG Health to collect this information and  understand that the information obtained during this Bounce Back Survey  is completely confidential, will be stored and analysed by SMG Health in accordance with the Privacy Act and not released to a 3rd party without prior consent.  </p>
                        <?php echo anchor('survey', 'Start Survey', array('class' => 'btn btn-lg add_org_buton', 'title' => 'Satrt Survey')); ?>
                        <hr>
                    </div>
                </section>
            </div>
            <?php if(get_user_org_product($this->session->userdata('id_user')) <> 1): ?>
            <?php $this->load->view('site/common/employee_sidebar', $sidebar); ?>
            <?php endif; ?>
        </div>
    </div>
</div>