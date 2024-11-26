<?php
session_start()
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>

<body>
  <div class="main_content">
    <?php
    include 'php/db.php';
    include 'php/nav.php';
    nav(0);
    ?>

    <section>
      <div class="mainslider" id="pos">
        <h1>Наши новинки</h1>
        <br> <br>
        <div class="slideshow-container">
          <?php
          $query = "SELECT `id_tovar` as id, `img`,`name` FROM `tovar_stiralki` ORDER BY `id_tovar` DESC LIMIT 0,3";
          $result = $link->query($query);
          while ($row = $result->fetch_assoc()) {
            $idTovar = $row['id'];
            $img = $row['img'];
            $name = $row['name'];
            echo "
            <div class='mySlides'>
            <div class='slideBox'>
            <a href='./tovar.php?id=$idTovar'>
              <img src='$img' alt=''>
              <div class='slide_text'>
              <p>$name</p>
              </a>
              </div>
            </div>
          </div>
            
                ";
          }
          ?>
        </div>
        <br>
      </div>
      <div class="main_tovar">
        <div class="tovar_blocks">
          <?php
          $query = "SELECT `id_tovar`,  `name`, `country`, `razmer`, `max_zagryzka`, `class_energopotrebleniya`, `img`,`id_category` FROM `tovar_stiralki` ";
          $result = $link->query($query);
          while ($row = $result->fetch_assoc()) {
            $idTovar = $row["id_tovar"];
            $name = $row["name"];
            $country = $row["country"];
            $razmer = $row["razmer"];
            $max_zagryzka = $row["max_zagryzka"];
            $class_energopotrebleniya = $row["class_energopotrebleniya"];
            $img = $row["img"];
            $category = $row["id_category"];
            if ($category == '1') {
              echo "
        <div class='tovar'>
        <a href='./tovar.php?id=$idTovar' class = 'a_tovar'>
        <h1>$name</h1>
        <p>Страна: $country</p>
        <p>Размер: $razmer</p>
        <p>Максимальная загрузка: $max_zagryzka кг</p>
        <p>Класс энергосбережения: $class_energopotrebleniya</p>
        <img src='$img' height='150px'>
        </a>
        </div>
        ";
            } elseif ($category == '4') {
              echo "
        <div class='tovar'>
        <a href='./tovar.php?id=$idTovar' class = 'a_tovar'>
        <h1>$name</h1>
        <p>Страна: $country</p>
        <p>Размер: $razmer</p>
        <p>Объем: $max_zagryzka л</p>
        <p>Класс энергосбережения: $class_energopotrebleniya</p>
        <img src='$img' height='200px'>
        </a>
        </div>
        ";
            } elseif ($category == '2') {
              echo "
        <div class='tovar'>
        <a href='./tovar.php?id=$idTovar' class = 'a_tovar'>
        <h1>$name</h1>
        <p>Страна: $country</p>
        <p>Используемый кофе: $razmer</p>
        <p>Мощноность: $max_zagryzka Ватт</p>
        <p>Класс энергосбережения: $class_energopotrebleniya</p>
        <img src='$img' height='200px'>
        </a>
        </div>
        ";
            } elseif ($category == '3') {
              echo "
        <div class='tovar'>
        <a href='./tovar.php?id=$idTovar' class = 'a_tovar'>
        <h1>$name</h1>
        <p>Страна: $country</p>
        <p>Размер: $razmer</p>
        <p>Зон приготовления: $max_zagryzka</p>
        <p>Цвет: $class_energopotrebleniya</p>
        <img src='$img' height='200px'>
        </a>
        </div>
        ";
            }
          }
          ?>

        </div>
      </div>

    </section>
  </div>
  <?php
  include 'php/footer.php';
  ?>
  <script src="js.js"></script>





</body>

</html>