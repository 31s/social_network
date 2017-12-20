<?php

session_start();

require "config/database.php";

// supprimer l'entré en bdd
$q = $db->prepare('DELETE FROM auth_tokens WHERE user_id = ?');
$q->execute([$_SESSION['user_id']]);

// reinitialisation de la session
$session_keys_white_list = ['locale'];
$new_session = array_intersect_key($_SESSION, array_flip($session_keys_white_list));
$_SESSION = $new_session;

// supprimer les cookies et la session
setcookie('auth', '', time()-3600);

header('Location: login.php');

?>