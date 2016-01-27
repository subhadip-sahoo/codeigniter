<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
<!--            <div class="col-md-3 dasboard_menu"> 
                <ul class="nav dasboard_nav">
                    <li><a href="<?php echo base_url("organization/$permalink"); ?>"><i class="fa fa-users"></i>Home</a></li>
                    <li><a href="<?php echo base_url("organization/$permalink/share-link"); ?>"><i class="fa fa-clipboard"></i>Share Link</a></li>
                    <li class="active"><a href="<?php echo base_url("organization/$permalink/settings"); ?>"><i class="fa fa-pencil-square-o"></i>Settings</a></li>
                </ul>
            </div>-->
            <div class="col-md-12">
<!--                <section class="dase_orgat">
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
                    <?php //echo (isset($authentication_failed)) ? message_alert($authentication_failed, 4) : ''; ?>
                    <?php //echo (isset($error) && $error == 'update_org_form')? validation_errors() : ''; ?>
                    <h2>Organization Settings</h2>
                    <form class="form-horizontal" action="settings" name="add_organization" id="add_organization" method="POST">
                        <div ng-controller="permalinkCltr">
                            <div class="form-group">
                                <label for="Org Name" class="col-sm-3 control-label">Name of organization</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="organization_name" name="organization_name" ng-model="organization_name" ng-init="organization_name = '<?php echo $organization_name; ?>'" placeholder="Name of organisation" value="<?php echo set_value('organization_name', $organization_name); ?>">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Permalink of organization</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="organization_url" name="organization_url" ng-model="organization_url" ng-init="organization_url = '<?php echo $organization_url; ?>'" placeholder="Unique permalink" value="<?php echo set_value('organization_url', $organization_url); ?>" readonly>
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group">
                                <label for="error" class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">
                                    <span style="color:red" ng-show="add_organization.organization_url.$dirty && add_organization.organization_url.$invalid">
                                        <span ng-show="add_organization.organization_url.$error.required">Organization name is required.</span>
                                    </span>
                                    <span id="not-unique" style="color:red; display: none;">Organization url should be unique. Provided permalink has been already exist.</span>
                                </div>
                            </div>
                        </div>
                        <div ng-controller="add-locs">
                            <?php 
                                if(isset($organization_location) && is_array($organization_location)):
                                $count = 0;
                                foreach($organization_location as $org_depts): $count++;?>
                            <div class="form-group" id="dept-<?php echo $count;?>">
                                <label for="inputTeam" class="col-sm-3 control-label"><?php echo ($count > 1) ? '' : 'Location of organization'; ?></label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" id="organization_location" name="organization_location[]" placeholder="Teams or departments" value="<?php echo $org_depts; ?>">
                                </div>
                                <div class="col-sm-1">
                                    <?php if($count == 1): ?>
                                    <button type="button" class="btn btn-default btn-primary" ng-click="addNewLoc();"><i class="glyphicon glyphicon-plus"></i></button>
                                    <?php else: ?>
                                    <a href="javascript:void(0);" title="remove" class="btn btn-primary remove-data" data-parent="#loc-<?php echo $count;?>"><i class="glyphicon glyphicon-minus"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <div class="form-group" ng-repeat="loc in locations track by $index">
                                <label for="inputTeam" class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" id="{{loc.id}}" name="{{loc.name}}" placeholder="{{loc.placeholder}}" ng-model="loc.value">
                                </div>
                                <div class="col-sm-1">
                                    <a href="javascript:void(0);" title="remove" class="btn btn-primary" ng-click="removeLoc($index);"><i class="glyphicon glyphicon-minus"></i></a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div ng-controller="add-depts">
                            <?php 
                                if(isset($organization_depertments) && is_array($organization_depertments)):
                                $count = 0;
                                foreach($organization_depertments as $org_depts): $count++;?>
                            <div class="form-group" id="dept-<?php echo $count;?>">
                                <label for="inputTeam" class="col-sm-3 control-label"><?php echo ($count > 1) ? '' : 'Teams or departments'; ?></label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" id="organization_depertments" name="organization_depertments[]" placeholder="Teams or departments" value="<?php echo $org_depts; ?>">
                                </div>
                                <div class="col-sm-1">
                                    <?php if($count == 1): ?>
                                    <button type="button" class="btn btn-default btn-primary" ng-click="addNewDepartment();"><i class="glyphicon glyphicon-plus"></i></button>
                                    <?php else: ?>
                                    <a href="javascript:void(0);" title="remove" class="btn btn-primary remove-data" data-parent="#dept-<?php echo $count;?>"><i class="glyphicon glyphicon-minus"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <div class="form-group" ng-repeat="department in departments track by $index">
                                <label for="inputTeam" class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" id="{{department.id}}" name="{{department.name}}" placeholder="{{department.placeholder}}" ng-model="department.value">
                                </div>
                                <div class="col-sm-1">
                                    <a href="javascript:void(0);" title="remove" class="btn btn-primary" ng-click="removeDepartment($index);"><i class="glyphicon glyphicon-minus"></i></a>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div ng-controller="add-levels">
                            <?php 
                                if(isset($organization_levels) && is_array($organization_levels)):
                                $count = 0;
                                foreach($organization_levels as $org_levels): $count++;?>
                            <div class="form-group" id="level-<?php echo $count;?>">
                                <label for="inputLevel " class="col-sm-3 control-label"><?php echo ($count > 1) ? '' : 'Levels of organization'; ?></label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" id="organization_levels" name="organization_levels[]" placeholder="Levels" value="<?php echo $org_levels; ?>">
                                </div>
                                <div class="col-sm-1">
                                    <?php if($count == 1): ?>
                                    <button type="button" class="btn btn-default btn-primary" ng-click="addNewLevel()"><i class="glyphicon glyphicon-plus"></i></button>
                                    <?php else: ?>
                                    <a href="javascript:void(0);" title="remove" class="btn btn-primary remove-data" data-parent="#level-<?php echo $count;?>"><i class="glyphicon glyphicon-minus"></i></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>
                            <div class="form-group" ng-repeat="level in levels track by $index">
                                <label for="inputLevel" class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" id="{{ level.id }}" name="organization_levels[]" placeholder="Levels" ng-model="level.value">
                                </div>
                                <div class="col-sm-1">
                                    <a href="javascript:void(0);" title="remove" class="btn btn-primary" ng-click="removeLevel($index);"><i class="glyphicon glyphicon-minus"></i></a>
                                </div>
                            </div>
                         <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="inputlocation" class="col-sm-3 control-label">Location of organization</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" ng-model="organization_location" ng-init="organization_location = '<?php echo $organization_location; ?>'" id="organization_location" name="organization_location" placeholder="Location" value="<?php echo set_value('organization_location', $organization_location); ?>">
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                            <label for="error" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <span style="color:red" ng-show="add_organization.organization_location.$dirty && add_organization.organization_location.$invalid">
                                    <span ng-show="add_organization.organization_location.$error.required">Organization location is required.</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" class="btn btn-default" value="Submit" name="update_org" ng-disabled="add_organization.organization_name.$dirty && add_organization.organization_name.$invalid ||  
add_organization.organization_url.$dirty && add_organization.organization_url.$invalid">
                            </div>
                        </div>
                    </form>          
                </section>-->
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