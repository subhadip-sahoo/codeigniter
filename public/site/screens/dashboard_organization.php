<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 dasboard_menu"> 
                <ul class="nav dasboard_nav">
                    <li class="active"><a href="<?php echo base_url("organization/$permalink"); ?>"><i class="fa fa-users"></i>Home</a></li>
                    <li><a href="<?php echo base_url("organization/$permalink/share-link"); ?>"><i class="fa fa-clipboard"></i>Share Link</a></li>
                    <li><a href="<?php echo base_url("organization/$permalink/settings"); ?>"><i class="fa fa-pencil-square-o"></i>Settings</a></li>
                </ul>
            </div>
            <div class="col-md-9  dasboard_detasl">
                <section class="dase_orgat">
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
                    <h2><?php echo $this->session->userdata('display_name'); ?></h2><br/>
                    <p>Total shared: </p><br/>
                    <p class="text-center">
                        <?php echo anchor('#', 'Running', array('class' => 'btn btn-lg btn-primary add_org_buton', 'title' => 'Running')); ?>
                        <?php echo anchor('dashboard/stop-survey', 'Stop Survey', array('class' => 'btn btn-lg add_org_buton', 'title' => 'Stop Survey')); ?>
                    </p>
                    <p>Graph</p>
                    <p>Total number of participants: </p>
                </section>
            </div>
        </div>
    </div>
</div>