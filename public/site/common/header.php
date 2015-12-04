<!DOCTYPE html>
<html lang="en" ng-app="smg-app">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>
<link href="<?php echo SITE_ASSETS_URI; ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo SITE_ASSETS_URI; ?>/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo SITE_ASSETS_URI; ?>/css/style.css" rel="stylesheet">
<link href="<?php echo SITE_ASSETS_URI; ?>/css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
    var BASE_URL = '<?php echo base_url(); ?>';
    var DOING_AJAX = '<?php echo DOING_AJAX; ?>';
</script>
</head>
<body>
<!--Header_start-->
<header class="header_bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <a href="<?php echo base_url(); ?>" class="dase_logo">
                    <img src="<?php echo SITE_ASSETS_URI; ?>/images/dase_logo.png" alt="" title=""/>
                </a>
            </div>
            <div class="col-md-3" >
                <big class="wel_admin"> Welcome, <?php echo $display_name; ?></big>
                <!--<input type="submit" value="Log Out" class="btn log_out_button">-->
                <?php echo anchor('dashboard/logout', 'Logout', array('class' => 'btn log_out_button', 'title' => 'Logout'));?>
            </div>
        </div>
    </div>
</header>