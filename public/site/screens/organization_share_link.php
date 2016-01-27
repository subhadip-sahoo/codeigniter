<div class="dase_bord">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 dasboard_menu"> 
                <ul class="nav dasboard_nav">
                    <li><a href="<?php echo base_url("organization/$permalink"); ?>"><i class="fa fa-users"></i>Home</a></li>
                    <li class="active"><a href="<?php echo base_url("organization/$permalink/share-link"); ?>"><i class="fa fa-clipboard"></i>Share Link</a></li>
                    <li><a href="<?php echo base_url("organization/$permalink/settings"); ?>"><i class="fa fa-pencil-square-o"></i>Settings</a></li>
                </ul>
            </div>
            <div class="col-md-9  dasboard_detasl">
                <section class="dase_orgat sharelink-block1 sharelink-area">
                    <?php echo (isset($authentication_failed)) ? message_alert($authentication_failed, 4) : ''; ?>
                    <?php echo validation_errors(); ?>
                    <header class="pagetitle">
                        <h2>Share your survey link</h2>
                    </header>
                    <form class="form-horizontal" action="share_link" name="share_link" id="share_link" method="POST">
                        <div ng-controller="add-recpt">
                            <div class="form-group">
                                <label for="Email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="email" required class="form-control" id="recipient" name="recipient[]" placeholder="One recipient per field">
                                        <span class="input-group-addon">
                                            <button type="button" class="btn btn-default btn-primary" ng-click="addNewRecipient();"><i class="glyphicon glyphicon-plus"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- <button type="button" class="btn btn-default btn-primary" ng-click="addNewRecipient();"><i class="glyphicon glyphicon-plus"></i></button> -->
                                </div>
                            </div>
                            <div class="form-group" ng-repeat="recipt in recipients track by $index">
                                <label for="email" class="col-sm-3 control-label"></label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="email" required class="form-control" id="{{ recipt.id }}" name="recipient[]" placeholder="One recipient per field" ng-model="recipt.value">
                                        <span class="input-group-addon">
                                            <a href="javascript:void(0);" title="remove" class="btn btn-primary" ng-show="$last" ng-click="removeRecipient($index);"><i class="glyphicon glyphicon-minus"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- <a href="javascript:void(0);" title="remove" class="btn btn-primary" ng-show="$last" ng-click="removeRecipient($index);"><i class="glyphicon glyphicon-minus"></i></a> -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="link" class="col-sm-3 control-label">Link</label>
                            <div class="col-sm-6">
                                <input type="url" readonly class="form-control" id="survey_link" name="survey_link" value="<?php echo set_value('survey_link', base_url("organization/$permalink")); ?>">
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" class="btn btn-danger btn-submit" value="Send" name="send_link">
                            </div>
                        </div>
                    </form>          
                </section>
            </div>
        </div>
    </div>
</div>
