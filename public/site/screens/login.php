<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SMGHealth</title>

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
                            <h2 class="text-center">Login</h2>
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
                            <form role="form" action="login" method="POST" class="form-signin">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group <?php echo (form_error('email_adderss')) ? 'has-error' : ''; ?>">
                                                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                                                    <input class="form-control" placeholder="Email Address" name="email_address" type="text" autofocus value="<?php echo set_value('email_adderss'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo (form_error('password')) ? 'has-error' : ''; ?>">
                                                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-lg btn-block login_buton" value="Login">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-lg btn-block regist_buton" value="Register">
                                            </div>
                                        </div>
                                        <p class="text-center for_pass"><a href="#">Forgot Password?</a></p>
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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="<?php echo SITE_ASSETS_URI; ?>/js/bootstrap.min.js"></script>
    </body>
</html>