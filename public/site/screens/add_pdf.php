<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9  dasboard_detasl dasboard-area">
                <section class="dase_orgat add-container">
                    <header class="pagetitle">
                        <h2>Add Pdf</h2>
                    </header>
                   <?php if($this->session->userdata('pdf_err_msg')){
                            echo message_alert($this->session->userdata('pdf_err_msg'), 4);
                            $this->session->unset_userdata('pdf_err_msg');
                        }
                    ?>
                    <?php echo (isset($authentication_failed)) ? message_alert($authentication_failed, 4) : ''; ?>
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal" action="do_upload" name="add_pdf" id="add_pdf" method="POST" enctype="multipart/form-data">
                    <?php //echo form_open_multipart('dashboard/do_upload');?>
                        <div ng-controller="permalinkCltr">
                            <div class="form-group">
                                <label for="PDF Name" class="col-sm-3 control-label">Choose PDF</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control_pdf" id="userfile" name="userfile" >
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                                       
                       
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-danger" value="Submit" name="add_pdf"><i class="fa fa-plus-circle"></i> Submit</button>
                            </div>
                        </div>
                    </form>          
                </section>
            </div>
        </div>
    </div>
</div>