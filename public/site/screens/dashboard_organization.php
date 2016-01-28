<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
<!--            <div class="col-md-3 dasboard_menu"> 
                <ul class="nav dasboard_nav">
                    <li class="active"><a href="<?php echo base_url("organization/$permalink"); ?>"><i class="fa fa-users"></i>Home</a></li>
                    <li><a href="<?php echo base_url("organization/$permalink/share-link"); ?>"><i class="fa fa-clipboard"></i>Share Link</a></li>
                    <li><a href="<?php echo base_url("organization/$permalink/settings"); ?>"><i class="fa fa-pencil-square-o"></i>Settings</a></li>
                </ul>
            </div>-->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-6">
                        <section class="dase_orgat admintotal-area">
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
                            <header class="pagetitle">
                                <h2><?php echo $this->session->userdata('display_name'); ?></h2>
                            </header>
                            <div class="pagecontent">
                                <p>Total shared: </p>
                                <div class="pagebutton">
                                    <?php //echo anchor('dashboard/stop-survey', 'Stop Survey', array('class' => 'btn btn-lg add_org_buton btn-danger', 'title' => 'Stop Survey')); ?>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-sm-6">
                        <section class="dase_orgat sharelink-block sharelink-area">
                            <?php 
                                if($this->session->has_userdata('share_suc_msg')){
                                    echo message_alert($this->session->userdata('share_suc_msg'), 2);
                                    $this->session->unset_userdata('share_suc_msg');
                                }
                                if($this->session->has_userdata('share_err_msg')){
                                    echo message_alert($this->session->userdata('share_err_msg'), 4);
                                    $this->session->unset_userdata('share_err_msg');
                                }
                            ?>
                            <?php echo (isset($authentication_failed)) ? message_alert($authentication_failed, 4) : ''; ?>
                            <?php echo validation_errors(); ?>
                            <header class="pagetitle">
                            <h2>Share your survey link</h2>
                            </header>
                            <form class="form-horizontal" action="<?php echo $permalink; ?>/share_link" name="share_link" id="share_link" method="POST">
                                <div ng-controller="add-recpt">
                                    <div class="form-group">
                                        <label for="Email" class="col-sm-3 control-label">Email</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">@</span>
                                                <input type="email" required class="form-control" id="recipient" name="recipient[]" placeholder="One recipient per field">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default btn-info btn-share" ng-click="addNewRecipient();"><i class="glyphicon glyphicon-plus"></i></button>
                                                </span>
                                                
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-3">
                                            <button type="button" class="btn btn-default btn-primary" ng-click="addNewRecipient();"><i class="glyphicon glyphicon-plus"></i></button> 
                                        </div>-->
                                    </div>
                                    <div class="form-group" ng-repeat="recipt in recipients track by $index">
                                        <label for="email" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">@</span>
                                                <input type="email" required class="form-control" id="{{ recipt.id }}" name="recipient[]" placeholder="One recipient per field" ng-model="recipt.value">
                                                <span class="input-group-btn">
                                                    <a href="javascript:void(0);" title="remove" class="btn btn-info btn-share" ng-show="$last" ng-click="removeRecipient($index);"><i class="glyphicon glyphicon-minus"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- <div class="col-sm-3">
                                            
                                        </div> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="link" class="col-sm-3 control-label">Link</label>
                                    <div class="col-sm-9">
                                        <input type="url" readonly class="form-control" id="survey_link" name="survey_link" value="<?php echo set_value('survey_link', base_url("organization/$permalink")); ?>">
                                    </div>
                                    <!-- <div class="col-sm-3"></div> -->
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-danger btn-submit" value="Send" name="send_link">Send <i class="fa fa-share-square-o"></i></button>
                                    </div>
                                </div>
                            </form>          
                        </section>
                    </div>
                </div>

                <section class="dase_orgat adminpage-block adminpage-manage-block">
                    <header class="pagetitle text-center">
                        <h2 class="text-center">Manage User</h2>
                    </header>
                    <div class="pagecontent">
                        <?php /* foreach($users as $user): ?>
                            <ul class="list-inline bordered-nav">
                                <li><?php echo $user->display_name; ?></li>
                                <li><a href="<?php echo $user->user_email; ?>"><?php echo $user->user_email; ?></a></li>             
                                <li><?php echo $user->organization_status; ?></li>
                                <li><a href=""><i class="glyphicon glyphicon-edit"></i></a></li>
                                <li><a href=""><i class="glyphicon glyphicon-trash"></i></a></li>
                            </ul>
                        <?php endforeach; */ ?>
                        <div class="table-responsive">
                            <table class="table table-users">
                                <?php foreach($users as $user): ?>
                                    <tr>
                                        <td><?php echo $user->display_name; ?></td>
                                        <td><a href="<?php echo $user->user_email; ?>"><?php echo $user->user_email; ?></a></td>
                                        <td class="status"><?php echo $user->organization_status; ?></td>
                                        <!--<td><a href=""><i class="glyphicon glyphicon-edit"></i></a></td>-->
                                        <td><a href="<?php echo "organization/delete/".$user->id_user; ?>" onclick="return confirm('Are you sure want to delete?');"><i class="glyphicon glyphicon-trash"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </section>

                <section class="dase_orgat adminpage-block">
                    <header class="pagetitle text-center">
                        <h2 class="text-center">Survey Report</h2>
                    </header>
                    <div class="pagecontent">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped survey-table text-center" id="tbExport"> 
                                <thead> 
                                    <tr class="info"> 
                                        <th>User</th>
                                        <?php if(isset($dimentions)) :?>
                                        <?php foreach($dimentions as $dimention): ?>
                                            <th><?php echo $dimention->question; ?></th> 
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tr> 
                                </thead>
                                <tbody> 
                                    <tr> 
                                        <?php 
                                          if($surveys){ echo $surveys; } else { echo '<td colspan="11"><center>No Data</center></td>';} 
                                        ?> 
                                    </tr> 
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
