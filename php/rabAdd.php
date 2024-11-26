<?php
include 'db.php';
$rab=$_POST['rab'];
$idapp=$_GET['idApp'];
echo $idapp;
$query="UPDATE `application` SET `id_rab`='$rab' where `id`=$idapp";
$link->query($query);
header("Location: ../manager.php")
?>