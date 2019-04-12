<?php

function findAllNews(mysqli $database)
{
  $statement = $database->prepare("SELECT * FROM news INNER JOIN users u ON users_ID=u.id ");

  if (!$statement) {
    throw new Exception('Statement not created' . $database->error);
  }

  $statement->execute();
  $news = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

  return $news;
}
function findAllUsers(mysqli $database)
{
  $statement = $database->prepare("SELECT * FROM users");

  if (!$statement) {
    throw new Exception('Statement not created' . $database->error);
  }

  $statement->execute();
  $news = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

  return $news;
}
function findUser(mysqli $database, $user)
{
  $statement = $database->prepare("SELECT first_name, ID FROM users WHERE ID = ?");
  $statement->bind_param('i', $user);


  if (!$statement) {
    throw new Exception('Statement not created' . $database->error);
  }

  $statement->execute();
  $user = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

  return $user;
}

function insert(mysqli $database, $firstName, $lastName, $email, $age,  $sex, $phone, $password ){
  $statement = $database->prepare("INSERT INTO `users`
  ( `first_name`, `last_name`, `email`, `age`, `gender`, `tel`, `pass` ) VALUES (?, ?, ?, ?, ?, ?, ?)");

  $statement->bind_param('sssssss', $firstName, $lastName, $email, $age,  $sex, $phone, $password);

  $statement->execute();

  if ($statement->affected_rows === 0) {
    $statement->close();
    throw new Exception('Nothing was changed!' . $database->error);
  }
  $statement->close();
  return true;
}

  function update(mysqli $database, $title, $data ,$userID, $ID_news)
{

  $statement = $database->prepare( "UPDATE `news` SET `title` = ? , `data` = ?,  `users_ID` = ?  WHERE ID_news = ?");

  $statement->bind_param('ssss', $title, $data ,$userID, $ID_news );

  $statement->execute();

  if ($statement->affected_rows === 0) {
    $statement->close();
    throw new Exception('Nothing was changed!' . $database->error);
  }
  $statement->close();
  return true;

}

function insertNews(mysqli$database, $ID, $titleCreate, $dataCreate)
{
  $statement = $database->prepare("INSERT INTO `news` (`ID_news`, `title`, `date`, `data`, `users_ID`)VALUES (NULL, ?, CURRENT_TIMESTAMP, ?, ?)");

  $statement->bind_param('ssi', $titleCreate, $dataCreate, $ID);
  $statement->execute();

  if ($statement->affected_rows === 0) {
    $statement->close();
    throw new Exception('Nothing was changed!' . $database->error);
  }
  $statement->close();
  return true;
}



?>
