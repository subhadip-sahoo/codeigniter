<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9  dasboard_detasl dasboard-area">
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
                <section class="dase_orgat siteadmin-dashboard mannageadmin-container">
<!--                    <p class="text-center">
                        <?php // echo anchor('dashboard/add-organization', 'Add Organisation', array('class' => 'btn btn-lg add_org_buton', 'title' => 'Add Organisation')); ?>
                    </p>-->
                    <?php /*if(is_array($users)): ?>
                    <?php foreach($users as $user): ?>
                    <ul class="list-inline bordered-nav">
                        <li><?php echo $user->display_name; ?></li>
                        <li><a href="<?php echo $user->user_email; ?>"><?php echo $user->user_email; ?></a></li>             
                        <li><?php echo $user->organization_status; ?></li>
                        <!--<li><a href=""><i class="glyphicon glyphicon-edit"></i></a></li>-->
                        <li><a href="<?php echo "manage-users/delete/".$user->id_user; ?>" onclick="return confirm('Are you sure want to delete?');"><i class="glyphicon glyphicon-trash"></i></a></li>
                    </ul>
                    
                    <?php endforeach; ?>
                    <ul class="pagination">
                        <?php echo $pagination; ?>
                    </ul>
                    <?php else: ?>
                    <?php echo message_alert($users, 1);?>
                    <?php endif; */?>

                    <header class="pagetitle">
                        <h2>Manage Users</h2>
                        <span class="addtitle">
                            
                        </span>
                    </header>

                    <div class="mannage-table-area">
                        <?php if(is_array($users)): ?>
                            <div class="table-responsive">
                                <table class="table table-admin">
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach($users as $user): ?>
                                        <tr class="bordered-nav">
                                            <td><?php echo $user->display_name; ?></td>
                                            <td><a href="<?php echo $user->user_email; ?>"><?php echo $user->user_email; ?></a></td>             
                                            <td><span class="<?php echo ($user->organization_status == 'Active') ? 'status-active' : 'status-inactive'; ?>"><?php echo $user->organization_status; ?></span></td>
                                            <td>
                                                <?php if($user->organization_status == 'Active'): ?>
                                                <a href="<?php echo base_url('dashboard/inactive_employee/'.$user->id_user);?>" data-toggle="tooltip" data-placement="top" title="Make inactive"><i class="fa fa-times"></i></a> |
                                                <?php else: ?>
                                                <a href="<?php echo base_url('dashboard/active_employee/'.$user->id_user);?>" data-toggle="tooltip" data-placement="top" title="Make active"><i class="fa fa-check"></i></a> |
                                                <?php endif; ?>
                                                <a href="<?php echo "manage-users/delete/".$user->id_user; ?>" onclick="return confirm('Are you sure want to delete?');"><i class="glyphicon glyphicon-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <div class="text-center">
                                <ul class="pagination">
                                    <?php echo $pagination; ?>
                                </ul>
                            </div>
                        <?php else: ?>
                        <?php echo message_alert($users, 1);?>
                        <?php endif; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>