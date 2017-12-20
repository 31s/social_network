<?php

session_start();

require("includes/init.php");
require_once('config/PHPMailer-master/PHPMailerAutoload.php');


if (isset($_POST['publish'])) {
    if (!empty($_POST['content'])) {
        extract($_POST);

        $q = $db->prepare('INSERT INTO microposts(content, user_id, created_at) VALUES(:content, :user_id, NOW())');

        $q->execute([
            'content' => $content,
            'user_id' => get_session('user_id')
        ]);

        set_flash('Votre statut a été mis à jour !');
    } else {
        set_flash("Aucun contenu n'a été fourni !");
    }
}

redirect('profile.php?id='.get_session('user_id'));
