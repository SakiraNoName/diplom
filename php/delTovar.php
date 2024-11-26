<?php
include 'db.php';
$idtovar=$_POST['tovar'];
$query="DELETE FROM `tovar_stiralki` WHERE `id_tovar` = $idtovar";
$link->query($query);
header("Location: ../admin.php")
?>