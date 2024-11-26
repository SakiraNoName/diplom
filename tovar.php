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
  <?php
  include 'php/db.php';
  include 'php/nav.php';
  nav(0);
  $id = $_GET['id'];
  ?>
  <div class="main_content">
    <section>
      <div class="main_tovar_info">

        <?php
        $query = "SELECT `id_tovar`, `name`, `country`, `razmer`, `nalichie`, `max_zagryzka`, `class_energopotrebleniya`, `opis`, `img`, `price`, `id_category` FROM `tovar_stiralki` where `id_tovar`='$id'";
        $result = $link->query($query);
        while ($row = $result->fetch_assoc()) {
          $opis = $row["opis"];
          $idtovar = $row["id_tovar"];
          $price = $row["price"];
          $category = $row['id_category'];
          $name = $row["name"];
          $country = $row["country"];
          $razmer = $row["razmer"];
          $max_zagryzka = $row["max_zagryzka"];
          $class_energopotrebleniya = $row["class_energopotrebleniya"];
          $img = $row["img"];
          if ($category == 1) {
            echo "
        <div class='tovar_info'>
          <div class='tovar_img'>
          <h1>$name</h1>
            <img src='$img'  height='400px'>
          </div>
          <div class='tovar_text'>
            <ul>
            <li>Размер: $razmer</li>
            <li>Страна: $country</li>
            <li>Максимальная загрузка: $max_zagryzka кг</li>
            <li>Класс энергосбережения: $class_energopotrebleniya</li>
            <li>$price руб.</li>
            </ul>
            <a href='../php/korzAdd.php?idtovar=$idtovar' class = 'a_korz'>В корзину</a>
          </div>
          <div class='tovar_opis'>
          <h1>Описание товара:</h1>
          <p>$opis</p>
          </div>
        </div>
        ";
          } elseif ($category == 2) {
            echo "
        <div class='tovar_info'>
          <div class='tovar_img'>
          <h1>$name</h1>
            <img src='$img'  height='400px'>
          </div>
          <div class='tovar_text'>
          <ul>
            <li>Страна: $country</li>
            <li>Используемый кофе: $razmer</li>
            <li>Мощноность: $max_zagryzka Ватт</li>
            <li>Класс энергосбережения: $class_energopotrebleniya</li>
            <li>$price руб.</li>
            </ul>
            <a href='../php/korzAdd.php?idtovar=$idtovar' class = 'a_korz'>В корзину</a>
            </div>
            <div class='tovar_opis'>
            <h1>Описание товара:</h1>
            <p>$opis</p>
            </div>
        </div>
        ";
          } elseif ($category == 3) {
            echo "
        <div class='tovar_info'>
            <div class='tovar_img'>
            <h1>$name</h1>
              <img src='$img'  height='400px'>
            </div>
            <div class='tovar_text'>
            <ul>
              <li>Страна: $country</li>
              <li>Размер: $razmer</li>
              <li>Зон приготовления: $max_zagryzka</li>
              <li>Цвет: $class_energopotrebleniya</li>
              <li>$price руб.</li>
              </ul>
              <a href='../php/korzAdd.php?idtovar=$idtovar' class = 'a_korz'>В корзину</a>
            </div>
            <div class='tovar_opis'>
            <h1>Описание товара:</h1>
            <p>$opis</p>
            </div>
        </div>
        ";
          } elseif ($category == 4) {
            echo "
        <div class='tovar_info'>
            <div class='tovar_img'>
            <h1>$name</h1>
              <img src='$img'  height='400px'>
            </div>
            <div class='tovar_text'>
            <ul>
              <li>Страна: $country</li>
              <li>Размер: $razmer</li>
              <li>Объем: $max_zagryzka л</li>
              <li>Класс энергосбережения: $class_energopotrebleniya</li>
              <li>$price руб.</li>
              </ul>
              <a href='../php/korzAdd.php?idtovar=$idtovar' class = 'a_korz'>В корзину</a>
              </div>
              <div class='tovar_opis'>
              <h1>Описание товара:</h1>
              <p>$opis</p>
              </div>
        </div>
        ";
          }
        }
        ?>
      </div>
    </section>

  </div>
  <?php
  include 'php/footer.php';
  ?>
</body>

</html>