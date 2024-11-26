<?php
session_start();
if (empty($_POST))
    exit();
include 'db.php';
$login = $_POST['login'];
$password = $_POST['password'];
$query = "SELECT `id`,`login`,`password`,`role` FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
$result = $link->query($query) or die($query);
$row = $result->fetch_assoc();
$role = $row['role'];
$userid = $row['id'];
$login = $row['login'];
$_SESSION['userid'] = $userid;
$_SESSION['role'] = $role;
$_SESSION['login'] = $login;
if ($result->num_rows == 0) {
    header("Location: /login.php?error=Неправильный логин или пароль");
} else if ($role == 'admin')
    header("Location: /admin.php");
elseif ($role == 'manager') {
    header("Location: /manager.php");
} elseif ($role == 'worker') {
    header("Location: /worker.php");
}
else
header("Location: /lk.php");
$link->close();
?>