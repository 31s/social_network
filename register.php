
<?php

session_start();

include('filters/guest_filter.php');
require("bootstrap/locale.php");
require_once('config/PHPMailer-master/PHPMailerAutoload.php');
require('config/database.php');
require('includes/functions.php');
require('includes/constants.php');


    // Si le formulaire a été soumis
    if(isset($_POST['register'])) {

        // Si tous les champs ont été remplis
        if(not_empty(['name', 'pseudo', 'email', 'password', 'password_confirm'])) {

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
                
                $subject = WEBSITE_NAME." - ACTIVATION DE COMPTE";
                $password = password_hash($password, PASSWORD_BCRYPT);
                $token = sha1($pseudo.$email.$password);

                ob_start();
                require('templates/emails/activation.tmpl.php');
                $content = ob_get_clean();

                //$to = $email;
                //$headers = 'MIME-Version: 1.0' . "\r\n";
                //$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                //mail($to, $subject, $content, $headers);
                
                smtpmailer($email, 'from@mail.com', 'Social Network', $subject, $content);

                // Informer utilisateur pour verifier mail
                set_flash("Mail d'activation envoyé !", 'success');

                $q = $db->prepare('INSERT INTO users(name, pseudo, email, password)
                                    VALUES(:name, :pseudo, :email, :password)');
                $q->execute([
                    'name' => $name,
                    'pseudo' => $pseudo,
                    'email' => $email,
                    'password' => $password
                ]);

                redirect('index.php');

            } else {
                save_input_data();
            }

        } else {
            $errors[] = "Veuillez SVP remplir tous les champs";
            save_input_data();
        }
    } else {
        clear_input_data();
    }

?>

<?php

    require('views/register.view.php');