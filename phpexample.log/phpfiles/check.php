<?php
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  $passw = filter_var(trim($_POST['passw']), FILTER_SANITIZE_STRING);
  $mysql = new mysqli('localhost','root','root','register-bd');
  $query = 'SELECT*FROM `users` WHERE name="'.$name.'"';
  $isLoginFree = mysqli_fetch_assoc(mysqli_query($mysql, $query));
  if(mb_strlen($name) < 2 || mb_strlen($name) > 30) {
    echo "Недопустимая длина имени";
    exit();
    }
   else if(mb_strlen($passw) < 4 || mb_strlen($passw) > 20) {
    echo "Недопустимая длина пароля(от 5 до 10)";
    exit();
    }
    else if (!empty($isLoginFree)) {
  echo("Логин уже занят");
    exit();
    }
  $passw = md5($passw."dfgderrths12662345");

  $mysql->query("INSERT INTO `users` (`name`,`passw`)
  VALUES('$name','$passw')");

  $mysql->close();

  header('Location: /');
 ?>
