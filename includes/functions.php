<?php

// sanitizer 
if(!function_exists('e')) {
    function e($string) {
        if($string) {
            return htmlspecialchars($string);
        }
    }
}

// recupere valeur session suivant la clef
if(!function_exists('get_session')) {
    function get_session($key) {
        if($key) {
            return !empty($_SESSION[$key])
            ? e($_SESSION[$key])
            : null;
        }        
    }
}


// verifie si l'utilisateur est connecté
if(!function_exists('is_logged_in')) {
    function is_logged_in() {
        return isset($_SESSION['user_id']) || isset($_SESSION['pseudo']);
    }
}


// avatar url
if(!function_exists('get_avatar_url')) {
    function get_avatar_url($email) {
        return "http://gravatar.com/avatar/".md5(strtolower(trim(e($email))));
    }
}


// trouver l'utilisateur par son id
if(!function_exists('find_user_by_id')) {
    function find_user_by_id($id) {
        global $db;

        $q = $db->prepare('SELECT name, pseudo, email, city, country, twitter, github, sex, available_for_hiring, bio FROM users WHERE id = ?');
        $q->execute([$id]);

        $data = $q->fetch(PDO::FETCH_OBJ);

        $q->closeCursor();

        return $data;
    }
}


// verifier que le champs n'est pas vide
if(!function_exists('not_empty')) {
    function not_empty($fields = []) {
            if(count($fields) != 0) {
                foreach($fields as $field) {
                    if(empty($_POST[$field]) || trim($_POST[$field]) == "") {
                        return false;
                    }
                }
                    return true;
            }
    }
}


// si existe déjà
if(!function_exists('is_already_in_use')) {
    function is_already_in_use($field, $value, $table) {
        global $db;

        $q = $db->prepare("SELECT id FROM $table WHERE $field = ?");
        $q->execute([$value]);

        $count = $q->rowcount();

        $q->closeCursor();

        return $count;
    }
}


// function pour faire fonctionner phpmailer
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


// affichage message  erreur ou reussite
if(!function_exists('set_flash')) {
    function set_flash($message, $type = 'info') {
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
}


// redirection 
if(!function_exists('redirect')) {
    function redirect($page) {
        header('Location: ' . $page);
        exit();
    }
}


// sauvegarder les informations après validation à réafficher en cas d'erreur
if(!function_exists('save_input_data')) {
    function save_input_data() {
        foreach($_POST as $key => $value) {
            if(strpos($key, 'password') === false)
            $_SESSION['input'][$key] = $value;
        }
    }
}


// afficher les infos 
if(!function_exists('get_input')) {
    function get_input($key) {
        return !empty($_SESSION['input'][$key])
            ? e($_SESSION['input'][$key])
            : null;
    }
}

// effacer les sessions de input
if(!function_exists('clear_input_data')) {
    function clear_input_data() {
        if(isset($_SESSION['input'])) {
            $_SESSION['input'] = [];
        }
    }
}


// Gère l'état actif des différent liens
if(!function_exists('set_active')) {
    function set_active($file) {
        $path = explode('/', $_SERVER['SCRIPT_NAME']);
        $page = array_pop($path);

        if($page == $file.'.php') {
            return "active";
        } else {
            return "";
        }
    }
}