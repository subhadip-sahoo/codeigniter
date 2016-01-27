<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SMGHealth :: Forgot Password</title>
    <link rel="shortcut icon" href="<?php echo SITE_ASSETS_URI; ?>/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo SITE_ASSETS_URI; ?>/images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap -->
    <link href="<?php echo SITE_ASSETS_URI; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SITE_ASSETS_URI; ?>/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo SITE_ASSETS_URI; ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo SITE_ASSETS_URI; ?>/css/responsive.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>
    <div class="login_page">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="panel login_panel">
                        <div class="panel-body">
                            <div class="login_page_logo">
                                <a href="<?php echo SITE_BASE_URL; ?>"><img src="<?php echo SITE_ASSETS_URI; ?>/images/logo.png" alt="" title="" class="img-responsive"></a>
                            </div>
                            <div class="login_lock text-center"><i class="fa fa-lock fa-3x text-center"></i></div>
                            <h2 class="text-center">Forgot Password</h2>
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
                            <?php echo (isset($authentication_failed)) ? message_alert($authentication_failed, 4) : ''; ?>
                            <?php echo validation_errors(); ?>
                            <form role="form" action="login/forgot_password" method="POST" class="form-signin" name="fwd" ng-app="fwdapp">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group"> 
                                                    <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                                                    <input required ng-model="email_address" class="form-control" placeholder="Email Address" name="email_address" type="email" autofocus value="<?php echo set_value('email_adderss'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span style="color:red;" ng-show="fwd.email_address.$invalid && fwd.email_address.$dirty">
                                                    <span ng-show="fwd.email_address.$error.required">This field is required!</span>
                                                    <span ng-show="fwd.email_address.$error.email">Please provide a valid email address!</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-block login_buton" value="Submit" ng-disabled="fwd.email_address.$invalid && fwd.email_address.$dirty" name="forgot_pwd">Submit <i class="fa fa-unlock-alt"></i></button>
                                            </div>
                                        </div>
                                        <div style="clear:both;"></div>
                                        <p class="text-center for_pass"><a href="<?php echo base_url();?>">login?</a></p>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">&copy; SMG Health 2015. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
    <script src="<?php echo SITE_ASSETS_URI; ?>/js/angular.min.js"></script>
    <script type="text/javascript">
        var fgpwd = angular.module('fwdapp', []);
    </script>
    <script src="<?php echo SITE_ASSETS_URI; ?>/js/bootstrap.min.js"></script>
    </body>
</html>

