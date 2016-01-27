<div class="col-md-3 col-sm-3 dasboard_menu"> 
    <ul class="nav dasboard_nav">
        <li <?php echo (get_admin_permalink() && get_admin_permalink() == 'dashboard') ? 'class="active"' : '';?>><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-users"></i><span>Manage Organization</span></a></li>
        <li <?php echo (get_admin_permalink() && get_admin_permalink() == 'manage-questionnaire') ? 'class="active"' : '';?>><a href="<?php echo base_url('manage-questionnaire'); ?>"><i class="fa fa-clipboard"></i><span>Manage Questionnaire</span></a></li>
        <li <?php echo (get_admin_permalink() && get_admin_permalink() == 'manage-report') ? 'class="active"' : '';?>><a href="<?php echo base_url('manage-report'); ?>"><i class="fa fa-pencil-square-o"></i><span>Manage Reports</span></a></li>
        <li <?php echo (get_admin_permalink() && get_admin_permalink() == 'manage-users') ? 'class="active"' : '';?>><a href="<?php echo base_url('manage-users'); ?>"><i class="fa fa-user"></i><span>Manage Users</span></a></li>
        <li <?php echo (get_admin_permalink() && get_admin_permalink() == 'manage-content') ? 'class="active"' : '';?>><a href="<?php echo base_url('manage-content'); ?>"><i class="fa fa-file-text"></i><span>Manage Content</span></a></li>
        <!--<li <?php echo (get_admin_permalink() && get_admin_permalink() == 'manage-product') ? 'class="active"' : '';?>><a href="<?php echo base_url('manage-product'); ?>"><i class="fa fa-key"></i><span>Manage Product</span></a></li>-->
        <li <?php echo (get_admin_permalink() && get_admin_permalink() == 'manage-feedback') ? 'class="active"' : '';?>><a href="<?php echo base_url('manage-feedback'); ?>"><i class="fa fa-comment"></i><span>Manage Feedback</span></a></li>
        <li <?php echo (get_admin_permalink() && get_admin_permalink() == 'manage-pdf') ? 'class="active"' : '';?>><a href="<?php echo base_url('manage-pdf'); ?>"><i class="fa fa-file-pdf-o"></i><span>Manage PDF</span></a></li>
        <li <?php echo (get_admin_permalink() && get_admin_permalink() == 'manage-video') ? 'class="active"' : '';?>><a href="<?php echo base_url('manage-video'); ?>"><i class="fa fa-video-camera"></i><span>Manage Video</span></a></li>
    </ul>
</div>