<?php

try {
    $users = findAllUsers($database);
} catch (Exception $exception) {
    $users = [];
}

$formError['email']['isValid'] = true;
$formError['pass']['isValid'] = true;

if (!empty($_POST)) {

    if (isset($_POST)) {

        if (array_key_exists('email', $_POST)) {
            $email = $_POST['email'];
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);

            if (empty($email)) {
                $emailError = 'Product email cannot be empty';
                $formError['email']['errors'][] = $emailError;
                $formError['email']['isValid'] = false;
            }
            if (strlen($email) < 3) {
                $emailError = 'Product email mus tbe longer than 3 characters';
                $formError['email']['errors'][] = $emailError;
                $formError['email']['isValid'] = false;
            }

            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            if ($email){
                $userEmail = false;
                $userIdEmail = false;
                foreach ($users as $data){
                    if ($data['email'] == $email){
                        $userEmail = true;
                        $userIdEmail = $data['ID'];
                    }
                }
            }
        }

        else {
            $emailError = 'Product email must be provided';
            $formError['email']['errors'][] = $emailError;
            $formError['email']['isValid'] = false;
        }

        if (array_key_exists('pass', $_POST)) {
            $pass = $_POST['pass'];
            $userPass =false;
            $userIdPass =false;

            if (empty($pass)) {
                $passError = "Password canont be empty";
                $formError['pass']['errors'][]=$passError;
                $formError['pass']['isValid'] = false;
            }

            if ( $formError['pass']['isValid']){
                foreach ($users as $data){
                    $hash = $data['pass'];
                    $allowLogin = password_verify($pass, $hash);
                    if ($allowLogin){
                        $userPass = true;
                        $userIdPass = $data['ID'];
                    }
                }
            }
        }

        if ($userPass && $userEmail && ($userIdPass === $userIdEmail)){
            echo 'pronadjeno';
            $cookie_name = "user";
            $cookie_value = $userIdPass;
            session_start();
            $_SESSION['userID'] = $userIdPass;
            header('Location: welcome.php');

        } else {
            $passError = "Enter valid password and ussername";
            $formError['pass']['errors'][]=$passError;
            $formError['pass']['isValid'] = false;
            $emailError = 'Enter valid password and ussername';
            $formError['email']['errors'][] = $emailError;
            $formError['email']['isValid'] = false;
        }
    }
}

