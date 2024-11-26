<?php
include 'db.php';
$input = json_decode(file_get_contents("php://input"), true);
$idtovar= $input['idtovar'];
$userid= $input['userid'];
$kol=$input['kol'];
if ($kol>1) {
    $query="UPDATE `korz` SET `kol_vo`= `kol_vo`- 1 WHERE `id_user`= $userid and `id_tovar` = $idtovar";
}
else{
    $query="DELETE FROM `korz` WHERE `id_user`= $userid and `id_tovar` = $idtovar";
}
$link->query($query);
header("Location: ../korz.php")
?>
