<?php

session_start();

require("bootstrap/locale.php");
include('filters/auth_filter.php');
require("config/database.php");
require("includes/functions.php");
require('includes/constants.php');


if(!empty($_GET['id'])) {
    // recupérer les infos en base de données avec l'id
    $user = find_user_by_id($_GET['id']);

    if(!$user) {
        redirect('index.php');
    }

} else {
    redirect('profile.php?id='.get_session('user_id'));
}


require("views/profile.view.php");