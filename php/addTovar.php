<?php
session_start();
$nameTovar = $_POST['nameTovar'];
$country = $_POST['country'];
$razmer = $_POST['razmer'];
$maxzagryzka = $_POST['maxzagryzka'];
$classenergo = $_POST['classenergo'];
$nalichie = $_POST['nalichie'];
$opis = $_POST['opis'];
if (empty($_POST['file'])) {
    $file = $_FILES['file'];
    $name = $file["name"];
    $dir = "/img/$name";
    $dir2 = "../img/$name";
    if (move_uploaded_file($file["tmp_name"], $dir2)) {
        echo "error";
    }
}
$price = $_POST['price'];
$categor = $_POST['categor'];
include 'db.php';
$query = "INSERT INTO `tovar_stiralki`( `name`, `country`, `razmer`, `nalichie`, `max_zagryzka`, `class_energopotrebleniya`, `opis`, `img`, `price`, `id_category`) VALUES ('$nameTovar','$country','$razmer', '$nalichie', '$maxzagryzka','$classenergo', '$opis','$dir','$price','$categor')";
$link->query($query);
header("Location: ../tovarAdd.php");
$link->close();
?>