<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9 dasboard_detasl dasboard-area">
                <section class="dase_orgat add-container">
                    <header class="pagetitle">
                        <h2>Create Page</h2>
                    </header>
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal" action="add" name="create_page" id="share_link" method="POST">
                        <div class="form-group">
                            <label for="link" class="col-sm-3 control-label">Page Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="page_title" name="page_title" placeholder="Page Title" value="<?php echo set_value('page_title'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-3 control-label">Page Slug</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="page_slug" name="page_slug" placeholder="Page Slug" value="<?php echo set_value('page_slug'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-3 control-label">Page Content</label>
                            <div class="col-sm-9">
                                <textarea name="page_content" class="ckeditor" cols="70"><?php echo set_value('page_content'); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" class="btn btn-danger" value="Create Page" name="add_page">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>