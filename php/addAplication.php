<?php
session_start();
include 'db.php';
$userid = $_SESSION['userid'];
$comment=$_POST['comment'];
$adres=$_POST['adres'];
$query = "
INSERT INTO `zakaz` (`id_user`, `adres`, `comment`) VALUES($userid, '$adres','$comment');
";
$link ->query($query); 
$querysql=" INSERT INTO `application` (`id_user`, `id_zakaz`, `id_tovar`, `kol_vo`)  
SELECT $userid,LAST_INSERT_ID(), `id_tovar`, `kol_vo` FROM `korz` WHERE `id_user`= $userid";

$link->query($querysql);

$query3="DELETE FROM `korz` WHERE `id_user` = $userid";
$link->query($query3);
header("Location: ../korz.php");
?>