<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9  dasboard_detasl dasboard-area">
                <section class="dase_orgat mannageadmin-container">

                    <header class="pagetitle">
                        <h2>Manage Questionnaire</h2>
                        <span class="addtitle">
                            
                        </span>
                    </header>
                    <!--<p class="text-right stron_dis"><span>  Strongly disagree </span> Strongly agree </p>-->
                    <?php
                        if($this->session->has_userdata('suc_msg')){
                            echo message_alert($this->session->userdata('suc_msg'), 2);
                            $this->session->unset_userdata('suc_msg');
                        }
                    ?>
                    <?php if(isset($cats)): $count = 0; ?>
                    <div id="tabs" class="managetab-area">
                        <ul class="managetab-lists">
                            <?php foreach($cats as $cat): $count++;?>
                            <li><a href="#tabs-<?php echo $count; ?>"><?php echo $cat->question; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php 
                            $cat_count = 0;
                            foreach($cats as $cat): $cat_count++;?>
                        <div id="tabs-<?php echo $cat_count; ?>" class="managetab-contet">
                        <?php if($questions = $this->questionnaire_model->get_questionnaire($cat->id_questionnaire)): ?>                    
                        <?php foreach($questions as $question):?>
                            <div class="stron_box_con">
                                <div class="stron_num"><?php echo $question->question_no; ?></div>
                                <div class="stron_box clearfix">
                                    <h3 class="managetab-title"><?php echo $question->question; ?></h3>
                                    <div class="managetab-edit"> 
                                        <a href="<?php echo base_url();?>manage-questionnaire/edit-questionnaire/<?php echo $question->question_no; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                    </div>
                                    <ol class="list-inline stron_nav">
                                        <?php if($options = $this->questionnaire_model->get_question_options($question->id_questionnaire)): ?>
                                        <?php $count = 0; foreach ($options as $option) : $count++; ?>
                                        <li><?php echo $count; ?>. <span><?php echo $option->question; ?></span></li>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ol>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <div class="stron_box_con">
                                <div class="stron_box">
                                    <p>No questions found!</p>
                                </div>
                            </div>
                        <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </div>
</div>