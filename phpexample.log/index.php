<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <div class="cont">
      <?php
       if ($_COOKIE['user']==''):
        ?>
        <div class="col">
            <h2 class="header">Впервые в Oaktek? Зарегистрируйтесь!</h2>
              <form action="/phpfiles/check.php" method="post">
              <input type="text" class="form-control" name="name" id="name" placeholder="Ваше имя">
              <label for="floatingInput"></label>
              <input type="password" class="form-control" name="passw" id="passw" placeholder="Пароль">
              <label for="floatingPassword"></label>
              <button class="button" type="submit">Зарегистрироваться</button>
              </form>
          </div>
       </div>
       <div class="cont" id="auth">
          <div class="col">
            <h1 class="header">Форма авторизации</h1>
              <form action="/phpfiles/auth.php" method="post">
              <input type="text" class="form-control" name="name" id="name" placeholder="Ваше имя">
              <label for="floatingInput"></label>
              <input type="password" class="form-control" name="passw" id="passw" placeholder="Пароль">
              <label for="floatingPassword"></label>
              <button class="button" type="submit">Войти</button>
              </form>
          </div>
       </div>
          <?php else:?>
              <p class="mainpage">Привет <?=$_COOKIE['user'] ?> </p>
              <br><a class="mainpage" href="phpfiles/all_users.php" title="all_users">Другие пользователи</a>
              <br><a class="mainpage" href="phpfiles/messages.php"> Сообщения </a>
              <br><a class="mainpage" href="phpfiles/exit.php"> Выйти </a>
          <?php endif; ?>      
</body>
</html>
