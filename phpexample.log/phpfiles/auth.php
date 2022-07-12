<?php
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  $passw = filter_var(trim($_POST['passw']), FILTER_SANITIZE_STRING);

  $passw = md5($passw."dfgderrths12662345");

  $mysql = new mysqli('localhost','root','root','register-bd');

  $result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$name' AND `passw` = '$passw'");

  $user = mysqli_fetch_assoc($result);

  if(count($user) == 0){
    echo "Пользователь не найден";
    exit();
  }

  setcookie('user', $user['name'], time() + 3600, "/");

  $mysql->close();

  header('Location: /');

 ?>
