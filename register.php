<?php

require 'dbConect.php';
require 'functions.php';
require 'formValidations/formRegisterValidate.php';
?>

<!doctype html>
<lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

<div class="registerContainer">
    <form id="contact" action="" method="post">
      <h3>Register</h3>

      <!-- First name -->

      <fieldset>
        <input placeholder="First name" id="firstName" name="firstName" type="text" tabindex="1" required autofocus step="1">
        <p id="firstNameRequied"></p>
      </fieldset>

      <!-- Last name -->

      <fieldset>
        <input placeholder="last name" id="lastName" name="lastName" type="text" tabindex="1" autofocus>
        <p id="lastNameRequied"></p>
      </fieldset>

      <!-- Age -->

      <fieldset>
        <label for="age">Age:</label>
        <input placeholder="0" id="age" name="age" type="number" min="18" step="1" required>
        <p id="ageCheck"></p>
      </fieldset>

      <!-- Sex: -->
      <fieldset>
        <label for="sex">sex</label>
        <select id="sex" name="sex">
          <option required value="male">Male</option>
          <option required value="female">Female</option>
        </select>
      </fieldset>

      <!-- Phone: -->

      <fieldset>
        <input placeholder="Your Phone Number" id="phone" name="phone" type="tel" tabindex="3">
        <p id="phoneCheck"></p>
      </fieldset>

      <!-- Email: -->

      <fieldset>
        <input placeholder="Email Address" id="email" name="email" type="email" tabindex="2" required>
        <p id="emailCheck"></p>
      </fieldset>

        <!-- pass-->

        <fieldset>
            <input placeholder="enter password" id="userPasword" type="password" name="password" tabindex="2" required>
            <input placeholder="confirm password" id="userConfirmPasword" type="password" tabindex="2" required>
            <p id="passwordCheck"></p>
        </fieldset>

      <!-- Submit -->

      <fieldset>
        <button type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
      </fieldset>

    </form>
  </div>
</div>

<footer>

</footer>

<script src="script.js" charset="utf-8"></script>
</body>
</html>
