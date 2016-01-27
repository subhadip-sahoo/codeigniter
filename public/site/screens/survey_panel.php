<div class="dase_bord clearfix">
    <div class="container-fluid">
        <div class="row">
            <?php $bs_cls =  (get_user_org_product($this->session->userdata('id_user')) <> 1) ? 'col-md-9 dasboard_detasl' : 'col-md-12'; ?>
            <div class="<?php echo $bs_cls; ?>">
                <section class="dase_orgat clearfix">
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
                    <form name="surveyFrm" id="surveyFrm" method="POST" action="survey">
                        <?php $count = 1; foreach($questions as $q): ?>
                        <div id="ques_<?php echo $q->question_no; ?>" class="frm all-qustion-frm" <?php echo ($q->question_no <> 1) ? 'style="display:none"' : ''; // $q->question_no <> 1?>>
                            <article class="question-block">
                                <header class="pagetitle pagetitle-question">
                                    <h2>Question <?php echo $q->question_no; ?> of <?php echo count($questions); ?></h2>
                                </header>
                                <div class="pagecontent">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 question-title" for="quetions">Q<?php echo $q->question_no; ?>: <?php echo $q->question; ?></div>
                                            <div class="col-lg-12 qustion-detail">
                                                <div class="btn-group-vertical qustion-section btn-radioblock" data-toggle="buttons">
                                                <?php if($options = $this->questionnaire_model->get_question_options($q->id_questionnaire)): ?>
                                                <?php foreach ($options as $option) : ?>
                                                  <label class="btn btn-info">
                                                    <input type="radio" name="answer_<?php echo $q->question_no; ?>" value="<?php echo $option->id_questionnaire; ?>" /> 
                                                    <?php echo $option->question; ?>
                                                  </label>
                                                <?php endforeach; ?>
                                                <?php endif; ?> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group review-box">
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <?php if($q->question_no <> 1): ?>
                                                <button class="hvr-icon-wobble-horizontal btn prev-button prev " type="button" data-question="ques_<?php echo ($q->question_no - 1); ?>">Back</button>
                                                <?php endif; ?>
                                                <?php if(count($questions) <> $count): ?>
                                                <button class="btn next next-button hvr-icon-wobble-horizontal" type="button" data-question="ques_<?php echo ($q->question_no + 1); ?>" data-current="<?php echo $q->question_no; ?>">Next</button>
                                                <?php else: ?>
                                                <button class="btn btn-info info-button" type="button" id="review-btn" data-current="<?php echo $q->question_no; ?>"><span class="fa fa-eye"></span> Preview</button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <?php $count++; endforeach; ?>
                        <div class="form-group row" id="submit-box" style="display:none;">
                            <div class="col-lg-10 col-lg-offset-2">
                                <input type="hidden" name="action" value="user_survey" />
                                <button type="submit" name="submit_survey" id="submit_survey" class="btn btn-primary btn-success button-success"><span class="fa fa-check"></span> Submit</button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <?php if(get_user_org_product($this->session->userdata('id_user')) <> 1): ?>
            <?php $this->load->view('site/common/employee_sidebar', $sidebar); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Survey alert message -->
<div class="modal fade" id="surveyWarningModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Warning Message !</h4>
            </div>
            <div class="modal-body">
                <?php echo message_alert('Please select an option. It is mandatory to select an option of each and every question.', 4, FALSE); ?>
            </div>
        </div>
    </div>
</div>
<!-- End -->