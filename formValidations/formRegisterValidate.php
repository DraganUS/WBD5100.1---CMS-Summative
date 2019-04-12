<?php

$formError['firstName']['isValid'] = true;
$formError['lastName']['isValid'] = true;
$formError['ageError']['isValid'] = true;
$formError['sexError']['isValid'] = true;
$formError['phoneError']['isValid'] = true;
$formError['email']['isValid'] = true;
if (!empty($_POST)) {

    if (isset($_POST)) {


//        first NAME VALIDATION
        if (array_key_exists('firstName', $_POST)) {
            $firstName = $_POST['firstName'];
            $firstName = filter_var($firstName, FILTER_SANITIZE_ENCODED);

            if (empty($firstName)) {
                $firstNameError = 'Name cannot be empty';
                $formError['firstName']['errors'][] = $firstNameError;
                $formError['firstName']['isValid'] = false;
            }
            if (strlen($firstName) < 3) {
                $firstNameError = 'name mus tbe longer than 3 characters';
                $formError['firstName']['errors'][] = $firstNameError;
                $formError['firstName']['isValid'] = false;
            }
        } else {
            $firstNameError = 'Product name must be provided';
            $formError['firstName']['errors'][] = $firstNameError;
            $formError['firstName']['isValid'] = false;
        }

//        last name VALIDATION
        if (array_key_exists('lastName', $_POST)) {
            $lastName = $_POST['lastName'];
            $lastName = filter_var($lastName, FILTER_SANITIZE_ENCODED);

            if (empty($lastName)) {
                $lastNameError = 'Name cannot be empty';
                $formError['lastName']['errors'][] = $firstNameError;
                $formError['lastName']['isValid'] = false;
            }
            if (strlen($firstName) < 3) {
                $lastNameError = 'name mus tbe longer than 3 characters';
                $formError['lastName']['errors'][] = $lastNameError;
                $formError['lastName']['isValid'] = false;
            }
        }else {
            $formError['lastName']['isValid'] = false;
        }

//        email VALIDATION
        if (array_key_exists('email',$_POST)){
            $email = $_POST['email'];
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            if (empty($email)){
                $emailError = 'Email must be provided';
                $formError['email']['errors'][]=$emailError;
                $formError['email']['isValid'] = false;
            }
            if (!$email){
                $emailError = 'Insert valid email';
                $formError['email']['errors'][]=$emailError;
                $formError['email']['isValid'] = false;
            }
        }else {
            $formError['email']['isValid'] = false;
        }

//        age VALIDATION
        if (array_key_exists('age', $_POST)){
            $age = $_POST['age'];
            $age = filter_var($age, FILTER_SANITIZE_ENCODED);

            if (empty($age)) {
                $ageError = 'Age cannot be empty';
                $formError['ageError']['errors'][] = $ageError;
                $formError['ageError']['isValid'] = false;
            }
        }else {
            $formError['ageError']['isValid'] = false;
        }

//        sex VALIDATION
        if (array_key_exists('sex', $_POST)){
            $sex = $_POST['sex'];
            $sex = filter_var($sex, FILTER_SANITIZE_ENCODED);
            if (!($sex ==='male' || $sex ==='female')){
                $formError['sexError']['isValid'] = false;
            }else {
                $formError['sexError']['isValid'] = true;
            }
        }

//        phone VALIDATION
        if (array_key_exists('phone', $_POST)){
            $phone = $_POST['phone'];
            $phone = filter_var($phone, FILTER_SANITIZE_ENCODED);
        }else {
            $formError['phoneError']['isValid'] = false;
        }

//        pass VALIDATION
        if (array_key_exists('password', $_POST)){
            $password = $_POST['password'];
            if (empty($password)) {
                $passwordError = 'password error';
                $formError['passwordError']['errors'][] = $passwordError;
                $formError['passwordError']['isValid'] = false;
            }
            $password = filter_var($password, FILTER_SANITIZE_ENCODED);

            $options = [
                'cost' => 6,
            ];
            $password = password_hash($password, PASSWORD_BCRYPT, $options);
        } else {
            $formError['passwordError']['isValid'] = false;
        }
    }
    if (
        $formError['firstName']['isValid'] &&
        $formError['lastName']['isValid'] &&
        $formError['ageError']['isValid'] &&
        $formError['sexError']['isValid']&&
        $formError['phoneError']['isValid']&&
        $formError['email']['isValid']
    ) {
        try {
            insert($database, $firstName, $lastName, $email, $age,  $sex, $phone, $password );
            header('Location: /');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}