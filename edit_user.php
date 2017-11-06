<?php

session_start();

require("bootstrap/locale.php");
include('filters/auth_filter.php');
require("config/database.php");
require("includes/functions.php");
require('includes/constants.php');


if( !empty($_GET['id']) && $_GET['id'] === get_session('user_id') ) {
    // recupérer les infos en base de données avec l'id
    $user = find_user_by_id($_GET['id']);

    if(!$user) {
        redirect('index.php');
    }

} else {
    redirect('profile.php?id='.get_session('user_id'));
}


// Si le formulaire a été soumis
if (isset($_POST['update'])) {
                $errors = [];
            
                    // Si tous les champs ont été remplis
    if (not_empty(['name', 'city', 'country', 'sex', 'bio'])) {
        extract($_POST);
            
        $q = $db->prepare("UPDATE users 
                            SET name = :name, city = :city, country = :country, sex = :sex, twitter = :twitter, github = :github, available_for_hiring = :available_for_hiring, bio = :bio WHERE id = :id ");
            
        $q->execute([
        'name' => $name,
        'city' => $city,
        'country' => $country,
        'sex' => $sex,
        'twitter' => $twitter,
        'github' => $github,
        'available_for_hiring' => !empty($available_for_hiring) ? '1' : '0',
        'bio' => $bio,
        'id' => get_session('user_id')
        ]);
            
        set_flash("Felicitations, votre profil a été mis à jour !");
        redirect('profile.php?id='.get_session('user_id'));
    } else {
        save_input_data();
        $errors[] = "Veuillez remplir tous les champs marqués d'un (*)";
    }
} else {
    clear_input_data();
}


require("views/edit_user.view.php");
