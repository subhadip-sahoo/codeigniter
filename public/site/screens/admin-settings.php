<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9  dasboard_detasl">
                <section class="dase_orgat">
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
                    <?php echo (isset($error) && $error == 'update_email_form')? validation_errors() : ''; ?>                    
                    <article class="setting-blocks">
                        <header class="pagetitle">
                            <h2>Change Email</h2>
                        </header>
                        <form class="form-horizontal" action="settings" name="change_email" id="change_email" method="POST">
                            <div class="form-group">
                                <label for="emailAddress" class="col-sm-3 control-label">Email of organization</label>
                                <div class="col-sm-8">
                                    <input type="email" required class="form-control" id="user_email" ng-model="user_email" ng-init="user_email = '<?php echo $user_email; ?>'" name="user_email" placeholder="Email Address" value="<?php echo set_value('user_email', $user_email); ?>">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group">
                                <label for="error" class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">
                                    <span style="color:red" ng-show="change_email.user_email.$dirty && change_email.user_email.$invalid">
                                        <span ng-show="change_email.user_email.$error.required">Organization email is required.</span>
                                        <span ng-show="change_email.user_email.$error.email">Please provide a valid email.</span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <input type="submit" class="btn btn-danger btn-submit" value="Submit" name="update_email" ng-disabled="change_email.user_email.$dirty && change_email.user_email.$invalid">
                                </div>
                            </div>
                        </form> 
                    </article>
                </section>
                <section class="dase_orgat">
                    <?php 
                        if($this->session->has_userdata('pass_suc_msg')){
                            echo message_alert($this->session->userdata('pass_suc_msg'), 2);
                            $this->session->unset_userdata('pass_suc_msg');
                        }
                        if($this->session->has_userdata('pass_err_msg')){
                            echo message_alert($this->session->userdata('pass_err_msg'), 4);
                            $this->session->unset_userdata('pass_err_msg');
                        }
                    ?>
                    <article class="setting-blocks">
                        <header class="pagetitle">
                            <h2>Change Password</h2>
                        </header>
                        <?php echo (isset($error) && $error == 'update_pass_form')? validation_errors() : ''; ?>
                        <form class="form-horizontal" action="settings" name="change_password" id="change_password" method="POST">
                            <div class="form-group">
                                <label for="cur_pass" class="col-sm-3 control-label">Current Password</label>
                                <div class="col-sm-8">
                                    <input type="password" required class="form-control" id="cur_pass" name="cur_pass" placeholder="Current Password">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group">
                                <label for="new_pass" class="col-sm-3 control-label">New Password</label>
                                <div class="col-sm-8">
                                    <input type="password" required class="form-control" id="new_pass" name="new_pass" placeholder="New Password">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group">
                                <label for="con_pass" class="col-sm-3 control-label">Confirm Password</label>
                                <div class="col-sm-8">
                                    <input type="password" required class="form-control" id="con_pass" name="con_pass" placeholder="Confirm Password">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <input type="submit" class="btn btn-danger btn-submit" value="Submit" name="update_pass" >
                                </div>
                            </div>
                        </form> 
                    </article>
                </section>
            </div>
        </div>
    </div>
</div>