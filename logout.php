<?php

session_start();

require "config/database.php";

// supprimer l'entré en bdd
$q = $db->prepare('DELETE FROM auth_tokens WHERE user_id = ?');
$q->execute([$_SESSION['user_id']]);

// supprimer les cookies et la session
setcookie('auth', '', time()-3600);
session_destroy();
$_SESSION = [];


header('Location: login.php');

?>