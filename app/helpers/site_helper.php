<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function message_alert($msg, $msg_code){
    $message = '';
    switch($msg_code):
        case 1: // info
            $message .= '<div role="alert" class="alert alert-info alert-dismissibl">';
            $message .= '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>';
            $message .= $msg;
            $message .= '</div>';
            break;
        case 2: // success
            $message .= '<div role="alert" class="alert alert-success alert-dismissibl">';
            $message .= '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>';
            $message .= $msg;
            $message .= '</div>';
            break;
        case 3: // warning
            $message .= '<div role="alert" class="alert alert-warning alert-dismissibl">';
            $message .= '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>';
            $message .= $msg;
            $message .= '</div>';
            break;
        case 4: // error
            $message .= '<div role="alert" class="alert alert-danger alert-dismissibl">';
            $message .= '<button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">X</span></button>';
            $message .= $msg;
            $message .= '</div>';
            break;
    endswitch;
    return $message;
}

function DBUG($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}