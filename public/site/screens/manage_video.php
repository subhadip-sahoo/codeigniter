<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9 col-sm-9  dasboard_detasl dasboard-area">
                <section class="dase_orgat mannageadmin-container clearfix">
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
                        <h2>Manage Video</h2>
                        <span class="addtitle">
                            <?php echo anchor('dashboard/add-video', '<i class="fa fa-plus"></i> <span>Add Video</span>', array('class' => 'btn add_org_buton', 'title' => 'Add Video')); ?>
                        </span>
                    </header>
                     <?php /*if(is_array($vids)): 
                    $sn_count = 1;
                    foreach($vids as $vid): $video_id = $vid->video_id;?>
                    <ul class="list-inline bordered-nav">
                        <li><?php echo $sn_count; ?></li>
                        <li>
                            <div class="embed-responsive embed-responsive-16by9">
                              <iframe src="<?php echo $vid->video_name; ?>" class="embed-responsive-item"></iframe>
                            </div>
                            <!-- <iframe width="320" height="120" src="<?php echo $vid->video_name; ?>" frameborder="0" allowfullscreen></iframe> -->
                        </li>
                        <li><?php echo anchor("Manage_video/delete_row/{$video_id}", 'DELETE'); ?></li>
                    </ul>
                    <?php 
                        $sn_count++;
                            endforeach; 
                        else:
                        echo message_alert($vids, 1);
                    endif; 
                    */?>
                    <div class="video-admin">
                        <div class="row">
                            <?php if(is_array($vids)): 
                            $sn_count = 1;
                            foreach($vids as $vid): $video_id = $vid->video_id;?>
                                <div class="col-sm-12 col-md-6">
                                    <div class="video-blocks">
                                        <div class="embed-responsive embed-responsive-16by9">
                                          <iframe src="<?php echo $vid->video_name; ?>" class="embed-responsive-item"></iframe>
                                        </div>
                                        <?php echo anchor("Manage_video/delete_row/{$video_id}", '<i class="fa fa-times"></i>'); ?>
                                    </div>
                                </div>
                            <?php 
                                $sn_count++;
                                    endforeach; 
                                else:
                                echo message_alert($vids, 1);
                            endif; 
                            ?> 
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>