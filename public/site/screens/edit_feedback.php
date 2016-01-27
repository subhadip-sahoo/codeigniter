<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9 dasboard_detasl dasboard-area">
                <section class="dase_orgat edit-block">
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
                    <?php 
                        if($this->session->has_userdata('err_msg_range_exists')){
                            echo message_alert($this->session->userdata('err_msg_range_exists'), 4);
                            $this->session->unset_userdata('err_msg_range_exists');
                        }
                    ?>
                    <header class="pagetitle">
                        <h2>Edit Feedback</h2>
                    </header>
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal" action="edit" name="create_page" id="share_link" method="POST">
                        <div class="form-group">
                            <label for="link" class="col-sm-3 control-label">Select dimension</label>
                            <div class="col-sm-9">
                                <select name="dimension" class="form-control" disabled>
                                    <option value="">---- Please select a dimension ----</option>
                                    <?php if(is_array($dimensions)):?>
                                    <?php foreach($dimensions as $dimension): ?>
                                    <option value="<?php echo $dimension->id_questionnaire; ?>" <?php echo set_select('dimension', $dimension->id_questionnaire, ($data->id_dimension == $dimension->id_questionnaire) ? TRUE : FALSE); ?>><?php echo $dimension->question; ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-3 control-label">Select score range</label>
                            <div class="col-sm-9">
                                <select name="score_range" class="form-control" disabled>
                                    <option value="">---- Please select a score range ----</option>
                                    <option value="4-12" <?php echo set_select('score_range', '4-12', ($score_range === '4-12') ? TRUE : FALSE); ?>>4-12</option>
                                    <option value="13-20" <?php echo set_select('score_range', '13-20', ($score_range === '13-20') ? TRUE : FALSE); ?>>13-20</option>
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="feedback" class="col-sm-3 control-label">Feedback</label>
                            <div class="col-sm-9">
                                <textarea name="feedback" class="ckeditor" cols="70"><?php echo set_value('feedback', $data->feedback); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-3 control-label">Link</label>
                            <div class="col-sm-9">
                                <input type="text" name="link" class="form-control" value="<?php echo set_value('link', $data->link); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" class="btn btn-info" value="Update Feedback" name="edit_feedback">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>