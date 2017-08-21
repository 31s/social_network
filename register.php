
<?php

require_once('config/PHPMailer-master/PHPMailerAutoload.php');
require('config/database.php');
require('includes/function.php');
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
                $to = $email;
                $subject = WEBSITE_NAME." - ACTIVATION DE COMPTE";
                $token = sha1($pseudo.$email.$password);

                ob_start();
                require('templates/emails/activation.tmpl.php');
                $content = ob_get_clean();

                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                //mail($to, $subject, $content, $headers);

                // Informer utilisateur pour verifier mail
                echo "Mail d'activation envoyé !";

                function smtpmailer($to, $from, $from_name, $subject, $body) { 
                    global $error;
                    $mail = new PHPMailer();  // create a new object
                    $mail->IsSMTP(); // enable SMTP
                    $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
                    $mail->SMTPAuth = true;  // authentication enabled
                    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 465; 
                    $mail->Username = '31s.duranteau@gmail.com';  
                    $mail->Password = 'idcommunication';           
                    $mail->SetFrom($from, $from_name);
                    $mail->Subject = $subject;
                    $mail->Body = $body;
                    $mail->IsHTML(true); 
                    $mail->AddAddress($to);
                    if(!$mail->Send()) {
                        $error = 'Mail error: '.$mail->ErrorInfo; 
                        return false;
                    } else {
                        $error = 'Message sent!';
                        return true;
                    }
                }

                 	
                smtpmailer($email, 'from@mail.com', 'Social Network', $subject, $content);

            }

        } else {
            $errors[] = "Veuillez SVP remplir tous les champs";
        }
    }

?>

<?php

    require('views/register.view.php');