<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 dasboard_menu"> 
                <ul class="nav dasboard_nav">
                    <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-users"></i>Manage Organization</a></li>
                    <li class="active"><a href="<?php echo base_url('manage-questionnaire'); ?>"><i class="fa fa-clipboard"></i>Manage Questionnaire</a></li>
                    <li><a href="#"><i class="fa fa-pencil-square-o"></i>Manage Reports</a></li>
                    <li><a href="#"><i class="fa fa-bar-chart"></i>Analytics</a></li>
                    <li><a href="#"><i class="fa fa-bell"></i>Notifications</a></li>
                    <li><a href="#"><i class="fa fa-user"></i>Manage Users</a></li>
                </ul>
            </div>
            <div class="col-md-9  dasboard_detasl">
                <section class="dase_orgat">
                    <!--<p class="text-right stron_dis"><span>  Strongly disagree </span> Strongly agree </p>-->
                    <?php if(isset($questions)): ?>
                    <?php foreach($questions as $ques): ?>
                    <div class="stron_box_con">
                        <div class="stron_num"><?php echo $ques->question_no; ?> )</div>
                        <div class="stron_box">
                            <p><?php echo $ques->question; ?></p>
                            <ol class="list-inline stron_nav">
                                <li>1. <span>Strongly Disagree</span></li>
                                <li>2. <span>Disagree</span></li>
                                <li>3. <span>Neutral</span></li>
                                <li>4. <span>Agree</span></li>
                                <li>5. <span>Strongly Agree</span></li>
                            </ol>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </div>
</div>