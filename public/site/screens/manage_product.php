<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9 dasboard_detasl dasboard-area">
                <section class="dase_orgat siteadmin-dashboard mannageadmin-container">

                    <header class="pagetitle">
                        <h2>Manage Product</h2>
                        <span class="addtitle">
                            <?php //echo anchor('manage-product/add', '<i class="fa fa-plus"></i> Add Product', array('class' => 'btn add_org_buton', 'title' => 'Add Product')); ?>
                        </span>
                    </header>

                    <p class="text-right"><?php //echo anchor('manage-product/add', '<i class="fa fa-plus"></i> Add Product', array('class' => 'btn add_org_buton', 'title' => 'Add Product')); ?></p>
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
                        <?php foreach($data as $row):?>
                            <ul class="list-inline bordered-nav">
                            <li style="width:45%"><?php echo $row->smg_product_name; ?></li>
                            <li style="width:25%"><a href="<?php echo 'manage-product/edit/'.$row->smg_product_id; ?>">Edit</a></li>             
                            <li style="width:25%"><a href="<?php echo 'manage-product/delete/'.$row->smg_product_id; ?>" onclick="return confirm('Are you sure you want to delete this product.')">Delete</a></li>
                            </ul>
                        <?php endforeach; ?>
                  
                    <?php else: ?>
                    <?php echo message_alert($data, 1);?>
                    <?php endif; */?>

                    <div class="table-responsive">
                        <table class="table table-admin">
                            <?php if(is_array($data)): ?>
                                <?php foreach($data as $row):?>
                                    <tr class="bordered-nav">
                                    <td><?php echo $row->smg_product_name; ?></td>
                                    <td><a href="<?php echo 'manage-product/edit/'.$row->smg_product_id; ?>"><i class="fa fa-pencil-square-o"></i> Edit</a></td>             
                                    <td><a href="<?php echo 'manage-product/delete/'.$row->smg_product_id; ?>" onclick="return confirm('Are you sure you want to delete this product.')"><i class="glyphicon glyphicon-trash"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                          
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