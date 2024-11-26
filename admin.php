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
            <div class="main_admin">
                <div class="players">
                    <h1>Пользователи</h1>
                    <?php
                    $query = "SELECT `id`, `name`, `surname`, `login`, `password`, `role`, `email` FROM `users` ";
                    $result = $link->query($query);
                    while ($row = $result->fetch_assoc()) {
                        $userid = $row["id"];
                        $name = $row["name"];
                        $surname = $row["surname"];
                        $login = $row["login"];
                        $password = $row["password"];
                        $role = $row["role"];
                        $email = $row["email"];
                        echo "
                    <div class='info_players'>
                    <form action='./php/addRole.php' method='post' class='frm_players'>
                    <p>Имя: $name</p>
                    <p>Фамилия: $surname</p>
                    <p>Логин: $login</p>
                    <p>Роль: $role</p>
                    <select name='role' id=''>
                    <option hidden></option>
                    <option value='admin'>Администратор</option>
                    <option value='manager'>Менеджер</option>
                    <option value='worker'>Работник</option>
                    </select>
                    <button>Отправить</button>
                    <input type='text' name='user_id' value='$userid' hidden>
                    </form>
                    </div>
                    ";
                    }
                    ?>
                </div>
                <div class="addCategory">
                    <h1>Управление товарами</h1>
                    <div class="tovari_admin">
                        <form action="./php/addCategory.php" method="post">
                            <h1>Добавить категорию</h1>
                            <input type="text" name="category">
                            <button>Добавить</button>
                        </form>
                        <form action="./php/delCategory.php" method="post">
                            <h1>Удаление категории</h1>
                            <select name="category">
                                <?php
                                $query = "SELECT `id`, `name` FROM `category`";
                                $result = $link->query($query);
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    echo "
                                        <option hidden></option>
                                        <option value='$id'>$name</option>
                                        
                                        ";
                                }
                                ?>
                            </select>
                            <button>Удалить</button>
                        </form>
                        <?php
                        echo "
                                        <form action='./php/delTovar.php' method='post'>
                                        <h1>Удаление товаров</h1>
                                        <select name='tovar' id=''>
                                        ";
                        $query = "SELECT `id_tovar`, `name`, `country`, `razmer`, `nalichie`, `max_zagryzka`, `class_energopotrebleniya`, `opis`, `img`, `price`, `id_category` FROM `tovar_stiralki`";
                        $result = $link->query($query);
                        while ($row = $result->fetch_assoc()) {
                            $idtovar = $row['id_tovar'];
                            $name = $row['name'];
                            echo "
                                        <option hidden></option>
                                        <option value='$idtovar'>$name</option>
                                        
                                        ";

                        }
                        ?>
                        </select>
                        <button>Удалить</button>
                        </form>
                    </div>
                </div>
                <div class="chat_main">
                    <h1>Чат с клиентом</h1>
                    <?php
                    $chatid = $_GET['chatid'];
                    if (empty($chatid)) {
                        $query = "SELECT c.id_chat, 
                        (SELECT u.name 
                         FROM users u
                         WHERE u.id = c.id_user
                         ORDER BY c.date DESC 
                         LIMIT 1) AS name, 
                        MAX(c.message) AS message, 
                        MAX(c.date) AS date
                 FROM chat c
                 GROUP BY c.id_chat
                 ORDER BY c.date DESC;";
                        $result = $link->query($query);
                        while ($row = $result->fetch_assoc()) {
                            $name = $row['name'];
                            $idchat = $row['id_chat'];
                            $message = $row['message'];
                            echo "
                            <a = href='admin.php?chatid=$idchat'>
                            <div>
                                <p>$name<p>
                            </div></a>
                            ";
                        }

                    } else {
                        $querychat = "SELECT   `c`.`id_chat`, `c`.`id_user` as id_user, `c`.`message` as message, `c`.`date` as date,`u`.`role` as role FROM `chat` c INNER JOIN `users` u on `c`.`id_user`=`u`.`id` where `id_chat`='$chatid' ";
                        $result1 = $link->query($querychat);
                        echo "<form action='./php/chat.php' method='post' class='frm_chat'>
                        <div class='chat' id='scroll_div'>
                        ";

                        while ($row1 = $result1->fetch_assoc()) {
                            $role = $row1['role'];
                            $message = $row1['message'];
                            $iduser = $row1['id_user'];
                            $date = $row1['date'];
                            echo "
                            <p>$role</p>
                            <p class='message'>$message</p>
                            ";
                        }
                        echo "
                        <input name='chatId' hidden value='$chatid'>
                        </div>
                        <input name='messageadmin' type='text'>
                        <button>Отправить</button>
                        </form>";
                    }
                    ?>

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