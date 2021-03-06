
<?php

session_start();

require("includes/init.php");
include('filters/guest_filter.php');
require_once('config/PHPMailer-master/PHPMailerAutoload.php');


    // Si le formulaire a été soumis
    if(isset($_POST['login'])) {

        // Si tous les champs ont été remplis
        if(not_empty(['identifiant', 'password'])) {

            extract($_POST);

            $q = $db->prepare("SELECT id, pseudo, avatar, password AS hashed_password, email FROM users WHERE (pseudo = :identifiant OR email = :identifiant) AND active = '1' ");

            $q->execute([
                'identifiant' => $identifiant
            ]);

            $user = $q->fetch(PDO::FETCH_OBJ);

            if($user && password_verify($password, $user->hashed_password)) {

                $_SESSION['user_id'] = $user->id;
                $_SESSION['pseudo'] = $user->pseudo;
                $_SESSION['avatar'] = $user->avatar;
                $_SESSION['email'] = $user->email;

                //si l'utilisateur veut garder la session active
                if(isset($_POST['remember_me']) && $_POST['remember_me'] == 'on') {
                    remember_me($user->id);
                }

                redirect_intent_or('profile.php?id='. $user->id);
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