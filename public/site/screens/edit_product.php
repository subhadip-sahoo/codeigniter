<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9 dasboard_detasl">
                <section class="dase_orgat">
                    <h2>Edit Page</h2>
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal" action="" name="create_page" id="share_link" method="POST">
                        <div class="form-group">
                            <label for="link" class="col-sm-3 control-label">Product Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="product_title" name="product_title" placeholder="Product Title" value="<?php echo set_value('smg_product_name', $data->smg_product_name);?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="link" class="col-sm-3 control-label">Product Content</label>
                            <div class="col-sm-9">
                                <textarea name="product_content" class="ckeditor" cols="70"><?php echo set_value('page_content', $data->smg_product_content);?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" class="btn btn-default" value="Update Product" name="edit_product">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>