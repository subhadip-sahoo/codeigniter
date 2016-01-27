<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9 dasboard_detasl dasboard-area">
                <section class="dase_orgat siteadmin-dashboard edit-block mannageadmin-container">
                    <header class="pagetitle">
                        <h2>Manage Feedback</h2>
                        <span class="addtitle">
                            <?php // echo anchor('manage-feedback/add', '<i class="fa fa-plus"></i> <span>Add Feedback</span>', array('class' => 'btn add_org_buton', 'title' => 'Add Feedback')); ?>
                        </span>
                    </header>

                    <p class="text-right"></p>
                    <div class="table-responsive">
                        <table class="table table-feedback text-center">
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
                            <?php if(is_array($data)): ?>

                                <?php /* ?><ul class="list-inline bordered-nav">
                                    <?php foreach($data as $row):?>
                                    <li><?php echo $row->question; ?></li>
                                    <li><?php echo $row->from_value.'-'.$row->to_value; ?></li>
                                    <li><a href="<?php echo $row->link; ?>"><?php echo $row->link; ?></a></li>
                                    <li><a href="<?php echo 'manage-feedback/edit/'.$row->id_feedback; ?>"><i class="glyphicon glyphicon-edit"></i></a></li>             
                                    <li><a href="<?php echo 'manage-feedback/delete/'.$row->id_feedback; ?>"><i class="glyphicon glyphicon-trash"></i></a></li>
                                    <?php endforeach; ?>
                                </ul><?php */?>
                                    <tr>
                                        <th class="text-center">Dimension</th>
                                        <th class="text-center">Range Score</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Range Score</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    <?php 
                                        foreach($data as $row): 
                                        $val = explode(',', $row->val);
                                    ?>
                                    <tr>
                                        <td><?php echo $row->question; ?></td>
                                        <td><?php echo $val[1]; ?></td>
                                        <td><a href="<?php echo 'manage-feedback/edit/'.$val[0]; ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
                                        <td><?php echo $val[3]; ?></td>
                                        <td><a href="<?php echo 'manage-feedback/edit/'.$val[2]; ?>"><i class="glyphicon glyphicon-edit"></i></a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                
                            <?php else: ?>
                                <tr>
                                    <td><?php echo message_alert($data, 1);?></td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>