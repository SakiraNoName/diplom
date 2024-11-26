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
        $idcatalog = $_GET['id'];
        nav(1);
        ?>
        <section>
            <div class="main_tovarsCatalog">
                <?php
                if ($idcatalog == 1) {

                    $query = "SELECT `id_tovar`,  `name`, `country`, `razmer`, `max_zagryzka`, `class_energopotrebleniya`, `img`,`id_category` FROM `tovar_stiralki` WHERE `id_category`='1'";

                } elseif ($idcatalog == 2) {

                    $query = "SELECT `id_tovar`,  `name`, `country`, `razmer`, `max_zagryzka`, `class_energopotrebleniya`, `img`,`id_category` FROM `tovar_stiralki` WHERE `id_category`='2'";

                } elseif ($idcatalog == 3) {

                    $query = "SELECT `id_tovar`,  `name`, `country`, `razmer`, `max_zagryzka`, `class_energopotrebleniya`, `img`,`id_category` FROM `tovar_stiralki` WHERE `id_category`='3'";

                } elseif ($idcatalog == 4) {

                    $query = "SELECT `id_tovar`,  `name`, `country`, `razmer`, `max_zagryzka`, `class_energopotrebleniya`, `img`,`id_category` FROM `tovar_stiralki` WHERE `id_category`='4'";

                }

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
        <img src='$img'      height='150px'>
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
        <img src='$img'  height='200px'>
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
        <img src='$img'  height='200px'>
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
        <img src='$img'  height='200px'>
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
</body>

</html>