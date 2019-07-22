<!DOCTYPE html>
<html lang="ru">

<head>
<?php
  $title = "Главная Страница";
  $path = $_SERVER['DOCUMENT_ROOT'] . "/camagru/pages/blocks/head.php";
  require_once  $path;
?>
</head>
<body>


<?php
  $path = $_SERVER['DOCUMENT_ROOT'] . "/camagru/pages/blocks/header.php";
  require_once $path;
?>

<div  class="container mt-5">

  <h3 class="mb-5">Наши статьи</h3>

  <div class="card-deck mb-3 text-center">

  <!-- PHP -->
  <?php 
    for ($i = 0; $i < 3; $i++):
  ?>

  <div class="card mb-4 shadow-sm">
    <div class="card-header">
      <h4 class="my-0 font-weight-normal">Просто текст</h4>
    </div>
    <div class="card-body">
      <!-- PHP -->
      <img src="/camagru/img/<?php echo ($i + 1) ?>.jpg" alt="" class="img-thumbnail">

      <ul class="list-unstyled mt-3 mb-4">
        <li>10 users included</li>
        <li>2 GB of storage</li>
        <li>Email support</li>
        <li>Help center access</li>
      </ul>
      <button type="button" class="btn btn-lg btn-block btn-outline-primary">Подробнее</button>
    </div>
  </div>

  <!-- PHP -->
  <?php 
    endfor;
  ?>

  </div>
</div>



<?php
  $path = $_SERVER['DOCUMENT_ROOT'] . "/camagru/pages/blocks/footer.php";
  require_once $path;
?>

</body>
</html>