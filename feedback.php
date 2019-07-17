<!DOCTYPE html>
<html lang="ru">

<head>
  <?php
    $title = "Обратная связь";
    require_once  "./blocks/head.php";
  ?>
</head>
<body>

<?php require_once "./blocks/header.php" ?>


<div class="container mt-5">
  <h3>Контактная форма</h3>
  <form action="check.php" method="post">
    <input type="email" name="email" placeholder="Введите Email" class="form-control">
    <br>
    <textarea name='message' class="form-control" placeholder="Введите ваше сообщение"></textarea>
    <br>
    <button type="submit" name="send" class="btn btn-success">Отправить</button>
    <br>
  </form>
</div>




<?php require_once "./blocks/footer.php" ?>

</body>
</html>