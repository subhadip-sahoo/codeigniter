<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 dasboard_menu"> 
                <ul class="nav dasboard_nav">
                    <li class="active"><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-users"></i>Manage Organization</a></li>
                    <li><a href="#" ><i class="fa fa-clipboard"></i>Manage Questionnaire</a></li>
                    <li><a href="#" ><i class="fa fa-pencil-square-o"></i>Manage Reports</a></li>
                    <li><a href="#" ><i class="fa fa-bar-chart"></i>Analytics</a></li>
                    <li><a href="#" ><i class="fa fa-bell"></i>Notifications</a></li>
                    <li><a href="#" ><i class="fa fa-user"></i>Manage Users</a></li>
                </ul>
            </div>
            <div class="col-md-9  dasboard_detasl">
                <section class="dase_orgat">
                    <?php echo (isset($authentication_failed)) ? message_alert($authentication_failed, 4) : ''; ?>
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal" action="add_organization" name="add_organization" id="add_organization" method="POST">
                        <div ng-controller="permalinkCltr">
                            <div class="form-group">
                                <label for="Org Name" class="col-sm-3 control-label">Name of organization</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="organization_name" name="organization_name" placeholder="Name of organisation" value="<?php echo set_value('organization_name'); ?>" ng-model="organization_name" required ng-blur="generatePermalink()">
                                </div>
                                <div class="col-sm-1"></div>
                            </div>
                            <div class="form-group">
                                <label for="error" class="col-sm-3 control-label"></label>
                                <div class="col-sm-9">
                                    <span style="color:red" ng-show="add_organization.organization_name.$dirty && add_organization.organization_name.$invalid">
                                        <span ng-show="add_organization.organization_name.$error.required">Organization name is required.</span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Permalink of organization</label>
                                <div class="col-sm-5"><?php echo base_url('organization').'/'; ?></div>
                                <div class="col-sm-3">
                                    <input type="text" required class="form-control" id="organization_url" name="organization_url" placeholder="Unique permalink" value="<?php echo set_value('organization_url'); ?>" ng-model="organization_url">
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
                        <div ng-controller="add-depts">
                            <div class="form-group">
                                <label for="inputTeam" class="col-sm-3 control-label">Teams or departments</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" id="organization_depertments" name="organization_depertments[]" placeholder="Teams or departments">
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-default btn-primary" ng-click="addNewDepartment();"><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                            </div>
                            <div class="form-group" ng-repeat="department in departments track by $index">
                                <label for="inputTeam" class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" id="{{department.id}}" name="{{department.name}}" placeholder="{{department.placeholder}}" ng-model="department.value">
                                </div>
                                <div class="col-sm-1">
                                    <a href="javascript:void(0);" title="remove" class="btn btn-primary" ng-show="$last" ng-click="removeDepartment($index);"><i class="glyphicon glyphicon-minus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div ng-controller="add-levels">
                            <div class="form-group">
                                <label for="inputLevel " class="col-sm-3 control-label">Levels of organization</label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" id="organization_levels" name="organization_levels[]" placeholder="Levels">
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-default btn-primary" ng-click="addNewLevel()"><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                            </div>
                            <div class="form-group" ng-repeat="level in levels track by $index">
                                <label for="inputLevel" class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <input type="text" required class="form-control" id="{{ level.id }}" name="organization_levels[]" placeholder="Levels" ng-model="level.value">
                                </div>
                                <div class="col-sm-1">
                                    <a href="javascript:void(0);" title="remove" class="btn btn-primary" ng-show="$last" ng-click="removeLevel($index);"><i class="glyphicon glyphicon-minus"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputlocation" class="col-sm-3 control-label">Location of organization</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" ng-model="organization_location" id="organization_location" name="organization_location" placeholder="Location" value="<?php echo set_value('organization_location'); ?>">
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
                            <label for="emailAddress" class="col-sm-3 control-label">Email of organization</label>
                            <div class="col-sm-8">
                                <input type="email" required class="form-control" ng-model="user_email" id="user_email" name="user_email" placeholder="Email Address" value="<?php echo set_value('user_email'); ?>">
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                            <label for="error" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <span style="color:red" ng-show="add_organization.user_email.$dirty && add_organization.user_email.$invalid">
                                    <span ng-show="add_organization.user_email.$error.required">Organization email is required.</span>
                                    <span ng-show="add_organization.user_email.$error.email">Please provide a valid email.</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" class="btn btn-default" value="Submit" name="add_org" ng-disabled="add_organization.organization_name.$dirty && add_organization.organization_name.$invalid ||  
add_organization.user_email.$dirty && add_organization.user_email.$invalid || add_organization.organization_url.$dirty && add_organization.organization_url.$invalid">
                            </div>
                        </div>
                    </form>          
                </section>
            </div>
        </div>
    </div>
</div>