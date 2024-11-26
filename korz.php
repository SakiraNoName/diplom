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
    $userid = $_SESSION['userid'];
    nav(3);
    ?>
    <div class="main_content">
        <section>
            <div class="main_korz">
                <div class="info_korz" id="info_korz">
                    <?php
                    $query = "SELECT `t`.`name` as tname,`t`.`img` as img,`t`.`country` as country, `t`.`id_tovar`  as idtovar, `t`.`price` as price, `k`.`kol_vo` as kol FROM `korz` k INNER JOIN `tovar_stiralki` `t` on `t`.`id_tovar`=`k`.`id_tovar`
                    INNER JOIN `users` `u` on `u`.`id`=`k`.`id_user` where `k`.`id_user`='$userid' ";
                    $result = $link->query($query);
                    $pricesArray = array();
                    $quantitiesArray = array();
                    while ($row = $result->fetch_assoc()) {
                        $allprice = 0;
                        $price = $row['price'];
                        $pricesArray = $row['price'];
                        $quantitiesArray = $row['kol'];
                        $idtovar = $row['idtovar'];
                        $name = $row["tname"];
                        $img = $row["img"];
                        $kol = $row["kol"];
                        $country = $row["country"];
                        
                        echo "
                        <div class='tovar_info_korz'>
                        <p>Наименование товара: $name</p>
                        <p>Страна производства: $country</p>
                        <p id='price'>Цена: $price</p>
                        <img src=$img height='150px' widght='150px'>
                        <div class='buttonkorz'>
                        <button onclick='minus($idtovar,$userid,$kol)'>-</button>
                        <p>$kol</p>
                        <button onclick='plus($idtovar,$userid)'>+</button>
                        </div>
                        </div>
                        ";
                    }
                    $allprice = $price*$kol;
                    if (!empty($idtovar)) {
                        echo "<form class='frmkorz' action='../php/addAplication.php' method='post'>
                        <p>Комментарии к заказу</p>
                        <textarea name='comment' id='' cols='30' rows='10'></textarea>
                        <select name='adres'>
                        <option value='г.Клин улица Советская д5'>г.Клин улица Советская д5</option>
                        <option value='г.Москва улица Иркутская строение 5/6'>г.Москва улица Иркутская строение 5/6</option>
                        </select>
                        <p id='allprice'>$allprice</p>
                        <button>Оформить</button>
                        </form>";
                    } else {
                        echo "<h1>Ваша корзина пуста</h1>";
                    }
                    ?>
                </div>
            </div>
        </section>

    </div>
    <?php
    include 'php/footer.php';
    ?>
    <script src="korz.js"></script>
</body>

</html>