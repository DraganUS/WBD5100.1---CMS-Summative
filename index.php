<?php

require 'dbConect.php';
require 'functions.php';
require 'formValidations/logInValidate.php';

try {
    $news = findAllNews($database);
} catch (Exception $exception) {
    $news = [];
}
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

  <header class="header">
    <div class="container">
      <nav>
          <ul>
            <li>
              <a href="register.php" target="_blank">Register</a>
            </li>
            <li >
              <a onclick="openLogIn()" class="nav-link active" href="#">Log In</a>
            </li>
          </ul>
      </nav>
    </div>
  </header>

<div id="modal" ">
  <form class="" action="" method="post">
    <i onclick="closeLogIn()" class="fas fa-times"></i>
    <ul>
      <li class="<?=($formError['email']['isValid']) ? '' : 'errors';?>">
        <input type="email" placeholder="email" name="email" >
        <?php if (!$formError['email']['isValid']) : ?>
          <ul>
            <?php foreach ($formError['email']['errors'] as $error) :?>
              <li><?=$error?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </li>
      <li class="<?=($formError['pass']['isValid']) ? '' : 'errors';?>" >
        <input type="password" placeholder="pass" name="pass" >
        <?php if (!$formError['pass']['isValid']) : ?>
          <ul>
            <?php foreach ($formError['pass']['errors'] as $error) :?>
              <li><?=$error?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </li>
    </ul>
      <button class="btnSign">LOG IN</button>
  </form>
</div>
<!---->
<h1>These are the latest news</h1>
<section>
  <?php foreach ($news as $new) : ?>
    <div class="news">
        <i class="fas fa-pen-square" onclick="openLogIn()" ></i>
      <div id="title"><?= $new['title']?></div>
      <div id="data"><?= $new['data'] ?></div>
      <div id="date">created: <?= $new['date'] ?></div>
      <div id="first_name"><br><?= $new['first_name'] .' ' .$new['last_name'] ?></div>
    </div>

  <?php endforeach; ?>
</section>
<footer>

</footer>



<script src="script.js" charset="utf-8"></script>
</body>
</html>
