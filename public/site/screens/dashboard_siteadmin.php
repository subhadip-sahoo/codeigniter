<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 dasboard_menu"> 
                <ul class="nav dasboard_nav">
                    <li class="active"><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-users"></i>Manage Organization</a></li>
                    <li><a href="<?php echo base_url('manage-questionnaire'); ?>"><i class="fa fa-clipboard"></i>Manage Questionnaire</a></li>
                    <li><a href="#"><i class="fa fa-pencil-square-o"></i>Manage Reports</a></li>
                    <li><a href="#"><i class="fa fa-bar-chart"></i>Analytics</a></li>
                    <li><a href="#"><i class="fa fa-bell"></i>Notifications</a></li>
                    <li><a href="#"><i class="fa fa-user"></i>Manage Users</a></li>
                </ul>
            </div>
            <div class="col-md-9  dasboard_detasl">
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
                <section class="dase_orgat">
                    <p class="text-center">
                        <?php echo anchor('dashboard/add-organization', 'Add Organisation', array('class' => 'btn btn-lg add_org_buton', 'title' => 'Add Organisation')); ?>
                    </p>
                    <?php if(is_array($orgs)): ?>
                    <?php foreach($orgs as $org): ?>
                    <ul class="list-inline bordered-nav">
                        <li><?php echo $org->display_name; ?></li>
                        <li><?php echo $org->organization_location; ?></li>
                        <li><a href="<?php echo $org->user_email; ?>"><?php echo $org->user_email; ?></a></li>             
                        <!--<li><?php //echo $org->display_name; ?></li>-->
                        <li><?php echo $org->organization_status; ?></li>
                    </ul>
                    <?php 
                            endforeach; 
                        else:
                        echo message_alert($orgs, 1);
                    endif; 
                    ?>
                </section>
            </div>
        </div>
    </div>
</div>