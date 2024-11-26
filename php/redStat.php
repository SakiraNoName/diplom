<?php
include 'db.php';
$idapp=$_POST['idapplication'];
$status=$_POST['status'];
$query="UPDATE `application` SET `status`='$status' WHERE `id`=$idapp";
$link->query($query);
header("Location: ../manager.php")
?>