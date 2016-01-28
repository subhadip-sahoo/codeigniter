<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $bs_cls =  (get_user_org_product($this->session->userdata('id_user')) <> 1) ? 'col-md-9 dasboard_detasl' : 'col-md-12'; ?>
            <div class="<?php echo $bs_cls; ?>">
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
                                <label for="emailAddress" class="col-sm-3 control-label">User Email</label>
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
                                    <button type="submit" class="btn btn-danger btn-submit" value="Submit" name="update_email" ng-disabled="change_email.user_email.$dirty && change_email.user_email.$invalid">Submit <i class="fa fa-paper-plane-o"></i></button>
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
                                    <button type="submit" class="btn btn-danger btn-submit" value="Submit" name="update_pass" >Submit <i class="fa fa-paper-plane-o"></i></button>
                                </div>
                            </div>
                        </form> 
                    </article>
                </section>
                <section class="dase_orgat">
                    <?php 
                        if($this->session->has_userdata('suc_msg_details')){
                            echo message_alert($this->session->userdata('suc_msg_details'), 2);
                            $this->session->unset_userdata('suc_msg_details');
                        }
                        if($this->session->has_userdata('err_msg_details')){
                            echo message_alert($this->session->userdata('err_msg_details'), 4);
                            $this->session->unset_userdata('err_msg_details');
                        }
                    ?>
                    <?php echo validation_errors(); ?>
                    <article class="setting-blocks">
                        <header class="pagetitle">
                            <h2>Change details</h2>
                        </header>
                        <?php // DBUG($user); ?>
                        <form role="form" action="settings" method="POST" class="form-signin">
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group <?php echo (form_error('display_name')) ? 'has-error' : ''; ?>">
                                            <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                                                <input class="form-control" placeholder="Full Name" name="display_name" type="text" autofocus value="<?php echo set_value('display_name', $user_field->display_name); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-phone"></i> </span>
                                                <input class="form-control" placeholder="Contact Number" name="user_contact" type="text" autofocus value="<?php echo set_value('user_contact', $user->user_contact); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-home"></i> </span>
                                                <textarea name="user_address" id="user_address" class="form-control" autofocus placeholder="Address"><?php echo set_value('user_address', $user->user_address); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group <?php echo (form_error('user_depertment')) ? 'has-error' : ''; ?>">
                                            <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-users"></i> </span>
                                                <select name="user_depertment" class="form-control" id="user_depertment">
                                                        <option value="">Teams or departments</option>
                                                        <?php foreach($user_depertment as $userdepertment){ ?>
                                                                <option value="<?php echo $userdepertment;?>" <?php echo set_select('user_depertment', $userdepertment, ($userdepertment == $user->user_depertment) ? TRUE : FALSE); ?>><?php echo $userdepertment;?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group <?php echo (form_error('user_location')) ? 'has-error' : ''; ?>">
                                            <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-location-arrow"></i> </span>
                                                <select name="user_location" class="form-control" id="user_location">
                                                    <option value="">Location</option>
                                                    <?php foreach($user_location as $userlocation){ ?>
                                                            <option value="<?php echo $userlocation;?>" <?php echo set_select('user_location', $userlocation, ($userlocation == $user->user_location) ? TRUE : FALSE); ?>><?php echo $userlocation;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group <?php echo (form_error('user_level')) ? 'has-error' : ''; ?>">
                                            <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-cubes"></i> </span>
                                                <select name="user_level" class="form-control" id="user_level">
                                                    <option value="">Level</option>
                                                    <?php foreach($user_level as $userlevel){ ?>
                                                    <option value="<?php echo $userlevel;?>" <?php echo set_select('user_location', $userlocation, ($userlocation == $user->user_location) ? TRUE : FALSE); ?>><?php echo $userlevel;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group <?php echo (form_error('user_gender')) ? 'has-error' : ''; ?>">
                                            <div class="input-group"> 
                                                <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                                                <select name="user_gender" class="form-control" id="user_gender">
                                                    <option value="">Gender</option>
                                                    <option value="M" <?php echo set_select('user_gender', 'M', ('M' == $user->user_gender) ? TRUE : FALSE); ?>>Male</option>
                                                    <option value="F" <?php echo set_select('user_gender', 'F', ('F' == $user->user_gender) ? TRUE : FALSE); ?>>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group <?php echo (form_error('user_age')) ? 'has-error' : ''; ?>">
                                            <div class="input-group"> 
                                                <span class="input-group-addon"> <i class="fa fa-life-ring"></i> </span>
                                                <select name="user_age" class="form-control" id="user_age">
                                                    <option value="">Age</option>
                                                    <option value="&lt; 20" <?php echo set_select('user_age', '&lt; 20', ('&lt; 20' == $user->user_age) ? TRUE : FALSE); ?>>&lt; 20</option>
                                                    <option value="21-30" <?php echo set_select('user_age', '21-30', ('21-30' == $user->user_age) ? TRUE : FALSE); ?>>21-30</option>
                                                    <option value="31-40" <?php echo set_select('user_age', '31-40', ('31-40' == $user->user_age) ? TRUE : FALSE); ?>>31-40</option>
                                                    <option value="41-50" <?php echo set_select('user_age', '41-50', ('41-50' == $user->user_age) ? TRUE : FALSE); ?>>41-50</option>
                                                    <option value="51-60" <?php echo set_select('user_age', '51-60', ('51-60' == $user->user_age) ? TRUE : FALSE); ?>>51-60</option>
                                                    <option value="&gt; 60" <?php echo set_select('user_age', '&gt; 60', ('&gt; 60' == $user->user_age) ? TRUE : FALSE); ?>>&gt; 60</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-danger btn-submit" value="Submit" name="update_details" >Submit <i class="fa fa-paper-plane-o"></i></button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </article>
                </section>
            </div>
            <?php if(get_user_org_product($this->session->userdata('id_user')) <> 1): ?>
            <?php $this->load->view('site/common/employee_sidebar', $sidebar); ?>
            <?php endif; ?>
        </div>
    </div> 
</div>