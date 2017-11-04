<?php

session_start();

include('filters/auth_filter.php');
require("bootstrap/locale.php");
require_once('config/PHPMailer-master/PHPMailerAutoload.php');
require('config/database.php');
require('includes/functions.php');
require('includes/constants.php');


if(!empty($_GET['id'])) {
    $data = find_code_by_id($_GET['id']);

    if(!$data) {
        redirect('share_code.php');
    }

} else {
    redirect('share_code.php');
}



?>

<?php require('views/show_code.view.php'); ?>