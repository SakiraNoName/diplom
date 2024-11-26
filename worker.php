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
    $userid=$_SESSION['userid']
    ?>
    <section>
    <div class="main_manager">
                <div class="application_flex">
                    <div class="application_main">
                        <?php

                        $query = "SELECT `a`.`id` as idapp, `ur`.`name` as namerab, `a`.`id_rab` as idrab, `a`.`status` as stat, `u`.`id` as iduser,`u`.`login` as uslogin,`t`.`id_tovar` as idtovar,`t`.`nalichie` as nal,`z`.`comment` as comm,`z`.`adres` as adres, `a`.`kol_vo` as kol
                    FROM `application` a 
                    INNER JOIN `tovar_stiralki` t ON `a`.`id_tovar`=`t`.`id_tovar`
                    INNER JOIN `users` u ON `a`.`id_user`=`u`.`id`
                    INNER JOIN `zakaz` z ON `a`.`id_zakaz`=`z`.`id`
                    INNER JOIN `users` ur on `a`.`id_rab`= `ur`.`id`
                    where `a`.`id_rab`=$userid and `a`.`status` = 'Подтвержденно'
                    ";
                        $result = $link->query($query);
                        while ($row = $result->fetch_assoc()) {
                            $idrab=$row['idrab'];
                            $idapp = $row['idapp'];
                            $namerab = $row['namerab'];
                            $stat = $row['stat'];
                            $iduser = $row['iduser'];
                            $uslogin = $row['uslogin'];
                            $idtovar = $row['idtovar'];
                            $nal = $row['nal'];
                            $comm = $row['comm'];
                            $adres = $row['adres'];
                            $kol = $row['kol'];
                            echo "
                        <div class='application_block'>
                        <p>ID пользователя: $iduser</p>
                        <p>Логин пользователя: $uslogin</p>
                        <p>ID товара: $idtovar</p>
                        <p>Наличие товара на складе: $nal</p>
                        <p>Комментарии к заказу: $comm</p>
                        <p>Адрес выдачи: $adres</p>
                        <p>Количество товара: $kol</p>
                        <p>Статус заказа: $stat</p>
                        </div>
                        ";
                        }
                        ?>
                    </div>
                </div>
            </div>
    </section>
    </div>
    <?php
  include 'php/footer.php';
  ?>
</body>

</html>