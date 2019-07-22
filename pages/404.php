<!DOCTYPE html>
<html lang="ru">

<head>
<?php
  $title = "404";
  $path = $_SERVER['DOCUMENT_ROOT'] . "/camagru/pages/blocks/head.php";
  require_once  $path;
?>
</head>
<body>


<?php
  $path = $_SERVER['DOCUMENT_ROOT'] . "/camagru/pages/blocks/header.php";
  require_once $path;
?>

<div class="container mt-5">

  <h3 class="mb-5">Ошибка 404</h3>

</div>


<?php
  $path = $_SERVER['DOCUMENT_ROOT'] . "/camagru/pages/blocks/footer.php";
  require_once $path;
?>

</body>
</html>