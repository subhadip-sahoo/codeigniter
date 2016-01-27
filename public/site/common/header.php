<!DOCTYPE html>
<html lang="en" ng-app="smg-app">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>
<link rel="shortcut icon" href="<?php echo SITE_ASSETS_URI; ?>/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo SITE_ASSETS_URI; ?>/images/favicon.ico" type="image/x-icon">
<link href="<?php echo SITE_ASSETS_URI; ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo SITE_ASSETS_URI; ?>/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo SITE_ASSETS_URI; ?>/css/hover-min.css" rel="stylesheet">
<link href="<?php echo SITE_ASSETS_URI; ?>/css/animate.css" rel="stylesheet">
<link href="<?php echo SITE_ASSETS_URI; ?>/css/jquery-ui.css" rel="stylesheet">
<link href="<?php echo SITE_ASSETS_URI; ?>/css/style.css" rel="stylesheet">
<link href="<?php echo SITE_ASSETS_URI; ?>/css/responsive.css" rel="stylesheet">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
    var BASE_URL = '<?php echo base_url(); ?>';
    var DOING_AJAX = '<?php echo DOING_AJAX; ?>';
    var EMPLOYEE_SIDEBAR_PAR_PAGE_ITEM = <?php echo EMPLOYEE_SIDEBAR_PAR_PAGE_ITEM; ?>;
</script>
</head>
<body>
<!--Header_start-->
<header class="header_bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4"> <a href="<?php echo base_url(); ?>" class="dase_logo"> <img src="<?php echo SITE_ASSETS_URI; ?>/images/dase_logo.png" alt="" title=""/> </a> </div>
            <div class="col-md-8 col-sm-8" > 
                <div class="headerright text-right">
                    <big class="wel_admin"><i class="fa fa-user"></i> Welcome, <a href="<?php echo base_url('dashboard'); ?>" class="userlink"><?php echo $display_name; ?></a></big> 
                    <?php if($this->session->userdata('user_type') == 3): ?>
                    <?php echo anchor('dashboard/settings', 'Settings', array('class' => 'btn log_out_button btn-setting', 'title' => 'Settings'));?> 
                    <?php elseif($this->session->userdata('user_type') == 1): ?>
                    <?php echo anchor('settings', 'Settings', array('class' => 'btn log_out_button btn-setting', 'title' => 'Settings'));?> 
                    <?php elseif($this->session->userdata('user_type') == 2): ?>
                    <?php echo anchor("organization/$permalink/settings", 'Settings', array('class' => 'btn log_out_button btn-setting', 'title' => 'Settings'));?> 
                    <?php endif; ?>
                    <?php echo anchor('dashboard/logout', 'Logout', array('class' => 'btn log_out_button btn-logout', 'title' => 'Logout'));?>
                </div> 
            </div>
        </div>
    </div>
</header>