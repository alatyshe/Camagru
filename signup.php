<!DOCTYPE html>
<html lang="ru">

<head>
  <?php
  $title = "Главная Страница";
  require_once  "./blocks/head.php";
  ?>
</head>
<body>


<!-- https://youtu.be/H0AtasNY-AM -->
<?php require_once  "./blocks/header.php" ?>

<?php

require_once  "./connect_db.php";

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
  $settings = require_once  "./params_db.php";

  $data = [
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'active' => "0"
  ];
  $pdo_db = new \DevStart\Database($settings);


  // Проверка на повтор логина.
  $query = "SELECT * FROM users WHERE username='$data[username]'";
  $result = $pdo_db->query($query);
  if ($result) {
    $fmsg = "Username already in use";
  }
  // Проверка на повтор почты.
  if (!isset($fmsg)) {
    $query = "SELECT * FROM users WHERE email='$data[email]'";
    $result = $pdo_db->query($query);
    if ($result) {
      $fmsg = "Email already registered";
    }
  }
  // если все гуд - создаем пользователя.
  if (!isset($fmsg)) {
    // Отправляем данные для регистрации пользователя.
    $query = "INSERT INTO users (username, password, email, active) VALUES (:username, :password, :email, :active)";
    $result = $pdo_db->query($query, $data);
    if ($result > 0) {
      $smsg = "Регистрация прошла успешно";
    } else {
      $fmsg = "Ошибка";
    }
  }
}

?>

<!--
<div>
  <?php foreach($query as $user): ?>
  <div>
    <div><?php print $user['username']?> </div>
    <div><?php print $user['password']?> </div>
    <div><?php print $user['email']?> </div>
    <div><?php print $user['active']?> </div>
    <br>
  </div>
  <?php endforeach; ?>
</div>

-->

<div class="container mt-5">
  <form class="form-signin" method="POST">
    <h3>Регистрация</h3>
    <br>
    <?php if (isset($smsg)) { ?> <div class="alert alert-success" role="alert"><?php echo $smsg ?></div> <?php } ?>
    <?php if (isset($fmsg)) { ?> <div class="alert alert-danger" role="alert"><?php echo $fmsg ?></div> <?php } ?>
    <input type="text" name="username" class="form-control" placeholder="Username" required>
    <br>
    <input type="email" name="email" class="form-control" placeholder="Email" required>
    <br>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

  </form>
</div>




<?php require_once  "./blocks/footer.php" ?>

</body>
</html>