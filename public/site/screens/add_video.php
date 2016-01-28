<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9  dasboard_detasl dasboard-area">
                <section class="dase_orgat add-container">
                    <header class="pagetitle">
                        <h2>Add Video</h2>
                    </header>
                    <?php echo (isset($authentication_failed)) ? message_alert($authentication_failed, 4) : ''; ?>
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal" action="add_video" name="add_video" id="add_video" method="POST">
                        <div class="form-group">
                            <label for="Org Name" class="col-sm-3 control-label">Video Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="video_title" name="video_title" placeholder="Video Titlee" value="<?php echo set_value('video_title'); ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Org Name" class="col-sm-3 control-label">Video Embedded URL</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="video_name" name="video_name" placeholder="Video Embedded URL" value="<?php echo set_value('video_name'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-danger" value="Submit" name="add_video"><i class="fa fa-plus-circle"></i> Submit</button>
                            </div>
                        </div>
                    </form>          
                </section>
            </div>
        </div>
    </div>
</div>