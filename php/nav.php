<?php
session_start();
function nav($item)
{
    include 'php/db.php';
    if (empty($_SESSION)) {
        $items = [
            "index.php" => "О нас",
            "reg.php" => "Регистрация",
            "login.php" => "Вход"
        ];
    } elseif ($_SESSION['role'] == 'admin') {
        $items = [
            "index.php" => "О нас",
            "admin.php" => "Администрирование",
            "php/logout.php" => "Выход"
        ];
    } elseif ($_SESSION['role'] == 'manager') {
        $items = [
            "index.php" => "О нас",
            "tovarAdd.php" => "Добавление товаров",
            "lk.php" => "Личный кабинет",
            "manager.php" => "Заявки",
            "php/logout.php" => "Выход"
        ];
    } elseif ($_SESSION['role'] == 'worker') {
        $items = [
            "index.php" => "О нас",
            "worker.php" => "Заявки",
            "lk.php" => "Личный кабинет",
            "php/logout.php" => "Выход"
        ];
    } else {
        $items = [
            "index.php" => "О нас",
            "catalog.php" => "Каталог",
            "lk.php" => "Личный кабинет",
            "korz.php" => "Корзина",
            "php/logout.php" => "Выход"
        ];
    }
    echo "<header class='header'>
            <nav>
            <ul class='head'>
            <a href='index.php'><div class='logo_div'>
            <img src='img/logo.jpg' class='logo' alt='error'>
            <p>Магазин бытовой техники</p>
        </div></a>
            
    ";
    echo "
    <form action='./search.php' method='post' class='frmsearch'>
    <input class='search' type='text' name='search' placeholder='Поиск товаров'>
    <button></button>
    </form>
    ";
    $i = 0;
    foreach ($items as $key => $value) {
        if ($i == $item)
            echo "<a href='$key' class='active'><li>$value</li></a>";
        else
            echo "<a href='$key'><li>$value</li></a>";
        $i++;
    }
    echo "</ul>

    </nav>
    </header>";
}














































?>
