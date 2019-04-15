<?php

require 'dbConect.php';
require 'functions.php';

session_start();

if (!array_key_exists('userID', $_SESSION)) {
  header('Location: /index.php');
}

$userCookie = $_SESSION['userID'];

try {
  $user = findUser($database, $userCookie);
  $userID = ($user[0]['ID']);
  try {
    $news = findAllNews($database);

    $formError['title']['isValid'] = true;
    $formError['data']['isValid'] = true;
    $formError['ID']['isValid'] = true;
    $formError['ID_news']['isValid'] = true;
    $formError['titleCreate']['isValid'] = true;
    $formError['dataCreate']['isValid'] = true;

    if (!empty($_POST)) {
      if (array_key_exists('ID', $_POST)) {
        $ID = $_POST['ID'];
        $ID = filter_var($ID, FILTER_SANITIZE_NUMBER_INT);

        if (empty($ID)){
          $formError['ID']['isValid'] = false;
        }

      } else {
        $formError['ID']['isValid'] = false;
      }
      if (array_key_exists('ID_news', $_POST)) {
        $ID_news = $_POST['ID_news'];
        $ID_news = filter_var($ID_news, FILTER_SANITIZE_NUMBER_INT);

        if (empty($ID_news)){
          $formError['ID_news']['isValid'] = false;
        }

      } else {
        $formError['ID_news']['isValid'] = false;
      }

      if (array_key_exists('title', $_POST)) {
        $title = $_POST['title'];
        $title = filter_var($title, FILTER_SANITIZE_STRING);

      } else {
        $formError['title']['isValid'] = false;
      }
      if (array_key_exists('data', $_POST)) {
        $data = $_POST['data'];
        $data = filter_var($data, FILTER_SANITIZE_STRING);

      } else {
        $formError['data']['isValid'] = false;
      }

      if (
        $formError['title']['isValid'] &&
        $formError['data']['isValid'] &&
        $formError['ID']['isValid']
      ){
        try {
          update($database, $title, $data ,$userID, $ID_news);
          header("Refresh:0");
        } catch (Exception $exception) {
//          header("Location: /");
        }
      }
      if (array_key_exists('titleCreate' , $_POST)){
        $titleCreate = $_POST['titleCreate'];
        $titleCreate =  filter_var($titleCreate, FILTER_SANITIZE_STRING);
      }else{
        $formError['titleCreate']['isValid'] = false;
      }
      if (array_key_exists('dataCreate' , $_POST)){
        $dataCreate = $_POST['dataCreate'];
        $dataCreate = filter_var($dataCreate, FILTER_SANITIZE_STRING);
      }else{
        $formError['dataCreate']['isValid'] = false;
      }

      if (
        $formError['titleCreate']['isValid']  &&
        $formError['dataCreate']['isValid']
      ){
        try {
          insertNews($database, $ID, $titleCreate, $dataCreate);
          header("Refresh:0");
        } catch (Exception $exception) {
//          header("Location: /");
        }
      }
    }
  } catch (Exception $exception) {
    $news = [];
  }
  if (empty($user)){
//    header('Location: /');
  }
}  catch (Exception $exception) {
  $user = [];
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
            <h2>Hello <?=$user['0']['first_name'] ?>! <i class="fas fa-smile"></i></h2>
          </li>
          <li>
            <a href="logOut.php"><i class="fas fa-sign-out-alt"></i></a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <h1>These are the latest news. You can edit by pressing submit button in cards field</h1>

  <section>
    <div class="news">
      <form action="" method="post">
        <h3>Write your stury</h3>
        <input type="text"  placeholder="Title" id="title" name='titleCreate' style="background: #fce273" value="">
        <textarea name="dataCreate" id="data"  cols="30" style="background: #fce273" placeholder="content" rows="10"></textarea>
        <input type="text" style="display: none" id="ID" name='ID' value="<?= $userID ?>">
        <div id="date">create: today with<i class="fas fa-pen-square"></i></div>
        <button class="btnSubmit">Submit change</button>
      </form>
    </div>
    <?php foreach ($news as $new) : ?>
      <div class="news">
        <form action="" method="post">
            <a href="deleteNews.php?ID_news=<?=$new['ID_news'] ?>"> <i class="fas fa-trash-alt"></i></a>
          <input type="text" style="display: none" id="ID" name='ID' value="<?= $new['ID']?>">
          <input type="text" style="display: none" id="ID_news" name='ID_news' value="<?= $new['ID_news']?>">
          <input type="text" id="title" name='title' value="<?= $new['title']?>">
          <textarea name="data" id="data"  cols="30" rows="10"><?= $new['data'] ?></textarea>
          <div id="date">created: <?= $new['date'] ?></div>
          <div id="first_name"><br><?= $new['first_name'] .' ' .$new['last_name'] ?></div>
          <button class="btnSubmit">Submit change</button>
        </form>
      </div>
    <?php endforeach; ?>
  </div>
</body>
<script>
var comfyText = (function(){
  var tag = document.querySelectorAll('textarea')
  for (var i=0; i<tag.length; i++){
    tag[i].addEventListener('paste',autoExpand)
    tag[i].addEventListener('input',autoExpand)
    tag[i].addEventListener('keyup',autoExpand)
  }
  function autoExpand(e,el){
    var el = el || e.target
    el.style.height = 'inherit'
    el.style.height = el.scrollHeight+'px'
  }
  window.addEventListener('load',expandAll)
  window.addEventListener('resize',expandAll)
  function expandAll(){
    var tag = document.querySelectorAll('textarea')
    for (var i=0; i<tag.length; i++){
      autoExpand(e,tag[i])
    }
  }
})()
</script>
</html>
