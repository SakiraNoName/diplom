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
    $error=$_GET[$error];
    nav(2);
    ?>
    <section>
        <div class="forms">
            <form class="logreg" action="php/logination.php" method="post">
            <?php
            if (isset($_GET["error"])) {
                $error = $_GET["error"];
                echo
                "
    <div class='error_div' id = 'error1'>
    <p class='error1'>$error</p>
    </div>
    ";
            }
            ?>
                <div class="inputs">
                    <label>Логин</label>
                    <input type="text" name="login" id="">
                </div>
                <div class="inputs">
                    <label>Пароль</label>
                    <input type="password" name="password" id="">
                </div>
                <div class="button">
                    <button>Войти</button>
                </div>
            </form>
        </div>
    </section>
  </div>
    <?php
  include 'php/footer.php';
  ?>
</body>

</html>