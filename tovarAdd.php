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
            <div class="main_add">
                <form class="frmAdd" action="../php/addTovar.php" method="post" enctype="multipart/form-data">
                    <label for="">Название товара</label>
                    <input type="text" name="nameTovar">
                    <label for="">Страна</label>
                    <input type="text" name="country">
                    <label for="">Размер (Используемый кофе)</label>
                    <input type="text" name="razmer">
                    <label for="">Наличие на складе</label>
                    <input type="text" name="nalichie">
                    <label for="">Максимальная загрузка (Объем, мощность, зон приготовления)</label>
                    <input type="text" name="maxzagryzka">
                    <label for="">Энергопотребление (Цвет)</label>
                    <input type="text" name="classenergo" id="">
                    <label for="">Описание товара</label>
                    <textarea name="opis" id="" cols="30" rows="10"></textarea>
                    <label for="">Картинка</label>
                    <input type="file" name="file">
                    <label for="">Цена</label>
                    <input type="number" name="price" id="">
                    <label for="">Категория товара</label>
                    <select name="categor" id="">
                        <?php
                            $query="SELECT `id`, `name` FROM `category`";
                            $result=$link->query($query);
                            while ($row=$result->fetch_assoc()) {
                                $id=$row['id'];
                                $name=$row['name'];
                                echo "
                                <option value='$id'>$name</option>
                                ";
                            }
                        ?>
                    </select>
                    <button>Добавить</button>
                </form>
            </div>
        </section>
    </div>
    <?php
    include 'php/footer.php';
    ?>
</body>

</html>