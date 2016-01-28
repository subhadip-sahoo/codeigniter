<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <?php $this->load->view('site/common/admin_menu'); ?>
            <div class="col-md-9  dasboard_detasl dasboard-area">
                <section class="dase_orgat add-container">
                    <header class="pagetitle">
                        <h2>Add Organisation</h2>
                    </header>
                    <?php echo (isset($authentication_failed)) ? message_alert($authentication_failed, 4) : ''; ?>
                    <?php echo validation_errors(); ?>
                    <form class="form-horizontal" action="add_organization" name="add_organization" id="add_organization" method="POST" ng-controller="permalinkCltr">
                        <header class="addheader-title">
                            <h4>Organization Details</h4>
                        </header>
                        <div>
                            <div class="form-group">
                                <label for="Org Name" class="col-sm-3 control-label">Name of Organization</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="organization_name" name="organization_name" placeholder="Name of Organization" value="<?php echo set_value('organization_name'); ?>" ng-model="organization_name" required ng-blur="generatePermalink()">
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
                            <!-- <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Permalink of Organization</label>
                                <div class="col-sm-5"><span class="organi-title"><?php echo base_url('organization').'/'; ?></span></div>
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
                            </div> -->
                        </div>
                        <div class="form-group">
                            <label for="inputTeam" class="col-sm-3 control-label">Head Office Location</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" id="head_office_location" name="head_office_location" placeholder="Head Office Location">
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                            <label for="error" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <span style="color:red" ng-show="add_organization.head_office_location.$dirty && add_organization.head_office_location.$invalid">
                                    <span ng-show="add_organization.head_office_location.$error.required">Head office location is required</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="total_number_emp" class="col-sm-3 control-label">Total No Of Employees</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" ng-model="total_number_emp" id="total_number_emp" name="total_number_emp" placeholder="Total No of employee" value="<?php echo set_value('total_number_emp'); ?>">
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                            <label for="error" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <span style="color:red" ng-show="add_organization.total_number_emp.$dirty && add_organization.total_number_emp.$invalid">
                                    <span ng-show="add_organization.total_number_emp.$error.required">Total no of employee is required.</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailAddress" class="col-sm-3 control-label">Email of Organization</label>
                            <div class="col-sm-8">
                                <input type="email" required class="form-control" ng-model="user_email" id="user_email" name="user_email" placeholder="Email Address" value="<?php echo set_value('user_email'); ?>" ng-blur="checkUniqueEmail()">
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
                                <span id="email_exists" style="color:red; display: none;">Email of organization should be unique. Provided email has been already exist.</span>
                            </div>
                        </div>
                        <header class="addheader-title">
                            <h4>Programme Manager details</h4>
                        </header>
                        <div class="form-group">
                            <label for="program_manager_name" class="col-sm-3 control-label">Program Manager Name</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" ng-model="program_manager_name" id="program_manager_name" name="program_manager_name" placeholder="Program Manager Name" value="<?php echo set_value('program_manager_name'); ?>">
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                            <label for="error" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <span style="color:red" ng-show="add_organization.program_manager_name.$dirty && add_organization.program_manager_name.$invalid">
                                    <span ng-show="add_organization.program_manager_name.$error.required">Program manager is required.</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="program_manager_name" class="col-sm-3 control-label">Program Manager Telephone</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" ng-model="program_manager_telephone" id="program_manager_telephone" name="program_manager_telephone" placeholder="Programme Manager Telephone" value="<?php echo set_value('program_manager_telephone'); ?>">
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                            <label for="error" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <span style="color:red" ng-show="add_organization.program_manager_telephone.$dirty && add_organization.program_manager_telephone.$invalid">
                                    <span ng-show="add_organization.program_manager_telephone.$error.required">Programme manager telephone name is required.</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="program_manager_mobile" class="col-sm-3 control-label">Program Manager Mobile</label>
                            <div class="col-sm-8">
                                <input type="text" required class="form-control" ng-model="program_manager_mobile" id="program_manager_mobile" name="program_manager_mobile" placeholder="Programme Manager Mobile" value="<?php echo set_value('program_manager_mobile'); ?>">
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                            <label for="error" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <span style="color:red" ng-show="add_organization.program_manager_mobile.$dirty && add_organization.program_manager_mobile.$invalid">
                                    <span ng-show="add_organization.program_manager_mobile.$error.required">Program manager mobile name is required.</span>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="program_manager_email" class="col-sm-3 control-label">Program Manager Email</label>
                            <div class="col-sm-8">
                                <input type="email" required class="form-control" ng-model="program_manager_email" id="program_manager_email" name="program_manager_email" placeholder="Program Manager Email" value="<?php echo set_value('program_manager_email'); ?>">
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                            <label for="error" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <span style="color:red" ng-show="add_organization.program_manager_email.$dirty && add_organization.program_manager_email.$invalid">
                                    <span ng-show="add_organization.program_manager_email.$error.required">Program manager email name is required.</span>
                                    <span ng-show="add_organization.program_manager_email.$error.email">Valid email address is required.</span>
                                </span>
                            </div>
                        </div>
                        <header class="addheader-title">
                            <h4>Product</h4>
                        </header>
                        <div class="form-group">
                            <label for="Organization_product" class="col-sm-3 control-label">Organization Product</label>
                            <div class="col-sm-8">
                                <select name="product" class="form-control" required>
                                    <option value="">--Select Product--</option>
                                    <?php 
                                    foreach ($product as $prod) {
                                        echo '<option value="'.$prod->smg_product_id.'">'.$prod->smg_product_name.'</option>';
                                    }
                                    ?>
                                </select>    
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="form-group">
                            <label for="error" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <span style="color:red" ng-show="add_organization.user_email.$dirty && add_organization.user_email.$invalid">
                                    <span ng-show="add_organization.$error.required">Product is required.</span>
                                    <span ng-show="add_organization.$error.email">Please Select Product.</span>
                                </span>
                            </div>
                        </div>

                        <header class="addheader-title">
                            <h4>Product Filters</h4>
                        </header>

                        <div ng-controller="add-locs">
                            <div class="form-group">
                                <label for="inputTeam" class="col-sm-3 control-label">Locations of Organization</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" required class="form-control" id="organization_location" name="organization_location[]" placeholder="Locations">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-primary" ng-click="addNewLoc();"><i class="glyphicon glyphicon-plus"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <!-- <button type="button" class="btn btn-default btn-primary" ng-click="addNewLoc();"><i class="glyphicon glyphicon-plus"></i></button> -->
                                </div>
                            </div>
                            <div class="form-group" ng-repeat="loc in locations track by $index">
                                <label for="inputTeam" class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" required class="form-control" id="{{loc.id}}" name="{{loc.name}}" placeholder="{{loc.placeholder}}" ng-model="loc.value">
                                        <span class="input-group-btn">
                                            <a href="javascript:void(0);" title="remove" class="btn btn-primary ng-hide-animate" ng-show="$last" ng-click="removeLoc($index);"><i class="glyphicon glyphicon-minus"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <!-- <a href="javascript:void(0);" title="remove" class="btn btn-primary" ng-show="$last" ng-click="removeLoc($index);"><i class="glyphicon glyphicon-minus"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div ng-controller="add-levels">
                            <div class="form-group">
                                <label for="inputLevel " class="col-sm-3 control-label">Levels of Organization</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" required class="form-control" id="organization_levels" name="organization_levels[]" placeholder="Levels">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-primary" ng-click="addNewLevel()"><i class="glyphicon glyphicon-plus"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <!-- <button type="button" class="btn btn-default btn-primary" ng-click="addNewLevel()"><i class="glyphicon glyphicon-plus"></i></button> -->
                                </div>
                            </div>
                            <div class="form-group" ng-repeat="level in levels track by $index">
                                <label for="inputLevel" class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" required class="form-control" id="{{ level.id }}" name="organization_levels[]" placeholder="Levels" ng-model="level.value">
                                        <span class="input-group-btn">
                                            <a href="javascript:void(0);" title="remove" class="btn btn-primary ng-hide-animate" ng-show="$last" ng-click="removeLevel($index);"><i class="glyphicon glyphicon-minus"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <!-- <a href="javascript:void(0);" title="remove" class="btn btn-primary" ng-show="$last" ng-click="removeLevel($index);"><i class="glyphicon glyphicon-minus"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div ng-controller="add-depts">
                            <div class="form-group">
                                <label for="inputTeam" class="col-sm-3 control-label">Teams or departments</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" required class="form-control" id="organization_depertments" name="organization_depertments[]" placeholder="Teams or departments">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default btn-primary" ng-click="addNewDepartment();"><i class="glyphicon glyphicon-plus"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <!-- <button type="button" class="btn btn-default btn-primary" ng-click="addNewDepartment();"><i class="glyphicon glyphicon-plus"></i></button> -->
                                </div>
                            </div>
                            <div class="form-group" ng-repeat="department in departments track by $index">
                                <label for="inputTeam" class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" required class="form-control" id="{{department.id}}" name="{{department.name}}" placeholder="{{department.placeholder}}" ng-model="department.value">
                                        <span class="input-group-btn">
                                            <a href="javascript:void(0);" title="remove" class="btn btn-primary" ng-click="removeDepartment($index);"><i class="glyphicon glyphicon-minus"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <!-- <a href="javascript:void(0);" title="remove" class="btn btn-primary" ng-click="removeDepartment($index);"><i class="glyphicon glyphicon-minus"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="error" class="col-sm-3 control-label"></label>
                            <div class="col-sm-9">
                                <span style="color:red" ng-show="add_organization.organization_location.$dirty && add_organization.organization_location.$invalid">
                                    <span ng-show="add_organization.organization_location.$error.required">Organization location is required.</span>
                                </span>
                            </div>
                        </div>

                        <header class="addheader-title">
                            <h4>Permalink of organization</h4>
                        </header>
                        
                        <div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-3 control-label">Permalink of Organization</label>
                                <div class="col-sm-5"><span class="organi-title"><?php echo base_url('organization').'/'; ?></span></div>
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
                        
                        <div class="form-group text-center">
                            <div class="col-sm-12">
                                <button id="add_org" type="submit" class="btn btn-danger" value="Submit" name="add_org" ng-disabled="add_organization.organization_name.$dirty && add_organization.organization_name.$invalid ||  
add_organization.user_email.$dirty && add_organization.user_email.$invalid || add_organization.organization_url.$dirty && add_organization.organization_url.$invalid">Submit <i class="fa fa-sign-in"></i></button>
                            </div>
                        </div>
                    </form>          
                </section>
            </div>
        </div>
    </div>
</div>