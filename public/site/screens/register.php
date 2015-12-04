<?php 
    echo validation_errors();
    if(isset($suc_msg)){
        echo '<p>'.$suc_msg.'</p>';
    }
    echo '<h2>Registration Form</h2>';
    echo form_open('register');
    echo '<p>';
    echo form_label('Name');
    echo form_input('display_name');
    echo '</p>';
    echo '<p>';
    echo form_label('Email Address');
    echo form_input('user_email');
    echo '</p>';
    echo '<p>';
    echo form_radio('user_type', 3, TRUE);
    echo 'I am a Site User';
    echo form_radio('user_type', 2);
    echo 'I am associated with a company';
    echo '</p>';
    echo '<p>';
    echo form_label('Password');
    echo form_password('password');
    echo '</p>';
    echo '<p>';
    echo form_label('Confirm Password');
    echo form_password('confirm_password');
    echo '</p>';
    
    echo '<p>';
    echo form_submit('register', 'Register');
    echo '</p>';
    echo form_close();