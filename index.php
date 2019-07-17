<!DOCTYPE html>
<html lang="ru">

<head>
  <?php
    $title = "Главная Страница";
    require_once  "./blocks/head.php";
  ?>
</head>
<body>


  <?php require_once  "./blocks/header.php" ?>

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
      <img src="img/<?php echo ($i + 1) ?>.jpg" alt="" class="img-thumbnail">

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


<?php require_once  "./blocks/footer.php" ?>

</body>
</html>