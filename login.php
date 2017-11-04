
<?php

session_start();

require("bootstrap/locale.php");
include('filters/guest_filter.php');
require_once('config/PHPMailer-master/PHPMailerAutoload.php');
require('config/database.php');
require('includes/functions.php');
require('includes/constants.php');


    // Si le formulaire a été soumis
    if(isset($_POST['login'])) {

        // Si tous les champs ont été remplis
        if(not_empty(['identifiant', 'password'])) {

            extract($_POST);

            $q = $db->prepare("SELECT id, pseudo, email FROM users WHERE pseudo = :identifiant OR email = :identifiant AND password = :password AND active = '1' ");

            $q->execute([
                'identifiant' => $identifiant,
                'password' => sha1($password)
            ]);

            $userHasBennFound = $q->rowCount();

            if($userHasBennFound) {

                $user = $q->fetch(PDO::FETCH_OBJ);

                $_SESSION['user_id'] = $user->id;
                $_SESSION['pseudo'] = $user->pseudo;
                $_SESSION['email'] = $user->email;

                redirect('profile.php?id='.$user->id);
            } else {
                set_flash('Combinaison Identifiant/Password incorrecte', 'danger');
                save_input_data();
            }

        }
        
    } else {
        clear_input_data();
    }

?>

<?php

    require('views/login.view.php');