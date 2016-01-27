<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9 dasboard_detasl dasboard-area">
                <section class="dase_orgat add-container">
                    <header class="pagetitle">
                        <h2>Add Product</h2>
                    </header>
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal" action="add" name="create_page" id="share_link" method="POST">
                        <div class="form-group">
                            <label for="link" class="col-sm-3 control-label">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="smg_product_name" name="smg_product_name" placeholder="Product Name" value="<?php echo set_value('smg_product_name'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-3 control-label">Product Content</label>
                            <div class="col-sm-9">
                                <textarea name="smg_product_content" class="ckeditor" cols="70"><?php echo set_value('smg_product_content'); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" class="btn btn-danger" value="Create Product" name="add_product">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>