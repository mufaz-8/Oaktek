<?php 
session_start();
     if ($_COOKIE['user']==''):
?>  
<h1>Только для авторизованных пользователей</h1>
<p>Для авторизации перейдите <a href="http://phpexample.log/"> сюда </a></p>
<?php else: ?>
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
  <br><h2 align="center">Личные сообщения</h2>
  <table border="1" style="margin: 0 auto;" width="50%">
    <tr>
      <td>От кого</td>
      <td>Сообщение</td>
      <td></td>
    </tr>
    <?php
      require_once('functions.php');
      $messages = getAllMessages(getIDOnName($_COOKIE["user"]));
      for ($i = 0; $i < count($messages); $i++ ) {
        echo "<tr>";
        $from = getUserOnID($messages[$i]["from"]);
        echo "<td><b>".$from["name"]."</b></td>";
        echo "<td><b>".$messages[$i]["message"]."</b></td>";
        echo"<td>";
        echo "<a href='send_mess.php?to=".$from["id"]."' title='Ответить'>Ответить</a>";
        echo"</td>";
        echo"</tr>";
      } 
    ?>
  </table>
  <?php endif; ?>
</body>
</html>
