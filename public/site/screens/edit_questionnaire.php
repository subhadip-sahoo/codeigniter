<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9  dasboard_detasl dasboard-area">
                <section class="dase_orgat edit-block">
                    <!--<p class="text-right stron_dis"><span>  Strongly disagree </span> Strongly agree </p>-->
                    <form action="<?php echo base_url();?>manage_questionnaire/update_questionnaire" method="post">
                    <header class="pagetitle">
                        <h2>Edit Questionnaire</h2>
                    </header>
                    <div class="pagecontent">
                       <div class="question-edit-block">Question : <input type="text" name="question" value="<?php echo $question;?>" class="form-control"><input type="hidden" name="id_questionnaire" value="<?php echo $id_questionnaire;?>"> </div>
                        <div class="question-edit-ans-block">
                            <?php 
                                $i=1;
                                foreach ($get_ans as $ga) {
                                    echo '<div class="row">
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">Answer '.$i.'</span>
                                                <input type="text" name="answare_'.$i.'" value="'.$ga->question.'" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="input-group">
                                                <span class="input-group-addon">Credit Point :</span>
                                                <input type="text" name="credit_'.$i.'" value="'.$ga->credit_point.'" class="form-control"> <input type="hidden" name="answare_id_'.$i.'" value="'.$ga->id_questionnaire.'"> 
                                            </div>
                                        </div>
                                    </div>';
                                    //echo '<p>Answare '.$i.': <input type="text" name="answare_'.$i.'" value="'.$ga->question.'" style="width:74%"> - Credit Point : <input type="text" name="credit_'.$i.'" value="'.$ga->credit_point.'" style="width:5%"> <input type="hidden" name="answare_id_'.$i.'" value="'.$ga->id_questionnaire.'"> </p>';

                                    $i++;
                                }
                            ?>
                        </div>
                        
                        <p class="text-center"> <button type="submit" value="Update Questionnaire" class="btn btn-danger"><i class="fa fa-pencil"></i> Update Questionnaire</button></p> 
                    </div>
                    
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>