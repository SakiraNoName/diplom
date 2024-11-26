<?php
session_start();
include 'db.php';
$name = $_POST['name'];
$surname = $_POST['surname'];
$login = $_POST['login'];
$pas = $_POST['pas'];
$repeatpass = $_POST['repeatpass'];
$email = $_POST['email'];
if (!empty($_POST)) {
    $query = "INSERT INTO `users`(`name`, `surname`, `login`, `password`, `email`) VALUES ('$name','$surname','$login','$pas','$email')";
    $link->query($query);
    $link->close();
    header("Location: ../login.php");
}

?>