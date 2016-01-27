<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 dasboard_menu">
                <ul class="nav dasboard_nav">
                    <li class="active"><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-users"></i>Home</a></li>
                    <li><a href="<?php echo base_url('survey'); ?>"><i class="fa fa-clipboard"></i>Submit a survey</a></li>
					<li><a href="<?php echo base_url('video'); ?>"><i class="fa fa-clipboard"></i>Videos</a></li>
                    <li><a href="<?php echo base_url('pdf'); ?>"><i class="fa fa-clipboard"></i>PDF</a></li>
                    <li><a href="#"><i class="fa fa-pencil-square-o"></i>Settings</a></li>
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
                   <?php
                     if(is_array($vids)): ?>
                    <?php 
					$sn_count = 1;
					foreach($vids as $vid): ?>
                    <ul class="list-inline bordered-nav">
					 <li><?php echo $sn_count; ?></li>
                     <li><iframe width="320" height="120" src="<?php echo $vid->video_name; ?>" frameborder="0" allowfullscreen></iframe>
						</li>
					
                    </ul>
                    <?php 
					$sn_count++;
                            endforeach; 
                        else:
                        echo message_alert($vids, 1);
                    endif; 
                    ?> 
                </section>
            </div>
        </div>
    </div>
</div>
