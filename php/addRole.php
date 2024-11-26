<?php
session_start();
include 'db.php';
$id = $_POST['user_id'];
$role = $_POST['role'];
$query = "UPDATE `users` SET `role`='$role' WHERE `id`=$id";
echo $id;
$link->query($query) or die($link->error);
header("Location: ../admin.php");
?>