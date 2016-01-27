<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SMGHealth :: Registration</title>
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
                            <h2 class="text-center">Register</h2>
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
                            <form role="form" action="register" method="POST" class="form-signin">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-home"></i> </span>
                                                    <input class="form-control" name="user_organisation" type="text" value="<?php echo $user_organisation; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo (form_error('display_name')) ? 'has-error' : ''; ?>">
                                                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                                                    <input class="form-control" placeholder="Full Name" name="display_name" type="text" autofocus value="<?php echo set_value('display_name'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo (form_error('user_email')) ? 'has-error' : ''; ?>">
                                                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-envelope"></i> </span>
                                                    <input class="form-control" placeholder="Email Address" name="user_email" type="text" autofocus value="<?php echo set_value('user_email'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo (form_error('password')) ? 'has-error' : ''; ?>">
                                                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo (form_error('confirm_password')) ? 'has-error' : ''; ?>">
                                                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-lock"></i> </span>
                                                    <input class="form-control" placeholder="Confirm Password" name="confirm_password" type="password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-phone"></i> </span>
                                                    <input class="form-control" placeholder="Contact Number" name="user_contact" type="text" autofocus value="<?php echo set_value('user_contact'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-home"></i> </span>
                                                    <textarea name="user_address" id="user_address" class="form-control" autofocus placeholder="Address"><?php echo set_value('user_address'); ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo (form_error('user_depertment')) ? 'has-error' : ''; ?>">
                                                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-users"></i> </span>
                                                    <select name="user_depertment" class="form-control" id="user_depertment">
                                                            <option value="">Teams or departments</option>
                                                            <?php foreach($user_depertment as $userdepertment){ ?>
                                                                    <option value="<?php echo $userdepertment;?>" <?php if(set_value('user_depertment') == $userdepertment){ ?> selected <?php } ?>><?php echo $userdepertment;?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo (form_error('user_location')) ? 'has-error' : ''; ?>">
                                                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-location-arrow"></i> </span>
                                                    <select name="user_location" class="form-control" id="user_location">
                                                        <option value="">Location</option>
                                                        <?php foreach($user_location as $userlocation){ ?>
                                                                <option value="<?php echo $userlocation;?>" <?php if(set_value('user_location') == $userlocation){ ?> selected <?php } ?>><?php echo $userlocation;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo (form_error('user_level')) ? 'has-error' : ''; ?>">
                                                <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-cubes"></i> </span>
                                                    <select name="user_level" class="form-control" id="user_level">
                                                        <option value="">Level</option>
                                                        <?php foreach($user_level as $userlevel){ ?>
                                                        <option value="<?php echo $userlevel;?>" <?php if(set_value('user_level') == $userlevel){ ?> selected <?php } ?>><?php echo $userlevel;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo (form_error('user_gender')) ? 'has-error' : ''; ?>">
                                                <div class="input-group"> 
                                                    <span class="input-group-addon"> <i class="fa fa-user"></i> </span>
                                                    <select name="user_gender" class="form-control" id="user_gender">
                                                        <option value="">Gender</option>
                                                        <option value="M" <?php if(set_value('user_gender') == "M"){ ?> selected <?php } ?>>Male</option>
                                                        <option value="F" <?php if(set_value('user_gender') == "F"){ ?> selected <?php } ?>>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group <?php echo (form_error('user_age')) ? 'has-error' : ''; ?>">
                                                <div class="input-group"> 
                                                    <span class="input-group-addon"> <i class="fa fa-life-ring"></i> </span>
                                                    <select name="user_age" class="form-control" id="user_age">
                                                        <option value="">Age</option>
                                                        <option value="&lt; 20" <?php if(set_value('user_age') == "&lt; 20"){ ?> selected <?php } ?>>&lt; 20</option>
                                                        <option value="21-30" <?php if(set_value('user_age') == "21-30"){ ?> selected <?php } ?>>21-30</option>
                                                        <option value="31-40" <?php if(set_value('user_age') == "31-40"){ ?> selected <?php } ?>>31-40</option>
                                                        <option value="41-50" <?php if(set_value('user_age') == "41-50"){ ?> selected <?php } ?>>41-50</option>
                                                        <option value="51-60" <?php if(set_value('user_age') == "51-60"){ ?> selected <?php } ?>>51-60</option>
                                                        <option value="&gt; 60" <?php if(set_value('user_age') == "&gt; 60"){ ?> selected <?php } ?>>&gt; 60</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-block regist_buton" value="Register">Register <i class="fa fa-user-plus"></i></button>
                                            </div>
                                        </div>
                                        <div style="clear:both;"></div>
                                        <p class="text-center for_pass"><a href="<?=site_url()?>login">login?</a></p>
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
    <script src="<?php echo SITE_ASSETS_URI; ?>/js/bootstrap.min.js"></script>
    </body>
</html>