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
        $userid = $_SESSION['userid'];
        nav(2);
        ?>
        <section>
            <div class="lk_main">

                <?php
                $query = "SELECT `id`, `name`, `surname`, `login`, `password`, `role`, `email`,`img` FROM `users` WHERE `id`=$userid";
                $result = $link->query($query);
                $row = $result->fetch_assoc();
                $name = $row['name'];
                $login = $row['login'];
                $surname = $row['surname'];
                $email = $row['email'];
                $img = $row['img'];
                echo "
                        <div class='lk_info'>
                            <h1>Ваш профиль</h1>
                        <form class='frmlk' action='../php/redactLk.php' method='post' enctype='multipart/form-data'>
                            <label for=''>Имя</label>
                            <input type='text' name='name' value='$name'>
                            <label for=''>Фамилия</label>
                            <input type='text' name='surname' value='$surname'>
                            <label for=''>Логин</label>
                            <input type='text' name='login' value='$login'>
                            <label for=''>Почта</label>
                            <input type='text' name='email' value='$email'>
                            <img src='$img' width='150px' height='150px'>
                            <input type='file' name='file'>
                            <button>Изменить данные</button>
                        </form>
                        </div>
                    ";
                ?>
                <div class="application_lk">
                    <h1>Здесь ваши заявки</h1>
                    <?php
                $query = "SELECT `a`.`id` as idapp, `ur`.`name` as namerab, `a`.`status` as stat, `u`.`id` as iduser,`u`.`login` as uslogin,`t`.`id_tovar` as idtovar,`t`.`nalichie` as nal,`z`.`comment` as comm,`z`.`adres` as adres, `a`.`kol_vo` as kol
                FROM `application` a 
                INNER JOIN `tovar_stiralki` t ON `a`.`id_tovar`=`t`.`id_tovar`
                INNER JOIN `users` u ON `a`.`id_user`=`u`.`id`
                INNER JOIN `zakaz` z ON `a`.`id_zakaz`=`z`.`id`
                INNER JOIN `users` ur on `a`.`id_rab`= `ur`.`id`
                where `u`.`id`='$userid'";
                $result = $link->query($query);
                while ($row = $result->fetch_assoc()) {
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
                    <p><span class='label'>ID товара:</span> <span class='value'>$idtovar</span></p>
                    <p><span class='label'>Наличие товара на складе:</span> <span class='value'>$nal</span></p>
                    <p><span class='label'>Комментарии к заказу:</span> $comm</p>
                    <p><span class='label'>Адрес выдачи:</span> <span class='value'>$adres</span></p>
                    <p><span class='label'>Количество товара:</span> <span class='value'>$kol</span></p>
                    <p><span class='label'>Статус заказа:</span> <span class='value'>$stat</span></p>
                    </div>
                    ";
                }
                ?>
                    </div>
                <div class="chat_main">
                    <h1>Чат с техподдержкой</h1>
                    <form action='./php/chat.php' method='post' class="frm_chat">
                        <div class='chat' id="scroll_div">
                            <?php
                            $querysql = "SELECT `id`, `id_chat`, `id_user`, `message`, `date` FROM `chat` WHERE `id_user`=$userid";
                            $result1 = $link->query($querysql);
                            $row1 = $result1->fetch_assoc();
                            $idchat = $row1['id_chat'];
                            $query = "SELECT   `c`.`id_chat`, `c`.`id_user` as id_user, `c`.`message` as message, `c`.`date` as date,`u`.`role` as role FROM `chat` c INNER JOIN `users` u on `c`.`id_user`=`u`.`id` where `id_chat`='$idchat' ";
                            $result = $link->query($query);
                            while ($row = $result->fetch_assoc()) {
                                $message = $row['message'];
                                $role=$row['role'];
                                echo "
                                <p>$role</p>
                            <p class='message'>$message</p>
                            ";
                            }
                            ?>
                        </div>
                            <input type="text" name="chat" id="">
                            <button>Отправить</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <?php
    include 'php/footer.php';
    ?>
    <script src="scroll.js"></script>
</body>

</html>