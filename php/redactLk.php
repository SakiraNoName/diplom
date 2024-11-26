<?php
session_start();
include 'db.php';
if (empty($_POST['file'])) {
    $file = $_FILES['file'];
    $name = $file["name"];
    $dir = "/img/$name";
    $dir2 = "../img/$name";
    if (move_uploaded_file($file["tmp_name"], $dir2)) {
        echo "error";
    }
}
if (!empty($_POST['file'])) {
    $userid = $_SESSION['userid'];
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $login=$_POST['login'];
    $email=$_POST['email'];
    $query = "UPDATE `users` SET `name`='$name',`surname`='$surname',`login`='$login',`email`='$email',`img`='$dir' WHERE `id`='$userid'";
    $link->query($query);
    $link->close();
    header("Location: ../lk.php");
}
else{
    header("Location: ../lk.php");
}
?>