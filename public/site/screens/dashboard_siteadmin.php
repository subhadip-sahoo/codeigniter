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
                    <header class="pagetitle">
                        <h2>Manage Organization</h2>
                        <span class="addtitle">
                            <?php echo anchor('dashboard/add-organization', '<i class="fa fa-plus"></i> <span>Add Organization</span>', array('class' => 'btn add_org_buton', 'title' => 'Add Organisation')); ?>
                        </span>
                    </header>
                    <?php /* if(is_array($orgs)):?>
                    <?php foreach($orgs as $org): ?>
                    <ul class="list-inline bordered-nav">
                        <li><?php echo $org->display_name; ?></li>
                        <li><?php echo $org->organization_location; ?></li>
                        <li><a href="<?php echo $org->user_email; ?>"><?php echo $org->user_email; ?></a></li>             
                        <!--<li><?php //echo $org->display_name; ?></li>-->
                        <li><?php echo $org->organization_status; ?></li>
                        <?php 
                            $this->load->model('site_model');
                            $countuser = $this->site_model->get_countoforgs($org->id_user);
                            
                        ?>
                        <li><a href="<?php echo base_url();?>dashboard/delete_organization/<?php echo $org->id_user ?>" onclick="return confirm('Are you sure you want to delete this item? \nTotal count of active user <?php echo $countuser ?>');">Delete</a></li>
                    </ul>
                    <?php 
                            endforeach; 
                        else:
                        echo message_alert($orgs, 1);
                    endif; 
                    */?>

                    <?php if(is_array($orgs)):?>
                        <div class="table-responsive">
                            <table class="table table-admin">
                                <tr>
                                    <th>Organization Name</th>
                                    <th>Head office Location</th>
                                    <th>Email Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <?php foreach($orgs as $org): ?>
                                <tr class="bordered-nav">
                                    <td><?php echo $org->display_name; ?></td>
                                    <td><?php echo ($org->organization_location == '') ? 'Nothing added' : $org->organization_location; ?></td>
                                    <td><a href="<?php echo $org->user_email; ?>"><?php echo $org->user_email; ?></a></td>             
                                    <!--<li><?php //echo $org->display_name; ?></li>-->
                                    <td><span class="<?php echo ($org->organization_status == 'Active') ? 'status-active' : 'status-inactive'; ?>"><?php echo $org->organization_status; ?></span></td>
                                    <?php 
                                        $this->load->model('site_model');
                                        $countuser = $this->site_model->get_countoforgs($org->id_user);
                                    ?>
                                    <td>
                                        <?php if($org->organization_status == 'Active'): ?>
                                        <a href="<?php echo base_url('dashboard/inactive_user/'.$org->id_user);?>" data-toggle="tooltip" data-placement="top" title="Make inactive"><i class="fa fa-times"></i></a> |
                                        <?php else: ?>
                                        <a href="<?php echo base_url('dashboard/active_user/'.$org->id_user);?>" data-toggle="tooltip" data-placement="top" title="Make active"><i class="fa fa-check"></i></a> |
                                        <?php endif; ?>
                                        <a href="<?php echo base_url();?>dashboard/delete_organization/<?php echo $org->id_user ?>" onclick="return confirm('Are you sure you want to delete this item? \nTotal count of active user <?php echo $countuser ?>');"><i class="glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?> 
                            </table>
                        </div>
                     <?php else:
                        echo message_alert($orgs, 1);
                    endif; 
                    ?>
                </section>
            </div>
        </div>
    </div>
</div>