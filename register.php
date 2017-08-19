
<?php
    // Si le formulaire a été soumis
    if(isset($_POST['register'])) {

        // Si tous les champs ont été remplis
        if(!empty($_POST['name']) && !empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_confirm'])) {

            $errors = [];

            extract($_POST);

            if(mb_strlen($pseudo) < 3) {
                $errors[] = "Pseudo trop court ! (Minimum 3 caractères)";
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Adresse email invalide !";
            }

            if(mb_strlen($password) < 6) {
                $errors[] = "Mot de passe trop court ! (Minimum 6 caractères)";
            } else {
                if($password != $password_confirm) {
                    $errors[] = "Les deux mots de passe ne concordent pas";
                }
            }

            if(is_already_in_use('pseudo', $pseudo, 'users')) {
                $errors[] = "Pseudo déjà utilisé !";
            }

            if(is_already_in_use('email', $email, 'users')) {
                $errors[] = "Adresse email déjà utilisée !";
            }

            if(count($errors) == 0) {
                // Envoi mail d'activation

                // Informer utilisateur pour verifier mail

            }

        } else {
            $errors[] = "Veuillez SVP remplir tous les champs";
        }
    }

?>

<?php

    require('views/register.view.php');