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
    nav(1);
    ?>
    <div class="main_content">
        <section>
            <div class="main_searc">

        <?php
        $search = $_POST['search'];
        $query = "SELECT  `id_tovar`,  `name`, `country`, `razmer`, `max_zagryzka`, `class_energopotrebleniya`, `img`,`id_category`  FROM `tovar_stiralki` WHERE `name` LIKE '%$search%'";
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
    <p>Максимальная загрузка: $max_zagryzka</p>
    <p>Класс энергосбережения: $class_energopotrebleniya</p>
    <img src='$img' width='150px' height='150px'>
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
    <p>Объем: $max_zagryzka</p>
    <p>Класс энергосбережения: $class_energopotrebleniya</p>
    <img src='$img' width='150px' height='200px'>
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
    <p>Мощноность: $max_zagryzka</p>
    <p>Класс энергосбережения: $class_energopotrebleniya</p>
    <img src='$img' width='150px' height='200px'>
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
    <p>Класс энергосбережения: $class_energopotrebleniya</p>
    <img src='$img' width='150px' height='200px'>
    </a>
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