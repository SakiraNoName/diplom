<?php
session_start();
include 'db.php';
if ($userid = $_SESSION['userid'] == 0) {
    header("Location: ../login.php");
}
else {
    $userid = $_SESSION['userid'];
    $idtovar = $_GET['idtovar'];
    $query = "INSERT INTO `korz`(`id_tovar`, `id_user`, `kol_vo`) VALUES ('$idtovar','$userid','1')";
    $link->query($query);
    header("Location: ../korz.php");
}
?>