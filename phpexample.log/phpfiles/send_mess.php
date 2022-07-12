<?php 
session_start();
     if ($_COOKIE['user']==''):
?>  
<h1>Только для авторизованных пользователей</h1>
<p>Для авторизации перейдите <a href="http://phpexample.log/"> сюда </a></p>
<?php else: ?>
<?php
  require_once('functions.php');
  session_start();
  $user = getUserOnID($_GET["to"]);
  if (isset($_POST["smessage"])) {
    $message = $_POST["message"];
    $to = $_POST["to"];
    $from = getIDOnName($_COOKIE['user']); // исправить куки на сессию
    addMessage($from, $to, $message);
    echo('Сообщение успешно отправлено');
  }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>AMCompany</title>
</head>
<title>Oaktek</title>
</head>
<body style="background-color:#f0f0f0">
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><p class="nav-link px-2 text-white" style="font-size: 35px">Oaktek corporation</p></li>
        </ul>
      </div>
    </div>
  </header>
<body>
  <title>Отправить сообщение</title>
  <h2>Отправить сообщение <?php echo $user["name"]; ?></h2>
  <form id = "form1" action="send_mess.php?to=<?php echo $_GET["to"]; ?>" method="post">
      <p>
        <label>Ваше сообщение</label>
        <br /> 
        <textarea name="message" cols="40" rows="3"></textarea>
      </p>
      <p>
        <input type="hidden" name="to" value="<?php echo $_GET["to"]; ?>" />
        <input type="submit" name="smessage" value="Отправить" />
      </p>
  </form>
  <?php endif; ?>
</body>
</html>
