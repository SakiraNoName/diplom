<?php
session_start();
include 'php/nav.php';
nav(1);
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

    <div class="forms">
        <form class="log" action="php/registr.php" method="post" id="frmreg">
            <div class="input_flex">
            <p id="error"></p>
                <div class="inputs">
                    <label>Имя</label>
                    <input type="text" name="name" id="username" placeholder="Имя" pattern="[а-яА-ЯЁё\s\-]{1,50}" >
                    <p id="error"></p>
                </div>
                <div class="inputs">
                    <label>Фамилия</label>
                    <input type="text" name="surname" id="username" placeholder="Фамилия" pattern="[а-яА-ЯЁё\s\-]{1,50}" >
                </div>
                <div class="inputs">
                    <label>Логин</label>
                    <input type="text" name="login" placeholder="Логин" id="login" pattern="[a-zA-Z0-9\-]{1,50}" >  
                </div>
                <div class="inputs">
                    <label>Пароль</label>
                    <input type="password" name="pas" placeholder="Пароль" id="password" minlength="6" >
                </div>
                <div class="inputs">
                    <label>Повторите пароль</label>
                    <input type="password" name="repeatpass" id="confirmPassword" placeholder="Повторите пароль" >
                </div>
                <div class="inputs">
                    <label>Почта</label>
                    <input type="email" name="email" id="email" placeholder="Почта" >
                </div>
                <div class="button">
                    <button onclick="validateRegistration(event)">Отправить</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <?php
  include 'php/footer.php';
  ?>
  <script src="js.js"></script>
</body>

</html>