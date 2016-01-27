<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9 dasboard_detasl dasboard-area">
                <section class="dase_orgat siteadmin-dashboard mannageadmin-container">

                    <header class="pagetitle">
                        <h2>Manage Content</h2>
                        <span class="addtitle">
                            <?php echo anchor('manage-content/add', '<i class="fa fa-plus"></i> <span>Add Page</span>', array('class' => 'btn add_org_buton', 'title' => 'Add Page')); ?>
                        </span>
                    </header>

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
                    <?php /*if(is_array($data)): ?>
                    <ul class="list-inline bordered-nav">
                        <?php foreach($data as $row):?>
                        <li><?php echo $row->page_title; ?></li>
                        <li><?php echo $row->page_slug; ?></li>
                        <li><a href="<?php echo 'manage-content/edit/'.$row->id_page; ?>">Edit</a></li>             
                        <li><a href="<?php echo 'manage-content/delete/'.$row->id_page; ?>">Delete</a></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php else: ?>
                    <?php echo message_alert($data, 1);?>
                    <?php endif; */?>

                    <div class="table-responsive">
                        <table class="table table-admin">
                            <?php if(is_array($data)): ?>
                                <tr class="bordered-nav">
                                    <?php foreach($data as $row):?>
                                    <td><?php echo $row->page_title; ?></td>
                                    <td><?php echo $row->page_slug; ?></td>
                                    <td><a href="<?php echo 'manage-content/edit/'.$row->id_page; ?>"><i class="fa fa-pencil-square-o"></i> Edit</a></td>             
                                    <td><a href="<?php echo 'manage-content/delete/'.$row->id_page; ?>"><i class="glyphicon glyphicon-trash"></i></a></td>
                                    <?php endforeach; ?>
                                </tr>
                                <?php else: ?>
                                <?php echo message_alert($data, 1);?>
                                <?php endif; ?>
                        </table>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>