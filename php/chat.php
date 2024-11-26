<?php
session_start();
include 'db.php';
$userid=$_SESSION['userid'];
$chatadmin=$_POST['chatId'];
$chat=$_POST['chat'];
$messageadmin=$_POST['messageadmin'];
$role=$_SESSION['role'];
$idchat = uniqid($user_id);
$sql="SELECT `id`, `id_chat` as chatid, `id_user`, `message`, `date` FROM `chat` where `id_user`=$userid";
$result=$link->query($sql);
$row=$result->fetch_assoc();
$chatid=$row['chatid'];
if ($role=='admin') {
    $query="INSERT INTO `chat`(`id_chat`, `id_user`, `message`) VALUES ('$chatadmin','$userid','$messageadmin')";
    $link->query($query);
    header("Location: ../admin.php");
}
elseif ($result->num_rows==0) {
    $query="INSERT INTO `chat`(`id_chat`, `id_user`, `message`) VALUES ('$idchat','$userid','$chat')";
    $link->query($query);
    header("Location: ../lk.php");
}
else {
    $query="INSERT INTO `chat`(`id_chat`, `id_user`, `message`) VALUES ('$chatid','$userid','$chat')";
    $link->query($query);
    header("Location: ../lk.php");
}
?>