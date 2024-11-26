<?php
session_start()
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>

<body>
  <div class="main_content">

    <?php
    include 'php/db.php';
    include 'php/nav.php';
    nav(1);
    ?>
    <section>

      <div class="main_catalog">
        <div class="catalog_block">
          <img src="./img/32bad5577456a365c13ac92632dd6286.jpg" alt="" height="150px">
          <a href="tovarsCatalog.php?id=1">Стиралки</a>
        </div>
        <div class="catalog_block">
          <img src="./img/2e54f6cc780c0c546a963a63b3361047.png" alt="" height="150px">
          <a href="tovarsCatalog.php?id=2">Кофемашинки</a>
        </div>
        <div class="catalog_block">
          <img src="./img/8cfba85951240549c9d0625ff35c9fbe.jpg" alt="" height="150px">
          <a href="tovarsCatalog.php?id=3">Газовые плиты</a>
        </div>
        <div class="catalog_block">
          <img src="./img/74624d4c5d404647feeddd91aadbb06c.jpg" alt="" height="150px">
          <a href="tovarsCatalog.php?id=4">Холодильники</a>
        </div>
      </div>
    </section>
  </div>
  <?php
  include 'php/footer.php';
  ?>
</body>

</html>