<?php 
     if ($_COOKIE['user']==''): // исправить куки на сессию
?>  

<h1>Только для авторизованных пользователей</h1>

<?php else: ?>

<?php endif; ?>